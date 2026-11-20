<div class="mb-3">
  <label for="nama_kategori" class="form-label">Nama Kategori</label>
  <input
    type="text"
    id="nama_kategori"
    name="nama_kategori"
    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
    class="form-control @error('nama_kategori') is-invalid @enderror"
    maxlength="100"
    required
  >
  @error('nama_kategori')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
