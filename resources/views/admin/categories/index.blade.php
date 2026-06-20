<x-appadmin-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manajemen Kategori</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="color: #e91e8c; font-family: monospace;">
                            {{ $category->kode_kategori }}
                        </td>
                        {{-- ✅ Diperbaiki: name → nama_kategori --}}
                        <td>{{ $category->nama }}</td>
                        <td>{{ $category->deskripsi ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" 
                               class="btn btn-sm btn-warning">✏️ Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                                  method="POST" style="display:inline" 
                                  onsubmit="return confirm('Yakin hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            Belum ada kategori
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-appadmin-layout>