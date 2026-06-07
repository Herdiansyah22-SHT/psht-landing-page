@extends('layouts.public')
@section('title', $berita->judul)

@section('content')

{{-- HERO ARTIKEL --}}
<section class="detail-hero position-relative overflow-hidden">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <nav aria-label="breadcrumb" class="detail-breadcrumb-wrap mb-4">
                    <ol class="breadcrumb detail-breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('berita') }}">Berita & Kegiatan</a>
                        </li>
                        <li class="breadcrumb-item active text-truncate" aria-current="page">
                            {{ Str::limit($berita->judul, 60) }}
                        </li>
                    </ol>
                </nav>

                <div class="detail-hero-inner text-white">
                    <span class="detail-category-badge">
                        {{ ucfirst($berita->kategori) }}
                    </span>

                    <h1 class="detail-title mt-4 mb-3">
                        {{ $berita->judul }}
                    </h1>

                    <div class="detail-meta d-flex flex-wrap align-items-center gap-3">
                        <span>
                            <i class="bi bi-calendar2-event me-2"></i>
                            {{ $berita->tanggal_publikasi->format('d F Y') }}
                        </span>
                        <span>
                            <i class="bi bi-clock me-2"></i>
                            {{ $berita->tanggal_publikasi->format('H:i') }} WIB
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="detail-hero-blur blur-one"></div>
    <div class="detail-hero-blur blur-two"></div>
</section>

