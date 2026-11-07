@extends('layouts.app')

@section('title', 'Struktur Organisasi | PAJAK DAERAH')

@section('content')
<div class="org-page">
    <header class="org-hero">
        <div>
            <a href="{{ route('dashboard') }}" class="org-back">&#8592; Kembali ke dashboard</a>
            <span class="org-eyebrow">PROFIL ORGANISASI</span>
            <h1>Struktur Organisasi</h1>
            <p>Badan Pengelolaan Keuangan dan Pendapatan Daerah</p>
        </div>
        <div class="org-hero-actions">
            <button class="org-theme-toggle" type="button" id="org-theme-toggle" aria-label="Aktifkan mode gelap" aria-pressed="false"><span aria-hidden="true">☾</span><b>Mode gelap</b></button>
        </div>
    </header>

    <main class="org-content">
        <div class="org-intro">
            <div>
                <span class="org-section-label">PETA KEWENANGAN</span>
                <h2>Susunan perangkat kerja</h2>
            </div>
            <p>Struktur ini menggambarkan alur koordinasi pimpinan, sekretariat, bidang teknis, dan unit pelaksana teknis daerah.</p>
        </div>

        <div class="org-overview">
            <div class="org-overview-card"><strong>01</strong><span>Pimpinan badan</span></div>
            <div class="org-overview-card"><strong>05</strong><span>Bidang teknis</span></div>
            <div class="org-overview-card"><strong>10</strong><span>Subbidang</span></div>
            <div class="org-overview-card"><strong>01</strong><span>Unit pelaksana</span></div>
            <div class="org-legend" aria-label="Legenda struktur"><span><i class="legend-dot legend-lead"></i>Pimpinan</span><span><i class="legend-dot legend-field"></i>Bidang</span><span><i class="legend-dot legend-unit"></i>Unit kerja</span></div>
        </div>

        <section class="org-chart" aria-label="Bagan struktur organisasi">
            <div class="org-chart-heading"><span>ORGANIGRAM</span><small>Alur koordinasi dan pembagian kerja</small></div>
            <div class="org-node org-head-node">
                <span class="org-node-kicker">KEPALA BADAN</span>
                <strong>ADY SUPRIADI, S.E., M.M</strong>
            </div>
            <div class="org-connector org-connector-main" aria-hidden="true"></div>
            <div class="org-node org-secretary-node">
                <span class="org-node-kicker">SEKRETARIAT</span>
                <strong>PAWITNO, S.Pi</strong>
            </div>
            <div class="org-secretary-support">
                <div class="org-node org-small-node"><strong>Kelompok Jabatan Fungsional</strong></div>
                <div class="org-node org-unit-node"><span class="org-node-kicker">SUBBAGIAN UMUM DAN KEPEGAWAIAN</span><strong>HJ. ROSTIMEGAWATI HARAHAP</strong></div>
                <div class="org-node org-small-node"><strong>Kelompok Jabatan Fungsional</strong></div>
            </div>

            <div class="org-branch-line" aria-hidden="true"></div>
            <div class="org-fields">
                <article class="org-field org-field-budget">
                    <header><span>01</span><h3>Bidang Anggaran</h3><strong>AHMAD GOZALI, S.E.</strong></header>
                    <div class="org-subunit"><b>Subbidang Anggaran Belanja<br>Urusan Pemerintahan Wajib</b><span>RIZAL ASPAN HARAHAP, AMK</span></div>
                    <div class="org-subunit"><b>Subbidang Anggaran Belanja<br>Urusan Pemerintahan Lainnya</b><span>SAHDIANA PULUNGAN, S.E.</span></div>
                    <div class="org-functional">Kelompok Jabatan Fungsional</div>
                </article>
                <article class="org-field org-field-treasury">
                    <header><span>02</span><h3>Bidang Perbendaharaan</h3><strong>ASIR ARYADI, S.E., M.M.</strong></header>
                    <div class="org-subunit"><b>Subbidang Perbendaharaan Belanja<br>Urusan Pemerintahan Wajib</b><span>MUBARAK ASMAR NASUTION, S.Sos., M.Si</span></div>
                    <div class="org-subunit"><b>Subbidang Perbendaharaan Belanja<br>Urusan Pemerintahan Lainnya</b><span>ARDIANSYAH DAULAY, S.T.</span></div>
                    <div class="org-functional">Kelompok Jabatan Fungsional</div>
                </article>
                <article class="org-field org-field-accounting">
                    <header><span>03</span><h3>Bidang Akuntansi</h3><strong>MUSYAKHRUL HARAHAP, S.E</strong></header>
                    <div class="org-subunit"><b>Subbidang Akuntansi<br>Penerimaan</b><span>ADE SAPUTRA, S.E., M.Si</span></div>
                    <div class="org-subunit"><b>Subbidang Akuntansi<br>Pengeluaran</b><span>ASWIN SIAGIAN, S.E</span></div>
                    <div class="org-functional">Kelompok Jabatan Fungsional</div>
                </article>
                <article class="org-field org-field-assets">
                    <header><span>04</span><h3>Bidang Pengelolaan BMD</h3><strong>SORITUA PARDEMAN, S.E., M.M.</strong></header>
                    <div class="org-subunit"><b>Subbidang Pemanfaatan dan<br>Pengamanan BMD</b><span>JUNAIDI ABDILLAH LUBIS, S.E., M.M.</span></div>
                    <div class="org-subunit"><b>Subbidang Penatausahaan dan<br>Pengendalian BMD</b><span>DWI HANDAYANI, S.P., M.M.</span></div>
                    <div class="org-functional">Kelompok Jabatan Fungsional</div>
                </article>
                <article class="org-field org-field-income">
                    <header><span>05</span><h3>Bidang Pendapatan Daerah</h3><strong>SANGKOT MARTUA, S. Sos</strong></header>
                    <div class="org-subunit"><b>Subbidang Pendataan,<br>Pendaftaran dan Penilaian</b><span>RAHMAD LIUN NST, S.E.</span></div>
                    <div class="org-subunit"><b>Subbidang Penetapan, Penagihan<br>dan Pengawasan Pajak</b><span>EMMA SARI SIREGAR, S.Kom., M.M</span></div>
                    <div class="org-functional">Kelompok Jabatan Fungsional</div>
                </article>
            </div>
            <div class="org-uptb"><span>UPTB</span></div>
        </section>
    </main>
