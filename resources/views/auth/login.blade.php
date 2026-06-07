

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | PSHT Banjarkemantren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
        }
        .login-card {
            background: #fff; border-radius: 24px;
            padding: 3rem; width: 100%; max-width: 420px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.4);
        }
        .login-logo {
            width: 72px; height: 72px; border-radius: 20px;
            background: linear-gradient(135deg, #c0392b, #a93226);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 2rem; font-weight: 800;
            margin: 0 auto 1.5rem;
        }
        .form-control { border-radius: 10px; padding: 0.7rem 1rem; border: 1.5px solid #e0e0e0; }
        .form-control:focus { border-color: #c0392b; box-shadow: 0 0 0 3px rgba(192,57,43,0.1); }
        .btn-login {
            background: linear-gradient(135deg, #c0392b, #a93226);
            border: none; color: #fff; font-weight: 700; padding: 0.8rem;
            border-radius: 10px; width: 100%; font-size: 1rem;
            transition: all 0.3s ease;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(192,57,43,0.4); color: #fff; }
        .input-group-text { background: #f8f9fa; border: 1.5px solid #e0e0e0; border-radius: 10px 0 0 10px; }
        .back-link { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.85rem; }
        .back-link:hover { color: #f0a500; }
    </style>
</head>
<body>
    <div class="text-center">
        <div class="login-card">
            <div class="login-logo">🥋</div>
            <h4 class="text-center mb-1" style="font-weight:800;">Panel Admin</h4>
            <p class="text-center text-muted mb-4" style="font-size:0.85rem;">PSHT Rayon Banjarkemantren</p>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-600 text-start d-block" style="font-size:0.88rem;">Email Admin</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope" style="color:#c0392b;"></i></span>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="admin@psht.id" required autofocus
                               style="border-radius:0 10px 10px 0;">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-600 text-start d-block" style="font-size:0.88rem;">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock" style="color:#c0392b;"></i></span>
                        <input type="password" name="password" id="password"
                               class="form-control" placeholder="••••••••" required
                               style="border-radius:0 10px 10px 0;">
                    </div>
                </div>
                <div class="form-check mb-4 text-start">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-muted" for="remember" style="font-size:0.88rem;">Ingat saya</label>
                </div>
                <button type="submit" class="btn-login btn">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Dashboard
                </button>
            </form>
        </div>
        <a href="{{ route('beranda') }}" class="back-link d-block mt-4">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke Website
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
