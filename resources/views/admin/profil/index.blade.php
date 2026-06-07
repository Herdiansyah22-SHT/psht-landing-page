@extends('layouts.admin')
@section('title', 'Kelola Profil')
@section('page-title', 'Kelola Profil')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1 fw-700">Konten Profil</h5>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Kelola sejarah, visi, misi, dan struktur organisasi</p>
    </div>
    <a href="{{ route('admin.profil.create') }}" class="btn btn-danger rounded-pill shadow-sm px-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah Profil
    </a>
</div>

<div class="row g-3">
    @foreach($profils as $p)
    <div class="col-md-6">
        <div class="table-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="badge bg-danger mb-2" style="font-size:0.7rem;text-transform:uppercase;">{{ $p->key }}</span>
                    <h6 class="mb-0 fw-700">{{ $p->judul ?? ucfirst($p->key) }}</h6>
                </div>
                <a href="{{ route('admin.profil.edit', $p->id) }}" class="btn btn-sm btn-outline-danger rounded-pill">
                    <i class="bi bi-pencil me-1"></i>Edit
                </a>
            </div>
            <p class="text-muted mb-0" style="font-size:0.85rem;line-height:1.6;">
                {{ Str::limit(strip_tags($p->konten), 120) }}
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection
