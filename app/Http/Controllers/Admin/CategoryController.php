<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // LIST KATEGORI
    public function index()
    {
        $categories = Category::orderBy('nama_kategori')->get();
        return view('admin.categories.index', compact('categories'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.categories.create');
    }

    // SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()
            ->back()
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // UPDATE
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    // HAPUS
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