{{-- CONTENT --}}
<section class="py-5 py-lg-6">
    <div class="container">
        <div class="row g-4 g-lg-5">
            {{-- ARTIKEL --}}
            <div class="col-lg-8">
                <article class="article-shell">

                    @if($berita->gambar)
                        <div class="article-cover-wrap mb-4">
                            <img src="{{ $berita->gambar_url }}"
                                 alt="{{ $berita->judul }}"
                                 class="article-cover img-fluid w-100">
                        </div>
                    @endif

                    <div class="article-body-wrap">
                        <div class="article-body">
                            {!! nl2br(e($berita->isi)) !!}
                        </div>
                    </div>

                    <div class="article-footer d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4">
                        <a href="{{ route('berita') }}" class="btn btn-outline-psht">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Berita
                        </a>

                        <div class="article-share-note">
                            Dipublikasikan oleh PSHT Rayon Banjarkemantren
                        </div>
                    </div>
                </article>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <aside class="sidebar-news-wrap">
                    <div class="sidebar-news">
                        <div class="sidebar-header">
                            <span class="sidebar-kicker">Artikel Terkait</span>
                            <h3>Berita Lainnya</h3>
                        </div>

                        <div class="sidebar-list">
                            @forelse($lainnya as $l)
                                <a href="{{ route('berita.detail', $l->slug) }}" class="sidebar-item text-decoration-none">
                                    <div class="sidebar-thumb-wrap">
                                        @if($l->gambar)
                                            <img src="{{ $l->gambar_url }}"
                                                 alt="{{ $l->judul }}"
                                                 class="sidebar-thumb">
                                        @else
                                            <div class="sidebar-thumb placeholder-thumb">
                                                <i class="bi bi-newspaper"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="sidebar-content">
                                        <span class="sidebar-date">
                                            {{ $l->tanggal_publikasi->format('d M Y') }}
                                        </span>
                                        <p class="sidebar-title mb-0">
                                            {{ Str::limit($l->judul, 72) }}
                                        </p>
                                    </div>
                                </a>
                            @empty
                                <div class="sidebar-empty text-muted">
                                    Belum ada berita lainnya.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
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
    .detail-hero {
        padding: 80px 0 72px;
        background:
            linear-gradient(135deg, rgba(11, 18, 32, 0.97), rgba(17, 24, 39, 0.94)),
            radial-gradient(circle at top left, rgba(212, 175, 55, 0.10), transparent 30%);
        isolation: isolate;
    }

    .detail-breadcrumb-wrap {
        display: inline-flex;
        max-width: 100%;
        padding: 0.7rem 1rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.10);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .detail-breadcrumb {
        margin: 0;
        font-size: 0.84rem;
    }

    .detail-breadcrumb .breadcrumb-item,
    .detail-breadcrumb .breadcrumb-item.active,
    .detail-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,0.72);
    }

    .detail-breadcrumb .breadcrumb-item a {
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .detail-breadcrumb .breadcrumb-item a:hover {
        color: var(--psht-gold);
    }

    .detail-hero-inner {
        max-width: 850px;
    }

    .detail-category-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.65rem 1rem;
        border-radius: 999px;
        background: rgba(185, 28, 28, 0.18);
        border: 1px solid rgba(255,255,255,0.10);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .detail-title {
        color: #fff !important;
        font-size: clamp(2.1rem, 4vw, 4rem);
        line-height: 1.18;
    }

    .detail-meta {
        color: rgba(255,255,255,0.76);
        font-size: 0.92rem;
        font-weight: 500;
    }

    .detail-hero-blur {
        position: absolute;
        border-radius: 50%;
        filter: blur(70px);
        z-index: -1;
        opacity: 0.5;
    }

    .blur-one {
        width: 220px;
        height: 220px;
        background: rgba(185, 28, 28, 0.22);
        top: 30px;
        left: -40px;
    }

    .blur-two {
        width: 250px;
        height: 250px;
        background: rgba(212, 175, 55, 0.14);
        right: -50px;
        bottom: -60px;
    }

    /* ARTICLE */
    .article-shell {
        position: relative;
    }

    .article-cover-wrap {
        border-radius: 28px;
        overflow: hidden;
        background: rgba(255,255,255,0.7);
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 18px 50px rgba(2, 6, 23, 0.08);
    }

    .article-cover {
        display: block;
        max-height: 500px;
        object-fit: cover;
    }

    .article-body-wrap {
        padding: 2rem;
        border-radius: 28px;
        background: rgba(255,255,255,0.78);
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 18px 50px rgba(2, 6, 23, 0.06);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .article-body {
        color: #334155;
        font-size: 1rem;
        line-height: 1.95;
    }

    .article-body p {
        margin-bottom: 1.25rem;
    }

    .article-body h2,
    .article-body h3,
    .article-body h4 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: var(--psht-dark);
    }

    .article-body img {
        max-width: 100%;
        border-radius: 18px;
        margin: 1.5rem 0;
    }

    .article-footer {
        padding-top: 0.5rem;
    }

    .btn-outline-psht {
        min-height: 46px;
        padding: 0.82rem 1.35rem;
        border-radius: 999px;
        border: 1px solid rgba(15, 23, 42, 0.10);
        background: rgba(255,255,255,0.86);
        color: var(--psht-dark);
        font-size: 0.92rem;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .btn-outline-psht:hover {
        color: var(--psht-red);
        border-color: rgba(185, 28, 28, 0.18);
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(2, 6, 23, 0.06);
    }

    .article-share-note {
        font-size: 0.84rem;
        color: #94A3B8;
        font-weight: 600;
    }

    /* SIDEBAR */
    .sidebar-news-wrap {
        position: sticky;
        top: 96px;
    }

    .sidebar-news {
        padding: 1.5rem;
        border-radius: 28px;
        background: rgba(255,255,255,0.78);
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 18px 50px rgba(2, 6, 23, 0.06);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .sidebar-header {
        margin-bottom: 1.2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(15, 23, 42, 0.08);
    }

    .sidebar-kicker {
        display: inline-block;
        margin-bottom: 0.4rem;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--psht-red);
    }

    .sidebar-header h3 {
        font-size: 1.35rem;
        margin-bottom: 0;
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
    }

    .sidebar-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .sidebar-item {
        display: flex;
        align-items: flex-start;
        gap: 0.95rem;
        padding: 0.85rem;
        border-radius: 18px;
        background: rgba(248, 250, 252, 0.8);
        border: 1px solid rgba(15, 23, 42, 0.04);
        transition: all 0.3s ease;
    }

    .sidebar-item:hover {
        transform: translateY(-3px);
        background: #fff;
        box-shadow: 0 14px 28px rgba(2, 6, 23, 0.06);
    }

    .sidebar-thumb-wrap {
        flex-shrink: 0;
    }

    .sidebar-thumb {
        width: 82px;
        height: 72px;
        object-fit: cover;
        border-radius: 14px;
    }

    .placeholder-thumb {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--psht-red), var(--psht-dark));
        color: #fff;
        font-size: 1.2rem;
    }

    .sidebar-date {
        display: inline-block;
        margin-bottom: 0.35rem;
        font-size: 0.76rem;
        color: #94A3B8;
        font-weight: 600;
    }

    .sidebar-title {
        color: #0F172A;
        font-size: 0.9rem;
        line-height: 1.5;
        font-weight: 700;
        transition: color 0.3s ease;
    }

    .sidebar-item:hover .sidebar-title {
        color: var(--psht-red);
    }

    .sidebar-empty {
        padding: 1rem 0.25rem 0;
        font-size: 0.92rem;
    }

    @media (max-width: 991.98px) {
        .detail-hero {
            padding: 72px 0 60px;
        }

        .sidebar-news-wrap {
            position: static;
            top: auto;
        }
    }

    @media (max-width: 767.98px) {
        .detail-hero {
            padding: 64px 0 54px;
        }

        .detail-breadcrumb-wrap {
            display: flex;
            width: 100%;
            border-radius: 18px;
            padding: 0.8rem 0.9rem;
        }

        .detail-title {
            font-size: clamp(1.8rem, 7vw, 2.5rem);
        }

        .detail-meta {
            font-size: 0.86rem;
        }

        .article-body-wrap,
        .sidebar-news {
            padding: 1.2rem;
            border-radius: 22px;
        }

        .article-body {
            font-size: 0.96rem;
            line-height: 1.9;
        }

        .sidebar-thumb {
            width: 72px;
            height: 64px;
            border-radius: 12px;
        }
    }
</style>
@endpush
