@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="table-card p-4" style="max-width:900px;">
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul', $berita->judul) }}" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-600" style="font-size:0.88rem;">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select" required>
                    <option value="berita" {{ old('kategori', $berita->kategori) === 'berita' ? 'selected' : '' }}>Berita</option>
                    <option value="kegiatan" {{ old('kategori', $berita->kategori) === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-600" style="font-size:0.88rem;">Tanggal Publikasi</label>
                <input type="date" name="tanggal_publikasi" class="form-control"
                       value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi?->format('Y-m-d')) }}">
            </div>
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Isi Berita <span class="text-danger">*</span></label>
                <textarea name="isi" rows="14" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $berita->isi) }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Gambar Cover</label>
                @if($berita->gambar)
                <div class="mb-2">
                    <img src="{{ $berita->gambar_url }}" class="img-thumbnail" style="max-height:150px;" alt="Gambar saat ini">
                    <small class="d-block text-muted mt-1">Gambar saat ini. Upload baru untuk mengganti.</small>
                </div>
                @endif
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/*" onchange="previewGambar(this)">
                <div id="previewContainer" class="mt-2 d-none">
                    <img id="previewImg" src="" class="img-thumbnail" style="max-height:150px;">
                </div>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                           value="1" {{ old('is_published', $berita->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label fw-600" for="is_published" style="font-size:0.88rem;">Publikasikan</label>
                </div>
            </div>
            <div class="col-12 d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-danger px-4 fw-600"><i class="bi bi-save me-2"></i>Simpan Perubahan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>
function previewGambar(input) {
    const container = document.getElementById('previewContainer');
    const img = document.getElementById('previewImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; container.classList.remove('d-none'); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
