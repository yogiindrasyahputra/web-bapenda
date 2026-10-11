@extends('layouts.app')

@section('title', 'Bidang dan Unit Organisasi')

@section('content')
<div class="hotel-organization-page">
    <header class="hotel-public-nav">
        <div class="hotel-organization-actions" aria-label="Akun dan tampilan">
            <a href="{{ route('login') }}" class="hotel-organization-login">Masuk</a>
            <a href="{{ route('register') }}" class="hotel-organization-register">Daftar</a>
            <button type="button" class="hotel-organization-theme" id="hotel-organization-theme" aria-label="Aktifkan mode gelap" aria-pressed="false"><span aria-hidden="true">☾</span><b>Gelap</b></button>
        </div>
    </header>

    <section class="hotel-organization-hero">
        <div>
            <span>PROFIL ORGANISASI</span>
            <h1>Bidang dan Unit Organisasi</h1>
            <p>Mengenal struktur kerja yang mendukung pengelolaan pajak hotel di Kota Padangsidimpuan.</p>
            <div class="hotel-organization-hero-rule" aria-hidden="true"></div>
        </div>
    </section>

    <main class="hotel-organization-main">
        <div class="hotel-organization-intro">
            <span>STRUKTUR ORGANISASI</span>
            <h2>Kolaborasi terarah untuk pengelolaan keuangan dan pendapatan daerah.</h2>
            <p>Struktur organisasi BPKPD Kota Padangsidimpuan mendukung pembagian tugas yang jelas, koordinasi yang kuat, dan pelayanan publik yang semakin baik.</p>
        </div>
        <section class="hotel-organization-chart" aria-label="Struktur organisasi BPKPD">
            <div class="hotel-org-level hotel-org-leader">
                <article class="hotel-org-card hotel-org-card-leader"><span class="hotel-org-number">01</span><span class="hotel-org-kicker">KEPALA BADAN</span><h3>BADAN PENGELOLAAN KEUANGAN DAN PENDAPATAN DAERAH</h3><strong class="hotel-org-person">ADY SUPRIADI, S.E., M.M</strong></article>
            </div>
            <div class="hotel-org-connector" aria-hidden="true"></div>
            <div class="hotel-org-level hotel-org-management">
                <article class="hotel-org-card hotel-org-secretariat"><span class="hotel-org-number">02</span><span class="hotel-org-kicker">SEKRETARIAT</span><h3>Sekretariat</h3><strong class="hotel-org-person">PAWITNO, S.Pi</strong><div class="hotel-org-mini-grid"><span>Kelompok Jabatan Fungsional</span><span>Subbagian Umum dan Kepegawaian<br><b>HJ. ROSTIMEGAWATI HARAHAP</b></span><span>Kelompok Jabatan Fungsional</span></div></article>
            </div>
            <div class="hotel-org-connector" aria-hidden="true"></div>
            <div class="hotel-org-level hotel-org-fields">
                <article class="hotel-org-card hotel-org-field-card"><span class="hotel-org-number">03</span><h3>Bidang Anggaran</h3><strong class="hotel-org-person">AHMAD GOZALI, S.E.</strong><div class="hotel-org-subunit"><b>Subbidang Anggaran Belanja Urusan Pemerintahan Wajib</b><span>RIZAL ASPAN HARAHAP, AMK</span></div><div class="hotel-org-subunit"><b>Subbidang Anggaran Belanja Urusan Pemerintahan Lainnya</b><span>SAHDIANA PULUNGAN, S.E.</span></div><div class="hotel-org-functional">Kelompok Jabatan Fungsional</div></article>
                <article class="hotel-org-card hotel-org-field-card"><span class="hotel-org-number">04</span><h3>Bidang Perbendaharaan</h3><strong class="hotel-org-person">ASIR ARYADI, S.E., M.M.</strong><div class="hotel-org-subunit"><b>Subbidang Perbendaharaan Belanja Urusan Pemerintahan Wajib</b><span>MUBARAK ASMAR NASUTION, S.Sos., M.Si.</span></div><div class="hotel-org-subunit"><b>Subbidang Perbendaharaan Belanja Urusan Pemerintahan Lainnya</b><span>ARDIANSYAH DAULAY, S.T.</span></div><div class="hotel-org-functional">Kelompok Jabatan Fungsional</div></article>
                <article class="hotel-org-card hotel-org-field-card"><span class="hotel-org-number">05</span><h3>Bidang Akuntansi</h3><strong class="hotel-org-person">MUSYAKHRUL HARAHAP, S.E</strong><div class="hotel-org-subunit"><b>Subbidang Akuntansi Penerimaan</b><span>ADE SAPUTRA, S.E., M.Si.</span></div><div class="hotel-org-subunit"><b>Subbidang Akuntansi Pengeluaran</b><span>ASWIN SIAGIAN, S.E.</span></div><div class="hotel-org-functional">Kelompok Jabatan Fungsional</div></article>
                <article class="hotel-org-card hotel-org-field-card"><span class="hotel-org-number">06</span><h3>Bidang Pengelolaan BMD</h3><strong class="hotel-org-person">SORITUA PARDEMAN, S.E., M.M.</strong><div class="hotel-org-subunit"><b>Subbidang Pemanfaatan dan Pengamanan BMD</b><span>JUNAIDI ABDILLAH LUBIS, S.E., M.M.</span></div><div class="hotel-org-subunit"><b>Subbidang Penatausahaan dan Pengendalian BMD</b><span>DWI HANDAYANI, S.P., M.M.</span></div><div class="hotel-org-functional">Kelompok Jabatan Fungsional</div></article>
                <article class="hotel-org-card hotel-org-field-card"><span class="hotel-org-number">07</span><h3>Bidang Pendapatan Daerah</h3><strong class="hotel-org-person">SANGKOT MARTUA, S. Sos</strong><div class="hotel-org-subunit"><b>Subbidang Pendataan, Pendaftaran dan Penilaian</b><span>RAHMAD LIUN NST, S.E.</span></div><div class="hotel-org-subunit"><b>Subbidang Penetapan, Penagihan dan Pengawasan Pajak</b><span>EMMA SARI SIREGAR, S.Kom., M.M.</span></div><div class="hotel-org-functional">Kelompok Jabatan Fungsional</div></article>
            </div>
            <div class="hotel-org-connector" aria-hidden="true"></div>
            <div class="hotel-org-level hotel-org-support">
                <article class="hotel-org-card hotel-org-card-support"><span class="hotel-org-number">08</span><span class="hotel-org-kicker">UNIT PELAKSANA</span><h3>UPTB</h3><p>Unit Pelaksana Teknis Badan yang mendukung pelaksanaan tugas teknis di lapangan.</p></article>
            </div>
        </section>
        <footer class="hotel-public-footer"><strong class="hotel-footer-brand"><span>BPKPD</span><small>PADANGSIDIMPUAN</small></strong><small>© {{ date('Y') }} Pemerintah Kota Padangsidimpuan. All rights reserved.</small><span>⌖ 88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara,<br>Kota Padang Sidempuan, Sumatera Utara 22733</span></footer>
    </main>
