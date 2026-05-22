@extends('components.appadmin-layout')

@section('content')
<div class="card shadow-sm mt-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary">Daftar Produk Admin</h5>
        <button class="btn btn-primary btn-sm">+ Tambah Produk</button>
    </div>
    <div class="card-body">
        <p class="text-muted">Berikut adalah daftar produk yang tersedia di sistem POLGAN.</p>
        
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Laptop Asus ROG</td>
                    <td>Elektronik</td>
                    <td>Rp 15.000.000</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection