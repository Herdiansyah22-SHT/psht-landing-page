@extends('layouts.admin')
@section('title', 'Kelola Galeri')
@section('page-title', 'Galeri Foto')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1 fw-700">Daftar Galeri</h5>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Total: {{ $galeris->total() }} foto</p>
    </div>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-danger rounded-pill px-4">
        <i class="bi bi-cloud-upload me-1"></i>Upload Foto
    </a>
</div>

<div class="row g-3">
    @forelse($galeris as $g)
    <div class="col-6 col-md-4 col-xl-3">
        <div class="table-card h-100" style="overflow:hidden;">
            <div style="position:relative;overflow:hidden;">
                <img src="{{ $g->gambar_url }}" alt="{{ $g->judul }}"
                     style="width:100%;height:180px;object-fit:cover;">
                <span class="badge bg-dark position-absolute"
                      style="bottom:8px;left:8px;font-size:0.68rem;">{{ $g->kategori }}</span>
            </div>
            <div class="p-3">
                <p class="fw-600 mb-1" style="font-size:0.88rem;line-height:1.3;">{{ $g->judul }}</p>
                @if($g->deskripsi)
                <p class="text-muted mb-2" style="font-size:0.78rem;">{{ Str::limit($g->deskripsi, 60) }}</p>
                @endif
                <div class="d-flex gap-1 mt-2">
                    <a href="{{ route('admin.galeri.edit', $g->id) }}"
                       class="btn btn-sm btn-outline-primary flex-fill" style="font-size:0.78rem;">
                       <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST"
                          onsubmit="return confirm('Hapus foto ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" style="font-size:0.78rem;" title="Hapus">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <i class="bi bi-images fs-1 text-muted"></i>
        <p class="text-muted mt-2">Belum ada foto. <a href="{{ route('admin.galeri.create') }}">Upload sekarang</a></p>
    </div>
    @endforelse
</div>

@if($galeris->hasPages())
<div class="mt-4 d-flex justify-content-center">{{ $galeris->links() }}</div>
@endif
@endsection
