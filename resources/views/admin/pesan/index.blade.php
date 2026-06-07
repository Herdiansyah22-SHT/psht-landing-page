@extends('layouts.admin')
@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1 fw-700">Daftar Pesan Kontak</h5>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Total: {{ $pesans->total() }} pesan</p>
    </div>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pengirim</th>
                    <th>Subjek</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesans as $i => $p)
                <tr class="{{ !$p->is_read ? 'table-light fw-bold' : '' }}">
                    <td class="text-muted" style="font-size:0.85rem;">{{ $pesans->firstItem() + $i }}</td>
                    <td>
                        <div style="font-size:0.9rem;">{{ $p->nama }}</div>
                        <small class="text-muted">{{ $p->email }}</small>
                    </td>
                    <td style="font-size:0.88rem;">{{ Str::limit($p->subjek, 50) }}</td>
                    <td>
                        @if(!$p->is_read)
                            <span class="badge bg-danger" style="font-size:0.7rem;"><i class="bi bi-circle-fill me-1"></i>Belum Dibaca</span>
                        @else
                            <span class="badge bg-secondary" style="font-size:0.7rem;">Sudah Dibaca</span>
                        @endif
                    </td>
                    <td style="font-size:0.8rem;color:#888;white-space:nowrap;">{{ $p->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.pesan.show', $p->id) }}"
                               class="btn btn-sm btn-outline-primary" title="Baca"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.pesan.destroy', $p->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>Tidak ada pesan masuk
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($pesans->hasPages())
    <div class="p-3 border-top d-flex justify-content-end">{{ $pesans->links() }}</div>
    @endif
</div>
@endsection
