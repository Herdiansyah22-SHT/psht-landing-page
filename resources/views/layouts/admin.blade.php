<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin PSHT Banjarkemantren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --admin-primary: #c0392b;
            --admin-dark:    #1a1a2e;
            --admin-gold:    #f0a500;
            --sidebar-w:     260px;
        }
        body { font-family: 'Outfit', sans-serif; background: #f0f2f5; }

        /* ---- SIDEBAR ---- */
        #sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
            z-index: 1000; overflow-y: auto;
            transition: transform 0.3s ease;
        }
        .sidebar-brand {
            padding: 1.5rem 1.2rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-brand h6 { color: var(--admin-gold); font-size: 0.7rem; letter-spacing: 1px; text-transform: uppercase; }
        .sidebar-brand strong { color: #fff; font-size: 1rem; }
        .sidebar-menu { padding: 1rem 0.8rem; }
        .sidebar-label {
            font-size: 0.68rem; color: rgba(255,255,255,0.35);
            text-transform: uppercase; letter-spacing: 1.5px;
            padding: 0.5rem 0.8rem; margin-top: 0.5rem;
        }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            padding: 0.65rem 0.9rem; border-radius: 10px;
            color: rgba(255,255,255,0.7) !important;
            text-decoration: none; font-size: 0.9rem; font-weight: 500;
            margin-bottom: 2px; transition: all 0.25s ease;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(240,165,0,0.15);
            color: var(--admin-gold) !important;
        }
        .sidebar-link i { font-size: 1.1rem; width: 20px; text-align: center; }

        /* ---- TOPBAR ---- */
        #topbar {
            position: fixed; top: 0; left: var(--sidebar-w); right: 0;
            height: 64px; background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.07);
            display: flex; align-items: center; padding: 0 1.5rem;
            justify-content: space-between; z-index: 999;
        }
        .topbar-title { font-weight: 700; font-size: 1.1rem; color: var(--admin-dark); }
        .user-menu { display: flex; align-items: center; gap: 10px; }
        .user-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: var(--admin-primary); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 0.9rem;
        }

        /* ---- MAIN CONTENT ---- */
        #main-content {
            margin-left: var(--sidebar-w);
            margin-top: 64px;
            padding: 2rem;
            min-height: calc(100vh - 64px);
        }

        /* ---- STAT CARDS ---- */
        .stat-card {
            border: none; border-radius: 16px; overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .stat-card .stat-icon {
            font-size: 2.5rem; opacity: 0.25;
        }

        /* ---- DATA TABLE ---- */
        .table-card {
            background: #fff; border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            overflow: hidden;
        }
        .table-card .table thead th {
            background: #f8f9fa; font-size: 0.82rem;
            text-transform: uppercase; letter-spacing: 0.5px;
            border-bottom: 2px solid #e9ecef; color: #6c757d;
        }
        .badge-unread { background: var(--admin-primary); font-size: 0.65rem; }
        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.show { transform: translateX(0); }
            #topbar, #main-content { left: 0; margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- SIDEBAR --}}
<div id="sidebar">
    <div class="sidebar-brand">
        <h6>Panel Admin</h6>
        <strong>PSHT Banjarkemantren</strong>
    </div>
    <nav class="sidebar-menu">
        <div class="sidebar-label">Utama</div>
        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <div class="sidebar-label mt-3">Konten</div>
        <a href="{{ route('admin.profil.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i> Profil
        </a>
        <a href="{{ route('admin.berita.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> Berita & Kegiatan
        </a>
        <a href="{{ route('admin.galeri.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
            <i class="bi bi-images"></i> Galeri
        </a>

        <div class="sidebar-label mt-3">Komunikasi</div>
        <a href="{{ route('admin.pesan.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.pesan*') ? 'active' : '' }}">
            <i class="bi bi-envelope"></i> Pesan Masuk
            @php $unread = \App\Models\Pesan::unread()->count(); @endphp
            @if($unread > 0)
                <span class="badge badge-unread ms-auto">{{ $unread }}</span>
            @endif
        </a>

        <div class="sidebar-label mt-3">Akun</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-link w-100 border-0 bg-transparent text-start">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </nav>
</div>

{{-- TOPBAR --}}
<div id="topbar">
    <span class="topbar-title">@yield('page-title', 'Dashboard')</span>
    <div class="user-menu">
       @if(Auth::check())
<div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
<span>{{ Auth::user()->name }}</span>
@endif
    </div>
</div>

{{-- MAIN --}}
<div id="main-content">
    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
