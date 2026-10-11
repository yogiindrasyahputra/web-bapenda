<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Sistem Informasi Pajak Hotel Daerah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --page-bg: #efefef;
            --shell-bg: #ffffff;
            --panel-bg: #ffffff;
            --panel-blue: #1d2c63;
            --panel-blue-2: #0d1a3d;
            --brand-yellow: #f0c52d;
            --text-dark: #1b2e4d;
            --text-soft: rgba(27, 46, 77, 0.7);
            --muted: #6f7d89;
            --line: rgba(19, 45, 71, 0.12);
            --field-bg: #f6f7f8;
            --button: #f3c716;
            --button-text: #142b59;
            --toggle-bg: #e8edf3;
            --toggle-dot: #ffffff;
            --toggle-shadow: rgba(26, 38, 58, 0.12);
            --heading: #162b4a;
            --link: #155ea8;
            --icon: #55708d;
            --placeholder: rgba(31, 47, 72, 0.48);
            --focus: #287fc1;
            --shell-border: rgba(19, 45, 71, 0.1);
            --shell-shadow: rgba(27, 46, 77, 0.16);
        }

        body.dark-theme {
            --page-bg: #111827;
            --shell-bg: #0f172a;
            --panel-bg: #111827;
            --panel-blue: #1d2c63;
            --panel-blue-2: #0d1a3d;
            --brand-yellow: #f8d765;
            --text-dark: #edf4ff;
            --text-soft: rgba(237, 244, 255, 0.72);
            --muted: #a8b6c9;
            --line: rgba(148, 163, 184, 0.2);
            --field-bg: #1e293b;
            --button: #f4d34d;
            --button-text: #112038;
            --toggle-bg: #1e293b;
            --toggle-dot: #f8d765;
            --toggle-shadow: rgba(15, 23, 42, 0.55);
            --heading: #f5f8ff;
            --link: #8fc9ff;
            --icon: #a7bdd6;
            --placeholder: rgba(237, 244, 255, 0.5);
            --focus: #65b8f0;
            --shell-border: rgba(148, 163, 184, 0.24);
            --shell-shadow: rgba(2, 8, 23, 0.5);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 0;
            background: radial-gradient(circle at 8% 12%, rgba(240, 197, 45, 0.14), transparent 25%),
                radial-gradient(circle at 92% 88%, rgba(29, 44, 99, 0.12), transparent 30%),
                var(--page-bg);
            font-family: 'DM Sans', sans-serif;
            color: var(--text-dark);
            transition: background 0.25s ease, color 0.25s ease;
        }

        .login-page {
            width: 100vw;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            padding: 84px 5vw 42px;
            background: transparent;
        }

        @keyframes login-fade-up {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes login-shell-in {
            from { opacity: 0; transform: translateY(28px) scale(0.985); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes promo-copy-in {
            from { opacity: 0; transform: translateX(28px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .brand-top { animation: login-fade-up 0.35s 0.02s ease both; }
        .home-link { animation: login-fade-up 0.35s 0.04s ease both; }
        .theme-toggle { animation: login-fade-up 0.35s 0.06s ease both; }

        .login-shell {
            animation: login-shell-in 0.45s 0.04s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .login-panel h1,
        .login-panel form,
        .login-helper,
        .activation {
            animation: login-fade-up 0.35s ease both;
        }

        .login-panel h1 { animation-delay: 0.12s; }
        .login-panel form { animation-delay: 0.16s; }
        .login-helper { animation-delay: 0.2s; }
        .activation { animation-delay: 0.24s; }

        .institution-top { animation: promo-copy-in 0.4s 0.14s ease both; }
        .promo-copy { animation: promo-copy-in 0.4s 0.18s ease both; }
        .promo-footer { animation: login-fade-up 0.35s 0.22s ease both; }

        .brand-top {
            position: absolute;
            top: 28px;
            left: 5vw;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
            font-size: clamp(0.82rem, 1.25vw, 1.2rem);
            font-weight: 900;
            letter-spacing: 0;
            text-transform: uppercase;
            color: var(--text-dark);
            font-family: 'DM Sans', sans-serif;
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 4px 8px rgba(18, 32, 58, 0.1));
        }

        .brand-top .brand-text {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding-left: 13px;
            border-left: 3px solid var(--brand-yellow);
            line-height: 1;
            text-shadow: 0 5px 14px rgba(18, 32, 58, 0.12);
        }

        .brand-top .brand-line-1 {
            color: var(--text-dark);
            font-size: 0.68em;
            font-weight: 700;
            letter-spacing: 0.12em;
        }

        .brand-top .brand-line-2 {
            color: var(--brand-yellow);
            font-size: 1.02em;
            font-weight: 900;
            letter-spacing: 0.025em;
            text-shadow: 0 3px 10px rgba(18, 32, 58, 0.16);
        }

        .home-link {
            position: absolute;
            top: 39px;
            right: calc(5vw + 88px);
            z-index: 5;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--link);
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
        }

        .home-link:hover { color: var(--brand-yellow); transform: translateX(-2px); }

        @media (max-width: 520px) {
            .home-link {
                top: 39px;
                right: 98px;
                font-size: 0.78rem;
            }
        }

        .login-shell {
            position: relative;
            display: grid;
            grid-template-columns: minmax(480px, 0.95fr) minmax(560px, 1.25fr);
            max-width: 1460px;
            min-height: min(840px, calc(100vh - 126px));
            margin: 0 auto;
            width: 100%;
            overflow: hidden;
            background: linear-gradient(145deg, rgba(255,255,255,0.94), rgba(245,247,251,0.9));
            border: 1px solid rgba(20, 43, 89, 0.08);
            border-radius: 32px;
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.14);
            backdrop-filter: blur(12px);
            transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.4s ease, border-radius 0.4s ease;
        }

        .login-shell.is-collapsed {
            grid-template-columns: 1fr;
            max-width: 860px;
            transform: scale(0.985);
            border-radius: 28px;
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.1);
        }

        body.dark-theme .login-shell {
            background: linear-gradient(145deg, rgba(15,23,42,0.96), rgba(17,24,39,0.9));
            border-color: rgba(148,163,184,0.18);
        }

        .login-panel {
            position: relative;
            background: rgba(255,255,255,0.72);
            padding: 112px clamp(52px, 6vw, 110px) 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: background 0.25s ease, padding 0.35s ease;
        }

        .login-shell.is-collapsed .login-panel {
            padding-left: clamp(42px, 7vw, 90px);
            padding-right: clamp(42px, 7vw, 90px);
        }

        body.dark-theme .login-panel {
            background: rgba(15, 23, 42, 0.72);
        }

        .login-panel::before {
            content: "";
            position: absolute;
            top: 62px;
            right: 60px;
            width: 140px;
            height: 140px;
            border-radius: 32px;
            background: radial-gradient(circle, rgba(240,197,45,0.18), transparent 65%);
            filter: blur(10px);
        }

        .login-panel h1 {
            margin: 0 0 18px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 4vw, 4.2rem);
            line-height: 1.02;
            letter-spacing: -0.04em;
            font-weight: 700;
            color: var(--heading);
        }

        .login-lede {
            max-width: 430px;
            margin: -2px 0 30px;
            color: var(--text-soft);
            font-size: 1rem;
            line-height: 1.7;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 18px;
            padding: 8px 14px;
            border-radius: 999px;
            border: 1px solid rgba(21, 94, 168, 0.12);
            background: linear-gradient(135deg, rgba(21,94,168,0.06), rgba(240,197,45,0.1));
            color: var(--link);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f7d454, #f0c52d);
            box-shadow: 0 0 12px rgba(240, 197, 45, 0.8);
        }

        .form-label {
            display: block;
            margin-bottom: 11px;
            font-size: 0.95rem;
            color: var(--muted);
            font-weight: 600;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 24px;
        }

        .input-wrap .icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1rem;
            color: var(--icon);
        }

        .input-wrap input {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 9px;
            background: var(--field-bg);
            padding: 16px 54px 16px 54px;
            font-size: 1rem;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .input-wrap input:focus {
            border-color: var(--focus);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--focus) 16%, transparent);
        }

        .input-wrap input::placeholder {
            color: var(--placeholder);
        }

        .password-wrap {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: var(--icon);
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            padding: 0;
            cursor: pointer;
        }

        .toggle-password svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2; }
        .toggle-password .eye-open { display: none; }
        .toggle-password.is-visible .eye-closed { display: none; }
        .toggle-password.is-visible .eye-open { display: block; }
        .toggle-password:hover, .toggle-password:focus-visible { color: var(--link); outline: none; }

        .login-role-switch {
            position: relative;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
            margin: 0 0 28px;
            padding: 7px;
            border: 1px solid rgba(25, 84, 151, 0.12);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(246,247,248,0.96), rgba(233,237,243,0.94));
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.9), 0 14px 28px rgba(17, 42, 85, 0.08);
            overflow: hidden;
        }

        .login-role-switch::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, rgba(255,255,255,0.58), transparent 30%, rgba(255,255,255,0.15) 70%, transparent);
            pointer-events: none;
        }

        .login-role-tab {
            position: relative;
            z-index: 1;
            border: 0;
            border-radius: 13px;
            padding: 14px 16px;
            font: inherit;
            font-weight: 800;
            letter-spacing: 0.04em;
            color: var(--muted);
            background: transparent;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, color 0.2s ease, background 0.2s ease;
            text-transform: uppercase;
        }

        .login-role-tab:hover,
        .login-role-tab:focus-visible {
            transform: translateY(-1px);
            outline: none;
        }

        .login-role-tab.is-active {
            background: linear-gradient(135deg, rgba(26, 79, 141, 0.12), rgba(240, 197, 45, 0.22));
            color: var(--text-dark);
            box-shadow: inset 0 0 0 1px rgba(21, 94, 168, 0.08), 0 12px 22px rgba(22, 60, 107, 0.12);
            animation: tabPulse 0.3s ease;
        }

        @keyframes tabPulse {
            0% { transform: scale(0.98); }
            60% { transform: scale(1.01); }
            100% { transform: scale(1); }
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 2px 0 28px;
            font-size: 0.96rem;
            color: var(--muted);
        }

        .checkbox {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .checkbox input {
            accent-color: #1a4f8d;
        }

        .link {
            color: var(--link);
            font-weight: 700;
            text-decoration: none;
        }

        .btn-login {
            width: 100%;
            border: 0;
            border-radius: 14px;
            background: linear-gradient(135deg, #f5d758, #f0c52d 40%, #e8b413 100%);
            color: var(--button-text);
            font-weight: 900;
            font-size: 1.08rem;
            letter-spacing: 0.04em;
            padding: 18px 22px;
            cursor: pointer;
            box-shadow: 0 18px 28px rgba(220, 176, 27, 0.28), inset 0 1px 0 rgba(255,255,255,0.48);
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
            text-transform: uppercase;
        }

        .btn-login:hover,
        .btn-login:focus-visible {
            background: linear-gradient(135deg, #f9dc6d, #f3cb34 40%, #efbb0f 100%);
            box-shadow: 0 20px 34px rgba(220, 176, 27, 0.36), inset 0 1px 0 rgba(255,255,255,0.52);
            transform: translateY(-2px);
            filter: saturate(1.08);
            outline: none;
        }

        .social-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 22px 0 14px;
            color: var(--muted);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .social-divider::before,
        .social-divider::after {
            content: "";
            height: 1px;
            flex: 1;
            background: var(--line);
        }

        .login-helper {
            margin-top: 28px;
            text-align: center;
            font-size: 1rem;
            color: var(--muted);
        }

        .login-helper a {
            color: var(--link);
            text-decoration: none;
            font-weight: 700;
        }

        .security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 24px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 0.78rem;
            letter-spacing: 0.02em;
        }

        .security-note::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #2ca66f;
            box-shadow: 0 0 0 4px rgba(44, 166, 111, 0.12);
        }

        .activation {
            margin-top: 18px;
            text-align: center;
            color: var(--link);
            font-size: 1rem;
            font-weight: 600;
        }

        .theme-toggle {
            position: absolute;
            top: 28px;
            right: 5vw;
            z-index: 7;
            width: 74px;
            height: 38px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: var(--toggle-bg);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04), 0 6px 16px var(--toggle-shadow);
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 5px;
            transition: all 0.25s ease;
        }

        .theme-toggle .toggle-knob {
            position: relative;
            z-index: 1;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--toggle-dot);
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
            transition: transform 0.25s ease, background 0.25s ease;
        }

        body.dark-theme .theme-toggle .toggle-knob {
            transform: translateX(36px);
        }

        .theme-toggle .toggle-label {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 9px;
            font-size: 0.78rem;
            color: var(--muted);
            pointer-events: none;
        }

        .promo-panel {
            position: relative;
            background: linear-gradient(135deg, #0e1a3a, #1c2a64);
            min-height: 100%;
            padding: 68px clamp(42px, 5vw, 86px) 38px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
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
            background: linear-gradient(135deg, rgba(4, 10, 28, 0.58), rgba(9, 23, 55, 0.64));
        }

        .promo-slide {
            background-position: center;
            background-size: cover;
            opacity: 0;
            animation: promo-slide-fade 14s infinite;
            will-change: opacity;
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

        .promo-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background: linear-gradient(135deg, rgba(4, 10, 28, 0.38), rgba(9, 23, 55, 0.48));
        }

        .promo-panel::after {
            content: "";
            position: absolute;
            right: -90px;
            top: -80px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.09);
            box-shadow: 0 0 0 42px rgba(255,255,255,0.02), 0 0 0 85px rgba(255,255,255,0.015);
        }

        @keyframes promo-ring-pulse {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.08); opacity: 1; }
        }

        .building {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 72%;
            height: 78%;
            background: linear-gradient(180deg, rgba(255,255,255,0.08), rgba(255,255,255,0.02));
            clip-path: polygon(16% 100%, 16% 25%, 23% 25%, 23% 0%, 31% 0%, 31% 25%, 38% 25%, 38% 12%, 45% 12%, 45% 25%, 52% 25%, 52% 18%, 59% 18%, 59% 25%, 64% 25%, 64% 0%, 72% 0%, 72% 25%, 78% 25%, 78% 100%);
            opacity: 0.8;
        }

        .promo-copy,
        .promo-footer,
        .promo-panel .brand-top {
            position: relative;
            z-index: 1;
        }

        .promo-copy {
            margin-top: auto;
            padding-top: 180px;
        }

        .promo-copy h2 {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 0;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 4.8vw, 5rem);
            line-height: 0.98;
            letter-spacing: 0;
            color: #f5fbff;
            font-weight: 800;
            max-width: 420px;
        }

        .institution-top {
            position: relative;
            z-index: 1;
            max-width: 520px;
            margin-bottom: auto;
            padding-left: 16px;
            border-left: 3px solid var(--brand-yellow);
            color: #f5fbff;
            font-size: clamp(0.86rem, 1.15vw, 1.16rem);
            font-weight: 800;
            letter-spacing: 0.08em;
            line-height: 1.35;
            text-transform: uppercase;
            text-shadow: 0 6px 18px rgba(5, 15, 38, 0.24);
        }

        .institution-top span {
            display: block;
        }

        .institution-top .institution-accent {
            color: var(--brand-yellow);
        }

        .promo-copy .title-kicker {
            margin-bottom: 9px;
            color: var(--brand-yellow);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.22em;
            font-weight: 700;
            letter-spacing: 0.18em;
            line-height: 1;
            text-transform: uppercase;
        }

        .promo-copy .title-main {
            font-weight: 800;
            text-shadow: 0 8px 22px rgba(5, 15, 38, 0.2);
        }

        .promo-copy .title-highlight {
            color: var(--brand-yellow);
            font-weight: 700;
            text-shadow: 0 8px 22px rgba(5, 15, 38, 0.22);
        }

        .promo-copy h2::after {
            content: "";
            display: block;
            width: 72px;
            height: 4px;
            background: var(--brand-yellow);
            margin-top: 24px;
            border-radius: 999px;
            box-shadow: 0 0 18px rgba(240, 197, 45, 0.28);
        }

        .promo-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-top: 18px;
            color: rgba(255,255,255,0.8);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .promo-footer-meta {
            display: block;
            max-width: 280px;
            color: rgba(255,255,255,0.8);
            font-size: 0.68rem;
            line-height: 1.55;
            text-align: right;
            text-transform: none;
        }

        .promo-footer-meta strong,
        .promo-footer-meta span {
            display: block;
        }

        .promo-footer-meta strong {
            color: #fff;
            font-weight: 700;
        }

        .promo-badges {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 54px;
            height: 28px;
            padding: 0 10px;
            border-radius: 999px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        a.badge {
            color: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
        }

        a.badge:hover,
        a.badge:focus-visible {
            background: rgba(255,255,255,0.18);
            border-color: rgba(255,255,255,0.3);
            transform: translateY(-1px);
            outline: none;
        }

        .error-box {
            margin-bottom: 12px;
            padding: 10px 12px;
            border-radius: 6px;
            background: rgba(199, 53, 53, 0.08);
            border: 1px solid rgba(199, 53, 53, 0.18);
            color: #b83d3d;
            font-size: 0.82rem;
            font-weight: 600;
        }

        body.dark-theme .login-shell { background: #0b1222; }
        body.dark-theme .promo-panel { background: linear-gradient(135deg, #050c22, #112356); }
        body.dark-theme .input-wrap input { border-color: rgba(148, 163, 184, 0.26); }
        body.dark-theme .btn-login:hover, body.dark-theme .btn-login:focus-visible { background: #ffe071; }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }

        @media (max-width: 1100px) {
            .login-page {
                padding: 88px 24px 28px;
            }

            .login-shell {
                grid-template-columns: 1fr;
                min-height: 0;
            }

            .login-panel {
                padding: 76px clamp(48px, 10vw, 120px) 64px;
            }

            .promo-panel {
                min-height: 300px;
            }

            .promo-copy {
                padding-top: 40px;
            }
        }

        @media (max-width: 520px) {
            body {
                padding: 0;
            }

            .login-page {
                padding: 78px 12px 18px;
            }

            .brand-top {
                margin-left: 0;
            }

            .login-panel {
                padding: 54px 22px 38px;
            }

            .login-panel h1 {
                margin-bottom: 28px;
                font-size: 2.8rem;
            }

            .promo-panel {
                padding: 22px 18px 18px;
            }
        }
    </style>
</head>
<body>
    <div class="login-page">
        <button class="theme-toggle" type="button" aria-label="Aktifkan tampilan gelap" aria-pressed="false">
            <span class="toggle-label"><span aria-hidden="true">☀</span><span aria-hidden="true">☾</span></span>
            <span class="toggle-knob"></span>
        </button>

        <div class="brand-top">
            <img src="https://cdn.phototourl.com/member/2026-09-09-492110fd-2dae-4e72-a8d1-e42be48c0ba2.png" alt="Logo Salumpat Saindege" class="brand-logo">
            <div class="brand-text">
                <span class="brand-line-1">SISTEM INFORMASI PAJAK HOTEL DAERAH</span>
                <span class="brand-line-2">KOTA PADANGSIDIMPUAN</span>
            </div>
        </div>
        <a href="{{ route('home') }}" class="home-link">← Kembali ke Halaman Utama</a>

        <div class="login-shell" id="loginShell">
            <main class="login-panel">
                <span class="eyebrow">Akses sistem aman</span>
                <h1>Masuk ke Sistem</h1>
                <p class="login-lede">Kelola data pajak hotel daerah dengan akses digital yang sederhana, cepat, dan aman.</p>

                @if ($errors->any())
                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login-role-switch" role="tablist" aria-label="Pilih tipe login">
                        <button type="button" class="login-role-tab is-active" data-role="user" aria-pressed="true">Wajib Pajak</button>
                        <button type="button" class="login-role-tab" data-role="admin" aria-pressed="false">Admin</button>
                    </div>
                    <input type="hidden" name="login_as" id="login_as" value="user">

                    <div>
                        <label class="form-label" for="email">ID Pengguna</label>
                        <div class="input-wrap">
                            <span class="icon">✉</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan ID pengguna" required autofocus>
                        </div>
                    </div>

                    <div>
                        <label class="form-label" for="password">Kata Sandi</label>
                        <div class="input-wrap password-wrap">
                            <span class="icon">🔒</span>
                            <input id="password" type="password" name="password" placeholder="Masukkan kata sandi Anda" required>
                            <button type="button" class="toggle-password" data-target="password" aria-label="Lihat password">
                                <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" value="1">
                            Ingat akun saya
                        </label>
                        <a href="{{ route('password.request') }}" class="link">Lupa kata sandi?</a>
                    </div>

                    <button type="submit" class="btn-login">Masuk</button>
                </form>

                <div class="login-helper">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
                    <br>
                    Belum punya akun admin? <a href="{{ route('register.admin') }}">Daftar sebagai admin</a>
                </div>

                <div class="activation">Aktivasi akun wajib pajak</div>
                <div class="security-note">Koneksi aman untuk menjaga keamanan data Anda</div>
            </main>

            <aside class="promo-panel">
                <div class="promo-slides" aria-hidden="true">
                    <div class="promo-slide"></div>
                    <div class="promo-slide"></div>
                </div>
                <div class="building" aria-hidden="true"></div>
                <div class="institution-top">
                    <span>Badan Pengelolaan Keuangan</span>
                    <span class="institution-accent">dan Pendapatan Daerah</span>
                </div>

                <div class="promo-copy">
                    <h2>
                        <span class="title-kicker">Pelayanan Digital</span>
                        <span class="title-main">Informasi<br>Pajak Hotel</span>
                        <span class="title-highlight">Daerah</span>
                    </h2>
                </div>

                <div class="promo-footer">
                    <div class="promo-badges">
                        <a class="badge" href="https://www.pajak.go.id/id/peraturan" target="_blank" rel="noopener noreferrer" aria-label="Buka halaman Peraturan Pajak">Peraturan</a>
                        <a class="badge" href="https://www.pajak.go.id/reformasi-perpajakan" target="_blank" rel="noopener noreferrer" aria-label="Buka halaman Reformasi Perpajakan">Reformasi</a>
                        <a class="badge" href="https://www.pajak.go.id/" target="_blank" rel="noopener noreferrer" aria-label="Buka situs resmi pajak">Pajak</a>
                    </div>
                    <div class="promo-footer-meta">
                        <strong>© 2026</strong>
                        <span>Jl. Abd. Haris Nasution, Pal IV Pijorkoling</span>
                        <span>Telp. (0634) 27075 &middot; Fax. (0634) 27075</span>
                        <span>Kec. Padangsidimpuan Tenggara, Kota Padangsidimpuan</span>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <script>
        const loginRoleTabs = document.querySelectorAll('.login-role-tab');
        const loginAsInput = document.getElementById('login_as');

        loginRoleTabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                const selectedRole = this.dataset.role;
                loginRoleTabs.forEach(function(item) {
                    const isActive = item === tab;
                    item.classList.toggle('is-active', isActive);
                    item.setAttribute('aria-pressed', String(isActive));
                });
                loginAsInput.value = selectedRole;
                const emailLabel = document.querySelector('.form-label[for="email"]');
                if (emailLabel) {
                    emailLabel.textContent = selectedRole === 'admin' ? 'Email Admin' : 'ID Pengguna';
                }
                const emailInput = document.getElementById('email');
                if (emailInput) {
                    emailInput.placeholder = selectedRole === 'admin' ? 'Masukkan email admin' : 'Masukkan ID pengguna';
                }
            });
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

        const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;

        const applyTheme = function(theme) {
            const isDark = theme === 'dark';
            body.classList.toggle('dark-theme', isDark);
            themeToggle.setAttribute('aria-pressed', String(isDark));
            themeToggle.setAttribute('aria-label', isDark ? 'Aktifkan tampilan terang' : 'Aktifkan tampilan gelap');
            localStorage.setItem('auth-theme', theme);
        };

        const savedTheme = localStorage.getItem('auth-theme') || localStorage.getItem('login-theme') || 'light';
        applyTheme(savedTheme);

        themeToggle.addEventListener('click', function() {
            const nextTheme = body.classList.contains('dark-theme') ? 'light' : 'dark';
            applyTheme(nextTheme);
        });
    </script>
</body>
</html>
