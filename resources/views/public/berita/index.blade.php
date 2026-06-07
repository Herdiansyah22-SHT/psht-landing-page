@extends('layouts.public')
@section('title', 'Berita & Kegiatan')

@section('content')

{{-- HERO --}}
<section class="berita-hero position-relative overflow-hidden">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-white">
                <span class="hero-badge">
                    <i class="bi bi-newspaper"></i> Informasi Resmi Rayon
                </span>
                <h1 class="hero-title mt-4">Berita & Kegiatan</h1>
                <p class="hero-subtitle mt-3 mb-0">
                    Informasi terbaru seputar kegiatan, agenda, dan perkembangan PSHT Banjarkemantren
                    Ranting Buduran Cabang Sidoarjo.
                </p>
            </div>
        </div>
    </div>
    <div class="hero-blur hero-blur-1"></div>
    <div class="hero-blur hero-blur-2"></div>
</section>

{{-- CONTENT --}}
<section class="py-5 py-lg-6">
    <div class="container">

        {{-- FILTER --}}
        <div class="filter-wrap mb-4 mb-lg-5">
            <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start">
                <a href="{{ route('berita') }}"
                   class="filter-pill {{ !$kategori ? 'active' : '' }}">
                    Semua
                </a>

                <a href="{{ route('berita', ['kategori' => 'berita']) }}"
                   class="filter-pill {{ $kategori === 'berita' ? 'active' : '' }}">
                    Berita
                </a>

                <a href="{{ route('berita', ['kategori' => 'kegiatan']) }}"
                   class="filter-pill {{ $kategori === 'kegiatan' ? 'active' : '' }}">
                    Kegiatan
                </a>
            </div>
        </div>

        {{-- LIST BERITA --}}
        <div class="row g-4">
            @forelse($beritas as $b)
                <div class="col-md-6 col-xl-4">
                    <article class="card card-psht berita-card h-100 border-0">
                        <div class="berita-media position-relative overflow-hidden">
                            @if($b->gambar)
                                <img src="{{ $b->gambar_url }}"
                                     class="card-img-top berita-image"
                                     alt="{{ $b->judul }}">
                            @else
                                <div class="berita-placeholder">
                                    <div class="placeholder-icon">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                </div>
                            @endif

                            <span class="badge badge-kategori berita-badge">
                                {{ ucfirst($b->kategori) }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <div class="berita-meta mb-2">
                                <span>
                                    <i class="bi bi-calendar2-event me-1"></i>
                                    {{ $b->tanggal_publikasi->format('d M Y') }}
                                </span>
                            </div>

                            <h3 class="berita-title">
                                <a href="{{ route('berita.detail', $b->slug) }}" class="text-decoration-none">
                                    {{ $b->judul }}
                                </a>
                            </h3>

                            <p class="berita-excerpt flex-grow-1 mb-4">
                                {{ Str::limit(strip_tags($b->isi), 120) }}
                            </p>

                            <div class="d-flex align-items-center justify-content-between gap-3 mt-auto">
                                <div class="berita-read-label">
                                    Artikel PSHT
                                </div>

                                <a href="{{ route('berita.detail', $b->slug) }}" class="btn btn-psht-primary btn-sm px-3">
                                    Baca Detail <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-berita text-center">
                        <div class="empty-icon mb-3">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h4 class="mb-2">Belum ada berita dipublikasikan</h4>
                        <p class="mb-0 text-muted">
                            Konten berita dan kegiatan terbaru akan ditampilkan di halaman ini.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($beritas->hasPages())
            <div class="mt-5 pt-2">
                <div class="custom-pagination d-flex justify-content-center">
                    {{ $beritas->onEachSide(1)->links() }}
                </div>
            </div>
        @endif

    </div>
</section>

@endsection

@push('styles')
<style>
    .py-lg-6 {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    /* HERO */
    .berita-hero {
        padding: 110px 0 88px;
        background:
            linear-gradient(135deg, rgba(11, 18, 32, 0.96), rgba(17, 24, 39, 0.92)),
            radial-gradient(circle at top left, rgba(212, 175, 55, 0.10), transparent 30%);
        isolation: isolate;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 0.75rem 1rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.04em;
    }

    .hero-title {
        font-size: clamp(2.3rem, 4vw, 4.2rem);
        color: #fff !important;
        margin-bottom: 0;
    }

    .hero-subtitle {
        max-width: 720px;
        margin-left: auto;
        margin-right: auto;
        color: rgba(255,255,255,0.76) !important;
        font-size: 1rem;
        line-height: 1.85;
    }

    .hero-blur {
        position: absolute;
        border-radius: 50%;
        filter: blur(70px);
        z-index: -1;
        opacity: 0.55;
    }

    .hero-blur-1 {
        width: 220px;
        height: 220px;
        background: rgba(185, 28, 28, 0.22);
        top: 40px;
        left: -50px;
    }

    .hero-blur-2 {
        width: 260px;
        height: 260px;
        background: rgba(212, 175, 55, 0.15);
        right: -60px;
        bottom: -40px;
    }

    /* FILTER */
    .filter-wrap {
        padding: 1rem;
        border-radius: 24px;
        background: rgba(255,255,255,0.72);
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 14px 38px rgba(2, 6, 23, 0.05);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .filter-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 0.72rem 1.2rem;
        border-radius: 999px;
        border: 1px solid rgba(15, 23, 42, 0.08);
        background: rgba(255,255,255,0.9);
        color: #334155;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .filter-pill:hover {
        color: #991B1B;
        border-color: rgba(185, 28, 28, 0.18);
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(2, 6, 23, 0.06);
    }

    .filter-pill.active {
        background: linear-gradient(135deg, #B91C1C, #991B1B);
        color: #fff;
        border-color: transparent;
        box-shadow: 0 14px 30px rgba(185, 28, 28, 0.22);
    }

    /* CARD BERITA */
    .berita-card {
        border-radius: 24px;
        overflow: hidden;
    }

    .berita-media {
        height: 230px;
        background: linear-gradient(135deg, #1f2937, #0f172a);
    }

    .berita-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .berita-card:hover .berita-image {
        transform: scale(1.06);
    }

    .berita-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            linear-gradient(135deg, rgba(185,28,28,0.95), rgba(15,23,42,0.95));
    }

    .placeholder-icon {
        width: 88px;
        height: 88px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.12);
        color: #fff;
        font-size: 2rem;
        backdrop-filter: blur(10px);
    }

    .berita-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        z-index: 3;
    }

    .berita-meta {
        font-size: 0.82rem;
        color: #64748B;
        font-weight: 500;
    }

    .berita-title {
        font-size: 1.12rem;
        line-height: 1.45;
        margin-bottom: 0.9rem;
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
    }

    .berita-title a {
        color: #0F172A;
        transition: all 0.3s ease;
    }

    .berita-title a:hover {
        color: #991B1B;
    }

    .berita-excerpt {
        color: #64748B;
        font-size: 0.94rem;
        line-height: 1.8;
    }

    .berita-read-label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #94A3B8;
    }

    /* EMPTY STATE */
    .empty-berita {
        padding: 4rem 1.5rem;
        border-radius: 28px;
        background: rgba(255,255,255,0.74);
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 14px 40px rgba(2, 6, 23, 0.05);
    }

    .empty-icon {
        width: 82px;
        height: 82px;
        margin: 0 auto;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(185, 28, 28, 0.08);
        color: #991B1B;
        font-size: 2rem;
    }

    /* PAGINATION */
    .custom-pagination .pagination {
        gap: 0.45rem;
        flex-wrap: wrap;
    }

    .custom-pagination .page-item .page-link {
        min-width: 44px;
        height: 44px;
        padding: 0 0.95rem;
        border-radius: 14px !important;
        border: 1px solid rgba(15, 23, 42, 0.08);
        background: rgba(255,255,255,0.88);
        color: #334155;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .custom-pagination .page-item .page-link:hover {
        color: #991B1B;
        border-color: rgba(185, 28, 28, 0.18);
        background: #fff;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(2, 6, 23, 0.06);
    }

    .custom-pagination .page-item.active .page-link {
        color: #fff;
        border-color: transparent;
        background: linear-gradient(135deg, #B91C1C, #991B1B);
        box-shadow: 0 14px 28px rgba(185, 28, 28, 0.22);
    }

    .custom-pagination .page-item.disabled .page-link {
        opacity: 0.5;
        background: rgba(255,255,255,0.6);
    }

    @media (max-width: 991.98px) {
        .berita-hero {
            padding: 90px 0 72px;
        }

        .berita-media {
            height: 220px;
        }
    }

    @media (max-width: 767.98px) {
        .berita-hero {
            padding: 78px 0 64px;
        }

        .hero-title {
            font-size: clamp(2rem, 8vw, 2.8rem);
        }

        .hero-subtitle {
            font-size: 0.95rem;
        }

        .filter-wrap {
            padding: 0.85rem;
            border-radius: 20px;
        }

        .filter-pill {
            flex: 1 1 auto;
        }

        .berita-media {
            height: 210px;
        }

        .berita-title {
            font-size: 1.02rem;
        }

        .custom-pagination .page-item .page-link {
            min-width: 40px;
            height: 40px;
            border-radius: 12px !important;
        }
    }
</style>
@endpush
