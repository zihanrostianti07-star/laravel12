@extends('layout.admin')
 
@section('title', 'Ubah Kategori')
@section('subtitle', 'Perbarui nama kategori yang dipilih')
 
@section('content')
  <div class="text-start">
    <form action="{{ route('admin.kategori.update', $kategori) }}" method="POST">
      @csrf
      @method('PUT')
 
      @include('admin.kategori._form')
 
      <div class="d-flex gap-2">
        <button type="submit" class="btn-custom btn-custom-primary">
          <i class="bi bi-check-lg"></i> Simpan Perubahan
        </button>
        <a href="{{ route('admin.kategori.index') }}" class="btn-custom btn-custom-secondary">Batal</a>
      </div>
    </form>
  </div>
@endsection
