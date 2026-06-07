@extends('layouts.public')
@section('title', 'Galeri')

@push('styles')
<style>
    /* =========================================
       GALLERY PAGE - MODERN / CLEAN / ELEGANT
    ========================================= */

    .gallery-hero {
        position: relative;
        padding: 92px 0 72px;
        overflow: hidden;
        background:
            radial-gradient(circle at top right, rgba(212, 175, 55, 0.10), transparent 18%),
            radial-gradient(circle at bottom left, rgba(185, 28, 28, 0.10), transparent 18%),
            linear-gradient(135deg, var(--psht-dark) 0%, #172033 55%, #1e293b 100%);
    }

    .gallery-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), transparent 40%);
        pointer-events: none;
    }

    .gallery-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        min-height: 44px;
        padding: 0.72rem 1rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.10);
        color: var(--psht-gold);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1rem;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .gallery-hero h1 {
        color: #fff;
        font-size: clamp(2.2rem, 5vw, 4rem);
        margin-bottom: 0.85rem;
    }

    .gallery-hero p {
        color: rgba(255,255,255,0.75);
        font-size: 1.02rem;
        line-height: 1.85;
        max-width: 720px;
        margin: 0 auto;
    }

    .gallery-section {
        position: relative;
        padding: 78px 0 88px;
    }

    .gallery-shell {
        background: linear-gradient(180deg, rgba(255,255,255,0.80), rgba(255,255,255,0.94));
        border: 1px solid rgba(15, 23, 42, 0.06);
        border-radius: 30px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.04),
            0 18px 50px rgba(15, 23, 42, 0.08);
        padding: 1.2rem;
    }

    /* DIUBAH: dibuat vertikal agar filter tetap di kiri */
    .gallery-head {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 1.25rem;
        margin-bottom: 1.8rem;
    }

    .gallery-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--psht-red);
        text-transform: uppercase;
        letter-spacing: 0.12em;
        font-size: 0.78rem;
        font-weight: 800;
        margin-bottom: 0.85rem;
    }

    .gallery-kicker::before {
        content: '';
        width: 34px;
        height: 1px;
        background: linear-gradient(90deg, var(--psht-gold), transparent);
    }

    .gallery-title {
        font-family: 'Merriweather', serif;
        font-size: clamp(1.75rem, 3vw, 2.35rem);
        color: var(--psht-dark);
        margin-bottom: 0.6rem;
    }

    .gallery-subtitle {
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 0;
        max-width: 62ch;
    }

    /* DIUBAH: paksa tombol filter tetap rata kiri */
    .gallery-filter {
        display: flex;
        gap: 0.65rem;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
    }

    .gallery-filter .filter-btn {
        min-height: 42px;
        border-radius: 999px;
        padding: 0.7rem 1rem;
        font-size: 0.88rem;
        font-weight: 700;
        border: 1px solid rgba(15, 23, 42, 0.08);
        background: #fff;
        color: var(--text-muted);
        transition: var(--transition);
        box-shadow: none;
    }

    .gallery-filter .filter-btn:hover {
        color: var(--psht-dark);
        border-color: rgba(15, 23, 42, 0.12);
        background: rgba(15, 23, 42, 0.04);
    }

    .gallery-filter .filter-btn.active {
        background: var(--psht-red);
        color: #fff;
        border-color: var(--psht-red);
        box-shadow: 0 10px 24px rgba(185, 28, 28, 0.20);
    }

    .gallery-grid {
        margin-top: 0.5rem;
    }

    .gallery-item {
        position: relative;
        height: 100%;
    }

    .gallery-card {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        background: #fff;
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.04),
            0 12px 28px rgba(15, 23, 42, 0.06);
        transition: var(--transition);
        cursor: pointer;
        height: 100%;
    }

    .gallery-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.05),
            0 20px 36px rgba(15, 23, 42, 0.10);
    }

    .gallery-image-wrap {
        position: relative;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        background: #e2e8f0;
    }

    .gallery-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.45s ease;
    }

    .gallery-card:hover .gallery-image-wrap img {
        transform: scale(1.07);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: flex-end;
        padding: 1rem;
        background: linear-gradient(180deg, rgba(15,23,42,0.02), rgba(15,23,42,0.72));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-overlay-content {
        width: 100%;
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 0.75rem;
    }

    .gallery-meta {
        min-width: 0;
    }

    .gallery-badge {
        display: inline-flex;
        align-items: center;
        min-height: 28px;
        padding: 0.25rem 0.65rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.14);
        border: 1px solid rgba(255,255,255,0.14);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        backdrop-filter: blur(10px);
    }

    .gallery-name {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-zoom {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.16);
        color: #fff;
        font-size: 1.1rem;
        flex-shrink: 0;
        backdrop-filter: blur(10px);
    }

    .gallery-card-footer {
        padding: 1rem 1rem 1.05rem;
        display: flex;
        align-items: start;
        justify-content: space-between;
        gap: 0.8rem;
    }

    .gallery-card-title {
        font-size: 0.96rem;
        font-weight: 700;
        color: var(--psht-dark);
        line-height: 1.55;
        margin-bottom: 0.35rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-card-desc {
        color: var(--text-muted);
        font-size: 0.84rem;
        line-height: 1.7;
        margin-bottom: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-card-icon {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(185, 28, 28, 0.06);
        color: var(--psht-red);
        flex-shrink: 0;
    }

    .gallery-empty {
        padding: 4rem 1rem;
        text-align: center;
        border-radius: 24px;
        background: #fff;
        border: 1px dashed rgba(15, 23, 42, 0.10);
    }

    .gallery-empty-icon {
        width: 74px;
        height: 74px;
        border-radius: 22px;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(185, 28, 28, 0.06);
        color: var(--psht-red);
        font-size: 1.8rem;
    }

    .gallery-empty h5 {
        font-family: 'Merriweather', serif;
        color: var(--psht-dark);
        margin-bottom: 0.55rem;
    }

    .gallery-empty p {
        color: var(--text-muted);
        margin-bottom: 0;
    }

    .gallery-pagination {
        margin-top: 2.5rem;
    }

    .gallery-pagination nav {
        display: flex;
        justify-content: center;
    }

    .gallery-pagination .pagination {
        gap: 0.45rem;
        flex-wrap: wrap;
    }

    .gallery-pagination .page-link {
        min-width: 42px;
        height: 42px;
        border-radius: 12px !important;
        border: 1px solid rgba(15, 23, 42, 0.08);
        color: var(--psht-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: none !important;
    }

    .gallery-pagination .page-item.active .page-link {
        background: var(--psht-red);
        border-color: var(--psht-red);
        color: #fff;
    }

    .gallery-modal .modal-content {
        background: #0f172a;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 24px 64px rgba(2, 6, 23, 0.35);
    }

    .gallery-modal .modal-header {
        padding: 1rem 1.2rem 0;
    }

    .gallery-modal .modal-title {
        font-weight: 700;
        color: #fff;
        line-height: 1.5;
    }

    .gallery-modal .modal-body {
        padding: 1rem 1.2rem 1.3rem;
    }

    .gallery-lightbox-img {
        width: 100%;
        max-height: 72vh;
        object-fit: contain;
        border-radius: 18px;
        background: rgba(255,255,255,0.04);
    }

    .gallery-lightbox-desc {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.68);
        line-height: 1.8;
        margin-top: 1rem;
        margin-bottom: 0;
    }

    @media (max-width: 991.98px) {
        .gallery-hero {
            padding: 80px 0 62px;
        }

        .gallery-section {
            padding: 64px 0 76px;
        }

        .gallery-shell {
            padding: 1rem;
        }
    }

    @media (max-width: 767.98px) {
        .gallery-hero p {
            font-size: 0.97rem;
        }

        .gallery-section {
            padding: 52px 0 68px;
        }

        .gallery-shell {
            border-radius: 22px;
            padding: 0.85rem;
        }

        .gallery-card,
        .gallery-empty,
        .gallery-modal .modal-content {
            border-radius: 18px;
        }

        .gallery-card-footer {
            padding: 0.9rem;
        }

        .gallery-overlay {
            opacity: 1;
            background: linear-gradient(180deg, rgba(15,23,42,0.06), rgba(15,23,42,0.62));
        }

        .gallery-zoom {
            width: 42px;
            height: 42px;
        }

        .gallery-filter {
            gap: 0.55rem;
        }

        .gallery-filter .filter-btn {
            padding: 0.65rem 0.95rem;
            font-size: 0.84rem;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="gallery-hero">
    <div class="container text-center text-white position-relative" style="z-index:2;">
        <div class="gallery-hero-badge">
            <i class="bi bi-images"></i>
            Dokumentasi Kegiatan
        </div>

        <h1>Galeri Foto</h1>

        <p>
            Momen-momen berharga kegiatan PSHT Banjarkemantren yang terdokumentasi
            sebagai bagian dari perjalanan, latihan, dan kebersamaan organisasi.
        </p>
    </div>
</section>

{{-- GALLERY --}}
<section class="gallery-section">
    <div class="container">
        <div class="gallery-shell">
            <div class="gallery-head">
                <div>
                    <div class="gallery-kicker">Arsip Visual</div>
                    <h2 class="gallery-title">Dokumentasi Kegiatan Rayon</h2>
                    <p class="gallery-subtitle">
                        Jelajahi foto-foto kegiatan latihan, agenda rayon, dan event yang menjadi bagian
                        dari perjalanan PSHT Banjarkemantren.
                    </p>
                </div>

                <div class="gallery-filter">
                    <a href="{{ route('galeri') }}"
                       class="filter-btn btn {{ !$kategori ? 'active' : '' }}">
                        Semua
                    </a>

                    <a href="{{ route('galeri', ['kategori' => 'latihan']) }}"
                       class="filter-btn btn {{ $kategori === 'latihan' ? 'active' : '' }}">
                        Latihan
                    </a>

                    <a href="{{ route('galeri', ['kategori' => 'kegiatan']) }}"
                       class="filter-btn btn {{ $kategori === 'kegiatan' ? 'active' : '' }}">
                        Kegiatan
                    </a>

                    <a href="{{ route('galeri', ['kategori' => 'event']) }}"
                       class="filter-btn btn {{ $kategori === 'event' ? 'active' : '' }}">
                        Event
                    </a>
                </div>
            </div>

            <div class="row g-4 gallery-grid">
                @forelse($galeris as $g)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-card"
                                 onclick="openLightbox(@js($g->gambar_url), @js($g->judul), @js($g->deskripsi), @js($g->kategori ?? 'Galeri'))"
                                 role="button"
                                 tabindex="0"
                                 onkeydown="handleGalleryKey(event, @js($g->gambar_url), @js($g->judul), @js($g->deskripsi), @js($g->kategori ?? 'Galeri'))">

                                <div class="gallery-image-wrap">
                                    <img
                                        src="{{ $g->gambar_url }}"
                                        alt="{{ $g->judul }}"
                                        loading="lazy">

                                    <div class="gallery-overlay">
                                        <div class="gallery-overlay-content">
                                            <div class="gallery-meta">
                                                <span class="gallery-badge">{{ ucfirst($g->kategori ?? 'Galeri') }}</span>
                                                <p class="gallery-name">{{ $g->judul }}</p>
                                            </div>
                                            <div class="gallery-zoom">
                                                <i class="bi bi-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gallery-card-footer">
                                    <div>
                                        <div class="gallery-card-title">{{ $g->judul }}</div>
                                        <p class="gallery-card-desc">
                                            {{ $g->deskripsi ?: 'Dokumentasi kegiatan PSHT Rayon Banjarkemantren.' }}
                                        </p>
                                    </div>
                                    <div class="gallery-card-icon">
                                        <i class="bi bi-image"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="gallery-empty">
                            <div class="gallery-empty-icon">
                                <i class="bi bi-images"></i>
                            </div>
                            <h5>Belum Ada Foto</h5>
                            <p>Dokumentasi galeri belum tersedia saat ini. Silakan cek kembali nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($galeris->hasPages())
                <div class="gallery-pagination d-flex justify-content-center">
                    {{ $galeris->links() }}
                </div>
            @endif
        </div>
    </div>
</section>

{{-- LIGHTBOX MODAL --}}
<div class="modal fade gallery-modal" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div>
                    <h5 class="modal-title" id="lightboxTitle"></h5>
                    <small class="text-white-50" id="lightboxCategory"></small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img id="lightboxImg" src="" alt="" class="gallery-lightbox-img img-fluid">
                <p id="lightboxDesc" class="gallery-lightbox-desc"></p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openLightbox(url, title, desc, kategori) {
        document.getElementById('lightboxImg').src = url;
        document.getElementById('lightboxImg').alt = title || 'Galeri Foto';
        document.getElementById('lightboxTitle').textContent = title || 'Galeri Foto';
        document.getElementById('lightboxDesc').textContent = desc || 'Dokumentasi kegiatan PSHT Rayon Banjarkemantren.';
        document.getElementById('lightboxCategory').textContent = kategori ? ('Kategori: ' + kategori) : '';

        new bootstrap.Modal(document.getElementById('lightboxModal')).show();
    }

    function handleGalleryKey(event, url, title, desc, kategori) {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            openLightbox(url, title, desc, kategori);
        }
    }
</script>
@endpush
@endsection