</div>
<style>
.hotel-organization-page { --org-ink: #173b62; --org-deep: #123f59; --org-teal: #087f78; --org-gold: #d59a20; --org-muted: #526d88; --org-surface: #fff; min-height: 100vh; margin: -24px -28px -20px; overflow-x: clip; color: var(--org-ink); background: linear-gradient(135deg, #f3fbf8, #fffdf5 52%, #f1f7ff); transition: color .25s ease, background .25s ease; }
.hotel-organization-page .hotel-public-nav, .hotel-organization-main, .hotel-organization-hero > div, .hotel-public-footer { width: min(100% - 104px, 1180px); margin: auto; }
.hotel-organization-page .hotel-public-nav { min-height: 82px; display: flex; align-items: center; justify-content: space-between; gap: 20px; padding-top: 10px; }
.hotel-nav-links { display: flex; align-self: stretch; align-items: center; gap: clamp(14px, 2.2vw, 30px); }
.hotel-nav-links > a, .hotel-profile-menu > a { display: flex; align-items: center; height: 100%; color: #173b62; font-size: 11px; font-weight: 600; white-space: nowrap; }
.hotel-nav-links > a span { margin-right: 5px; font-size: 16px; }
.hotel-profile-menu { position: relative; display: flex; align-items: stretch; }
.hotel-profile-menu > a { color: #2775b8; border-bottom: 2px solid #2775b8; }
.hotel-profile-chevron { margin-left: 5px; font-size: 14px; }
.hotel-profile-submenu { position: absolute; z-index: 5; top: calc(100% - 1px); left: -12px; display: none; min-width: 190px; padding: 8px; border: 1px solid #dcebe8; border-radius: 8px; background: #fff; box-shadow: 0 12px 26px rgba(18,63,89,.14); }
.hotel-profile-menu:hover .hotel-profile-submenu, .hotel-profile-menu:focus-within .hotel-profile-submenu { display: grid; gap: 2px; }
.hotel-profile-submenu a { padding: 9px 10px; color: #456277; font-size: 11px; white-space: nowrap; }
.hotel-profile-submenu a:hover, .hotel-profile-submenu a.is-current { color: #087f78; background: #eef8f3; }
.hotel-organization-actions { display: flex; align-items: center; gap: 8px; margin-left: auto; }.hotel-organization-login, .hotel-organization-register, .hotel-organization-theme { min-height: 34px; display: inline-flex; align-items: center; justify-content: center; border-radius: 7px; font-size: 11px; font-weight: 700; white-space: nowrap; }.hotel-organization-login { padding: 0 13px; color: var(--org-teal); border: 1px solid #b9ded4; background: rgba(255,255,255,.75); }.hotel-organization-register { padding: 0 14px; color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 6px 14px rgba(8,127,120,.18); }.hotel-organization-theme { gap: 6px; padding: 0 11px; color: var(--org-ink); border: 1px solid #cfe3df; background: rgba(255,255,255,.75); cursor: pointer; }.hotel-organization-theme span { color: var(--org-gold); font-size: 16px; }.hotel-organization-theme:hover, .hotel-organization-login:hover { color: var(--org-teal); border-color: var(--org-teal); }
.hotel-organization-hero { min-height: 370px; display: flex; align-items: center; padding: 66px 0 72px; color: #fff; background: linear-gradient(105deg, rgba(3,39,78,.94), rgba(8,127,120,.58)), url('https://cdn.phototourl.com/member/2026-09-14-f84f01be-9299-416e-bea9-d695ec0baef5.jpg') center/cover; box-shadow: 0 18px 34px rgba(18,63,89,.16); }
.hotel-organization-hero span, .hotel-organization-intro > span { font-size: 11px; font-weight: 800; letter-spacing: .08em; }
.hotel-organization-hero h1 { max-width: 720px; margin: 12px 0 14px; font-size: clamp(32px, 4vw, 48px); font-weight: 800; letter-spacing: .01em; line-height: 1.12; text-shadow: 0 4px 20px rgba(0,0,0,.22); }
.hotel-organization-hero p { max-width: 560px; margin: 0; color: rgba(255,255,255,.92); font-size: 15px; line-height: 1.7; }.hotel-organization-hero-rule { width: 175px; height: 3px; margin-top: 26px; background: linear-gradient(90deg, #f7c957, rgba(247,201,87,0)); }
.hotel-organization-main { padding: 42px 0 30px; }
.hotel-organization-intro { max-width: 720px; }.hotel-organization-intro > span { color: #1763a5; font-size: 12px; }.hotel-organization-intro h2 { margin: 9px 0 12px; color: var(--org-deep); font-size: 30px; line-height: 1.25; }.hotel-organization-intro p { margin: 0; color: var(--org-muted); font-size: 15px; line-height: 1.8; }
.hotel-organization-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 30px 0 52px; }.hotel-organization-grid article { padding: 24px; border-top: 4px solid #087f78; background: linear-gradient(135deg, #f5fbf8, #fff8e8); }.hotel-organization-grid article:nth-child(2) { border-color: #1763a5; }.hotel-organization-grid article:nth-child(3) { border-color: #e1a92e; }.hotel-organization-grid article:nth-child(4) { border-color: #d7654e; }.hotel-organization-grid span { color: #e1a92e; font-size: 12px; font-weight: 800; }.hotel-organization-grid h3 { margin: 12px 0 7px; color: #123f59; font-size: 18px; }.hotel-organization-grid p { margin: 0; color: #617895; font-size: 12px; line-height: 1.6; }
.hotel-organization-chart { position: relative; margin: 34px 0 58px; padding: 10px 0; }.hotel-org-level { position: relative; display: flex; justify-content: center; gap: 16px; }.hotel-org-fields { display: grid; grid-template-columns: repeat(5, minmax(190px, 1fr)); }.hotel-org-card { position: relative; flex: 0 1 430px; min-height: 145px; padding: 22px; border: 1px solid #dcebe8; border-top: 4px solid #1763a5; border-radius: 10px; background: linear-gradient(145deg, #fff, #eef8f3); box-shadow: 0 12px 24px rgba(18,63,89,.08); }.hotel-org-fields .hotel-org-card:nth-child(1) { border-top-color: #087f78; }.hotel-org-fields .hotel-org-card:nth-child(2) { border-top-color: #1763a5; }.hotel-org-fields .hotel-org-card:nth-child(3) { border-top-color: #8b78b8; }.hotel-org-fields .hotel-org-card:nth-child(4) { border-top-color: #d59a20; }.hotel-org-fields .hotel-org-card:nth-child(5) { border-top-color: #d7654e; }.hotel-org-card-leader { max-width: 520px; min-height: 155px; border: 0; color: #fff; background: linear-gradient(135deg, #075e68, #087f78 58%, #1763a5); box-shadow: 0 16px 30px rgba(8,127,120,.22); }.hotel-org-card-support { max-width: 600px; border-top-color: #d59a20; background: linear-gradient(145deg, #fff9eb, #fff); }.hotel-org-number { display: block; color: #d59a20; font-size: 12px; font-weight: 800; letter-spacing: .08em; }.hotel-org-card-leader .hotel-org-number { color: #f7c957; }.hotel-org-card h3 { margin: 10px 0 7px; color: #123f59; font-size: 17px; line-height: 1.3; }.hotel-org-card-leader h3 { color: #fff; font-size: 20px; }.hotel-org-card p { margin: 0; color: #617895; font-size: 13px; line-height: 1.65; }.hotel-org-card-leader p { color: rgba(255,255,255,.86); }.hotel-org-person { display: block; margin-bottom: 10px; color: #456277; font-size: 11px; line-height: 1.35; }.hotel-org-card-leader .hotel-org-person { color: rgba(255,255,255,.9); }.hotel-org-card small { display: block; margin-top: 12px; padding-top: 10px; border-top: 1px solid #dcebe8; color: #6a7f89; font-size: 10px; line-height: 1.55; }.hotel-org-card-leader small { color: rgba(255,255,255,.82); border-color: rgba(255,255,255,.25); }.hotel-org-connector { width: 2px; height: 28px; margin: 0 auto; background: linear-gradient(#087f78, #d59a20); }.hotel-org-fields::before { position: absolute; top: -14px; right: 10%; left: 10%; height: 2px; content: ''; background: #b9ded4; }.hotel-org-fields .hotel-org-card::before { position: absolute; top: -16px; left: 50%; width: 2px; height: 16px; content: ''; background: #b9ded4; }
.hotel-public-footer { display: flex; justify-content: space-between; gap: 20px; padding: 22px 0; border-top: 1px solid #dcebe8; color: #718293; font-size: 10px; line-height: 1.5; }.hotel-footer-brand span, .hotel-footer-brand small { display: block; }.hotel-footer-brand span { color: #087f78; font-size: 14px; font-weight: 800; }.hotel-footer-brand small { font-size: 8px; letter-spacing: .1em; }
.hotel-organization-page .hotel-org-card h3 { font-size: 18px; }.hotel-organization-page .hotel-org-card p { font-size: 14px; }.hotel-organization-page .hotel-org-card small { font-size: 11px; }.hotel-organization-page .hotel-org-person { font-size: 12px; color: #456277; }.hotel-org-card-leader .hotel-org-person { color: rgba(255,255,255,.92); }
.hotel-org-kicker { display: block; margin-top: 5px; color: #087f78; font-size: 10px; font-weight: 900; letter-spacing: .12em; text-align: center; }.hotel-org-card { text-align: center; }.hotel-org-card-leader .hotel-org-kicker { color: #f7c957; }.hotel-org-card-leader h3 { max-width: 460px; margin: 10px auto 8px; font-size: 20px; }.hotel-org-secretariat { max-width: 560px; }.hotel-org-mini-grid { display: grid; grid-template-columns: 1fr 1.25fr 1fr; gap: 8px; margin-top: 16px; }.hotel-org-mini-grid span { display: grid; min-height: 48px; place-items: center; padding: 8px; border: 1px solid #cfe3df; border-radius: 6px; color: #617895; background: #f4faf8; font-size: 10px; line-height: 1.35; text-align: center; }.hotel-org-mini-grid b { display: block; margin-top: 4px; color: #456277; font-size: 10px; }.hotel-org-field-card { min-height: 535px; padding: 18px 14px 14px; }.hotel-org-field-card h3 { min-height: 42px; margin-top: 9px; }.hotel-org-field-card .hotel-org-person { min-height: 34px; margin-bottom: 12px; }.hotel-org-subunit { min-height: 116px; margin-top: 9px; padding: 12px 10px; border: 1px solid #dcebe8; border-radius: 7px; background: rgba(255,255,255,.72); text-align: center; }.hotel-org-subunit b { display: block; color: #173b62; font-size: 11px; line-height: 1.4; }.hotel-org-subunit span { display: block; margin-top: 9px; color: #617895; font-size: 10px; line-height: 1.35; }.hotel-org-functional { margin-top: 10px; padding: 9px 7px; border-radius: 6px; color: #087f78; background: #e3f5ef; font-size: 10px; font-weight: 900; text-align: center; text-transform: uppercase; }.hotel-org-card-support { min-height: 130px; }
.hotel-organization-page.theme-dark { --org-ink: #e5f2f2; --org-deep: #f1f8f7; --org-muted: #c0d2d6; --org-surface: #1b3744; background: linear-gradient(135deg, #122b3c, #172d3b 52%, #172f32); }.hotel-organization-page.theme-dark .hotel-nav-links > a, .hotel-organization-page.theme-dark .hotel-profile-menu > a { color: #d7e7e9; }.hotel-organization-page.theme-dark .hotel-profile-menu > a { color: #8ce0d0; border-color: #8ce0d0; }.hotel-organization-page.theme-dark .hotel-profile-submenu { border-color: #385866; background: #193542; }.hotel-organization-page.theme-dark .hotel-profile-submenu a { color: #d7e7e9; }.hotel-organization-page.theme-dark .hotel-profile-submenu a:hover { color: #8ce0d0; background: #234b55; }.hotel-organization-page.theme-dark .hotel-organization-login, .hotel-organization-page.theme-dark .hotel-organization-theme { color: #dff4f0; border-color: #4d777c; background: rgba(18,47,58,.8); }.hotel-organization-page.theme-dark .hotel-organization-main { color: var(--org-ink); }.hotel-organization-page.theme-dark .hotel-organization-intro h2 { color: var(--org-deep); }.hotel-organization-page.theme-dark .hotel-organization-intro p { color: var(--org-muted); }.hotel-organization-page.theme-dark .hotel-org-card { border-color: #385b63; background: #1b3744; }.hotel-organization-page.theme-dark .hotel-org-card h3 { color: #f1f8f7; }.hotel-organization-page.theme-dark .hotel-org-card p, .hotel-organization-page.theme-dark .hotel-org-card small, .hotel-organization-page.theme-dark .hotel-org-person { color: #c7d9db; }.hotel-organization-page.theme-dark .hotel-org-card small { border-color: #385b63; }.hotel-organization-page.theme-dark .hotel-org-card-support { background: linear-gradient(145deg, #3e3824, #1b3744); }.hotel-organization-page.theme-dark .hotel-public-footer { border-color: #3d6265; }
.hotel-organization-page.theme-dark .hotel-org-mini-grid span, .hotel-organization-page.theme-dark .hotel-org-subunit { border-color: #385b63; background: #203e49; }.hotel-organization-page.theme-dark .hotel-org-mini-grid span, .hotel-organization-page.theme-dark .hotel-org-subunit span { color: #c7d9db; }.hotel-organization-page.theme-dark .hotel-org-mini-grid b, .hotel-organization-page.theme-dark .hotel-org-subunit b { color: #f1f8f7; }.hotel-organization-page.theme-dark .hotel-org-functional { color: #a9ebe0; background: #1a514f; }
@media (max-width: 1100px) { .hotel-org-fields { grid-template-columns: repeat(3, 1fr); }.hotel-org-fields::before { right: 16.5%; left: 16.5%; } }
@media (max-width: 900px) { .hotel-org-fields { grid-template-columns: repeat(2, 1fr); }.hotel-org-fields::before { right: 25%; left: 25%; } }
@media (max-width: 700px) { .hotel-organization-page .hotel-public-nav, .hotel-organization-main, .hotel-organization-hero > div, .hotel-public-footer { width: min(100% - 36px, 1180px); }.hotel-organization-page .hotel-public-nav { align-items: flex-start; flex-wrap: wrap; padding: 12px 0; }.hotel-nav-links { width: 100%; flex-wrap: wrap; gap: 0 18px; padding: 0; }.hotel-organization-actions { width: 100%; justify-content: flex-start; margin-left: 0; }.hotel-organization-grid, .hotel-org-fields { grid-template-columns: 1fr; }.hotel-org-fields::before, .hotel-org-fields .hotel-org-card::before { display: none; }.hotel-org-card { flex-basis: 100%; }.hotel-org-field-card { min-height: 0; }.hotel-org-mini-grid { grid-template-columns: 1fr; }.hotel-organization-intro h2 { font-size: 25px; }.hotel-organization-intro p, .hotel-organization-page .hotel-org-card p { font-size: 14px; }.hotel-public-footer { flex-direction: column; gap: 10px; } }
</style>
<script>
    (() => {
        const page = document.querySelector('.hotel-organization-page');
        const toggle = document.querySelector('#hotel-organization-theme');
        const savedTheme = localStorage.getItem('hotel-organization-theme');

        if (!page || !toggle) return;

        const applyTheme = (isDark) => {
            page.classList.toggle('theme-dark', isDark);
            toggle.setAttribute('aria-pressed', String(isDark));
            toggle.setAttribute('aria-label', isDark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap');
            toggle.querySelector('span').textContent = isDark ? '☀' : '☾';
            toggle.querySelector('b').textContent = isDark ? 'Terang' : 'Gelap';
        };

        applyTheme(savedTheme === 'dark');
        toggle.addEventListener('click', () => {
            const isDark = !page.classList.contains('theme-dark');
            localStorage.setItem('hotel-organization-theme', isDark ? 'dark' : 'light');
            applyTheme(isDark);
        });
    })();
</script>
@endsection
