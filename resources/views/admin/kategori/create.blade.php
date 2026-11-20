@extends('layout.admin')

@section('title', 'Tambah Kategori')
@section('subtitle', 'Tambahkan kategori buku baru')

@section('content')
  @include('admin._alert')

  <div class="text-start">
    <form action="{{ route('admin.kategori.store') }}" method="POST">
      @csrf

      @include('admin.kategori._form')

      <div class="d-flex gap-2">
        <button type="submit" class="btn-custom btn-custom-primary">
          <i class="bi bi-check-lg"></i> Simpan Kategori
        </button>
        <a href="{{ route('admin.kategori.index') }}" class="btn-custom btn-custom-secondary">Batal</a>
      </div>
    </form>
  </div>
@endsection
