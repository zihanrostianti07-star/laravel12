@extends('layout.admin')
 
@section('title', 'Data Kategori')
@section('subtitle', 'Kategori yang mengelompokkan buku perpustakaan')
 
@section('content')
  @include('admin._alert')
 
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.kategori.create') }}" class="btn-custom btn-custom-primary">
      <i class="bi bi-plus-lg"></i> Tambah Kategori
    </a>
  </div>
 
  <div class="table-card-custom">
    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Jumlah Buku</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($kategori as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="table-product-name">{{ $item->nama_kategori }}</td>
              <td>{{ $item->buku_count }}</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <a href="{{ route('admin.kategori.edit', $item) }}"
                     class="btn-custom btn-custom-warning btn-custom-sm">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <form action="{{ route('admin.kategori.destroy', $item) }}" method="POST"
                        onsubmit="return confirm('Kategori ini punya {{ $item->buku_count }} buku. Semua bukunya ikut terhapus. Lanjutkan?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-custom btn-custom-danger btn-custom-sm">
                      <i class="bi bi-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center">Belum ada kategori.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
