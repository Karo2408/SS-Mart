<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $items = CartItem::with('product')
            ->where('cart_id', $cart->id)
            ->get();

        return view('cart.index', compact('items'));
    }

    public function add(Request $request, $product_id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->first();

        if ($item) {
            $item->qty += 1;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product_id,
                'qty' => 1
            ]);
        }

        return redirect('/cart');
    }

    public function increase($id)
    {
        $item = CartItem::findOrFail($id);
        $item->qty += 1;
        $item->save();

        return back();
    }

    public function decrease($id)
    {
        $item = CartItem::findOrFail($id);

        if ($item->qty > 1) {
            $item->qty -= 1;
            $item->save();
        } else {
            // kalau qty = 1, hapus item
            $item->delete();
        }

        return back();
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return redirect('/cart');
    }
}
