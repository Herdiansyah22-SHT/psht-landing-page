@extends('layouts.admin')
@section('title', 'Upload Foto Galeri')
@section('page-title', 'Upload Foto Galeri')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="table-card p-4" style="max-width:700px;">
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Judul Foto <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}" placeholder="e.g. Latihan Rutin Malam Jumat" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="latihan" {{ old('kategori') === 'latihan' ? 'selected' : '' }}>Latihan</option>
                    <option value="kegiatan" {{ old('kategori') === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="event" {{ old('kategori') === 'event' ? 'selected' : '' }}>Event</option>
                </select>
                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-control"
                          placeholder="Deskripsi singkat foto (opsional)...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-600" style="font-size:0.88rem;">Foto <span class="text-danger">*</span></label>
                <div id="dropZone" onclick="document.getElementById('gambarInput').click()"
                     style="border:2px dashed #dee2e6;border-radius:12px;padding:2.5rem;text-align:center;cursor:pointer;transition:all 0.3s;background:#f8f9fa;">
                    <i class="bi bi-cloud-upload fs-2 text-muted"></i>
                    <p class="text-muted mb-0 mt-2" style="font-size:0.88rem;">Klik atau drag & drop foto di sini</p>
                    <small class="text-muted">Maks 3MB · JPG, PNG, WEBP</small>
                </div>
                <input type="file" name="gambar" id="gambarInput"
                       class="d-none @error('gambar') is-invalid @enderror"
                       accept="image/*" required onchange="previewFoto(this)">
                @error('gambar')<div class="text-danger mt-1" style="font-size:0.85rem;">{{ $message }}</div>@enderror
                <div id="previewContainer" class="mt-3 d-none text-center">
                    <img id="previewImg" src="" class="img-fluid rounded shadow" style="max-height:280px;">
                    <p id="previewName" class="text-muted mt-2 mb-0" style="font-size:0.82rem;"></p>
                </div>
            </div>

            <div class="col-12 d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-danger px-4 fw-600">
                    <i class="bi bi-cloud-upload me-2"></i>Upload Foto
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewFoto(input) {
    const container = document.getElementById('previewContainer');
    const img = document.getElementById('previewImg');
    const name = document.getElementById('previewName');
    const zone = document.getElementById('dropZone');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            img.src = e.target.result;
            name.textContent = input.files[0].name;
            container.classList.remove('d-none');
            zone.style.borderColor = '#c0392b';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// Drag & drop
const zone = document.getElementById('dropZone');
zone.addEventListener('dragover', e => { e.preventDefault(); zone.style.borderColor='#c0392b'; zone.style.background='#fff5f5'; });
zone.addEventListener('dragleave', () => { zone.style.borderColor='#dee2e6'; zone.style.background='#f8f9fa'; });
zone.addEventListener('drop', e => {
    e.preventDefault();
    const inp = document.getElementById('gambarInput');
    inp.files = e.dataTransfer.files;
    previewFoto(inp);
});
</script>
@endpush
@endsection
