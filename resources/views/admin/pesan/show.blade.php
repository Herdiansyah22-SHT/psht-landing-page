@extends('layouts.admin')
@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Pesan
    </a>
</div>

<div class="row g-4" style="max-width:800px;">
    <div class="col-12">
        <div class="table-card p-4">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h5 class="fw-700 mb-1">{{ $pesan->subjek }}</h5>
                    <span class="badge bg-success" style="font-size:0.7rem;"><i class="bi bi-check-circle me-1"></i>Sudah Dibaca</span>
                </div>
                <form action="{{ route('admin.pesan.destroy', $pesan->id) }}" method="POST"
                      onsubmit="return confirm('Hapus pesan ini secara permanen?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger rounded-pill">
                        <i class="bi bi-trash me-1"></i>Hapus Pesan
                    </button>
                </form>
            </div>

            {{-- Info Pengirim --}}
            <div style="background:#f8f9fa;border-radius:12px;padding:1.2rem;margin-bottom:1.5rem;">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div style="font-size:0.75rem;color:#888;text-transform:uppercase;letter-spacing:0.5px;">Nama</div>
                        <div style="font-weight:700;font-size:0.95rem;">{{ $pesan->nama }}</div>
                    </div>
                    <div class="col-md-4">
                        <div style="font-size:0.75rem;color:#888;text-transform:uppercase;letter-spacing:0.5px;">Email</div>
                        <div style="font-weight:600;font-size:0.9rem;">
                            <a href="mailto:{{ $pesan->email }}" style="color:var(--admin-primary);">{{ $pesan->email }}</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="font-size:0.75rem;color:#888;text-transform:uppercase;letter-spacing:0.5px;">Telepon</div>
                        <div style="font-weight:600;font-size:0.9rem;">{{ $pesan->telepon ?? '-' }}</div>
                    </div>
                    <div class="col-12">
                        <div style="font-size:0.75rem;color:#888;text-transform:uppercase;letter-spacing:0.5px;">Diterima</div>
                        <div style="font-size:0.88rem;">{{ $pesan->created_at->format('d F Y, H:i') }} WIB</div>
                    </div>
                </div>
            </div>

            {{-- Isi Pesan --}}
            <div>
                <div style="font-size:0.75rem;color:#888;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:0.5rem;">Isi Pesan</div>
                <div style="background:#fff;border:1px solid #e9ecef;border-radius:12px;padding:1.5rem;font-size:0.95rem;line-height:1.8;color:#3a3a3a;">
                    {!! nl2br(e($pesan->pesan)) !!}
                </div>
            </div>

            {{-- Balas via Email --}}
            <div class="mt-4">
                <a href="mailto:{{ $pesan->email }}?subject=Re: {{ $pesan->subjek }}"
                   class="btn btn-danger rounded-pill px-4">
                    <i class="bi bi-reply me-2"></i>Balas via Email
                </a>
                @if($pesan->telepon)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pesan->telepon) }}" target="_blank"
                   class="btn btn-success rounded-pill px-4 ms-2">
                    <i class="bi bi-whatsapp me-2"></i>Balas via WhatsApp
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
