<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PAJAK DAERAH')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        :root {
            --ink: #173545;
            --muted: #6f7f8d;
            --line: #e3edf1;
            --mint: #d9f3e5;
            --teal: #0a7d7a;
            --teal-deep: #0d4f57;
            --cream: #edf5f8;
            --coral: #fff1ea;
            --soft: #ffffff;
            --shadow: 0 18px 40px rgba(16, 38, 51, 0.08);
            --shadow-soft: 0 10px 24px rgba(18, 45, 77, 0.05);
            --sidebar-start: #112d4d;
            --sidebar-end: #0d233c;
        }

        * { box-sizing: border-box; }
        html, body { margin: 0; min-height: 100%; }
        body {
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(143, 210, 198, 0.18), transparent 28%),
                linear-gradient(135deg, #e8f0f6 0%, #f4f8fb 35%, #edf3f1 100%);
            font-family: 'DM Sans', sans-serif;
        }
        a { color: inherit; text-decoration: none; }
        button, input, select { font-family: inherit; }
        .app-shell {
            display: flex;
            min-height: 100vh;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(4px);
            padding: 18px 18px 18px 0;
            gap: 18px;
        }
        .sidebar {
            width: 245px;
            background: linear-gradient(180deg, var(--sidebar-start), var(--sidebar-end));
            color: #edf5f4;
            padding: 18px 16px 18px 18px;
            display: flex;
            flex-direction: column;
            border-radius: 0 22px 22px 0;
            border: 1px solid rgba(255,255,255,0.06);
            box-shadow: 16px 0 32px rgba(13, 28, 42, 0.14);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin: 6px 8px 34px;
            padding: 2px 4px;
        }
        .brand-mark {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: linear-gradient(135deg, #f8fafb 0%, #dfeae8 100%);
            color: #0f4e68;
            font-size: 13px;
            font-weight: 800;
            box-shadow: inset 0 0 0 1px rgba(12,51,64,0.05), 0 8px 18px rgba(255,255,255,0.12);
        }
        .brand-name {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.04em;
            line-height: 1.1;
        }
        .brand-name small {
            display: block;
            font-size: 10px;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.02em;
            font-weight: 500;
            margin-top: 3px;
        }
        .sidebar-section-label {
            margin: 18px 8px 10px;
            color: rgba(255,255,255,0.55);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .navigation {
            display: grid;
            gap: 8px;
            margin-top: 6px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            color: rgba(255,255,255,0.8);
            font-size: 15px;
            font-weight: 600;
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }
        .nav-link .nav-icon {
            width: 18px;
            text-align: center;
            opacity: 0.9;
            font-size: 15px;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.06);
            color: #ffffff;
            transform: translateX(2px);
        }
        .nav-link.active {
            background: linear-gradient(135deg, rgba(255,255,255,0.16), rgba(255,255,255,0.08));
            color: #ffffff;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.08), 0 10px 18px rgba(5, 21, 31, 0.18);
        }
        .sidebar-footer {
            margin-top: auto;
            padding: 14px 8px 4px;
        }
        .logout-box {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            background: rgba(255,255,255,0.05);
            padding: 12px 14px;
            border-radius: 10px;
            color: #f4f8f7;
            font-weight: 600;
            border: 0;
        }
        .logout-form {
            width: 100%;
            margin: 0;
        }
        .header-logout-form {
            margin: 0;
        }
        .header-logout-btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(19, 73, 94, 0.08);
            background: #f8fafb;
            color: var(--ink);
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            padding: 0;
            transition: all .2s ease;
        }
        .header-logout-btn:hover {
            background: #eef4f6;
            transform: translateY(-1px);
        }
        .main-content {
            flex: 1;
            min-width: 0;
            padding: 24px 28px 20px;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 18px;
            padding: 8px 10px 0;
        }
        .search-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            min-width: 0;
            max-width: 700px;
            padding: 12px 16px;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(132, 151, 165, 0.16);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(33, 59, 73, 0.04);
        }
        .search-wrap input {
            border: 0;
            outline: none;
            background: transparent;
            width: 100%;
            font-size: 14px;
            color: var(--ink);
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .action-icon {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(136,147,156,0.22);
            background: rgba(255,255,255,0.7);
            color: #5f736e;
            border-radius: 10px;
            position: relative;
        }
        .action-icon .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 12px;
            height: 12px;
            background: #f46b57;
            border-radius: 50%;
            border: 2px solid #fff;
        }
        .profile-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.7);
            border: 1px solid rgba(136,147,156,0.18);
            border-radius: 12px;
            padding: 7px 10px 7px 8px;
        }
        .avatar {
            width: 30px;
            height: 30px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #eabf7a;
            color: #1f3d47;
            font-size: 12px;
            font-weight: 700;
        }
        .profile-name {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }
        .profile-name small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            font-weight: 500;
        }
        .welcome-panel {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0f6b62 0%, #0d4b62 100%);
            color: #fff;
            border-radius: 16px;
            padding: 28px 28px 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }
        .welcome-panel::after {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            right: -90px;
            top: -140px;
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 50%;
            box-shadow: 0 0 0 46px rgba(255,255,255,0.04), 0 0 0 86px rgba(255,255,255,0.03);
        }
        .welcome-content {
            position: relative;
            z-index: 1;
            max-width: 620px;
        }
        .welcome-label {
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.78;
            margin-bottom: 10px;
        }
        .welcome-panel h2 {
            margin: 0 0 8px;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            line-height: 1.1;
        }
        .welcome-panel p {
            margin: 0;
            color: rgba(255,255,255,0.8);
            max-width: 520px;
            font-size: 14px;
            line-height: 1.6;
        }
        .welcome-badge {
            position: absolute;
            right: 36px;
            top: 48%;
            transform: translateY(-50%);
            z-index: 1;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.25);
            display: grid;
            place-items: center;
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            background: rgba(255,255,255,0.04);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(180px, 1fr));
            gap: 18px;
            margin-bottom: 18px;
        }
        .stat-card {
            background: rgba(255,255,255,0.81);
            border: 1px solid rgba(144,159,162,0.14);
            border-radius: 18px;
            padding: 18px 18px 16px;
            box-shadow: var(--shadow-soft);
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }
        .stat-card:hover,
        .panel:hover,
        .mini-panel:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 28px rgba(18, 45, 77, 0.07);
            border-color: rgba(16, 123, 116, 0.14);
        }
        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 18px;
            background: #edf9f0;
            color: #1c826e;
        }
        .stat-icon.alt1 { background: #ebf8fa; color: #1d748f; }
        .stat-icon.alt2 { background: #fef3e6; color: #b66b36; }
        .stat-icon.alt3 { background: #f0ebff; color: #5d5c9b; }
        .stat-card .label {
            margin: 0;
            font-size: 12px;
            color: var(--muted);
            font-weight: 600;
        }
        .stat-card strong {
            display: block;
            margin-top: 10px;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.04em;
        }
        .stat-card small {
            display: inline-block;
            margin-top: 12px;
            font-size: 11px;
            color: #3c8f75;
            font-weight: 700;
        }
        .stat-card small .muted {
            color: var(--muted);
            font-weight: 500;
        }
        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 18px;
            margin-bottom: 18px;
        }
        .panel {
            background: rgba(255,255,255,0.8);
            border: 1px solid rgba(144,159,162,0.14);
            border-radius: 18px;
            padding: 18px 18px 14px;
            box-shadow: var(--shadow-soft);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }
        .panel-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }
        .link-text {
            color: #2e7f82;
            font-size: 11px;
            font-weight: 700;
        }
        .hotel-list {
            display: grid;
            gap: 8px;
        }
        .hotel-row {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-top: 1px solid #eef5f3;
        }
        .hotel-row:first-child { border-top: 0; }
        .hotel-thumb {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #ebf9f1, #d9f0ed);
            color: #2a8767;
            font-size: 18px;
        }
        .hotel-row strong {
            display: block;
            font-size: 14px;
            margin-bottom: 2px;
        }
        .hotel-row span {
            display: block;
            font-size: 12px;
            color: var(--muted);
        }
        .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            background: rgba(24, 171, 118, 0.1);
            color: #2d9f72;
        }
        .map-card {
            min-height: 250px;
            background: linear-gradient(180deg, #edf9f3 0%, #f4f9ff 100%);
            border-radius: 14px;
            border: 1px solid rgba(144,159,162,0.14);
            position: relative;
            overflow: hidden;
        }
        .map-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(47,98,109,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(47,98,109,0.08) 1px, transparent 1px);
            background-size: 26px 26px;
            opacity: 0.7;
        }
        .map-road {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(45,159,114,0.25) 0 8%, transparent 8.4%),
                radial-gradient(circle at 70% 60%, rgba(44,125,144,0.2) 0 9%, transparent 9.5%),
                linear-gradient(120deg, transparent 0 32%, rgba(94,120,143,0.12) 32% 34%, transparent 34% 62%, rgba(94,120,143,0.1) 62% 64%, transparent 64%),
                linear-gradient(25deg, transparent 0 42%, rgba(94,120,143,0.1) 42% 44%, transparent 44% 100%);
        }
        .map-point {
            position: absolute;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            box-shadow: 0 8px 14px rgba(26, 51, 61, 0.18);
        }
        .map-point.green { background: #24a56b; }
        .map-point.orange { background: #f0a14f; }
        .map-point.red { background: #d75c5e; }
        .map-point.blue { background: #2d77d9; }
        .map-point.yellow { background: #f3be2d; }
        .map-point.p1 { left: 28%; top: 38%; }
        .map-point.p2 { left: 48%; top: 56%; }
        .map-point.p3 { left: 60%; top: 35%; }
        .map-point.p4 { left: 70%; top: 58%; }
        .map-point.p5 { left: 36%; top: 68%; }
        .legend-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 12px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }
        .legend-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }
        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }
        .dot.red { background: #d75c5e; }
        .dot.orange { background: #f0a14f; }
        .dot.yellow { background: #f3be2d; }
        .dot.green { background: #24a56b; }
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1.15fr;
            gap: 18px;
        }
        .mini-panel {
            background: rgba(255,255,255,0.8);
            border: 1px solid rgba(144,159,162,0.14);
            border-radius: 18px;
            padding: 18px;
            box-shadow: var(--shadow-soft);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .donut-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 170px;
            position: relative;
        }
        .donut {
            position: relative;
            width: 118px;
            height: 118px;
            border-radius: 50%;
            background: conic-gradient(#ef5d57 0 41%, #f6c22b 41% 74%, #3cc67b 74% 100%);
            display: grid;
            place-items: center;
        }
        .donut::before {
            content: "";
            position: absolute;
            inset: 16px;
            border-radius: 50%;
            background: #fff;
        }
        .donut-center {
            position: absolute;
            text-align: center;
            z-index: 1;
        }
        .donut-center strong {
            display: block;
            font-size: 28px;
            letter-spacing: -0.04em;
        }
        .donut-center span {
            display: block;
            font-size: 11px;
            color: var(--muted);
        }
        .legend-list {
            list-style: none;
            padding: 0;
            margin: 12px 0 0;
            display: grid;
            gap: 8px;
        }
        .legend-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: var(--muted);
        }
        .legend-list span:first-child { display: inline-flex; align-items: center; gap: 8px; }
        .mini-card-list {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }
        .mini-card-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #edf1ef;
            border-radius: 10px;
            padding: 10px 10px;
            background: #fbfdfc;
        }
        .mini-card-item strong { display: block; font-size: 13px; }
        .mini-card-item small { font-size: 11px; color: var(--muted); }
        .mini-card-item .tag {
            font-size: 11px;
            font-weight: 700;
            padding: 5px 8px;
            border-radius: 999px;
            background: rgba(19,110,94,0.09);
            color: #1b6d61;
        }
        .chart-box {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            align-items: end;
            min-height: 126px;
            margin-top: 12px;
        }
        .bar {
            position: relative;
            border-radius: 10px 10px 0 0;
            background: linear-gradient(180deg, #2fa1c8 0%, #225a8e 100%);
            min-height: 50px;
        }
        .bar:nth-child(2) { background: linear-gradient(180deg, #f4c95b 0%, #d99427 100%); }
        .bar:nth-child(3) { background: linear-gradient(180deg, #7dc6b0 0%, #2d9973 100%); }
        .bar:nth-child(4) { background: linear-gradient(180deg, #cde0f9 0%, #7aa5ea 100%); }
        .bar span {
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 10px;
            color: var(--muted);
        }
        .publikasi-list {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }
        .pub-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border: 1px solid #edf1ef;
            border-radius: 10px;
            background: #fbfdfc;
            padding: 10px 10px;
        }
        .pub-row .thumb {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            background: rgba(13,108,94,0.09);
            color: #0f6b62;
            font-size: 16px;
        }
        .pub-row h4 {
            margin: 0;
            font-size: 13px;
        }
        .pub-row small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }
        .pub-row button {
            border: 1px solid rgba(126,146,156,0.18);
            background: #fff;
            border-radius: 8px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        @keyframes global-page-in {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes global-sidebar-in {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes global-card-in {
            from { opacity: 0; transform: translateY(20px) scale(.985); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes global-page-out {
            to { opacity: 0; transform: translateY(8px); }
        }

        .app-shell:not(.dashboard-shell) .card,
        .app-shell:not(.dashboard-shell) .panel,
        .app-shell:not(.dashboard-shell) .mini-panel,
        .app-shell:not(.dashboard-shell) article,
        .app-shell:not(.dashboard-shell) .hotel-summary-card {
            transition: transform .28s cubic-bezier(.22, 1, .36, 1), box-shadow .28s ease;
        }

        .app-shell:not(.dashboard-shell) .card:hover,
        .app-shell:not(.dashboard-shell) .panel:hover,
        .app-shell:not(.dashboard-shell) .mini-panel:hover,
        .app-shell:not(.dashboard-shell) article:hover,
        .app-shell:not(.dashboard-shell) .hotel-summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 34px rgba(18, 45, 77, .12);
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }

        .brand-text {
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.05em;
            line-height: 1.1;
            color: #fff;
        }
        .brand-text small {
            display: block;
            margin-top: 4px;
            font-size: 10px;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.02em;
            font-weight: 500;
        }
        .nav-group {
            display: grid;
            gap: 8px;
        }
        .nav-title {
            margin: 18px 8px 10px;
            color: rgba(255,255,255,0.55);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .main-panel {
            flex: 1;
            min-width: 0;
            padding: 4px 0 0;
        }
        .menu-toggle {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: rgba(255,255,255,0.8);
            border: 1px solid rgba(136,147,156,0.18);
            color: #1a3b49;
            font-size: 20px;
        }
        .search-box {
            flex: 1;
            min-width: 0;
            max-width: 680px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(138,155,166,0.18);
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(26,41,47,0.02);
        }
        .search-box span {
            color: #60777b;
            font-size: 18px;
        }
        .search-box input {
            border: 0;
            background: transparent;
            outline: none;
            width: 100%;
            color: var(--ink);
            font-size: 14px;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .icon-box {
            position: relative;
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: rgba(255,255,255,0.8);
            border: 1px solid rgba(136,147,156,0.18);
            color: #566a6d;
            font-size: 17px;
        }
        .icon-box .dot {
            position: absolute;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #f46858;
            top: -2px;
            right: -2px;
            border: 2px solid #fff;
        }
        .profile-box {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 12px 6px 8px;
            border: 1px solid rgba(136,147,156,0.18);
            border-radius: 12px;
            background: rgba(255,255,255,0.78);
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #f2d38d, #d6a85b);
            color: #1e3b47;
            font-size: 12px;
            font-weight: 800;
        }
        .user-avatar.profile-photo {
            object-fit: cover;
        }
        .profile-name {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }
        .profile-name small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            font-weight: 500;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin: 12px 0 20px;
        }
        .welcome-text {
            display: flex;
            align-items: baseline;
            gap: 8px;
            flex-wrap: wrap;
        }
        .welcome-text span {
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
        }
        .welcome-text strong {
            font-size: 15px;
            font-weight: 800;
            letter-spacing: -0.02em;
        }
        .date-box {
            text-align: right;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            padding: 10px 14px;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(136,147,156,0.18);
            border-radius: 12px;
        }
        .date-box strong {
            display: block;
            color: var(--ink);
            font-size: 13px;
            margin-bottom: 2px;
        }
        .stat-head {
            margin-bottom: 12px;
        }
        .stat-icon.icon-blue { background: #edf7ff; color: #1d7db4; }
        .stat-icon.icon-green { background: #ebfbf0; color: #1f9b6d; }
        .stat-icon.icon-red { background: #fff0ee; color: #d86157; }
        .stat-icon.icon-purple { background: #f0eeff; color: #5e5ca8; }
        .meta {
            display: inline-block;
            margin-top: 12px;
            font-size: 11px;
            font-weight: 700;
            color: #1c8b62;
        }
        .panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }
        .panel-head h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }
        .panel-head a {
            color: #2d7d88;
            font-size: 11px;
            font-weight: 700;
        }
        .hotel-list {
            display: grid;
            gap: 8px;
        }
        .hotel-item {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-top: 1px solid #eef5f3;
        }
        .hotel-item:first-child { border-top: 0; }
        .hotel-thumb {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #ebf9f1, #d9f0ed);
            color: #2a8767;
            font-size: 18px;
        }
        .hotel-item strong {
            display: block;
            font-size: 14px;
            margin-bottom: 2px;
        }
        .hotel-item span {
            display: block;
            font-size: 12px;
            color: var(--muted);
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            background: rgba(24, 171, 118, 0.1);
            color: #2d9f72;
        }
        .main-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 18px;
            margin-bottom: 18px;
        }
        .map-card {
            position: relative;
            min-height: 260px;
            border-radius: 14px;
            border: 1px solid rgba(144,159,162,0.14);
            background: linear-gradient(180deg, #edf9f3 0%, #f4f9ff 100%);
            overflow: hidden;
        }
        .map-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(47,98,109,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(47,98,109,0.08) 1px, transparent 1px);
            background-size: 28px 28px;
            opacity: 0.7;
        }
        .map-road {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(45,159,114,0.25) 0 8%, transparent 8.4%),
                radial-gradient(circle at 70% 60%, rgba(44,125,144,0.2) 0 9%, transparent 9.5%),
                linear-gradient(120deg, transparent 0 32%, rgba(94,120,143,0.12) 32% 34%, transparent 34% 62%, rgba(94,120,143,0.1) 62% 64%, transparent 64%),
                linear-gradient(25deg, transparent 0 42%, rgba(94,120,143,0.1) 42% 44%, transparent 44% 100%);
        }
        .map-pin {
            position: absolute;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            box-shadow: 0 8px 14px rgba(26, 51, 61, 0.18);
        }
        .map-pin.pin-green { background: #24a56b; }
        .map-pin.pin-blue { background: #2d77d9; }
        .map-pin.pin-yellow { background: #f3be2d; }
        .map-pin.pin-red { background: #d75c5e; }
        .pin1 { left: 30%; top: 40%; }
        .pin2 { left: 52%; top: 64%; }
        .pin3 { left: 65%; top: 34%; }
        .pin4 { left: 72%; top: 58%; }
        .pin5 { left: 38%; top: 70%; }
        .map-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 12px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }
        .legend-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }
        .legend-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
        .add-hotel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 16px;
            padding: 11px 16px;
            border-radius: 10px;
            background: linear-gradient(135deg, #0f6b62, #0d4f57);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1.15fr;
            gap: 18px;
        }
        .donut-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 170px;
            position: relative;
        }
        .donut {
            position: relative;
            width: 118px;
            height: 118px;
            border-radius: 50%;
            background: conic-gradient(#ef5d57 0 41%, #f6c22b 41% 74%, #3cc67b 74% 100%);
            display: grid;
            place-items: center;
        }
        .donut::before {
            content: "";
            position: absolute;
            inset: 16px;
            border-radius: 50%;
            background: #fff;
        }
        .donut-center {
            position: absolute;
            z-index: 1;
            text-align: center;
        }
        .donut-center strong {
            display: block;
            font-size: 28px;
            letter-spacing: -0.04em;
        }
        .donut-center span {
            display: block;
            font-size: 11px;
            color: var(--muted);
        }
        .legend-list {
            list-style: none;
            padding: 0;
            margin: 12px 0 0;
            display: grid;
            gap: 8px;
        }
        .legend-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: var(--muted);
        }
        .legend-list span:first-child {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .mini-list {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }
        .mini-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border: 1px solid #edf1ef;
            border-radius: 10px;
            background: #fbfdfc;
            padding: 10px;
        }
        .mini-item strong {
            display: block;
            font-size: 13px;
        }
        .mini-item small {
            display: block;
            margin-top: 4px;
            font-size: 11px;
            color: var(--muted);
        }
        .tag {
            font-size: 11px;
            font-weight: 700;
            padding: 5px 8px;
            border-radius: 999px;
            background: rgba(19,110,94,0.09);
            color: #1b6d61;
        }
        .bar-chart {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            align-items: end;
            min-height: 126px;
            margin-top: 12px;
        }
        .bar {
            position: relative;
            border-radius: 10px 10px 0 0;
            background: linear-gradient(180deg, #2fa1c8 0%, #225a8e 100%);
            min-height: 50px;
        }
        .bar:nth-child(2) { background: linear-gradient(180deg, #f4c95b 0%, #d99427 100%); }
        .bar:nth-child(3) { background: linear-gradient(180deg, #7dc6b0 0%, #2d9973 100%); }
        .bar:nth-child(4) { background: linear-gradient(180deg, #cde0f9 0%, #7aa5ea 100%); }
        .pub-list {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }
        .pub-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border: 1px solid #edf1ef;
            border-radius: 10px;
            background: #fbfdfc;
            padding: 10px;
        }
        .pub-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .pub-thumb {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            background: rgba(13,108,94,0.09);
            color: #0f6b62;
            font-size: 16px;
        }
        .pub-item strong {
            display: block;
            font-size: 13px;
        }
        .pub-item small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }
        .pub-item button {
            border: 1px solid rgba(126,146,156,0.18);
            background: #fff;
            border-radius: 8px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 700;
        }
        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            background: rgba(255,255,255,0.05);
            padding: 12px 14px;
            border-radius: 10px;
            color: #f4f8f7;
            font-weight: 600;
            border: 0;
            cursor: pointer;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.1);
        }

        @media (max-width: 1100px) {
            .stats-grid { grid-template-columns: repeat(2, minmax(180px, 1fr)); }
            .bottom-grid { grid-template-columns: repeat(2, minmax(220px, 1fr)); }
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 820px) {
            .app-shell { display: block; }
            .sidebar { width: 100%; padding: 16px 14px 10px; }
            .brand { margin-bottom: 18px; }
            .navigation { grid-template-columns: repeat(2, minmax(120px, 1fr)); }
            .sidebar-footer { display: none; }
            .main-content { padding: 20px 18px; }
            .welcome-badge { display: none; }
        }
        @media (max-width: 560px) {
            .topbar { flex-wrap: wrap; }
            .search-wrap { width: 100%; max-width: none; }
            .topbar-right { width: 100%; justify-content: space-between; }
            .stats-grid, .bottom-grid { grid-template-columns: 1fr; }
            .navigation { grid-template-columns: 1fr; }
            .panel-header { flex-wrap: wrap; }
        }
    </style>
    @yield('extra_css')
    @yield('meta')
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra_js')
</body>
</html>
