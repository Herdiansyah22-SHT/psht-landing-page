@extends('layouts.public')

@section('title', 'Beranda')

@push('styles')
<style>
    /* =========================================
       HOMEPAGE - CLEAN / ELEGANT / CONSISTENT
    ========================================= */

    .hero-section {
        position: relative;
        padding: 110px 0 88px;
        background:
            radial-gradient(circle at top left, rgba(143, 18, 18, 0.05), transparent 18%),
            radial-gradient(circle at top right, rgba(198, 161, 58, 0.08), transparent 16%),
            linear-gradient(180deg, #ffffff 0%, #f8fafc 55%, #f1f5f9 100%);
        overflow: hidden;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 0.6rem 1rem;
        border-radius: 999px;
        background: #fff;
        border: 1px solid #e2e8f0;
        box-shadow: var(--psht-shadow-sm);
        color: var(--psht-red);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
    }

    .hero-badge i {
        color: var(--psht-gold);
    }

    .hero-title {
        font-size: clamp(2.6rem, 6vw, 5rem);
        line-height: 1.02;
        font-weight: 700;
        margin-bottom: 1rem;
        max-width: 760px;
    }

    .hero-title .text-accent {
        color: var(--psht-red);
    }

    .typewriter-word {
        display: inline;
        color: var(--psht-dark);
    }

    .typewriter-cursor {
        display: inline-block;
        width: 3px;
        height: 0.85em;
        background: var(--psht-red);
        margin-left: 3px;
        vertical-align: middle;
        border-radius: 2px;
        animation: blink-cursor 0.85s step-end infinite;
    }

    @keyframes blink-cursor {
        0%, 100% { opacity: 1; }
        50%      { opacity: 0; }
    }

    .hero-subtitle {
        max-width: 620px;
        font-size: 1.04rem;
        line-height: 1.9;
        color: var(--psht-text-soft);
        margin-bottom: 1.8rem;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-bottom: 2rem;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
        max-width: 760px;
    }

    .hero-stat {
        background: #fff;
        border: 1px solid rgba(15, 23, 42, 0.07);
        border-radius: 22px;
        padding: 1.15rem 1rem;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.06),
            0 6px 20px rgba(15, 23, 42, 0.10),
            0 18px 40px rgba(15, 23, 42, 0.06);
        transition: var(--transition);
    }

    .hero-stat:hover {
        transform: translateY(-5px);
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.08),
            0 12px 32px rgba(15, 23, 42, 0.14),
            0 28px 56px rgba(15, 23, 42, 0.08);
    }

    .hero-stat .stat-num {
        font-size: 1.7rem;
        font-weight: 800;
        color: var(--psht-dark);
        line-height: 1;
        margin-bottom: 0.45rem;
    }

    .hero-stat .stat-label {
        font-size: 0.84rem;
        color: var(--psht-text-soft);
    }

    .hero-visual-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-logo-card {
        position: relative;
        width: min(500px, 100%);
        aspect-ratio: 1 / 1;
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid rgba(15, 23, 42, 0.07);
        border-radius: 38px;
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.06),
            0 14px 40px rgba(15, 23, 42, 0.12),
            0 36px 80px rgba(15, 23, 42, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2.4rem;
        overflow: hidden;
    }

    .hero-logo-card::before {
        content: '';
        position: absolute;
        inset: 20px;
        border-radius: 28px;
        border: 1px dashed rgba(198, 161, 58, 0.38);
    }

    .hero-logo-glow {
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(198, 161, 58, 0.22) 0%, rgba(198, 161, 58, 0) 70%);
    }

    .hero-logo-img {
        position: relative;
        z-index: 2;
        width: 80%;
        max-width: 340px;
        object-fit: contain;
        filter: drop-shadow(0 20px 42px rgba(15, 23, 42, 0.16));
    }

    .section-block {
        padding: 95px 0;
    }

    .section-soft {
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
    }

    .card-clean {
        background: #fff;
        border: 1px solid rgba(15, 23, 42, 0.07);
        border-radius: 24px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.05),
            0 6px 20px rgba(15, 23, 42, 0.09),
            0 18px 40px rgba(15, 23, 42, 0.05);
        transition: var(--transition);
    }

    .card-clean:hover {
        transform: translateY(-5px);
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.07),
            0 12px 30px rgba(15, 23, 42, 0.13),
            0 28px 56px rgba(15, 23, 42, 0.07);
    }

    .badge-soft {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0.5rem 0.88rem;
        border-radius: 999px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: var(--psht-red);
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.04em;
    }

    .sambutan-card {
        padding: 2rem;
        height: 100%;
    }

    .sambutan-icon {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #fff7ed;
        color: var(--psht-gold);
        border: 1px solid #f6e7bf;
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    .sambutan-text {
        font-size: 1rem;
        line-height: 1.95;
        color: var(--psht-text);
        margin-bottom: 1.6rem;
    }

    .sambutan-profile {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .sambutan-avatar {
        width: 50px;
        height: 50px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--psht-red), #b91c1c);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(143, 18, 18, 0.22);
    }

    .sambutan-profile strong {
        display: block;
        font-size: 0.96rem;
        color: var(--psht-dark);
    }

    .sambutan-profile span {
        display: block;
        font-size: 0.84rem;
        color: var(--psht-text-soft);
    }

    .berita-card {
        overflow: hidden;
    }

    .berita-item {
        display: flex;
        align-items: stretch;
        min-height: 118px;
    }

    .berita-thumb,
    .berita-thumb-placeholder {
        width: 125px;
        min-width: 125px;
        height: 125px;
        object-fit: cover;
    }

    .berita-thumb-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--psht-red), #7f1d1d);
        color: #fff;
        font-size: 2rem;
    }

    .berita-body {
        flex: 1;
        padding: 1rem 1rem 1rem 1.1rem;
    }

    .berita-title {
        margin: 0.55rem 0 0.45rem;
        font-size: 1rem;
        line-height: 1.5;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
    }

    .berita-title a {
        color: var(--psht-dark);
    }

    .berita-title a:hover {
        color: var(--psht-red);
    }

    .berita-meta {
        font-size: 0.82rem;
        color: var(--psht-text-soft);
    }

    .galeri-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .galeri-item {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        aspect-ratio: 1 / 1;
        border: 1px solid rgba(15, 23, 42, 0.07);
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.05),
            0 6px 20px rgba(15, 23, 42, 0.10),
            0 18px 40px rgba(15, 23, 42, 0.05);
        transition: box-shadow var(--transition), transform var(--transition);
    }

    .galeri-item:hover {
        transform: translateY(-4px);
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.07),
            0 12px 30px rgba(15, 23, 42, 0.14),
            0 28px 56px rgba(15, 23, 42, 0.07);
    }

    .galeri-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }

    .galeri-item:hover img {
        transform: scale(1.06);
    }

    .galeri-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(15,23,42,.12), rgba(15,23,42,.56));
        color: #fff;
        opacity: 0;
        transition: opacity .3s ease;
    }

    .galeri-item:hover .galeri-overlay {
        opacity: 1;
    }

    .cta-section {
        padding: 95px 0 110px;
    }

    .cta-box {
        position: relative;
        overflow: hidden;
        padding: 2.7rem;
        border-radius: 34px;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 55%, #334155 100%);
        color: #fff;
        box-shadow:
            0 2px 4px rgba(15, 23, 42, 0.10),
            0 16px 48px rgba(15, 23, 42, 0.22),
            0 40px 80px rgba(15, 23, 42, 0.14);
    }

    .cta-box::before {
        content: '';
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        top: -100px;
        right: -80px;
        background: radial-gradient(circle, rgba(198,161,58,0.20), transparent 60%);
        pointer-events: none;
    }

    .cta-box h2 {
        color: #fff;
        margin-bottom: 0.9rem;
    }

    .cta-box p {
        color: rgba(255,255,255,0.82);
        max-width: 650px;
        margin: 0 auto 1.8rem;
        line-height: 1.85;
    }

    .reveal-up {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity .7s ease, transform .7s ease;
    }

    .reveal-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 991.98px) {
        .hero-section { padding: 96px 0 72px; }
        .hero-stats, .galeri-grid { grid-template-columns: 1fr; }
        .hero-visual-wrap { margin-top: 0.5rem; }
        .section-block, .cta-section { padding: 80px 0; }
    }

    @media (max-width: 767.98px) {
        .hero-title { font-size: clamp(2rem, 9vw, 3rem); }
        .hero-actions { flex-direction: column; }
        .hero-actions .btn, .cta-box .btn { width: 100%; justify-content: center; }
        .hero-logo-card { max-width: 380px; margin: 0 auto; border-radius: 28px; }
        .sambutan-card, .cta-box { padding: 1.5rem; }
        .berita-item { flex-direction: column; }
        .berita-thumb, .berita-thumb-placeholder { width: 100%; height: 190px; }
        .section-block, .cta-section { padding: 72px 0; }
        .galeri-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 479.98px) {
        .galeri-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="reveal-up">
                    <div class="hero-badge">
                        <i class="bi bi-shield-check"></i>
                        Website Resmi PSHT Rayon Banjarkemantren
                    </div>

                    <h1 class="hero-title">
                        <span class="typewriter-word" id="typewriter-text"></span><span class="typewriter-cursor" id="typewriter-cursor"></span>
                        <span class="text-accent" id="hero-terate" style="opacity:0; transition: opacity .4s ease;"> Terate</span>
                    </h1>

                    <p class="hero-subtitle">
                        Rayon Banjarkemantren · Ranting Buduran · Cabang Sidoarjo. Membentuk insan berbudi luhur,
                        tahu benar dan salah, serta bertaqwa kepada Tuhan Yang Maha Esa dalam semangat persaudaraan.
                    </p>

                    <div class="hero-actions">
                        <a href="{{ route('profil') }}" class="btn btn-psht-primary">
                            Kenali Kami <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="{{ route('kontak') }}" class="btn btn-outline-psht">
                            Hubungi Kami
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="hero-stat">
                            <div class="stat-num">6</div>
                            <div class="stat-label">Tahun Berdiri</div>
                        </div>
                        <div class="hero-stat">
                            <div class="stat-num">50</div>
                            <div class="stat-label">Anggota Aktif</div>
                        </div>
                        <div class="hero-stat">
                            <div class="stat-num">10</div>
                            <div class="stat-label">Kegiatan / Tahun</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="hero-visual-wrap reveal-up">
                    <div class="hero-logo-card">
                        <div class="hero-logo-glow"></div>
                        <img src="{{ asset('storage/images/logo-psht.png') }}"
                             alt="Logo PSHT Rayon Banjarkemantren"
                             class="hero-logo-img"
                             width="1140"
                             height="1140"
                             loading="eager">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="row align-items-start g-5">
            <div class="col-lg-5">
                <div class="section-title reveal-up">
                    <span class="eyebrow">Sambutan</span>
                    <h2>Sambutan Ketua Rayon</h2>
                    <p class="mt-2">Pesan singkat untuk warga, calon anggota, dan masyarakat yang berkunjung.</p>
                </div>

                <div class="card-clean sambutan-card reveal-up">
                    <div class="sambutan-icon">
                        <i class="bi bi-quote"></i>
                    </div>

                    <p class="sambutan-text">
                        {!! $sambutan ? nl2br(e($sambutan->konten)) : 'Selamat datang di website resmi PSHT Rayon Banjarkemantren. Semoga website ini menjadi sarana informasi yang bermanfaat, mempererat persaudaraan, dan mendukung kegiatan organisasi secara positif dan berkelanjutan.' !!}
                    </p>

                    <div class="sambutan-profile">
                        <div class="sambutan-avatar">K</div>
                        <div>
                            <strong>{{ $sambutan?->judul ?? 'Ketua Rayon PSHT' }}</strong>
                            <span>Banjarkemantren · Buduran</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="section-title reveal-up">
                    <span class="eyebrow">Informasi</span>
                    <h2>Berita & Kegiatan Terbaru</h2>
                    <p class="mt-2">Update kegiatan, pembinaan, dan dokumentasi terbaru dari rayon.</p>
                </div>

                <div class="row g-3">
                    @forelse($beritaTerbaru as $b)
                    <div class="col-12 reveal-up">
                        <div class="card-clean berita-card">
                            <div class="berita-item">
                                @if($b->gambar)
                                    <img src="{{ $b->gambar_url }}"
                                         alt="{{ $b->judul }}"
                                         class="berita-thumb"
                                         width="125"
                                         height="125"
                                         loading="lazy">
                                @else
                                    <div class="berita-thumb-placeholder">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                @endif

                                <div class="berita-body">
                                    <span class="badge-soft">{{ ucfirst($b->kategori) }}</span>
                                    <div class="berita-title">
                                        <a href="{{ route('berita.detail', $b->slug) }}">{{ $b->judul }}</a>
                                    </div>
                                    <div class="berita-meta">
                                        <i class="bi bi-calendar2 me-1"></i>
                                        {{ $b->tanggal_publikasi->translatedFormat('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 reveal-up">
                        <div class="card-clean p-4">
                            <p class="text-muted mb-0">Belum ada berita terbaru.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <a href="{{ route('berita') }}" class="btn btn-psht-primary mt-4 reveal-up">
                    Lihat Semua Berita <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@if($galeriTerbaru->count() > 0)
<section class="section-block section-soft">
    <div class="container">
        <div class="section-title text-center reveal-up">
            <span class="eyebrow">Dokumentasi</span>
            <h2>Galeri Kegiatan</h2>
            <p class="mt-2">Momen kebersamaan, latihan, dan kegiatan rayon yang terdokumentasi dengan rapi.</p>
        </div>

        <div class="galeri-grid reveal-up">
            @foreach($galeriTerbaru as $g)
            <a href="{{ route('galeri') }}" class="galeri-item">
                <img src="{{ $g->gambar_url }}"
                     alt="{{ $g->judul }}"
                     width="400"
                     height="400"
                     loading="lazy">
                <div class="galeri-overlay">
                    <i class="bi bi-zoom-in fs-3"></i>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-4 reveal-up">
            <a href="{{ route('galeri') }}" class="btn btn-psht-primary">
                Lihat Galeri Lengkap <i class="bi bi-images ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

<section class="cta-section">
    <div class="container">
        <div class="cta-box text-center reveal-up">
            <h2>Bergabung Bersama Keluarga Besar PSHT</h2>
            <p>
                Dapatkan informasi pendaftaran, jadwal latihan, dan kegiatan resmi PSHT Rayon Banjarkemantren
                melalui halaman kontak yang telah kami sediakan.
            </p>
            <a href="{{ route('kontak') }}" class="btn btn-psht-gold btn-lg">
                Hubungi / Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    (function () {
        var fullText  = 'Persaudaraan Setia Hati';
        var textEl    = document.getElementById('typewriter-text');
        var cursorEl  = document.getElementById('typewriter-cursor');
        var terateEl  = document.getElementById('hero-terate');

        if (!textEl || !cursorEl || !terateEl) return;

        var index   = 0;
        var started = false;

        function typeChar() {
            if (index < fullText.length) {
                textEl.textContent += fullText[index];
                index++;
                var delay = 52 + Math.random() * 38;
                setTimeout(typeChar, delay);
            } else {
                setTimeout(function () {
                    terateEl.style.opacity = '1';
                    setTimeout(function () {
                        cursorEl.style.display = 'none';
                    }, 2400);
                }, 200);
            }
        }

        function startTyping() {
            if (started) return;
            started = true;
            setTimeout(typeChar, 650);
        }

        var heroSection = document.querySelector('.hero-section');
        if (heroSection && 'IntersectionObserver' in window) {
            var obs = new IntersectionObserver(function (entries) {
                if (entries[0].isIntersecting) {
                    startTyping();
                    obs.disconnect();
                }
            }, { threshold: 0.1 });
            obs.observe(heroSection);
        } else {
            startTyping();
        }
    })();

    document.addEventListener('DOMContentLoaded', function () {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal-up').forEach(function (el) {
            observer.observe(el);
        });
    });
</script>
@endpush
