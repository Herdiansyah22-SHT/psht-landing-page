@extends('layouts.public')
@section('title', 'Profil Rayon')

@push('styles')
<style>
    /* =========================================
       PROFILE PAGE - CLEAN / MODERN / BALANCED
    ========================================= */

    .profile-hero {
        position: relative;
        padding: 92px 0 72px;
        background:
            radial-gradient(circle at top right, rgba(212, 175, 55, 0.10), transparent 18%),
            radial-gradient(circle at bottom left, rgba(185, 28, 28, 0.10), transparent 18%),
            linear-gradient(135deg, var(--psht-dark) 0%, #172033 55%, #1e293b 100%);
        overflow: hidden;
    }

    .profile-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), transparent 40%);
        pointer-events: none;
    }

    .profile-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        min-height: 44px;
        padding: 0.7rem 1rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.10);
        color: var(--psht-gold);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1.1rem;
        backdrop-filter: blur(10px);
    }

    .profile-hero h1 {
        color: #fff;
        font-size: clamp(2.2rem, 5vw, 4rem);
        margin-bottom: 0.9rem;
    }

    .profile-hero p {
        color: rgba(255,255,255,0.76);
        font-size: 1.02rem;
        max-width: 720px;
        margin: 0 auto 1.35rem;
        line-height: 1.85;
    }

    .profile-breadcrumb .breadcrumb {
        margin-bottom: 0;
    }

    .profile-breadcrumb .breadcrumb-item,
    .profile-breadcrumb .breadcrumb-item.active {
        font-size: 0.92rem;
    }

    .profile-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,0.4);
    }

    .profile-breadcrumb a {
        color: var(--psht-gold);
        text-decoration: none;
    }

    .profile-breadcrumb a:hover {
        color: #fff;
    }

    .profile-tabs-wrap {
        position: sticky;
        top: 74px;
        z-index: 100;
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
    }

    .profile-tabs {
        gap: 0.75rem;
        flex-wrap: wrap;
        padding: 1rem 0;
    }

    .profile-tabs .nav-link {
        min-height: 44px;
        border: none !important;
        border-radius: 999px;
        padding: 0.82rem 1.15rem;
        font-size: 0.94rem;
        font-weight: 700;
        color: var(--psht-text-soft);
        background: transparent;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .profile-tabs .nav-link:hover {
        color: var(--psht-dark);
        background: rgba(15, 23, 42, 0.05);
    }

    .profile-tabs .nav-link.active {
        background: var(--psht-red);
        color: #fff;
        box-shadow: 0 10px 24px rgba(185, 28, 28, 0.22);
    }

    .profile-section {
        padding: 72px 0 90px;
    }

    .profile-card {
        background: #fff;
        border: 1px solid rgba(15, 23, 42, 0.06);
        border-radius: 24px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.05),
            0 10px 24px rgba(15, 23, 42, 0.06);
        transition: var(--transition);
        height: 100%;
    }

    .profile-card:hover {
        transform: translateY(-4px);
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.06),
            0 18px 36px rgba(15, 23, 42, 0.10);
    }

    .section-head {
        margin-bottom: 2rem;
    }

    .section-head .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--psht-red);
        text-transform: uppercase;
        letter-spacing: 0.12em;
        font-size: 0.78rem;
        font-weight: 800;
        margin-bottom: 0.9rem;
    }

    .section-head .eyebrow::before {
        content: '';
        width: 34px;
        height: 1px;
        background: linear-gradient(90deg, var(--psht-gold), transparent);
    }

    .section-head h2 {
        margin-bottom: 0.75rem;
        font-size: clamp(2rem, 4vw, 2.9rem);
    }

    .section-head p {
        color: var(--psht-text-soft);
        margin-bottom: 0;
        max-width: 680px;
    }

    /* SEJARAH */
    .history-media {
        overflow: hidden;
        border-radius: 24px;
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.05),
            0 14px 34px rgba(15, 23, 42, 0.08);
        background: #fff;
        margin-bottom: 1.5rem;
    }

    .history-media img {
        width: 100%;
        height: 100%;
        max-height: 440px;
        object-fit: cover;
        display: block;
        transition: transform .45s ease;
    }

    .history-media:hover img {
        transform: scale(1.03);
    }

    .history-content {
        padding: 1.7rem;
        background: #fff;
        border: 1px solid rgba(15, 23, 42, 0.06);
        border-radius: 24px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.05),
            0 10px 24px rgba(15, 23, 42, 0.06);
        color: #475569;
        font-size: 1.02rem;
        line-height: 2;
        text-align: justify;
    }

    .history-info {
        padding: 1.6rem;
    }

    .history-info-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 1.3rem;
    }

    .history-info-title .icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(185, 28, 28, 0.08);
        color: var(--psht-red);
        font-size: 1.15rem;
    }

    .history-info h5 {
        margin-bottom: 0;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
    }

    .info-list {
        display: grid;
        gap: 0.9rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        padding: 0.95rem 0;
        border-bottom: 1px dashed rgba(15, 23, 42, 0.08);
        font-size: 0.95rem;
    }

    .info-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .info-item span:first-child {
        color: var(--psht-text-soft);
    }

    .info-item span:last-child {
        font-weight: 700;
        color: var(--psht-dark);
        text-align: right;
    }

    /* VISI MISI */
    .vm-card {
        position: relative;
        overflow: hidden;
        padding: 2rem;
        border-radius: 28px;
        height: 100%;
        color: #fff;
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.08),
            0 20px 44px rgba(15, 23, 42, 0.16);
    }

    .vm-card::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        top: -70px;
        right: -60px;
        background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 65%);
        pointer-events: none;
    }

    .vm-card.visi {
        background: linear-gradient(135deg, var(--psht-red), #991b1b);
    }

    .vm-card.misi {
        background: linear-gradient(135deg, var(--psht-dark), #1e293b);
    }

    .vm-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 1.2rem;
        position: relative;
        z-index: 2;
    }

    .vm-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.16);
        border: 1px solid rgba(255,255,255,0.18);
        color: #fff;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .vm-title {
        margin-bottom: 0;
        color: #fff !important;
        font-size: 2rem;
    }

    .vm-body {
        position: relative;
        z-index: 2;
        line-height: 1.95;
        font-size: 1.03rem;
        color: rgba(255,255,255,0.92);
    }

    /* STRUKTUR */
    .struktur-section {
        background: #f8fafc;
    }

    .struktur-wrap,
    .struktur-wrapper {
        max-width: 980px;
        margin: 0 auto;
    }

    .struktur-lead {
        max-width: 720px;
        margin: 0 auto 2.5rem;
        text-align: center;
        color: var(--psht-text-soft);
    }

    .chief-card {
        position: relative;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 2rem 1.5rem;
        text-align: center;
        max-width: 520px;
        margin: 0 auto;
        box-shadow:
            0 4px 10px rgba(15, 23, 42, 0.08),
            0 18px 38px rgba(15, 23, 42, 0.12);
    }

    .chief-label {
        display: inline-block;
        font-size: 0.82rem;
        font-weight: 600;
        color: #b91c1c;
        background: #fef2f2;
        border: 1px solid #fee2e2;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        margin-bottom: 1rem;
    }

    .chief-card h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0;
    }

    .struktur-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1rem;
        position: relative;
        margin-top: 2.6rem;
    }

    .struktur-grid::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: min(420px, 70%);
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(148, 163, 184, 0.65),
            transparent
        );
    }

    .struktur-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 1.25rem 1.2rem;
        box-shadow:
            0 3px 8px rgba(15, 23, 42, 0.07),
            0 14px 28px rgba(15, 23, 42, 0.10);
        transition: 0.25s ease;
        position: relative;
    }

    .struktur-card::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 1px;
        height: 20px;
        background: linear-gradient(
            180deg,
            rgba(148, 163, 184, 0.7),
            rgba(148, 163, 184, 0.25)
        );
    }

    .struktur-card:hover {
        transform: translateY(-3px);
        box-shadow:
            0 6px 14px rgba(15, 23, 42, 0.10),
            0 20px 34px rgba(15, 23, 42, 0.14);
    }

    .struktur-card .role {
        font-size: 0.82rem;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 0.45rem;
    }

    .struktur-card .name {
        font-size: 1.05rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.5;
        margin-bottom: 0;
    }

    /* DETAIL ORGANISASI */
    .detail-card {
        position: relative;
        margin-top: 2rem;
        background: rgba(255, 255, 255, 0.86);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(15, 23, 42, 0.08);
        border-radius: 24px;
        padding: 1.6rem;
        box-shadow:
            0 4px 10px rgba(15, 23, 42, 0.08),
            0 20px 42px rgba(15, 23, 42, 0.10);
        overflow: hidden;
    }

    .detail-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255,255,255,0.18), transparent 32%);
        pointer-events: none;
    }

    .detail-top {
        position: relative;
        text-align: center;
        padding-top: 1.35rem;
        margin-bottom: 2rem;
    }

    .detail-top::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: min(260px, 72%);
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent 0%,
            rgba(148, 163, 184, 0.18) 18%,
            rgba(148, 163, 184, 0.65) 50%,
            rgba(148, 163, 184, 0.18) 82%,
            transparent 100%
        );
    }

    .detail-heading {
        position: relative;
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        padding-top: 0.75rem;
    }

    .detail-heading::before {
        content: '';
        position: absolute;
        top: -16px;
        left: 50%;
        transform: translateX(-50%);
        width: 1px;
        height: 18px;
        background: linear-gradient(
            180deg,
            rgba(148, 163, 184, 0.85),
            rgba(148, 163, 184, 0.35)
        );
    }

    .detail-heading::after {
        content: '';
        position: absolute;
        top: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #cbd5e1;
        border: 2px solid #ffffff;
        box-shadow:
            0 0 0 4px rgba(203, 213, 225, 0.18),
            0 6px 14px rgba(15, 23, 42, 0.08);
    }

    .detail-label {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        font-weight: 700;
        color: #991B1B;
        background: rgba(185, 28, 28, 0.08);
        border: 1px solid rgba(185, 28, 28, 0.10);
        padding: 0.5rem 0.95rem;
        border-radius: 999px;
        margin-bottom: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .detail-title {
        font-size: clamp(1.45rem, 2.5vw, 1.95rem);
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .detail-body {
        position: relative;
        z-index: 2;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1rem;
        align-items: stretch;
    }

    .detail-item {
        position: relative;
        padding: 1.15rem 1.15rem 1rem;
        border-radius: 20px;
        background: rgba(248, 250, 252, 0.88);
        border: 1px solid rgba(15, 23, 42, 0.06);
        transition: all 0.3s ease;
    }

    .detail-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
        border-color: rgba(212, 175, 55, 0.22);
    }

    .detail-item::before {
        content: '';
        position: absolute;
        top: 14px;
        left: 1.15rem;
        width: 32px;
        height: 2px;
        border-radius: 999px;
        background: linear-gradient(90deg, #D4AF37, rgba(212, 175, 55, 0.15));
    }

    .detail-item-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #64748b;
        margin-bottom: 0.9rem;
        padding-top: 0.5rem;
    }

    .detail-item-value {
        display: block;
        font-size: 1rem;
        line-height: 1.65;
        color: #0f172a;
        font-weight: 700;
    }

    /* RESPONSIVE */
    @media (max-width: 991.98px) {
        .profile-hero {
            padding: 80px 0 62px;
        }

        .profile-tabs-wrap {
            top: 68px;
        }

        .profile-section {
            padding: 60px 0 78px;
        }
    }

    @media (max-width: 767.98px) {
        .profile-hero p {
            font-size: 0.97rem;
        }

        .profile-tabs {
            justify-content: flex-start !important;
            overflow-x: auto;
            flex-wrap: nowrap;
            padding-bottom: 0.9rem;
            scrollbar-width: thin;
        }

        .profile-tabs .nav-link {
            white-space: nowrap;
            min-width: max-content;
        }

        .profile-section {
            padding: 52px 0 70px;
        }

        .history-content,
        .history-info,
        .vm-card {
            padding: 1.35rem;
        }

        .vm-title {
            font-size: 1.7rem;
        }

        .info-item {
            align-items: flex-start;
            flex-direction: column;
            gap: 0.35rem;
        }

        .info-item span:last-child {
            text-align: left;
        }

        .chief-card {
            padding: 1.5rem 1.1rem;
            border-radius: 18px;
        }

        .chief-card h3 {
            font-size: 1.35rem;
        }

        .struktur-card,
        .detail-card,
        .detail-item {
            border-radius: 16px;
        }

        .struktur-grid::before {
            display: none;
        }

        .struktur-card::before {
            display: none;
        }

        .detail-card {
            padding: 1.2rem;
        }

        .detail-top {
            margin-bottom: 1.5rem;
            padding-top: 1.15rem;
        }

        .detail-top::before {
            width: min(200px, 78%);
        }

        .detail-title {
            font-size: 1.2rem;
        }

        .detail-grid {
            grid-template-columns: 1fr;
            gap: 0.85rem;
        }

        .detail-item {
            padding: 1rem;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="profile-hero">
    <div class="container text-center position-relative" style="z-index: 2;">
        <div class="profile-hero-badge">
            <i class="bi bi-shield-check"></i>
            Profil Resmi Rayon
        </div>

        <h1>Profil Rayon</h1>

        <p>
            Persaudaraan Setia Hati Terate Rayon Banjarkemantren · Ranting Buduran · Cabang Sidoarjo.
            Mengenal sejarah, arah organisasi, serta susunan kepengurusan secara lebih jelas dan terstruktur.
        </p>

        <nav aria-label="breadcrumb" class="profile-breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Profil</li>
            </ol>
        </nav>
    </div>
</section>

{{-- TABS --}}
<div class="profile-tabs-wrap">
    <div class="container">
        <ul class="nav nav-tabs profile-tabs border-0 justify-content-center" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#sejarah" type="button" role="tab" aria-selected="true">
                    <i class="bi bi-clock-history"></i> Sejarah
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#visi-misi" type="button" role="tab" aria-selected="false">
                    <i class="bi bi-bullseye"></i> Visi & Misi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#struktur" type="button" role="tab" aria-selected="false">
                    <i class="bi bi-diagram-3"></i> Struktur Organisasi
                </button>
            </li>
        </ul>
    </div>
</div>

{{-- CONTENT --}}
<div class="profile-section">
    <div class="container">
        <div class="tab-content">

            {{-- SEJARAH --}}
            <div class="tab-pane fade show active" id="sejarah" role="tabpanel">
                <div class="row g-4 g-lg-5 align-items-start">
                    <div class="col-lg-8">
                        <div class="section-head">
                            <div class="eyebrow">Sejarah Rayon</div>
                            <h2>Perjalanan dan Identitas Rayon</h2>
                            <p>
                                Mengenal latar belakang, perkembangan, dan nilai persaudaraan yang menjadi fondasi
                                PSHT Rayon Banjarkemantren.
                            </p>
                        </div>

                        @if($sejarah && $sejarah->gambar)
                            <div class="history-media">
                                <img src="{{ asset('storage/' . $sejarah->gambar) }}" alt="Sejarah Rayon Banjarkemantren">
                            </div>
                        @endif

                        <div class="history-content">
                            {!! $sejarah ? nl2br(e($sejarah->konten)) : '<p>Informasi sejarah rayon belum tersedia saat ini. Silakan hubungi pengurus untuk informasi lebih lanjut.</p>' !!}
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="profile-card history-info">
                            <div class="history-info-title">
                                <div class="icon">
                                    <i class="bi bi-info-circle"></i>
                                </div>
                                <div>
                                    <h5>Informasi Singkat</h5>
                                    <small class="text-muted">Profil dasar organisasi</small>
                                </div>
                            </div>

                            <div class="info-list">
                                <div class="info-item">
                                    <span>Organisasi</span>
                                    <span>PSHT</span>
                                </div>
                                <div class="info-item">
                                    <span>Rayon</span>
                                    <span>Banjarkemantren</span>
                                </div>
                                <div class="info-item">
                                    <span>Ranting</span>
                                    <span>Buduran</span>
                                </div>
                                <div class="info-item">
                                    <span>Cabang</span>
                                    <span>Sidoarjo</span>
                                </div>
                                <div class="info-item">
                                    <span>Provinsi</span>
                                    <span>Jawa Timur</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- VISI MISI --}}
            <div class="tab-pane fade" id="visi-misi" role="tabpanel">
                <div class="section-head text-center mx-auto">
                    <div class="eyebrow justify-content-center">Arah Organisasi</div>
                    <h2>Visi dan Misi Rayon</h2>
                    <p class="mx-auto">
                        Komitmen organisasi dalam membina karakter, menjaga tradisi, dan memperkuat nilai persaudaraan
                        di lingkungan rayon.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="vm-card visi">
                            <div class="vm-header">
                                <div class="vm-icon">
                                    <i class="bi bi-bullseye"></i>
                                </div>
                                <h3 class="vm-title">Visi</h3>
                            </div>

                            <div class="vm-body">
                                {!! $visi ? nl2br(e($visi->konten)) : 'Menjadi organisasi pencak silat yang unggul, berkarakter, dan berkontribusi nyata bagi masyarakat sekitar dengan berlandaskan ajaran budi pekerti luhur.' !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="vm-card misi">
                            <div class="vm-header">
                                <div class="vm-icon">
                                    <i class="bi bi-list-check"></i>
                                </div>
                                <h3 class="vm-title">Misi</h3>
                            </div>

                            <div class="vm-body">
                                {!! $misi ? nl2br(e($misi->konten)) : '1. Mendidik manusia berbudi pekerti luhur tahu benar dan salah.<br>2. Melestarikan pencak silat sebagai budaya bangsa.<br>3. Mempererat persaudaraan yang tulus didasari rasa saling menyayangi, menghormati, dan bertanggung jawab.' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STRUKTUR --}}
            <div class="tab-pane fade" id="struktur" role="tabpanel">
                <div class="struktur-wrap">
                    <div class="section-head text-center">
                        <div class="eyebrow justify-content-center">Kepengurusan</div>
                        <h2>Struktur Organisasi</h2>
                        <p class="struktur-lead">
                            Susunan pengurus inti PSHT Rayon Banjarkemantren ditampilkan secara sederhana,
                            rapi, dan mudah dipahami di berbagai ukuran layar.
                        </p>
                    </div>

                    <section class="struktur-section py-2">
                        <div class="struktur-wrapper">
                            <div class="chief-card">
                                <span class="chief-label">Ketua Rayon</span>
                                <h3>Kentung Anjalutung</h3>
                            </div>

                            <div class="struktur-grid">
                                <div class="struktur-card">
                                    <div class="role">Sekretaris</div>
                                    <p class="name">Kentung Anjalutung</p>
                                </div>

                                <div class="struktur-card">
                                    <div class="role">Bendahara</div>
                                    <p class="name">Kentung Anjalutung</p>
                                </div>

                                <div class="struktur-card">
                                    <div class="role">Koordinator Pelatih</div>
                                    <p class="name">Kentung Anjalutung</p>
                                </div>
                            </div>

                            @if($struktur && ($struktur->gambar || $struktur->konten))
                                @php
                                    $detailItems = [];

                                    if (!empty($struktur->konten)) {
                                        $detailItems = preg_split('/\r\n|\r|\n/', trim($struktur->konten));
                                        $detailItems = array_values(array_filter(array_map('trim', $detailItems)));
                                    }
                                @endphp

                                <div class="detail-card">
                                    <div class="detail-top">
                                        <div class="detail-heading">
                                            <span class="detail-label">Detail Organisasi</span>
                                            <h4 class="detail-title">Informasi Tambahan Struktur Rayon</h4>
                                        </div>
                                    </div>

                                    <div class="detail-body">
                                        <div class="detail-grid">
                                            @if($detailItems && count($detailItems) > 0)
                                                @foreach($detailItems as $item)
                                                    @php
                                                        $parts = explode(':', $item, 2);
                                                        $label = trim($parts[0] ?? 'Informasi');
                                                        $value = trim($parts[1] ?? $item);
                                                    @endphp
                                                    <div class="detail-item">
                                                        <span class="detail-item-label">{{ $label }}</span>
                                                        <strong class="detail-item-value">{{ $value }}</strong>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="detail-item">
                                                    <span class="detail-item-label">Nama Rayon</span>
                                                    <strong class="detail-item-value">Rayon Banjarkemantren</strong>
                                                </div>

                                                <div class="detail-item">
                                                    <span class="detail-item-label">Ranting</span>
                                                    <strong class="detail-item-value">Buduran</strong>
                                                </div>

                                                <div class="detail-item">
                                                    <span class="detail-item-label">Cabang</span>
                                                    <strong class="detail-item-value">Sidoarjo</strong>
                                                </div>

                                                <div class="detail-item">
                                                    <span class="detail-item-label">Alamat Latihan</span>
                                                    <strong class="detail-item-value">Banjarkemantren, Buduran, Sidoarjo</strong>
                                                </div>

                                                <div class="detail-item">
                                                    <span class="detail-item-label">Hari Latihan</span>
                                                    <strong class="detail-item-value">Selasa & Jumat</strong>
                                                </div>

                                                <div class="detail-item">
                                                    <span class="detail-item-label">Waktu</span>
                                                    <strong class="detail-item-value">20.00 WIB</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
