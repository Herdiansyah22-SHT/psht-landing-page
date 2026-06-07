<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website resmi PSHT Rayon Banjarkemantren Ranting Buduran Cabang Sidoarjo">
    <title>@yield('title', 'PSHT Rayon Banjarkemantren') | Ranting Buduran Cabang Sidoarjo</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --psht-red: #8f1212;
            --psht-red-hover: #741010;
            --psht-gold: #c6a13a;
            --psht-gold-soft: #f4ead0;
            --psht-dark: #0f172a;
            --psht-dark-soft: #1e293b;
            --psht-text: #334155;
            --psht-text-soft: #64748b;
            --psht-bg: #f8fafc;
            --psht-bg-soft: #f1f5f9;
            --psht-surface: #ffffff;
            --psht-border: #e2e8f0;
            --psht-border-soft: #eef2f7;
            --psht-shadow-sm: 0 8px 24px rgba(15, 23, 42, 0.06);
            --psht-shadow-md: 0 18px 50px rgba(15, 23, 42, 0.10);
            --psht-shadow-lg: 0 28px 70px rgba(15, 23, 42, 0.14);
            --psht-radius-sm: 14px;
            --psht-radius-md: 22px;
            --psht-radius-lg: 30px;
            --transition: all .3s cubic-bezier(.4, 0, .2, 1);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--psht-text);
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 45%, #f1f5f9 100%);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Cormorant Garamond', serif;
            color: var(--psht-dark);
            line-height: 1.12;
            letter-spacing: 0.2px;
            margin-bottom: 0;
        }

        p {
            color: var(--psht-text);
            line-height: 1.8;
            margin-bottom: 0;
        }

        a {
            text-decoration: none;
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        main {
            min-height: 70vh;
            position: relative;
        }

        /* Navbar */
        .navbar-psht {
            background: rgba(15, 23, 42, 0.96);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 0.95rem 0;
            transition: var(--transition);
        }

        .navbar-psht.scrolled {
            padding: 0.78rem 0;
            box-shadow: 0 12px 36px rgba(2, 6, 23, 0.20);
        }

        .navbar-psht .navbar-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #fff !important;
        }

        .navbar-psht .brand-logo {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: #fff;
            object-fit: contain;
            padding: 6px;
            border: 1px solid rgba(198, 161, 58, 0.35);
            box-shadow: 0 10px 26px rgba(0, 0, 0, 0.18);
        }

        .navbar-psht .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.18;
        }

        .navbar-psht .brand-title {
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.2px;
        }

        .navbar-psht .brand-sub {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.68);
            font-weight: 500;
        }

        .navbar-psht .nav-link {
            position: relative;
            color: rgba(255,255,255,0.76) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.8rem 0.2rem !important;
            margin: 0 0.95rem;
            min-height: 44px;
            display: inline-flex;
            align-items: center;
        }

        .navbar-psht .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 8px;
            width: 0;
            height: 2px;
            background: var(--psht-gold);
            border-radius: 999px;
            transition: var(--transition);
        }

        .navbar-psht .nav-link:hover,
        .navbar-psht .nav-link.active {
            color: #fff !important;
        }

        .navbar-psht .nav-link:hover::after,
        .navbar-psht .nav-link.active::after {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            padding: 0;
            box-shadow: none !important;
        }

        .navbar-toggler-icon {
            filter: brightness(0) invert(1);
            opacity: 0.95;
        }

        /* Section title */
        .section-title {
            position: relative;
            margin-bottom: 3rem;
        }

        .section-title .eyebrow {
            display: inline-block;
            margin-bottom: 0.8rem;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--psht-red);
        }

        .section-title h2 {
            font-size: clamp(2rem, 3vw, 3.2rem);
            font-weight: 700;
            margin-bottom: 0.85rem;
        }

        .section-title p {
            max-width: 700px;
            color: var(--psht-text-soft);
        }

        .section-title.text-center p {
            margin-left: auto;
            margin-right: auto;
        }

        /* Card */
        .card-psht {
            position: relative;
            height: 100%;
            background: var(--psht-surface);
            border: 1px solid var(--psht-border);
            border-radius: var(--psht-radius-md);
            box-shadow: var(--psht-shadow-sm);
            overflow: hidden;
            transition: var(--transition);
        }

        .card-psht:hover {
            transform: translateY(-6px);
            box-shadow: var(--psht-shadow-md);
            border-color: #d9e2ec;
        }

        .card-psht .card-img-top {
            height: 230px;
            object-fit: cover;
        }

        .card-psht .card-body {
            padding: 1.5rem;
        }

        .badge-kategori {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 0.9rem;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: var(--psht-red);
            font-size: 0.76rem;
            font-weight: 700;
            border-radius: 999px;
            letter-spacing: 0.04em;
        }

        /* Buttons */
        .btn-psht-primary,
        .btn-psht-gold,
        .btn-outline-psht {
            min-height: 48px;
            padding: 0.88rem 1.7rem;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: var(--transition);
        }

        .btn-psht-primary {
            color: #fff;
            border: 1px solid var(--psht-red);
            background: var(--psht-red);
            box-shadow: 0 12px 30px rgba(143, 18, 18, 0.18);
        }

        .btn-psht-primary:hover {
            color: #fff;
            background: var(--psht-red-hover);
            border-color: var(--psht-red-hover);
            transform: translateY(-2px);
        }

        .btn-psht-gold {
            color: var(--psht-dark);
            border: 1px solid #ead9a2;
            background: var(--psht-gold-soft);
        }

        .btn-psht-gold:hover {
            color: var(--psht-dark);
            background: #ecd68d;
            border-color: #e2c96f;
            transform: translateY(-2px);
        }

        .btn-outline-psht {
            color: var(--psht-dark);
            border: 1px solid var(--psht-border);
            background: #fff;
        }

        .btn-outline-psht:hover {
            color: var(--psht-red);
            border-color: #e7b9b9;
            background: #fff;
            transform: translateY(-2px);
            box-shadow: var(--psht-shadow-sm);
        }

        .text-muted-psht {
            color: var(--psht-text-soft) !important;
        }

        /* Footer */
        footer {
            position: relative;
            margin-top: 5rem;
            background: linear-gradient(135deg, #0f172a 0%, #111827 100%);
            color: rgba(255,255,255,0.78);
            border-top: 3px solid rgba(198, 161, 58, 0.88);
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(198, 161, 58, 0.10), transparent 22%),
                radial-gradient(circle at bottom left, rgba(143, 18, 18, 0.07), transparent 18%);
            pointer-events: none;
        }

        .footer-top {
            padding: 4.25rem 0 2.75rem;
            position: relative;
            z-index: 2;
        }

        .footer-brand {
            max-width: 420px;
        }

        .footer-kicker {
            display: inline-block;
            margin-bottom: 0.9rem;
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(198, 161, 58, 0.95);
        }

        .footer-brand-title {
            font-family: 'Cormorant Garamond', serif;
            color: #fff;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.9rem;
        }

        .footer-brand-desc {
            color: rgba(255,255,255,0.72);
            font-size: 0.95rem;
            line-height: 1.9;
        }

        .footer-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #fff;
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .footer-links,
        .footer-contact,
        .footer-schedule {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li,
        .footer-contact li,
        .footer-schedule li {
            margin-bottom: 0.9rem;
        }

        .footer-links a,
        .footer-contact span,
        .footer-schedule span {
            color: rgba(255,255,255,0.72);
            font-size: 0.94rem;
            line-height: 1.8;
        }

        .footer-links a:hover {
            color: #fff;
            padding-left: 4px;
        }

        .footer-contact li,
        .footer-schedule li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .footer-contact i,
        .footer-schedule i {
            color: rgba(198, 161, 58, 0.95);
            margin-top: 4px;
            font-size: 0.95rem;
        }

        .footer-divider {
            margin: 0;
            border-color: rgba(255,255,255,0.08);
            position: relative;
            z-index: 2;
        }

        .footer-bottom {
            position: relative;
            z-index: 2;
            padding: 1.3rem 0 1.5rem;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.5);
        }

        /* Helpers */
        .surface-soft {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid var(--psht-border-soft);
            border-radius: var(--psht-radius-lg);
            box-shadow: var(--psht-shadow-sm);
        }

        .section-space {
            padding: 100px 0;
        }

        @media (max-width: 991.98px) {
            .navbar-psht .navbar-collapse {
                margin-top: 1rem;
                padding: 1rem 1rem 0.5rem;
                border-radius: 18px;
                background: rgba(255,255,255,0.04);
                border: 1px solid rgba(255,255,255,0.08);
            }

            .navbar-psht .nav-link {
                margin: 0;
                padding: 0.9rem 0.2rem !important;
                border-bottom: 1px solid rgba(255,255,255,0.06);
            }

            .section-space {
                padding: 80px 0;
            }

            .footer-top {
                padding: 3.5rem 0 2.4rem;
            }
        }

        @media (max-width: 767.98px) {
            .navbar-psht .brand-logo {
                width: 46px;
                height: 46px;
                border-radius: 14px;
            }

            .navbar-psht .brand-title {
                font-size: 0.93rem;
            }

            .navbar-psht .brand-sub {
                font-size: 0.72rem;
            }

            .card-psht .card-img-top {
                height: 210px;
                object-fit: cover;
            }

            .btn-psht-primary,
            .btn-psht-gold,
            .btn-outline-psht {
                width: 100%;
            }

            .section-space {
                padding: 72px 0;
            }

            .footer-brand-title {
                font-size: 1.7rem;
            }

            .footer-bottom {
                text-align: center;
            }
        }

        @yield('extra-css')
    </style>

    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-psht sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('beranda') }}">
            <img src="{{ asset('storage/images/logo-psht.png') }}"
                 alt="Logo PSHT"
                 class="brand-logo"
                 onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Logo_PSHT.svg/512px-Logo_PSHT.svg.png';">

            <div class="brand-text">
                <div class="brand-title">PSHT Banjarkemantren</div>
                <div class="brand-sub">Ranting Buduran · Cabang Sidoarjo</div>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center mt-3 mt-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ route('berita') }}">Berita & Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <div class="container">
        <div class="footer-top">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="footer-brand">
                        <span class="footer-kicker">Persaudaraan Setia Hati Terate</span>
                        <h5 class="footer-brand-title">Rayon Banjarkemantren</h5>
                        <p class="footer-brand-desc">
                            Mendidik manusia berbudi pekerti luhur, tahu benar dan salah, serta ikut menjaga nilai
                            Memayu Hayuning Bawono dalam kehidupan bermasyarakat.
                        </p>
                    </div>
                </div>

                <div class="col-lg-2 col-6">
                    <h6 class="footer-title">Navigasi</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route('profil') }}">Profil Organisasi</a></li>
                        <li><a href="{{ route('berita') }}">Berita & Artikel</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri Dokumentasi</a></li>
                        <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-6">
                    <h6 class="footer-title">Hubungi Kami</h6>
                    <ul class="footer-contact">
                        <li>
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Banjarkemantren, Buduran, Sidoarjo</span>
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            <span>psht.banjarkemantren@gmail.com</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone-fill"></i>
                            <span>+62 812-3456-7890</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6 class="footer-title">Jadwal Latihan</h6>
                    <ul class="footer-schedule">
                        <li>
                            <i class="bi bi-calendar2-week-fill"></i>
                            <span>Selasa, Kamis, Sabtu</span>
                        </li>
                        <li>
                            <i class="bi bi-clock-fill"></i>
                            <span>20:00 WIB sampai selesai</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="mb-2 mb-md-0">
                    &copy; {{ date('Y') }} PSHT Rayon Banjarkemantren. All rights reserved.
                </div>
                <div>
                    Dikelola oleh Tim IT PSHT Ranting Buduran
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar-psht');
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

@stack('scripts')
</body>
</html>
