<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Kategori</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Kode Kategori</label>
                <input type="text" name="kode_kategori" class="form-control"
                       value="{{ old('kode_kategori', $category->kode_kategori) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control"
                       value="{{ old('nama_kategori', $category->nama_kategori) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $category->deskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4">Batal</a>
        </form>
    </div>

</div>
</body>
</html>