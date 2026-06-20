<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $kode = 'KAT-' . str_pad(Category::count() + 1, 3, '0', STR_PAD_LEFT);
        return view('admin.categories.create', compact('kode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:categories,kode_kategori',
            'nama'          => 'required|string|max:255', // ✅ ganti nama_kategori → nama
            'deskripsi'     => 'nullable|string',
        ]);

        Category::create([
            'kode_kategori' => $request->kode_kategori,
            'nama'          => $request->nama,           // ✅ ganti nama_kategori → nama
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil disimpan!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:categories,kode_kategori,' . $id,
            'nama'          => 'required|string|max:255', // ✅ ganti nama_kategori → nama
            'deskripsi'     => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'kode_kategori' => $request->kode_kategori,
            'nama'          => $request->nama,           // ✅ ganti nama_kategori → nama
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }
}