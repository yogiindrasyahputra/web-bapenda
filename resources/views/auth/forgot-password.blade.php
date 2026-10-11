<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi | Sistem Pajak Daerah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #102a4c;
            --blue: #1d2c63;
            --yellow: #f0c52d;
            --muted: #6f7d89;
            --line: rgba(19, 45, 71, 0.14);
            --field: #f6f7f8;
            --page-bg: #e4edf3;
            --card-bg: rgba(255, 255, 255, 0.94);
            --toggle-bg: #e8edf3;
            --toggle-dot: #ffffff;
            --shadow: rgba(17, 45, 68, 0.16);
        }

        body.dark-theme {
            --navy: #edf4ff;
            --blue: #9ebeff;
            --yellow: #f8d765;
            --muted: #a8b6c9;
            --line: rgba(148, 163, 184, 0.24);
            --field: #1e293b;
            --page-bg: #111827;
            --card-bg: rgba(15, 23, 42, 0.94);
            --toggle-bg: #1e293b;
            --toggle-dot: #f8d765;
            --shadow: rgba(0, 0, 0, 0.38);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            position: relative;
            background: radial-gradient(circle at 10% 10%, rgba(240, 197, 45, 0.16), transparent 28%),
                radial-gradient(circle at 90% 90%, rgba(29, 44, 99, 0.16), transparent 32%),
                var(--page-bg);
            color: var(--navy);
            font-family: 'DM Sans', sans-serif;
            transition: background 0.25s ease, color 0.25s ease;
        }

        .theme-toggle {
            position: fixed;
            top: 24px;
            right: 28px;
            z-index: 2;
            width: 64px;
            height: 32px;
            padding: 4px;
            display: flex;
            align-items: center;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: var(--toggle-bg);
            box-shadow: 0 8px 18px var(--shadow);
            cursor: pointer;
        }

        .theme-toggle .toggle-knob {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--toggle-dot);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.25s ease, background 0.25s ease;
        }

        body.dark-theme .theme-toggle .toggle-knob { transform: translateX(32px); }

        .theme-toggle .toggle-label {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            font-size: 0.72rem;
            pointer-events: none;
        }

        .reset-card {
            width: min(470px, 100%);
            padding: 38px 34px 32px;
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 22px;
            box-shadow: 0 24px 50px var(--shadow);
            transition: background 0.25s ease, box-shadow 0.25s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .brand img {
            width: 54px;
            height: 54px;
            padding: 0;
            border-radius: 0;
            background: transparent;
        }

        .brand-text {
            padding-left: 12px;
            border-left: 3px solid var(--yellow);
            font-size: 0.92rem;
            font-weight: 800;
            line-height: 1.18;
            text-transform: uppercase;
        }

        .brand-text span {
            display: block;
            color: var(--yellow);
            font-size: 0.82em;
        }

        h1 { margin: 0 0 10px; font-size: 2rem; letter-spacing: -0.04em; }
        p { margin: 0 0 24px; color: var(--muted); line-height: 1.6; }
        label { display: block; margin-bottom: 8px; color: var(--muted); font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; }
        input { width: 100%; padding: 13px 14px; border: 1px solid var(--line); border-radius: 8px; background: var(--field); color: var(--navy); font: inherit; outline: none; }
        input:focus { border-color: #4776a8; box-shadow: 0 0 0 4px rgba(71, 118, 168, 0.12); }
        button { width: 100%; margin-top: 18px; padding: 13px 18px; border: 0; border-radius: 8px; background: var(--yellow); color: #142b59; font: inherit; font-weight: 800; cursor: pointer; }
        .back { display: block; margin-top: 18px; color: #294d7a; text-align: center; text-decoration: none; font-size: 0.88rem; font-weight: 700; }
        .message, .error { margin-bottom: 18px; padding: 11px 13px; border-radius: 8px; font-size: 0.86rem; }
        .message { background: rgba(31, 157, 117, 0.1); color: #177457; }
        .error { background: rgba(199, 53, 53, 0.08); color: #b83d3d; }

        .theme-toggle:focus-visible,
        input:focus-visible,
        button:focus-visible,
        .back:focus-visible {
            outline: 3px solid rgba(71, 118, 168, 0.35);
            outline-offset: 3px;
        }

        @media (max-width: 520px) {
            body { padding: 72px 16px 20px; }
            .theme-toggle { top: 20px; right: 20px; }
            .reset-card { padding: 30px 22px 26px; }
        }
        @keyframes auth-page-in { from { opacity: 0; transform: translateY(22px) scale(.985); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes auth-float-in { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        body { animation: auth-page-in .7s cubic-bezier(.22, 1, .36, 1) both; }
        .reset-card { animation: auth-page-in .8s .12s cubic-bezier(.22, 1, .36, 1) both; }
        .reset-card > * { animation: auth-float-in .55s .34s ease both; }
        .reset-card > *:nth-child(2) { animation-delay: .44s; }
        .reset-card > *:nth-child(3) { animation-delay: .54s; }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <main class="reset-card">
        <div class="brand">
            <img src="https://cdn.phototourl.com/member/2026-09-09-492110fd-2dae-4e72-a8d1-e42be48c0ba2.png" alt="Logo Salumpat Saindege">
            <div class="brand-text">
                Sistem Informasi Pajak Hotel Daerah
                <span>Kota Padangsidimpuan</span>
            </div>
        </div>

        <h1>Lupa Kata Sandi?</h1>
        <p>Masukkan email akun Anda. Kami akan mengirimkan tautan untuk membuat kata sandi baru.</p>

        @if (session('status'))
            <div class="message">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">{{ $errors->first('email') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">Email Akun</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required autofocus>
            <button type="submit">Kirim Ke Email</button>
        </form>

        <a class="back" href="{{ route('login') }}">Kembali ke halaman login</a>
    </main>

    <button class="theme-toggle" type="button" aria-label="Ganti tema">
        <span class="toggle-label"><span>☀</span><span>☾</span></span>
        <span class="toggle-knob"></span>
    </button>

    <script>
        const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;

        const applyTheme = function(theme) {
            const isDark = theme === 'dark';
            body.classList.toggle('dark-theme', isDark);
            localStorage.setItem('auth-theme', theme);
        };

        const savedTheme = localStorage.getItem('auth-theme') || localStorage.getItem('login-theme') || 'light';
        applyTheme(savedTheme);

        themeToggle.addEventListener('click', function() {
            applyTheme(body.classList.contains('dark-theme') ? 'light' : 'dark');
        });
    </script>
</body>
</html>
