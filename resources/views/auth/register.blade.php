<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | PAJAK DAERAH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg1: #f5f8fb;
            --bg2: #e5edf3;
            --panel: rgba(255,255,255,0.8);
            --dark: #102d4d;
            --dark-2: #0a2036;
            --brand-yellow: #f0c52d;
            --primary: #0a7c76;
            --primary-2: #0d4e64;
            --line: rgba(17, 49, 68, 0.1);
            --muted: #6a7b88;
            --text: #173548;
            --link: #294d7a;
            --error: #d9534f;
            --success: #1f9d75;
            --field-bg: #f7f9fb;
            --icon: #8092a3;
        }

        body.dark-theme {
            --bg1: #111827;
            --bg2: #0f172a;
            --panel: rgba(15, 23, 42, 0.84);
            --dark: #edf4ff;
            --dark-2: #d7e5f5;
            --brand-yellow: #f8d765;
            --line: rgba(148, 163, 184, 0.24);
            --muted: #a8b6c9;
            --text: #edf4ff;
            --link: #9ebeff;
            --field-bg: #18263a;
            --primary: #62c5b8;
            --primary-2: #eff6ff;
            --icon: #a8b6c9;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: radial-gradient(circle at 8% 12%, rgba(240, 197, 45, 0.18), transparent 26%),
                radial-gradient(circle at 92% 88%, rgba(29, 44, 99, 0.16), transparent 32%),
                linear-gradient(135deg, var(--bg1), var(--bg2));
            color: var(--text);
            display: grid;
            place-items: center;
            padding: 48px 24px 30px;
            transition: background 0.25s ease, color 0.25s ease;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            z-index: -1;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            filter: blur(4px);
            pointer-events: none;
        }

        body::before {
            top: -150px;
            left: -100px;
            background: rgba(240, 197, 45, 0.13);
        }

        body::after {
            right: -120px;
            bottom: -160px;
            background: rgba(22, 127, 122, 0.12);
        }

        .auth-shell {
            width: min(1180px, 100%);
            display: grid;
            grid-template-columns: 1.02fr 0.98fr;
            background: rgba(255,255,255,0.34);
            border: 1px solid rgba(255,255,255,0.72);
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 32px 90px rgba(27, 46, 77, 0.18), 0 8px 24px rgba(27, 46, 77, 0.06);
            backdrop-filter: blur(18px);
        }

        body.dark-theme .auth-shell {
            background: rgba(15, 23, 42, 0.72);
            border-color: rgba(148, 163, 184, 0.2);
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.34);
        }

        .promo {
            position: relative;
            background: linear-gradient(160deg, rgba(16,45,77,.96), rgba(10,32,54,.98));
            color: #f3f8fb;
            min-height: 700px;
            padding: 42px 42px 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .promo-slides,
        .promo-slide {
            position: absolute;
            inset: 0;
        }

        .promo-slides {
            z-index: 0;
        }

        .promo-slides::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(135deg, rgba(4, 10, 28, 0.56), rgba(9, 23, 55, 0.62));
        }

        .promo-slide {
            background-position: center;
            background-size: cover;
            opacity: 0;
            animation: promo-slide-fade 14s infinite;
        }

        .promo-slide:nth-child(1) {
            background-image: url('https://cdn.phototourl.com/member/2026-09-10-324a836c-4738-42e9-9988-475680f4f944.jpg');
        }

        .promo-slide:nth-child(2) {
            background-image: url('https://cdn.phototourl.com/member/2026-09-10-c4cf3ccf-be10-46fa-a8d1-88159cdd4b2e.jpg');
            animation-delay: 7s;
        }

        @keyframes promo-slide-fade {
            0%, 42% { opacity: 1; }
            50%, 92% { opacity: 0; }
            100% { opacity: 1; }
        }

        .promo::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 50%;
            right: -90px;
            top: -110px;
            box-shadow: 0 0 0 44px rgba(255,255,255,0.02), 0 0 0 88px rgba(255,255,255,0.015);
        }

        .promo::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 25%, rgba(4, 14, 28, .24));
            pointer-events: none;
        }

        .brand {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-mark {
            width: 68px;
            height: 68px;
            flex: 0 0 68px;
        }

        .brand-mark img { display: block; width: 100%; height: 100%; object-fit: contain; }

        .brand-text {
            max-width: 340px;
            font-size: 0.98rem;
            font-weight: 800;
            letter-spacing: 0.055em;
            text-transform: uppercase;
            line-height: 1.15;
            color: #f8fbfc;
        }

        .brand-text small {
            display: block;
            font-size: 0.62rem;
            letter-spacing: 0.06em;
            color: #a9e5d9;
            opacity: 1;
            text-transform: none;
            margin-top: 4px;
        }

        .promo-content {
            position: relative;
            z-index: 1;
            max-width: 500px;
            margin-top: 72px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 13px;
            border-radius: 999px;
            border: 1px solid rgba(240,197,45,0.5);
            background: rgba(240,197,45,0.14);
            color: #ffe58a;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .eyebrow::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--brand-yellow);
            box-shadow: 0 0 0 4px rgba(240,197,45,.14);
        }

        .promo-content h1 {
            max-width: 480px;
            margin: 0 0 16px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 4.2vw, 3.75rem);
            line-height: 1.08;
            letter-spacing: -0.045em;
            color: #ffffff;
            text-shadow: 0 3px 12px rgba(3, 15, 32, 0.7);
        }

        .promo-content p {
            max-width: 430px;
            margin: 0;
            color: rgba(255,255,255,0.82);
            font-size: 0.98rem;
            line-height: 1.8;
            text-shadow: 0 2px 8px rgba(3, 15, 32, 0.7);
        }

        .mini-points {
            position: relative;
            z-index: 1;
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0,1fr));
            gap: 10px;
        }

        .mini-card {
            background: linear-gradient(145deg, rgba(255,255,255,.09), rgba(255,255,255,.035));
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 18px;
            padding: 16px 12px;
            text-align: center;
            backdrop-filter: blur(8px);
            transition: transform .25s ease, background .25s ease, border-color .25s ease;
        }

        .mini-card:hover {
            transform: translateY(-3px);
            background: rgba(255,255,255,.11);
            border-color: rgba(255,255,255,.22);
        }

        .mini-card strong {
            display: grid;
            width: 38px;
            height: 38px;
            margin: 0 auto 10px;
            place-items: center;
            border: 1px solid rgba(240,197,45,.3);
            border-radius: 12px;
            background: rgba(240,197,45,.12);
            color: #ffe58a;
        }

        .mini-card strong svg {
            width: 19px;
            height: 19px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .mini-card span {
            display: block;
            color: rgba(255,255,255,.76);
            font-size: 0.7rem;
            font-weight: 600;
        }

        .form-panel {
            background: rgba(255,255,255,0.78);
            padding: 52px 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body.dark-theme .form-panel { background: rgba(15, 23, 42, 0.84); }

        .form-card {
            width: min(430px, 100%);
            background: rgba(255,255,255,0.96);
            border: 1px solid rgba(19, 45, 71, 0.08);
            border-top: 3px solid var(--brand-yellow);
            border-radius: 26px;
            padding: 38px 34px 28px;
            box-shadow: 0 26px 58px rgba(27, 46, 77, 0.12), 0 4px 12px rgba(27, 46, 77, 0.04);
        }

        body.dark-theme .form-card {
            background: rgba(15, 23, 42, 0.94);
            border-color: rgba(148, 163, 184, 0.2);
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-kicker {
            display: inline-block;
            margin-bottom: 12px;
            color: var(--primary);
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .badge {
            width: 72px;
            height: 72px;
            margin: 0 auto;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: linear-gradient(135deg, var(--brand-yellow), #f8dc68);
            border-radius: 22px;
            color: var(--dark);
            box-shadow: 0 10px 20px rgba(220, 176, 27, 0.24);
        }

        .badge img { display: block; width: 100%; height: 100%; padding: 5px; object-fit: contain; border-radius: inherit; }

        .form-header h2 {
            margin: 0 0 9px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 3vw, 2.15rem);
            letter-spacing: -0.05em;
            color: var(--primary-2);
        }

        .form-header p {
            max-width: 320px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.65;
        }

        .field-group {
            display: grid;
            gap: 8px;
            margin-bottom: 16px;
        }

        label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.025em;
            color: var(--text);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap span {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--icon);
            display: grid;
            place-items: center;
        }

        .input-wrap span svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--muted);
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            cursor: pointer;
            padding: 0;
            border-radius: 8px;
            transition: color .2s ease, background .2s ease;
        }

        .toggle-password:hover { color: var(--primary); background: rgba(22,127,122,.08); }

        .toggle-password svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2; }
        .toggle-password .eye-open { display: none; }
        .toggle-password.is-visible .eye-closed { display: none; }
        .toggle-password.is-visible .eye-open { display: block; }

        input {
            width: 100%;
            border: 1px solid var(--line);
            background: var(--field-bg);
            border-radius: 14px;
            padding: 15px 46px 15px 44px;
            color: var(--text);
            font-family: inherit;
            font-size: 0.92rem;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease, transform .2s ease;
        }

        input::placeholder {
            color: #9aa8b5;
            opacity: 1;
        }

        input:hover {
            border-color: rgba(17,49,68,.22);
        }

        body.dark-theme input {
            color: var(--text);
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(22, 127, 122, 0.12);
            background: var(--panel);
            transform: translateY(-1px);
        }

        .btn-submit {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 15px 18px;
            font-family: inherit;
            font-size: 0.92rem;
            font-weight: 800;
            color: #142b59;
            background: linear-gradient(135deg, #f5d457, #edbf21);
            box-shadow: 0 14px 22px rgba(220, 176, 27, 0.26);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
        }

        .btn-submit:hover,
        .btn-submit:focus-visible {
            filter: saturate(1.08) brightness(1.02);
            box-shadow: 0 18px 30px rgba(220, 176, 27, 0.34);
            transform: translateY(-2px);
            outline: none;
        }

        .error-box {
            background: rgba(217, 83, 79, 0.08);
            border: 1px solid rgba(217, 83, 79, 0.16);
            color: var(--error);
            border-radius: 12px;
            padding: 10px 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .text-link {
            margin-top: 16px;
            text-align: center;
            color: var(--muted);
            font-size: 0.85rem;
        }

        .text-link a {
            color: var(--link);
            font-weight: 700;
            text-decoration: none;
            transition: color .2s ease;
        }

        .text-link a:hover { color: var(--primary); text-decoration: underline; text-underline-offset: 3px; }

        .form-note {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
            color: var(--muted);
            font-size: 0.75rem;
            line-height: 1.5;
        }

        .promo-footer {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,.14);
            color: rgba(255,255,255,.66);
            font-size: .74rem;
        }

        .promo-footer strong { color: #fff; font-weight: 700; }

        input:focus-visible,
        button:focus-visible,
        .text-link a:focus-visible {
            outline: 3px solid rgba(71, 118, 168, 0.35);
            outline-offset: 3px;
        }

        @media (max-width: 900px) {
            body { padding: 36px 20px 24px; }
            .auth-shell {
                grid-template-columns: 1fr;
            }

            .promo {
                min-height: 0;
                padding: 34px 38px 28px;
            }

            .promo-content {
                margin-top: 42px;
            }

            .form-panel {
                padding: 40px 28px;
            }
        }

        @media (max-width: 520px) {
            body { padding: 26px 14px 18px; }
            .auth-shell { border-radius: 24px; }
            .promo { padding: 26px 22px 22px; }
            .brand { gap: 11px; }
            .brand-mark { width: 54px; height: 54px; flex-basis: 54px; }
            .brand-text { font-size: .76rem; letter-spacing: .035em; }
            .brand-text small { font-size: .58rem; }
            .promo-content { margin-top: 34px; }
            .promo-content h1 { font-size: clamp(2.25rem, 10vw, 3.15rem); }
            .promo-content p { font-size: .9rem; }
            .mini-points { margin-top: 24px; gap: 7px; }
            .mini-card { padding: 12px 5px; border-radius: 14px; }
            .mini-card strong { width: 34px; height: 34px; margin-bottom: 8px; }
            .mini-card span { font-size: .62rem; }
            .form-panel { padding: 22px 14px; }
            .form-card { padding: 30px 20px 22px; border-radius: 20px; }
            .promo-footer { align-items: flex-start; flex-direction: column; gap: 5px; }
        }
        @media (max-width: 360px) {
            .promo { padding-right: 17px; padding-left: 17px; }
            .form-panel { padding-right: 10px; padding-left: 10px; }
            .form-card { padding-right: 16px; padding-left: 16px; }
        }
        @keyframes register-page-in { from { opacity: 0; transform: translateY(22px) scale(.985); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes register-copy-in { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        .auth-shell { animation: register-page-in .8s cubic-bezier(.22, 1, .36, 1) both; }
        .promo { animation: register-copy-in .75s .18s ease both; }
        .form-panel { animation: register-page-in .75s .28s ease both; }
        .form-card > * { animation: register-page-in .55s .46s ease both; }
        .form-card > *:nth-child(2) { animation-delay: .54s; }
        .form-card > *:nth-child(3) { animation-delay: .62s; }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body class="dark-theme">

    <div class="auth-shell">
        <aside class="promo">
            <div class="promo-slides" aria-hidden="true">
                <div class="promo-slide"></div>
                <div class="promo-slide"></div>
            </div>
            <div>
                <div class="brand">
                    <div class="brand-mark"><img src="https://cdn.phototourl.com/member/2026-09-09-4f8145f7-0c68-40a0-83ef-c34fcf1fd4e1.png" alt="Logo Salumpat Saindege"></div>
                    <div class="brand-text">
                        Badan Pengelolaan Keuangan Dan Pendapatan Daerah
                        <small>Sistem Informasi Perpajakan</small>
                    </div>
                </div>

                <div class="promo-content">
                    <span class="eyebrow">Mulai Perjalanan</span>
                    <h1>Kelola pajak dengan lebih <em>tenang</em> dan terarah.</h1>
                    <p>Buat akun baru untuk melihat data hotel, pengaduan, dan laporan dalam satu ruang kerja yang rapi.</p>
                </div>

                <div class="mini-points" aria-label="Keunggulan sistem">
                    <div class="mini-card">
                        <strong><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v7c0 1.7 3.6 3 8 3 1.2 0 2.3-.1 3.3-.3M20 5v4M4 12v7c0 1.7 3.6 3 8 3 1.4 0 2.7-.2 3.8-.4"/><path d="M16.5 15.5 20 19l-4 3"/></svg></strong>
                        <span>Data terpusat</span>
                    </div>
                    <div class="mini-card">
                        <strong><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v3M5.6 5.6l2.1 2.1M3 12h3M5.6 18.4l2.1-2.1M12 18v3M18.4 18.4l-2.1-2.1M18 12h3M18.4 5.6l-2.1 2.1"/><circle cx="12" cy="12" r="5"/></svg></strong>
                        <span>Proses mudah</span>
                    </div>
                    <div class="mini-card">
                        <strong><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v5c0 4.5 2.9 8.3 7 10 4.1-1.7 7-5.5 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/></svg></strong>
                        <span>Akses aman</span>
                    </div>
                </div>
            </div>

            <div class="promo-footer">
                <span>Portal resmi <strong>PAJAK DAERAH</strong></span>
                <span>© {{ date('Y') }} BPKPD</span>
            </div>
        </aside>

        <main class="form-panel">
            <div class="form-card">
                <div class="form-header">
                    <span class="form-kicker">Registrasi Pengguna</span>
                    <h2>Buat Akun Anda</h2>
                    <p>Buat akun baru untuk memulai pengelolaan pajak yang lebih tertata.</p>
                </div>

                @if ($errors->any())
                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-wrap">
                            <span aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M5 21v-2a7 7 0 0 1 14 0v2"/></svg></span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" autocomplete="name" required autofocus>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="email">Email</label>
                        <div class="input-wrap">
                            <span aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <span aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"/></svg></span>
                            <input id="password" type="password" name="password" placeholder="Minimal 8 karakter" autocomplete="new-password" required>
                            <button type="button" class="toggle-password" data-target="password" aria-label="Lihat password">
                                <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-wrap">
                            <span aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"/></svg></span>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi password" autocomplete="new-password" required>
                            <button type="button" class="toggle-password" data-target="password_confirmation" aria-label="Lihat password">
                                <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Buat Akun</button>
                </form>

                <div class="text-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
                <div class="form-note">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 3 5 6v5c0 4.5 2.9 8.3 7 10 4.1-1.7 7-5.5 7-10V6l-7-3Z"/><path d="m9.5 12 1.7 1.7 3.5-3.5"/></svg>
                    Data Anda dilindungi dan hanya digunakan untuk kebutuhan layanan perpajakan daerah.
                </div>
            </div>
        </main>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function(button) {
            button.addEventListener('click', function() {
                const target = document.getElementById(this.dataset.target);
                const isPassword = target.type === 'password';
                target.type = isPassword ? 'text' : 'password';
                this.classList.toggle('is-visible', isPassword);
                this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Lihat password');
            });
        });
    </script>
</body>
</html>
