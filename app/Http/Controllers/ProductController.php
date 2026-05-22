<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:products,kode_barang',
            'nama_barang' => 'required',
            'satuan'      => 'required',
            'harga'       => 'required|numeric',
        ]);

        Product::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
}