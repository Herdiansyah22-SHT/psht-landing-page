@extends('layouts.public')
@section('title', 'Kontak')

@push('styles')
<style>
    /* =========================================
       CONTACT PAGE - MODERN / CLEAN / ELEGANT
    ========================================= */

    .contact-hero {
        position: relative;
        padding: 92px 0 72px;
        overflow: hidden;
        background:
            radial-gradient(circle at top right, rgba(212, 175, 55, 0.10), transparent 18%),
            radial-gradient(circle at bottom left, rgba(185, 28, 28, 0.10), transparent 18%),
            linear-gradient(135deg, var(--psht-dark) 0%, #172033 55%, #1e293b 100%);
    }

    .contact-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), transparent 40%);
        pointer-events: none;
    }

    .contact-hero-badge {
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

    .contact-hero h1 {
        color: #fff;
        font-size: clamp(2.2rem, 5vw, 4rem);
        margin-bottom: 0.85rem;
    }

    .contact-hero p {
        color: rgba(255,255,255,0.75);
        font-size: 1.02rem;
        line-height: 1.85;
        max-width: 720px;
        margin: 0 auto;
    }

    .contact-section {
        position: relative;
        padding: 78px 0 88px;
    }

    .contact-shell {
        background: linear-gradient(180deg, rgba(255,255,255,0.78), rgba(255,255,255,0.92));
        border: 1px solid rgba(15, 23, 42, 0.06);
        border-radius: 30px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.04),
            0 18px 50px rgba(15, 23, 42, 0.08);
        padding: 1.2rem;
    }

    .contact-card,
    .contact-info-panel,
    .contact-map-card,
    .wa-card {
        background: #fff;
        border: 1px solid rgba(15, 23, 42, 0.06);
        border-radius: 24px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, 0.04),
            0 12px 28px rgba(15, 23, 42, 0.06);
    }

    .contact-card {
        padding: 2rem;
        height: 100%;
    }

    .contact-info-panel {
        padding: 2rem;
        height: 100%;
    }

    .section-kicker {
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

    .section-kicker::before {
        content: '';
        width: 34px;
        height: 1px;
        background: linear-gradient(90deg, var(--psht-gold), transparent);
    }

    .contact-title {
        font-family: 'Merriweather', serif;
        font-size: clamp(1.75rem, 3vw, 2.35rem);
        color: var(--psht-dark);
        margin-bottom: 0.7rem;
    }

    .contact-subtitle {
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 1.8rem;
        max-width: 60ch;
    }

    .contact-alert {
        border: 1px solid rgba(34, 197, 94, 0.18);
        border-radius: 18px;
        padding: 1rem 1.1rem;
        background: rgba(240, 253, 244, 0.9);
        box-shadow: 0 10px 24px rgba(34, 197, 94, 0.08);
    }

    .contact-alert .btn-close {
        box-shadow: none !important;
    }

    .form-group-modern {
        margin-bottom: 1rem;
    }

    .form-label-modern {
        display: inline-block;
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--psht-dark);
        margin-bottom: 0.55rem;
        letter-spacing: 0.01em;
    }

    .form-control-modern {
        min-height: 54px;
        border-radius: 16px;
        border: 1px solid rgba(15, 23, 42, 0.10);
        background: #fff;
        color: var(--psht-dark);
        padding: 0.95rem 1rem;
        font-size: 0.96rem;
        box-shadow: none;
        transition: var(--transition);
    }

    textarea.form-control-modern {
        min-height: 150px;
        resize: vertical;
    }

    .form-control-modern::placeholder {
        color: #94a3b8;
    }

    .form-control-modern:focus {
        border-color: rgba(185, 28, 28, 0.28);
        box-shadow:
            0 0 0 4px rgba(185, 28, 28, 0.08),
            0 10px 24px rgba(185, 28, 28, 0.06);
    }

    .form-control-modern.is-invalid,
    .was-validated .form-control-modern:invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.08);
    }

    .invalid-feedback {
        font-size: 0.84rem;
        margin-top: 0.45rem;
    }

    .required-mark {
        color: #dc2626;
    }

    .form-note {
        font-size: 0.84rem;
        color: var(--text-muted);
        margin-top: 0.85rem;
    }

    .info-stack {
        display: grid;
        gap: 1rem;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem;
        border-radius: 18px;
        background: #f8fafc;
        border: 1px solid rgba(15, 23, 42, 0.05);
        transition: var(--transition);
    }

    .info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.05);
        border-color: rgba(212, 175, 55, 0.20);
        background: #fff;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        flex-shrink: 0;
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.12);
    }

    .info-label {
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted);
        margin-bottom: 0.35rem;
    }

    .info-value {
        color: var(--psht-dark);
        font-size: 0.96rem;
        line-height: 1.75;
        margin-bottom: 0;
    }

    .wa-card {
        position: relative;
        overflow: hidden;
        margin-top: 1.4rem;
        padding: 1.5rem;
        background:
            radial-gradient(circle at top right, rgba(212, 175, 55, 0.10), transparent 24%),
            linear-gradient(135deg, var(--psht-dark) 0%, #172033 55%, #1e293b 100%);
        color: #fff;
        border-color: rgba(255,255,255,0.08);
    }

    .wa-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), transparent 40%);
        pointer-events: none;
    }

    .wa-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-height: 38px;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.10);
        color: var(--psht-gold);
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .wa-card h5 {
        color: #fff;
        font-family: 'Merriweather', serif;
        margin-bottom: 0.6rem;
        position: relative;
        z-index: 2;
    }

    .wa-card p {
        color: rgba(255,255,255,0.72);
        font-size: 0.94rem;
        line-height: 1.8;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .btn-wa-modern {
        min-height: 48px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 0.94rem;
        background: #22c55e;
        border: none;
        color: #fff;
        box-shadow: 0 12px 24px rgba(34, 197, 94, 0.24);
        position: relative;
        z-index: 2;
    }

    .btn-wa-modern:hover {
        background: #16a34a;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 16px 28px rgba(34, 197, 94, 0.30);
    }

    .contact-map-card {
        margin-top: 1.4rem;
        padding: 1.25rem;
    }

    /* DIUBAH: placeholder map jadi embed map */
    .contact-map-frame {
        position: relative;
        width: 100%;
        min-height: 260px;
        overflow: hidden;
        border-radius: 18px;
        border: 1px solid rgba(15, 23, 42, 0.08);
        background: #e5e7eb;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
    }

    .contact-map-frame iframe {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .contact-map-link {
        margin-top: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-height: 42px;
        padding: 0.7rem 1rem;
        border-radius: 999px;
        background: rgba(185, 28, 28, 0.06);
        border: 1px solid rgba(185, 28, 28, 0.10);
        color: var(--psht-red);
        font-weight: 700;
        font-size: 0.9rem;
        text-decoration: none;
    }

    .contact-map-link:hover {
        color: var(--psht-red);
        background: rgba(185, 28, 28, 0.10);
        transform: translateY(-2px);
    }

    .contact-submit-btn {
        min-height: 52px;
        width: 100%;
        border-radius: 999px;
        font-size: 0.96rem;
    }

    @media (max-width: 991.98px) {
        .contact-hero {
            padding: 80px 0 62px;
        }

        .contact-section {
            padding: 64px 0 76px;
        }

        .contact-card,
        .contact-info-panel {
            padding: 1.5rem;
        }
    }

    @media (max-width: 767.98px) {
        .contact-hero p {
            font-size: 0.97rem;
        }

        .contact-shell {
            padding: 0.85rem;
            border-radius: 22px;
        }

        .contact-card,
        .contact-info-panel,
        .contact-map-card,
        .wa-card {
            border-radius: 18px;
        }

        .contact-card,
        .contact-info-panel {
            padding: 1.2rem;
        }

        .contact-section {
            padding: 52px 0 68px;
        }

        .info-item {
            padding: 0.95rem;
        }

        .info-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
        }

        .form-control-modern {
            min-height: 50px;
            border-radius: 14px;
        }

        textarea.form-control-modern {
            min-height: 140px;
        }

        .contact-map-frame {
            min-height: 220px;
            border-radius: 16px;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="contact-hero">
    <div class="container text-center position-relative" style="z-index:2;">
        <div class="contact-hero-badge">
            <i class="bi bi-envelope-paper-heart"></i>
            Kontak Resmi Rayon
        </div>

        <h1>Hubungi Kami</h1>

        <p>
            Kami siap menerima pertanyaan, saran, dan pesan dari Anda. Silakan hubungi
            PSHT Rayon Banjarkemantren melalui formulir kontak atau layanan WhatsApp.
        </p>
    </div>
</section>

{{-- CONTENT --}}
<section class="contact-section">
    <div class="container">
        @if(session('success'))
            <div class="contact-alert alert alert-success alert-dismissible fade show d-flex align-items-start gap-2 mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-5 mt-1"></i>
                <div class="flex-grow-1">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="contact-shell">
            <div class="row g-4 g-lg-5 align-items-stretch">
                {{-- FORM --}}
                <div class="col-lg-7">
                    <div class="contact-card">
                        <div class="section-kicker">Formulir Pesan</div>
                        <h2 class="contact-title">Kirim Pesan</h2>
                        <p class="contact-subtitle">
                            Gunakan formulir ini untuk menyampaikan pertanyaan, kebutuhan informasi,
                            atau pesan lainnya kepada pengurus rayon.
                        </p>

                        <form action="{{ route('kontak.kirim') }}" method="POST" novalidate>
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label for="nama" class="form-label-modern">
                                            Nama Lengkap <span class="required-mark">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="nama"
                                            id="nama"
                                            class="form-control form-control-modern @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}"
                                            placeholder="Masukkan nama Anda">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label for="email" class="form-label-modern">
                                            Email <span class="required-mark">*</span>
                                        </label>
                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control form-control-modern @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            placeholder="email@domain.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group-modern">
                                        <label for="telepon" class="form-label-modern">No. Telepon</label>
                                        <input
                                            type="text"
                                            name="telepon"
                                            id="telepon"
                                            class="form-control form-control-modern @error('telepon') is-invalid @enderror"
                                            value="{{ old('telepon') }}"
                                            placeholder="08xx-xxxx-xxxx">
                                        @error('telepon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group-modern">
                                        <label for="subjek" class="form-label-modern">
                                            Subjek <span class="required-mark">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="subjek"
                                            id="subjek"
                                            class="form-control form-control-modern @error('subjek') is-invalid @enderror"
                                            value="{{ old('subjek') }}"
                                            placeholder="Tulis subjek pesan">
                                        @error('subjek')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group-modern">
                                        <label for="pesan" class="form-label-modern">
                                            Pesan <span class="required-mark">*</span>
                                        </label>
                                        <textarea
                                            name="pesan"
                                            id="pesan"
                                            rows="6"
                                            class="form-control form-control-modern @error('pesan') is-invalid @enderror"
                                            placeholder="Tulis pesan Anda di sini...">{{ old('pesan') }}</textarea>
                                        @error('pesan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-psht-primary contact-submit-btn">
                                        <i class="bi bi-send me-2"></i>Kirim Pesan
                                    </button>
                                    <div class="form-note">
                                        Pastikan data yang Anda isi sudah benar agar kami dapat merespons dengan lebih cepat.
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- INFO --}}
                <div class="col-lg-5">
                    <div class="contact-info-panel">
                        <div class="section-kicker">Informasi Kontak</div>
                        <h2 class="contact-title">Terhubung dengan Kami</h2>
                        <p class="contact-subtitle">
                            Informasi berikut dapat digunakan untuk menghubungi pengurus rayon secara langsung.
                        </p>

                        <div class="info-stack">
                            @foreach([
                                ['icon' => 'bi-geo-alt-fill', 'color' => 'linear-gradient(135deg,#b91c1c,#991b1b)', 'label' => 'Alamat', 'value' => 'Banjarkemantren, Kec. Buduran, Kab. Sidoarjo, Jawa Timur'],
                                ['icon' => 'bi-telephone-fill', 'color' => 'linear-gradient(135deg,#16a34a,#15803d)', 'label' => 'Telepon', 'value' => '+62 812-3456-7890'],
                                ['icon' => 'bi-envelope-fill', 'color' => 'linear-gradient(135deg,#2563eb,#1d4ed8)', 'label' => 'Email', 'value' => 'psht.banjarkemantren@gmail.com'],
                                ['icon' => 'bi-clock-fill', 'color' => 'linear-gradient(135deg,#d4af37,#b88917)', 'label' => 'Jadwal Latihan', 'value' => 'Selasa, Kamis, Sabtu · 19.30 – Selesai'],
                            ] as $info)
                                <div class="info-item">
                                    <div class="info-icon" style="background: {{ $info['color'] }};">
                                        <i class="bi {{ $info['icon'] }}"></i>
                                    </div>
                                    <div>
                                        <div class="info-label">{{ $info['label'] }}</div>
                                        <p class="info-value">{{ $info['value'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="wa-card">
                            <div class="wa-badge">
                                <i class="bi bi-whatsapp"></i>
                                Respon Cepat
                            </div>

                            <h5>Chat via WhatsApp</h5>
                            <p>
                                Untuk komunikasi yang lebih cepat, Anda dapat langsung menghubungi pengurus
                                melalui WhatsApp resmi rayon.
                            </p>

                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="btn btn-wa-modern w-100">
                                <i class="bi bi-whatsapp me-2"></i>Chat WhatsApp
                            </a>
                        </div>

                        <div class="contact-map-card">
                            <div class="contact-map-frame">
                                <iframe
                                    src="https://www.google.com/maps?q=-7.410397390465276,112.72410508006176&hl=id&z=17&output=embed"
                                    loading="lazy"
                                    allowfullscreen=""
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Lokasi PSHT Rayon Banjarkemantren">
                                </iframe>
                            </div>

                            <a href="https://www.google.com/maps?q=-7.410397390465276,112.72410508006176"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="contact-map-link">
                                <i class="bi bi-geo-alt"></i>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
