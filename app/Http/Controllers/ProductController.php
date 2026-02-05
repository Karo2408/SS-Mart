<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'images'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'category_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::transaction(function () use ($request) {

            $product = Product::create([
                'nama_produk' => $request->nama_produk,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $image->store('products', 'public'),
                        'is_primary' => $index === 0
                    ]);
                }
            }
        });

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('images');

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required',
            'category_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::transaction(function () use ($request, $product) {

            $product->update([
                'nama_produk' => $request->nama_produk,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $image->store('products', 'public'),
                    ]);
                }
            }
        });

        return redirect('/products')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        $product->delete(); // image auto kehapus (cascade)
        return redirect('/products')->with('success', 'Produk berhasil dihapus');
    }
}
