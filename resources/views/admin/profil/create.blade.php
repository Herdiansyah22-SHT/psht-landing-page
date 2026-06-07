@extends('layouts.admin')
@section('title', 'Tambah Profil Baru')
@section('page-title', 'Tambah Profil')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1 fw-700">Tambah Konten Profil</h5>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Tambahkan data seperti sejarah, visi, misi, atau struktur</p>
    </div>
    <a href="{{ route('admin.profil.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="table-card p-4 bg-white rounded shadow-sm border-0">
    <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="key" class="form-label fw-bold">Kategori Profil (Key) <span class="text-danger">*</span></label>
                <select class="form-select @error('key') is-invalid @enderror" id="key" name="key" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="sejarah" {{ old('key') == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                    <option value="visi" {{ old('key') == 'visi' ? 'selected' : '' }}>Visi</option>
                    <option value="misi" {{ old('key') == 'misi' ? 'selected' : '' }}>Misi</option>
                    <option value="struktur" {{ old('key') == 'struktur' ? 'selected' : '' }}>Struktur Organisasi</option>
                </select>
                @error('key')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text" style="font-size:0.8rem;">Pilih kategori konten yang ingin Anda tambahkan.</div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label fw-bold">Judul Ditampilkan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Visi Rayon Banjarkemantren" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-bold">Gambar/Foto (Opsional)</label>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="konten" class="form-label fw-bold">Isi Konten <span class="text-danger">*</span></label>
            <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="8" placeholder="Tuliskan isi sejarah, visi, atau misi secara lengkap di sini..." required>{{ old('konten') }}</textarea>
            @error('konten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-light rounded-pill px-4">Reset</button>
            <button type="submit" class="btn btn-danger rounded-pill px-4">
                <i class="bi bi-save me-1"></i> Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection
