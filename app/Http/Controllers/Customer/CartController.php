<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // LIHAT CART
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        return view('customer.cart.index', compact('items'));
    }

    // TAMBAH KE CART
    public function add(Request $request, $product_id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->first();

        if ($item) {
            $item->increment('qty');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product_id,
                'qty' => 1
            ]);
        }

        return redirect()->route('customer.cart.index');
    }

    // TAMBAH QTY
    public function increase($id)
    {
        $item = CartItem::where('id', $id)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $item->increment('qty');

        return back();
    }

    // KURANGI QTY
    public function decrease($id)
    {
        $item = CartItem::where('id', $id)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->firstOrFail();

        if ($item->qty > 1) {
            $item->decrement('qty');
        } else {
            $item->delete();
        }

        return back();
    }

    // HAPUS ITEM
    public function remove($id)
    {
        $item = CartItem::where('id', $id)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $item->delete();

        return back();
    }
}
