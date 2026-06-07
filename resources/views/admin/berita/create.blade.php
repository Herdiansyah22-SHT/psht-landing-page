@extends('layouts.admin')
@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="table-card p-4" style="max-width:900px;">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Judul Berita <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}" placeholder="Masukkan judul berita..." required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-600" style="font-size:0.88rem;">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="berita" {{ old('kategori') === 'berita' ? 'selected' : '' }}>Berita</option>
                    <option value="kegiatan" {{ old('kategori') === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                </select>
                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-600" style="font-size:0.88rem;">Tanggal Publikasi</label>
                <input type="date" name="tanggal_publikasi" class="form-control"
                       value="{{ old('tanggal_publikasi', date('Y-m-d')) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Isi Berita <span class="text-danger">*</span></label>
                <textarea name="isi" rows="14" class="form-control @error('isi') is-invalid @enderror"
                          placeholder="Tulis isi berita di sini...">{{ old('isi') }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Gambar Cover</label>
                <input type="file" name="gambar" id="gambarInput"
                       class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/*" onchange="previewGambar(this)">
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div id="previewContainer" class="mt-2 d-none">
                    <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-height:200px;">
                </div>
                <small class="text-muted">Maks 2MB. Format: JPG, PNG, WEBP.</small>
            </div>

            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                           value="1" {{ old('is_published', '1') ? 'checked' : '' }}>
                    <label class="form-check-label fw-600" for="is_published" style="font-size:0.88rem;">
                        Publikasikan langsung
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-danger px-4 fw-600">
                    <i class="bi bi-save me-2"></i>Simpan Berita
                </button>
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
