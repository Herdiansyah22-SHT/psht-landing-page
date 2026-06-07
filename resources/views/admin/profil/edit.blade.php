@extends('layouts.admin')
@section('title', 'Edit Profil')
@section('page-title', 'Edit Profil: ' . ucfirst($profil->key))

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.profil.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="table-card p-4" style="max-width:800px;">
    <h6 class="fw-700 mb-4">Edit: <span style="color:var(--admin-primary);">{{ ucfirst($profil->key) }}</span></h6>

    <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-600" style="font-size:0.88rem;">Judul / Nama</label>
            <input type="text" name="judul" class="form-control"
                   value="{{ old('judul', $profil->judul) }}" placeholder="e.g. Ketua Rayon PSHT Banjarkemantren">
        </div>

        <div class="mb-3">
            <label class="form-label fw-600" style="font-size:0.88rem;">Konten <span class="text-danger">*</span></label>
            <textarea name="konten" rows="12"
                      class="form-control @error('konten') is-invalid @enderror"
                      placeholder="Tulis konten di sini...">{{ old('konten', $profil->konten) }}</textarea>
            @error('konten')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <small class="text-muted">Gunakan Enter untuk baris baru.</small>
        </div>

        @if(in_array($profil->key, ['sejarah', 'struktur', 'sambutan']))
        <div class="mb-4">
            <label class="form-label fw-600" style="font-size:0.88rem;">Gambar Pendukung</label>
            @if($profil->gambar)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $profil->gambar) }}" alt="" class="img-thumbnail" style="max-height:150px;">
                <small class="d-block text-muted mt-1">Gambar saat ini. Upload baru untuk mengganti.</small>
            </div>
            @endif
            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        @endif

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger px-4 fw-600">
                <i class="bi bi-save me-2"></i>Simpan Perubahan
            </button>
            <a href="{{ route('admin.profil.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
