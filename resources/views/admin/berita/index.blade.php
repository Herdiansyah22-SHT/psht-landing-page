@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('page-title', 'Berita & Kegiatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1 fw-700">Daftar Berita</h5>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Total: {{ $beritas->total() }} artikel</p>
    </div>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-danger rounded-pill px-4">
        <i class="bi bi-plus-circle me-1"></i>Tambah Berita
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th width="40">#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $i => $b)
                <tr>
                    <td class="text-muted" style="font-size:0.85rem;">{{ $beritas->firstItem() + $i }}</td>
                    <td>
                        <div style="font-weight:600;font-size:0.9rem;">{{ Str::limit($b->judul, 60) }}</div>
                        @if($b->gambar)
                        <small class="text-muted"><i class="bi bi-image me-1"></i>Ada gambar</small>
                        @endif
                    </td>
                    <td><span class="badge bg-secondary" style="font-size:0.72rem;">{{ ucfirst($b->kategori) }}</span></td>
                    <td>
                        @if($b->is_published)
                            <span class="badge bg-success" style="font-size:0.72rem;"><i class="bi bi-check-circle me-1"></i>Published</span>
                        @else
                            <span class="badge bg-warning text-dark" style="font-size:0.72rem;"><i class="bi bi-clock me-1"></i>Draft</span>
                        @endif
                    </td>
                    <td style="font-size:0.82rem;color:#888;white-space:nowrap;">{{ $b->tanggal_publikasi?->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.berita.edit', $b->id) }}"
                               class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-newspaper fs-2 d-block mb-2"></i>Belum ada berita
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($beritas->hasPages())
    <div class="p-3 border-top d-flex justify-content-end">
        {{ $beritas->links() }}
    </div>
    @endif
</div>
@endsection
