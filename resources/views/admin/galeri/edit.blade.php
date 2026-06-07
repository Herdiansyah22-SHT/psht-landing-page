@extends('layouts.admin')
@section('title', 'Edit Galeri')
@section('page-title', 'Edit Foto Galeri')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="table-card p-4" style="max-width:700px;">
    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Judul Foto <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul', $galeri->judul) }}" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select" required>
                    <option value="latihan" {{ old('kategori', $galeri->kategori) === 'latihan' ? 'selected' : '' }}>Latihan</option>
                    <option value="kegiatan" {{ old('kategori', $galeri->kategori) === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="event" {{ old('kategori', $galeri->kategori) === 'event' ? 'selected' : '' }}>Event</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Ganti Foto</label>
                <div class="mb-2">
                    <img src="{{ $galeri->gambar_url }}" class="img-thumbnail" style="max-height:160px;" alt="Foto saat ini">
                    <small class="d-block text-muted mt-1">Foto saat ini. Upload baru untuk mengganti.</small>
                </div>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/*" onchange="previewFoto(this)">
                <div id="previewContainer" class="mt-2 d-none">
                    <img id="previewImg" src="" class="img-thumbnail" style="max-height:160px;">
                </div>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-danger px-4 fw-600"><i class="bi bi-save me-2"></i>Simpan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('previewContainer').classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