</div>

<style>
    .org-page {
        max-width: 1440px;
        margin: 0 auto;
        padding: 8px 0 42px;
        color: #173545;
        font-family: 'Segoe UI', 'Inter', 'DM Sans', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        background: linear-gradient(180deg, #f5f9fb 0%, #eef5f7 100%);
    }
    .org-page * { box-sizing: border-box; }
    .org-page p,
    .org-page span,
    .org-page strong,
    .org-page b,
    .org-page small,
    .org-page label,
    .org-page li {
        line-height: 1.6;
    }
    .org-hero {
        position: relative;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 24px;
        overflow: hidden;
        padding: 30px 38px;
        border: 1px solid rgba(13,56,73,.08);
        border-radius: 26px;
        color: #fff;
        background: linear-gradient(115deg, rgba(8,31,44,.96), rgba(7,71,86,.78), rgba(12,109,109,.74)), url('https://cdn.phototourl.com/member/2026-09-14-4cfef720-381a-4165-abc7-1dae97539e73.jpg') center/cover;
        box-shadow: 0 22px 48px rgba(8,31,44,.15);
    }
    .org-hero::after {
        position: absolute;
        right: -80px;
        bottom: -130px;
        width: 320px;
        height: 320px;
        border: 30px solid rgba(255,195,56,.14);
        border-radius: 50%;
        content: '';
    }
    .org-hero > div { position: relative; z-index: 1; }
    .org-back {
        display: block;
        width: fit-content;
        margin-bottom: 30px;
        color: rgba(255,255,255,.8);
        font-size: 13px;
        font-weight: 700;
        transition: color .2s ease;
    }
    .org-back:hover { color: #ffc338; }
    .org-eyebrow, .org-section-label {
        color: #ffc338;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .14em;
    }
    .org-hero h1 {
        margin: 7px 0 4px;
        color: #fff;
        font: 700 clamp(30px, 4vw, 52px)/1.06 'Segoe UI', 'Inter', sans-serif;
        letter-spacing: -.04em;
    }
    .org-hero p {
        margin: 0;
        color: rgba(255,255,255,.8);
        font-size: 15px;
        line-height: 1.7;
    }
    .org-hero-actions { display: flex; align-items: center; gap: 22px; }
    .org-theme-toggle {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 12px;
        border: 1px solid rgba(255,255,255,.25);
        border-radius: 10px;
        color: #fff;
        background: rgba(255,255,255,.1);
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
        transition: background .2s ease, transform .2s ease, border-color .2s ease;
    }
    .org-theme-toggle:hover {
        background: rgba(255,255,255,.18);
        border-color: rgba(255,255,255,.35);
        transform: translateY(-1px);
    }
    .org-theme-toggle span { color: #ffc338; font-size: 16px; line-height: 1; }

    .org-content { margin-top: 26px; padding: 0 4px; }
    .org-intro {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 30px;
        margin-bottom: 20px;
    }
    .org-intro h2 {
        margin: 5px 0 0;
        color: #123f59;
        font: 700 clamp(28px, 3vw, 42px)/1.1 'Segoe UI', 'Inter', sans-serif;
        letter-spacing: -.02em;
    }
    .org-intro p {
        max-width: 500px;
        margin: 0;
        color: #617986;
        font-size: 15px;
        line-height: 1.7;
    }
    .org-overview {
        display: flex;
        align-items: stretch;
        gap: 10px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }
    .org-overview-card {
        display: flex;
        min-width: 132px;
        flex: 1 1 180px;
        flex-direction: column;
        justify-content: center;
        padding: 16px 18px;
        border: 1px solid rgba(18,63,89,.08);
        border-radius: 16px;
        background: linear-gradient(180deg, rgba(255,255,255,.96), rgba(245,250,252,.9));
        box-shadow: 0 12px 26px rgba(18,63,89,.05);
    }
    .org-overview-card strong {
        color: #0a7d7a;
        font: 700 24px/1 'Playfair Display', serif;
    }
    .org-overview-card span {
        margin-top: 6px;
        color: #69808c;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }
    .org-legend {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-left: auto;
        padding: 0 4px 0 15px;
        color: #647982;
        font-size: 10px;
        font-weight: 700;
    }
    .org-legend span { display: inline-flex; align-items: center; gap: 5px; white-space: nowrap; }
    .legend-dot { width: 9px; height: 9px; display: inline-block; border-radius: 50%; }
    .legend-lead { background: #ffc338; }
    .legend-field { background: #0a7d7a; }
    .legend-unit { background: #b9d3d5; }

    .org-chart {
        overflow-x: auto;
        padding: 22px 24px 34px;
        border: 1px solid rgba(18,63,89,.1);
        border-radius: 22px;
        background: linear-gradient(180deg, rgba(255,255,255,.96), rgba(241,248,249,.88));
        box-shadow: 0 20px 36px rgba(18,63,89,.06);
        scrollbar-color: #9dbabd transparent;
    }
    .org-chart-heading {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        width: min(100%, 1120px);
        margin: 0 auto 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e3eeee;
    }
    .org-chart-heading span {
        color: #123f59;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: .14em;
    }
    .org-chart-heading small {
        color: #83979d;
        font-size: 11px;
        letter-spacing: .03em;
    }
    .org-node {
        border: 1px solid #b9d3d5;
        border-radius: 12px;
        background: linear-gradient(180deg, #fff 0%, #f5faf9 100%);
        box-shadow: 0 10px 18px rgba(18,63,89,.05);
        text-align: center;
    }
    .org-node-kicker {
        display: block;
        color: #0a7d7a;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .05em;
        text-transform: uppercase;
    }
    .org-node strong {
        display: block;
        color: #173545;
        font-size: 14px;
        line-height: 1.4;
    }
    .org-head-node {
        width: min(100%, 560px);
        margin: 0 auto;
        padding: 20px 24px;
        border-color: rgba(10,125,122,.45);
        border-top: 5px solid #ffc338;
        background: linear-gradient(180deg, #fff 0%, #f8faf7 100%);
    }
    .org-head-node strong { margin-top: 8px; font-size: 17px; }
    .org-connector-main {
        width: 2px;
        height: 30px;
        margin: 0 auto;
        background: linear-gradient(180deg, #8cb1b4, #466d74);
    }
    .org-secretary-node {
        width: min(100%, 440px);
        margin: 0 auto;
        padding: 16px 20px;
        border-top: 4px solid #0a7d7a;
    }
    .org-secretary-node strong { margin-top: 7px; }
    .org-secretary-support {
        display: grid;
        grid-template-columns: 1fr 1.25fr 1fr;
        gap: 22px;
        width: min(100%, 820px);
        margin: 18px auto 34px;
        align-items: center;
    }
    .org-small-node { padding: 14px 14px; }
    .org-small-node strong { color: #55727b; font-size: 12px; }
    .org-unit-node { padding: 14px 16px; }
    .org-unit-node strong { margin-top: 7px; font-size: 12px; }
    .org-branch-line {
        height: 2px;
        margin: 0 7% 28px;
        background: linear-gradient(90deg, rgba(100,145,151,.2), rgba(100,145,151,.8), rgba(100,145,151,.2));
    }
    .org-fields {
        display: grid;
        grid-template-columns: repeat(5, minmax(250px, 1fr));
        gap: 18px;
        min-width: 1330px;
    }
    .org-field {
        position: relative;
        overflow: hidden;
        border: 1px solid #dbe7e8;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 12px 24px rgba(18,63,89,.06);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .org-field:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 28px rgba(18,63,89,.1);
    }
    .org-field::before { display: block; height: 6px; content: ''; background: #0a7d7a; }
    .org-field-budget::before { background: #e8b84b; }
    .org-field-treasury::before { background: #4d9fd4; }
    .org-field-accounting::before { background: #8b78b8; }
    .org-field-assets::before { background: #ef765d; }
    .org-field-income::before { background: #087f78; }
    .org-field header {
        min-height: 116px;
        padding: 17px 16px 14px;
        background: linear-gradient(180deg, #effaf7, #f4faf9);
        border-bottom: 1px solid #dbece8;
    }
    .org-field header span {
        display: block;
        margin-bottom: 8px;
        color: #0a7d7a;
        font-size: 12px;
        font-weight: 900;
    }
    .org-field h3 {
        min-height: 36px;
        margin: 0 0 10px;
        color: #123f59;
        font-size: 17px;
        line-height: 1.2;
    }
    .org-field header strong {
        display: block;
        color: #58727d;
        font-size: 12px;
        line-height: 1.4;
    }
    .org-subunit {
        min-height: 122px;
        padding: 16px 15px 13px;
        border-top: 1px solid #edf2f2;
    }
    .org-subunit b {
        display: block;
        color: #173545;
        font-size: 13px;
        line-height: 1.45;
    }
    .org-subunit span {
        display: block;
        margin-top: 11px;
        color: #66818a;
        font-size: 12px;
        line-height: 1.4;
    }
    .org-functional {
        margin: 14px;
        padding: 10px;
        border-radius: 8px;
        color: #0a7d7a;
        background: linear-gradient(135deg, rgba(10,125,122,.12), rgba(10,125,122,.18));
        font-size: 11px;
        font-weight: 900;
        text-align: center;
        letter-spacing: .04em;
        text-transform: uppercase;
    }
    .org-uptb {
        width: 86px;
        margin: 32px auto 0;
        padding: 11px 6px;
        border: 1px solid #b9d3d5;
        border-radius: 10px;
        color: #123f59;
        background: linear-gradient(180deg, #fff 0%, #f7faf9 100%);
        font-size: 12px;
        font-weight: 900;
        text-align: center;
        box-shadow: 0 10px 18px rgba(18,63,89,.05);
    }

    .org-page:not(.org-dark) .org-chart {
        border-color: #b8d0d2;
        background: linear-gradient(180deg, #fff, rgba(241,248,249,.9));
        box-shadow: 0 16px 34px rgba(18,63,89,.08);
    }
    .org-page:not(.org-dark) .org-chart-heading { border-color: #c9dfe0; }
    .org-page:not(.org-dark) .org-node { border-color: #9dbabd; box-shadow: 0 8px 18px rgba(18,63,89,.08); }
    .org-page:not(.org-dark) .org-field { border-color: #c2d9da; box-shadow: 0 12px 22px rgba(18,63,89,.08); }
    .org-page:not(.org-dark) .org-field header strong { color: #3e626a; }
    .org-page:not(.org-dark) .org-subunit { border-color: #d9e7e7; }
    .org-page .org-back { font-size: 13px; }
    .org-page .org-eyebrow, .org-page .org-section-label { font-size: 12px; }
    .org-page .org-hero h1 { font-size: clamp(34px, 4.2vw, 52px); }
    .org-page .org-hero p { font-size: 15px; line-height: 1.55; }
    .org-page .org-theme-toggle { font-size: 12px; }
    .org-page .org-intro h2 { font-size: clamp(28px, 3.2vw, 38px); }
    .org-page .org-intro p { font-size: 14px; }
    .org-page .org-overview-card strong { font-size: 27px; }
    .org-page .org-overview-card span, .org-page .org-legend { font-size: 11px; }
    .org-page .org-chart-heading span { font-size: 11px; }
    .org-page .org-chart-heading small { font-size: 11px; }
    .org-page .org-node-kicker { font-size: 12px; }
    .org-page .org-node strong { font-size: 14px; }
    .org-page .org-head-node strong { font-size: 18px; }
    .org-page .org-small-node strong, .org-page .org-unit-node strong { font-size: 12px; }
    .org-page .org-field header span { font-size: 12px; }
    .org-page .org-field h3 { font-size: 17px; }
    .org-page .org-field header strong { font-size: 12px; }
    .org-page .org-subunit b { font-size: 13px; }
    .org-page .org-subunit span { font-size: 12px; }
    .org-page .org-functional { font-size: 11px; }
    .org-page .org-uptb { font-size: 13px; }
    .org-page:not(.org-dark) .org-subunit span { color: #496b74; }
    .org-page:not(.org-dark) .org-functional { background: linear-gradient(135deg, rgba(10,125,122,.12), rgba(10,125,122,.18)); }
    .org-page:not(.org-dark) .org-branch-line, .org-page:not(.org-dark) .org-connector-main { background: linear-gradient(180deg, #6d989b, #3e666f); }

    .org-dark { color: #e6f0f0; }
    .org-dark .org-intro h2 { color: #e9f5f3; }
    .org-dark .org-intro p { color: #aec2c5; }
    .org-dark .org-overview-card {
        border-color: rgba(183,215,211,.16);
        background: linear-gradient(180deg, #18343f, #14313d);
        box-shadow: 0 8px 20px rgba(0,0,0,.18);
    }
    .org-dark .org-overview-card span, .org-dark .org-legend { color: #b2c7c9; }
    .org-dark .org-chart {
        border-color: rgba(183,215,211,.16);
        background: linear-gradient(180deg, #122b36, #102631);
        box-shadow: 0 14px 30px rgba(0,0,0,.2);
    }
    .org-dark .org-chart-heading { border-color: rgba(183,215,211,.16); }
    .org-dark .org-chart-heading span { color: #d9ece9; }
    .org-dark .org-chart-heading small { color: #8fa9ad; }
    .org-dark .org-node, .org-dark .org-field, .org-dark .org-uptb {
        border-color: #31525a;
        background: linear-gradient(180deg, #18343f, #13313a);
        box-shadow: 0 8px 18px rgba(0,0,0,.2);
    }
    .org-dark .org-node strong, .org-dark .org-field h3, .org-dark .org-subunit b, .org-dark .org-uptb { color: #e4f0ef; }
    .org-dark .org-small-node strong { color: #a8c0c1; }
    .org-dark .org-field header {
        background: linear-gradient(180deg, #1d4049, #18323c);
        border-bottom-color: rgba(183,215,211,.12);
    }
    .org-dark .org-field header strong, .org-dark .org-subunit span { color: #abc2c3; }
    .org-dark .org-subunit { border-color: rgba(183,215,211,.14); }
    .org-dark .org-functional {
        color: #a9ebe0;
        background: linear-gradient(135deg, rgba(10,125,122,.18), rgba(10,125,122,.28));
    }
    .org-dark .org-connector-main, .org-dark .org-branch-line { background: linear-gradient(180deg, #477078, #335761); }

    /* Premium institutional treatment */
    .org-page {
        --org-navy: #102f4b;
        --org-blue: #1b587d;
        --org-gold: #c79a42;
        --org-mist: #f4f6f8;
        max-width: none;
        padding: 24px clamp(18px, 4vw, 64px) 54px;
        background: var(--org-mist);
    }
    .org-hero {
        max-width: 1380px;
        min-height: 260px;
        margin: 0 auto;
        padding: clamp(30px, 5vw, 58px) clamp(24px, 5vw, 70px);
        border: 0;
        border-radius: 14px;
        background: linear-gradient(112deg, rgba(8,27,47,.97) 0%, rgba(16,58,86,.91) 58%, rgba(31,91,112,.78) 100%), url('https://cdn.phototourl.com/member/2026-09-14-4cfef720-381a-4165-abc7-1dae97539e73.jpg') center/cover;
        box-shadow: 0 24px 48px rgba(16,47,75,.18);
    }
    .org-hero::after { right: -110px; bottom: -170px; width: 360px; height: 360px; border: 1px solid rgba(199,154,66,.42); box-shadow: 0 0 0 24px rgba(199,154,66,.08), 0 0 0 48px rgba(199,154,66,.05); }
    .org-back { margin-bottom: 42px; color: rgba(255,255,255,.68); font-size: 11px; letter-spacing: .04em; }
    .org-eyebrow, .org-section-label { color: #e3bb68; letter-spacing: .2em; }
    .org-hero h1 { font-family: 'DM Sans', sans-serif; font-size: clamp(32px, 4vw, 54px); font-weight: 700; letter-spacing: -.045em; }
    .org-hero p { max-width: 620px; color: rgba(255,255,255,.72); font-size: 14px; }
    .org-theme-toggle { border-radius: 6px; border-color: rgba(255,255,255,.2); background: rgba(255,255,255,.08); }
    .org-theme-toggle span { color: #e3bb68; }
    .org-content { max-width: 1380px; margin: 34px auto 0; padding: 0; }
    .org-intro { margin-bottom: 24px; }
    .org-intro h2 { color: var(--org-navy); font-family: 'DM Sans', sans-serif; font-size: clamp(26px, 3vw, 38px); letter-spacing: -.04em; }
    .org-intro p { max-width: 560px; color: #667887; }
    .org-overview { gap: 12px; margin-bottom: 26px; }
    .org-overview-card { min-height: 92px; padding: 15px 20px; border: 1px solid #dce3e8; border-top: 3px solid var(--org-gold); border-radius: 7px; background: #fff; box-shadow: 0 8px 20px rgba(16,47,75,.05); }
    .org-overview-card strong { color: var(--org-navy); font-family: 'DM Sans', sans-serif; font-size: 27px; }
    .org-overview-card span { color: #788894; font-size: 10px; letter-spacing: .1em; }
    .org-legend { color: #70818d; }
    .legend-lead { background: var(--org-gold); }
    .legend-field { background: var(--org-blue); }
    .legend-unit { background: #aabac4; }
    .org-chart { padding: 25px 28px 38px; border: 1px solid #dce3e8; border-radius: 12px; background: #fff; box-shadow: 0 18px 42px rgba(16,47,75,.08); }
    .org-chart-heading { border-color: #e5eaee; }
    .org-chart-heading span { color: var(--org-navy); letter-spacing: .2em; }
    .org-chart-heading small { color: #8a98a2; }
    .org-node { border-color: #d6e0e6; border-radius: 7px; background: #fff; box-shadow: 0 8px 18px rgba(16,47,75,.06); }
    .org-node-kicker { color: var(--org-blue); letter-spacing: .12em; }
    .org-node strong { color: var(--org-navy); }
    .org-head-node { padding: 22px 24px; border-color: rgba(199,154,66,.55); border-top: 4px solid var(--org-gold); background: linear-gradient(135deg, #fff, #f8fafb); box-shadow: 0 12px 24px rgba(16,47,75,.1); }
    .org-secretary-node { border-top: 4px solid var(--org-blue); }
    .org-small-node strong { color: #607682; }
    .org-branch-line, .org-connector-main { background: linear-gradient(180deg, #b8c7d0, #6e8795); }
    .org-fields { gap: 14px; }
    .org-field { border-color: #dce3e8; border-radius: 8px; background: #fff; box-shadow: 0 10px 22px rgba(16,47,75,.06); }
    .org-field:hover { transform: translateY(-2px); box-shadow: 0 15px 28px rgba(16,47,75,.1); }
    .org-field::before { height: 4px; background: var(--org-blue); }
    .org-field-budget::before { background: #c79a42; }
    .org-field-treasury::before { background: #367da5; }
    .org-field-accounting::before { background: #657fa0; }
    .org-field-assets::before { background: #9b6b57; }
    .org-field-income::before { background: #237a78; }
    .org-field header { min-height: 122px; background: #f6f8fa; border-bottom-color: #e2e8ec; }
    .org-field header span { color: var(--org-gold); letter-spacing: .12em; }
    .org-field h3 { color: var(--org-navy); font-family: 'DM Sans', sans-serif; }
    .org-field header strong { color: #607682; }
    .org-subunit { border-color: #edf0f2; }
    .org-subunit b { color: #29465d; }
    .org-subunit span { color: #718491; }
    .org-functional { border-radius: 5px; color: var(--org-blue); background: #edf4f7; }
    .org-uptb { margin-top: 34px; border-color: #cbd8df; border-radius: 7px; color: var(--org-navy); background: #f8fafb; box-shadow: 0 8px 16px rgba(16,47,75,.05); }
    .org-page.org-dark { background: #0c1b27; }
    .org-dark .org-hero { box-shadow: 0 24px 48px rgba(0,0,0,.28); }
    .org-dark .org-intro h2 { color: #edf5f6; }
    .org-dark .org-overview-card { border-top-color: #d4aa5b; }
    .org-dark .org-chart { border-color: #294451; background: #122936; }
    .org-dark .org-field header { background: #193744; }
    .org-page:not(.org-dark) {
        background-color: #f4f6f8;
        background-image: linear-gradient(rgba(16,47,75,.025) 1px, transparent 1px), linear-gradient(90deg, rgba(16,47,75,.025) 1px, transparent 1px);
        background-size: 34px 34px;
    }
    .org-hero::before { position: absolute; inset: 14px; border: 1px solid rgba(255,255,255,.14); border-radius: 8px; content: ''; pointer-events: none; }
    .org-hero-actions { align-self: flex-start; }
    .org-intro { padding-bottom: 20px; border-bottom: 1px solid #d9e1e6; }
    .org-section-label { display: inline-flex; align-items: center; gap: 10px; }
    .org-section-label::before { width: 28px; height: 2px; background: var(--org-gold); content: ''; }
    .org-overview-card { position: relative; overflow: hidden; }
    .org-overview-card::after { position: absolute; right: -14px; bottom: -24px; width: 64px; height: 64px; border: 1px solid rgba(199,154,66,.22); border-radius: 50%; content: ''; }
    .org-chart-heading { padding-bottom: 15px; }
    .org-chart-heading span { display: inline-flex; align-items: center; gap: 9px; }
    .org-chart-heading span::before { width: 7px; height: 7px; border-radius: 50%; background: var(--org-gold); content: ''; }
    .org-head-node { position: relative; }
    .org-head-node::after { position: absolute; top: 12px; right: 14px; width: 5px; height: 5px; border-radius: 50%; background: var(--org-gold); box-shadow: -9px 0 0 rgba(199,154,66,.45), -18px 0 0 rgba(199,154,66,.2); content: ''; }
    .org-field header { position: relative; }
    .org-field header span { display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 22px; margin-bottom: 10px; border: 1px solid rgba(199,154,66,.4); border-radius: 4px; background: rgba(199,154,66,.08); }
    .org-field h3 { letter-spacing: -.02em; }
    .org-field header strong { letter-spacing: .01em; }
    .org-subunit { background: rgba(248,250,251,.65); }
    .org-functional { border: 1px solid rgba(27,88,125,.1); letter-spacing: .08em; }
    .org-dark .org-section-label::before { background: #d4aa5b; }
    .org-dark .org-intro { border-color: #294451; }
    .org-dark .org-chart-heading span::before { background: #d4aa5b; }
    .org-dark .org-subunit { background: rgba(16,42,54,.45); }

    @media (max-width: 900px) {
        .org-hero { align-items: flex-start; }
        .org-intro { display: block; }
        .org-intro p { margin-top: 12px; }
        .org-overview { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .org-legend { grid-column: 1 / -1; justify-content: center; margin: 4px 0 0; padding: 8px 0 0; }
    }

    @media (max-width: 680px) {
        .org-page { padding: 0 12px 28px; }
        .org-hero { align-items: flex-start; padding: 24px 22px; }
        .org-hero h1 { font-size: clamp(34px, 10vw, 46px); }
        .org-hero p { font-size: 14px; }
        .org-hero-actions { align-items: flex-end; flex-direction: column-reverse; gap: 16px; }
        .org-theme-toggle b { display: none; }
        .org-theme-toggle { width: 35px; height: 35px; justify-content: center; padding: 0; border-radius: 50%; }
        .org-back { margin-bottom: 25px; }
        .org-overview { display: grid; grid-template-columns: repeat(2, 1fr); }
        .org-overview-card { min-width: 0; }
        .org-legend { grid-column: 1 / -1; justify-content: center; margin: 4px 0 0; padding: 8px 0 0; }
        .org-chart { padding: 20px 14px 28px; }
        .org-chart-heading { display: block; }
        .org-chart-heading small { display: block; margin-top: 5px; }
        .org-secretary-support { gap: 8px; }
        .org-small-node { padding: 8px 5px; }
        .org-unit-node { padding: 9px 6px; }
        .org-branch-line { margin-left: 3%; margin-right: 3%; }
    }
</style>
<script>
    (() => {
        const page = document.querySelector('.org-page');
        const toggle = document.querySelector('#org-theme-toggle');
        const storageKey = 'struktur-organisasi-theme';

        if (!page || !toggle) return;

        const applyTheme = (theme) => {
            const isDark = theme === 'dark';
            page.classList.toggle('org-dark', isDark);
            toggle.setAttribute('aria-pressed', String(isDark));
            toggle.setAttribute('aria-label', isDark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap');
            toggle.querySelector('span').textContent = isDark ? '☀' : '☾';
            toggle.querySelector('b').textContent = isDark ? 'Mode terang' : 'Mode gelap';
        };

        applyTheme(localStorage.getItem(storageKey) || 'light');
        toggle.addEventListener('click', () => {
            const nextTheme = page.classList.contains('org-dark') ? 'light' : 'dark';
            localStorage.setItem(storageKey, nextTheme);
            applyTheme(nextTheme);
        });
    })();
</script>
@endsection
