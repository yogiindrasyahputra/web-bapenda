<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin | PAJAK DAERAH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg1: #edf3f8;
            --bg2: #dfeaf0;
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
            --theme-toggle-bg: rgba(255,255,255,0.72);
            --theme-toggle-shadow: rgba(17, 45, 68, 0.14);
            --theme-toggle-knob: var(--brand-yellow);
            --field-bg: #f6f8f9;
        }

        body.dark-theme {
            --bg1: #0d1728;
            --bg2: #111f35;
            --panel: rgba(15, 23, 42, 0.82);
            --dark: #edf4ff;
            --dark-2: #d7e5f5;
            --brand-yellow: #f8d765;
            --line: rgba(148, 163, 184, 0.24);
            --muted: #a8b6c9;
            --text: #edf4ff;
            --link: #9ebeff;
            --theme-toggle-bg: rgba(15, 23, 42, 0.9);
            --theme-toggle-shadow: rgba(0, 0, 0, 0.32);
            --theme-toggle-knob: #f8d765;
            --field-bg: rgba(15, 23, 42, 0.92);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: 'DM Sans', sans-serif;
            background: radial-gradient(circle at 8% 12%, rgba(240, 197, 45, 0.18), transparent 26%),
                radial-gradient(circle at 92% 88%, rgba(29, 44, 99, 0.16), transparent 32%),
                linear-gradient(135deg, var(--bg1), var(--bg2));
            color: var(--text);
            transition: background 0.25s ease, color 0.25s ease;
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 20;
            width: 62px;
            height: 32px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: var(--theme-toggle-bg);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04), 0 6px 16px var(--theme-toggle-shadow);
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 4px;
            transition: all 0.25s ease;
        }

        .theme-toggle .toggle-knob {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--theme-toggle-knob);
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
            transition: transform 0.25s ease, background 0.25s ease;
        }

        body.dark-theme .theme-toggle .toggle-knob {
            transform: translateX(28px);
        }

        .theme-toggle .toggle-label {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7px;
            font-size: 0.68rem;
            color: var(--muted);
            pointer-events: none;
        }

        .admin-register-shell {
            width: min(1100px, 100%);
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            background: rgba(255,255,255,0.34);
            border: 1px solid rgba(255,255,255,0.72);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(27, 46, 77, 0.16);
        }

        .admin-side {
            position: relative;
            padding: 32px 28px 24px;
            background:
                linear-gradient(135deg, rgba(3, 20, 35, 0.82), rgba(7, 35, 58, 0.72)),
                url('https://cdn.phototourl.com/member/2026-09-18-4251d7ae-ebc7-46c5-bb20-e4358856eee9.jpg') center/cover no-repeat;
            color: #f3f8fb;
            overflow: hidden;
        }

        .admin-side::before,
        .admin-side::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.12);
        }

        .admin-side::before {
            width: 420px;
            height: 420px;
            top: -160px;
            right: -110px;
            box-shadow: 0 0 0 38px rgba(255,255,255,0.02), 0 0 0 86px rgba(255,255,255,0.015);
        }

        .admin-side::after {
            width: 260px;
            height: 260px;
            bottom: -120px;
            left: -40px;
        }

        .brand {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-mark {
            width: 62px;
            height: 62px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            overflow: hidden;
        }

        .brand-mark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 6px;
        }

        .brand-text {
            font-size: 0.96rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            line-height: 1.2;
        }

        .brand-text small {
            display: block;
            margin-top: 6px;
            font-size: 0.96rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.75);
        }

        .side-copy {
            position: relative;
            z-index: 1;
            margin-top: 46px;
        }

        .side-copy .eyebrow {
            display: inline-block;
            padding: 8px 12px;
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

        .side-copy h1 {
            margin: 0;
            max-width: 440px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, 2.7vw, 3.4rem);
            line-height: 1.06;
            letter-spacing: -0.04em;
        }

        .side-copy p {
            margin: 18px 0 0;
            max-width: 420px;
            color: rgba(255,255,255,0.82);
            font-size: 1rem;
            line-height: 1.75;
        }

        .mini-points {
            position: relative;
            z-index: 1;
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .mini-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 14px 12px;
            text-align: center;
        }

        .mini-card strong {
            display: block;
            margin-top: 8px;
            font-size: 1.2rem;
        }

        .mini-card span {
            font-size: 0.7rem;
            opacity: 0.7;
        }

        .promo-service {
            position: relative;
            z-index: 1;
            margin-top: 28px;
        }

        .promo-service .kicker {
            display: inline-block;
            margin-bottom: 10px;
            color: #f7d86f;
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .promo-service h2 {
            margin: 0;
            color: #f8fbff;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 2.6vw, 3rem);
            line-height: 1.04;
            letter-spacing: -0.05em;
            max-width: 380px;
        }

        .promo-service h2 span {
            color: #f7d86f;
        }

        .promo-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .promo-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 74px;
            height: 28px;
            padding: 0 10px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.88);
            text-decoration: none;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .promo-badge:hover,
        .promo-badge:focus-visible {
            background: rgba(255,255,255,0.15);
            transform: translateY(-1px);
            outline: none;
        }

        .admin-footer-info {
            position: relative;
            z-index: 1;
            margin-top: 26px;
            padding-top: 14px;
            border-top: 1px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.82);
            font-size: 0.72rem;
            line-height: 1.6;
        }

        .admin-footer-info strong {
            color: #fff;
            font-weight: 800;
        }

        .form-panel {
            background: rgba(255,255,255,0.82);
            padding: 40px 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.25s ease;
        }

        body.dark-theme .form-panel {
            background: rgba(15, 23, 42, 0.82);
        }

        .form-card {
            width: min(430px, 100%);
            background: rgba(255,255,255,0.92);
            border: 1px solid rgba(19, 45, 71, 0.1);
            border-top: 5px solid var(--brand-yellow);
            border-radius: 18px;
            padding: 28px 24px 20px;
            box-shadow: 0 18px 38px rgba(27, 46, 77, 0.12);
            transition: background 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        body.dark-theme .form-card {
            background: rgba(15, 23, 42, 0.9);
            border-color: rgba(148, 163, 184, 0.18);
            box-shadow: 0 18px 38px rgba(2, 6, 23, 0.42);
        }

        .form-header {
            text-align: center;
            margin-bottom: 22px;
        }

        .form-header h2 {
            margin: 12px 0 8px;
            font-size: 1.7rem;
            letter-spacing: -0.04em;
            color: var(--primary-2);
        }

        .form-header p {
            margin: 0;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .error-box {
            margin-bottom: 18px;
            border-radius: 12px;
            border: 1px solid rgba(197,66,66,0.15);
            background: rgba(197,66,66,0.08);
            color: var(--danger);
            font-size: 0.84rem;
            font-weight: 700;
            padding: 10px 12px;
        }

        form {
            display: grid;
            gap: 16px;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0,1fr));
            gap: 16px;
        }

        .field-group {
            display: grid;
            gap: 8px;
        }

        label {
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .field-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            display: grid;
            place-items: center;
            border-radius: 8px;
            background: rgba(16, 45, 77, 0.04);
            color: var(--muted);
            box-shadow: inset 0 0 0 1px rgba(16,45,77,0.04);
        }

        .field-icon svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        body.dark-theme .input-wrap .field-icon {
            background: rgba(255,255,255,0.04);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04);
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: var(--muted);
            display: grid;
            place-items: center;
            cursor: pointer;
            padding: 0;
        }

        .toggle-password svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2; }
        .toggle-password .eye-open { display: none; }
        .toggle-password.is-visible .eye-closed { display: none; }
        .toggle-password.is-visible .eye-open { display: block; }

        input {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: var(--field-bg);
            padding: 13px 14px 13px 44px;
            font-size: 0.94rem;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, color 0.2s ease;
        }

        input:focus {
            border-color: rgba(15,54,94,0.38);
            box-shadow: 0 0 0 4px rgba(15,54,94,0.09);
        }

        body.dark-theme input:focus {
            border-color: rgba(158, 190, 255, 0.7);
            box-shadow: 0 0 0 4px rgba(158, 190, 255, 0.12);
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .btn-submit {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 13px 18px;
            font-size: 0.95rem;
            font-weight: 800;
            color: #142b59;
            background: var(--brand-yellow);
            box-shadow: 0 14px 22px rgba(220, 176, 27, 0.26);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .btn-submit:hover,
        .btn-submit:focus-visible {
            background: #f7cd22;
            box-shadow: 0 18px 30px rgba(220, 176, 27, 0.34);
            transform: translateY(-2px);
            outline: none;
        }

        .text-link {
            margin-top: 16px;
            text-align: center;
            color: var(--muted);
            font-size: 0.86rem;
        }

        .text-link a {
            color: var(--primary-2);
            font-weight: 800;
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .admin-register-shell {
                grid-template-columns: 1fr;
            }

            .admin-side {
                min-height: 340px;
            }
        }

        @media (max-width: 560px) {
            body { padding: 20px 14px; }
            .theme-toggle {
                top: 12px;
                right: 12px;
                width: 58px;
                height: 30px;
            }
            .field-grid { grid-template-columns: 1fr; }
            .form-panel { padding: 20px 14px; }
            .form-card { padding: 22px 16px; }
        }
    </style>
</head>
<body>
    <button class="theme-toggle" type="button" aria-label="Aktifkan mode gelap" aria-pressed="false">
        <span class="toggle-label"><span aria-hidden="true">☀</span><span aria-hidden="true">☾</span></span>
        <span class="toggle-knob"></span>
    </button>

    <div class="admin-register-shell">
        <aside class="admin-side">
            <div class="brand">
                <div class="brand-mark">
                    <img src="https://cdn.phototourl.com/member/2026-09-09-4f8145f7-0c68-40a0-83ef-c34fcf1fd4e1.png" alt="Logo">
                </div>
                <div class="brand-text">
                    Badan Pengelolaan Keuangan
                    <small>Dan Pendapatan Daerah</small>
                </div>
            </div>

            <div class="side-copy">
                <span class="eyebrow">Registrasi Admin</span>
                <h1>Daftarkan akun admin secara resmi.</h1>
                <p>Form ini hanya untuk administrator yang bertanggung jawab atas pengelolaan data pajak hotel, pemantauan, dan validasi sistem.</p>
            </div>

            <div class="mini-points">
                <div class="mini-card">
                    <span>Verifikasi</span>
                    <strong>100%</strong>
                </div>
                <div class="mini-card">
                    <span>NIK</span>
                    <strong>16 Digit</strong>
                </div>
                <div class="mini-card">
                    <span>Akses</span>
                    <strong>Admin</strong>
                </div>
            </div>

        </aside>

        <main class="form-panel">
            <div class="form-card">
                <div class="form-header">
                    <h2>Buat Akun Admin</h2>
                    <p>Isi data lengkap dan valid untuk proses verifikasi administrator.</p>
                </div>

                @if ($errors->any())
                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.admin.store') }}">
                    @csrf

                    <div class="field-grid">
                        <div class="field-group full-width">
                            <label for="name">Nama Lengkap</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="7" r="4"/></svg>
                                </span>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Ir. Sari Murni" required autofocus>
                            </div>
                        </div>

                        <div class="field-group">
                            <label for="email">Email</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>
                                </span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@instansi.go.id" required>
                            </div>
                        </div>

                        <div class="field-group">
                            <label for="phone">Nomor Telepon</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.06 5.18 2 2 0 0 1 5.05 3h3a2 2 0 0 1 2 1.72l.42 2.1a2 2 0 0 1-.54 1.82L8.3 9.29a16 16 0 0 0 6.41 6.41l.65-.65a2 2 0 0 1 1.82-.54l2.1.42A2 2 0 0 1 19.28 18Z"/></svg>
                                </span>
                                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="0812xxxxxx" required>
                            </div>
                        </div>

                        <div class="field-group full-width">
                            <label for="institution">Instansi / OPD</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><path d="M3 10.5 12 4l9 6.5"/><path d="M5 9.5V19h14V9.5"/><path d="M9 19v-7h6v7"/></svg>
                                </span>
                                <input id="institution" type="text" name="institution" value="{{ old('institution') }}" placeholder="Contoh: Badan Pengelolaan Keuangan dan Pendapatan Daerah" required>
                            </div>
                        </div>

                        <div class="field-group full-width">
                            <label for="position">Jabatan</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><path d="M8 7V6a4 4 0 0 1 8 0v1"/><rect x="3" y="7" width="18" height="12" rx="2"/><path d="M3 12h18"/></svg>
                                </span>
                                <input id="position" type="text" name="position" value="{{ old('position') }}" placeholder="Contoh: Kepala Seksi Pajak Hotel" required>
                            </div>
                        </div>

                        <div class="field-group full-width">
                            <label for="nip">NIP / NIK</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M8 9h8M8 13h5"/></svg>
                                </span>
                                <input id="nip" type="text" name="nip" value="{{ old('nip') }}" placeholder="16-18 digit NIP/NIK" maxlength="18" inputmode="numeric" required>
                            </div>
                        </div>

                        <div class="field-group">
                            <label for="password">Password</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg>
                                </span>
                                <input id="password" type="password" name="password" placeholder="Minimal 8 karakter" required>
                                <button type="button" class="toggle-password" data-target="password" aria-label="Lihat password">
                                    <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                    <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                        </div>

                        <div class="field-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <div class="input-wrap">
                                <span class="field-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg>
                                </span>
                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi password" required>
                                <button type="button" class="toggle-password" data-target="password_confirmation" aria-label="Lihat password">
                                    <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                    <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Daftar Admin</button>
                </form>

                <div class="text-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk sekarang</a>
                </div>
            </div>
        </main>
    </div>

    <script>
        const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;

        const applyTheme = function(theme) {
            const isDark = theme === 'dark';
            body.classList.toggle('dark-theme', isDark);
            themeToggle.setAttribute('aria-pressed', String(isDark));
            themeToggle.setAttribute('aria-label', isDark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap');
            localStorage.setItem('admin-register-theme', theme);
        };

        const savedTheme = localStorage.getItem('admin-register-theme') || 'light';
        applyTheme(savedTheme);

        themeToggle.addEventListener('click', function() {
            const nextTheme = body.classList.contains('dark-theme') ? 'light' : 'dark';
            applyTheme(nextTheme);
        });

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
