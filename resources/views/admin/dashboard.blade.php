@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- STAT CARDS --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100" style="background:linear-gradient(135deg,#c0392b,#a93226);">
            <div class="card-body text-white d-flex justify-content-between align-items-center p-4">
                <div>
                    <div style="font-size:0.78rem;opacity:0.8;text-transform:uppercase;letter-spacing:1px;">Total Berita</div>
                    <div style="font-size:2.5rem;font-weight:800;line-height:1.1;">{{ $totalBerita }}</div>
                </div>
                <i class="bi bi-newspaper stat-icon" style="font-size:3rem;opacity:0.2;"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100" style="background:linear-gradient(135deg,#1a1a2e,#16213e);">
            <div class="card-body text-white d-flex justify-content-between align-items-center p-4">
                <div>
                    <div style="font-size:0.78rem;opacity:0.8;text-transform:uppercase;letter-spacing:1px;">Total Galeri</div>
                    <div style="font-size:2.5rem;font-weight:800;line-height:1.1;">{{ $totalGaleri }}</div>
                </div>
                <i class="bi bi-images stat-icon" style="font-size:3rem;opacity:0.2;"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100" style="background:linear-gradient(135deg,#f0a500,#d4890a);">
            <div class="card-body d-flex justify-content-between align-items-center p-4">
                <div>
                    <div style="font-size:0.78rem;opacity:0.7;text-transform:uppercase;letter-spacing:1px;color:#1a1a2e;">Total Pesan</div>
                    <div style="font-size:2.5rem;font-weight:800;line-height:1.1;color:#1a1a2e;">{{ $totalPesan }}</div>
                </div>
                <i class="bi bi-envelope stat-icon" style="font-size:3rem;opacity:0.2;color:#1a1a2e;"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100" style="background:linear-gradient(135deg,#27ae60,#1e8449);">
            <div class="card-body text-white d-flex justify-content-between align-items-center p-4">
                <div>
                    <div style="font-size:0.78rem;opacity:0.8;text-transform:uppercase;letter-spacing:1px;">Belum Dibaca</div>
                    <div style="font-size:2.5rem;font-weight:800;line-height:1.1;">{{ $pesanBelumDibaca }}</div>
                </div>
                <i class="bi bi-envelope-open stat-icon" style="font-size:3rem;opacity:0.2;"></i>
            </div>
        </div>
    </div>
</div>

{{-- QUICK ACTIONS --}}
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="table-card p-3 d-flex gap-2 flex-wrap align-items-center">
            <span style="font-size:0.82rem;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:1px;margin-right:0.5rem;">Aksi Cepat:</span>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-sm btn-danger rounded-pill"><i class="bi bi-plus me-1"></i>Tambah Berita</a>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-sm btn-dark rounded-pill"><i class="bi bi-image me-1"></i>Upload Foto</a>
            <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-warning rounded-pill" style="color:#1a1a2e;"><i class="bi bi-envelope me-1"></i>Lihat Pesan</a>
            <a href="{{ route('beranda') }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill"><i class="bi bi-eye me-1"></i>Lihat Website</a>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- BERITA TERBARU --}}
    <div class="col-lg-7">
        <div class="table-card">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-700">Berita Terbaru</h6>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-danger rounded-pill" style="font-size:0.78rem;">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr>
                        <th>Judul</th><th>Kategori</th><th>Status</th><th>Tanggal</th>
                    </tr></thead>
                    <tbody>
                        @forelse($beritaTerbaru as $b)
                        <tr>
                            <td style="font-size:0.88rem;max-width:200px;" class="text-truncate">{{ $b->judul }}</td>
                            <td><span class="badge bg-secondary" style="font-size:0.7rem;">{{ $b->kategori }}</span></td>
                            <td>
                                @if($b->is_published)
                                    <span class="badge bg-success" style="font-size:0.7rem;">Published</span>
                                @else
                                    <span class="badge bg-warning text-dark" style="font-size:0.7rem;">Draft</span>
                                @endif
                            </td>
                            <td style="font-size:0.8rem;color:#888;white-space:nowrap;">{{ $b->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada berita</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- PESAN TERBARU --}}
    <div class="col-lg-5">
        <div class="table-card h-100">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-700">Pesan Terbaru</h6>
                <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-outline-danger rounded-pill" style="font-size:0.78rem;">Lihat Semua</a>
            </div>
            <div class="p-3">
                @forelse($pesanTerbaru as $p)
                <a href="{{ route('admin.pesan.show', $p->id) }}" class="text-decoration-none">
                    <div class="d-flex gap-3 p-2 rounded mb-1 {{ !$p->is_read ? 'bg-danger bg-opacity-10' : '' }}" style="transition:background 0.2s;">
                        <div style="width:38px;height:38px;border-radius:50%;background:{{ !$p->is_read ? '#c0392b' : '#6c757d' }};color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;font-size:0.9rem;">
                            {{ strtoupper(substr($p->nama, 0, 1)) }}
                        </div>
                        <div style="overflow:hidden;">
                            <div class="d-flex align-items-center gap-2">
                                <span style="font-size:0.88rem;font-weight:{{ !$p->is_read ? '700' : '500' }};color:#2d2d2d;">{{ $p->nama }}</span>
                                @if(!$p->is_read)<span class="badge bg-danger" style="font-size:0.6rem;">Baru</span>@endif
                            </div>
                            <div class="text-truncate" style="font-size:0.78rem;color:#888;">{{ $p->subjek }}</div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="text-center text-muted py-4">
                    <i class="bi bi-inbox fs-3"></i>
                    <p class="mt-2 mb-0" style="font-size:0.88rem;">Tidak ada pesan</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
