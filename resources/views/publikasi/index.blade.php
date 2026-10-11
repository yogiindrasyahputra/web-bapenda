@extends('layouts.app')

@section('content')
@if($isNewsletter)
<div class="newsletter-page">
    <header class="newsletter-hero">
        <div class="newsletter-hero-inner">
            <a href="{{ route('dashboard') }}" class="newsletter-back">BERANDA</a>
            <span class="newsletter-eyebrow">PUBLIKASI DDTC</span>
            <h1>Newsletter Perpajakan</h1>
            <p>Wawasan singkat dan praktis mengenai perkembangan regulasi serta isu perpajakan domestik dan internasional dari DDTC.</p>
        </div>
    </header>

    <main class="newsletter-content">
        <div class="newsletter-heading">
            <div>
                <span class="newsletter-label">NEWSLETTER</span>
                <h2>Ikuti perkembangan pajak terbaru</h2>
            </div>
            <a href="{{ $newsletterSource }}" target="_blank" rel="noopener noreferrer" class="newsletter-source">Lihat semua newsletter ↗</a>
        </div>

        <section class="newsletter-grid" aria-label="Daftar newsletter DDTC">
            @foreach($newsletters as $newsletter)
                <article class="newsletter-card">
                    <div class="newsletter-card-cover">
                        <img src="{{ $newsletter['image'] }}" alt="{{ $newsletter['title'] }}" loading="lazy">
                        <span>DDTC<br><strong>NEWS</strong></span>
                    </div>
                    <div class="newsletter-card-body">
                        <span class="newsletter-type">NEWSLETTER</span>
                        <h3>{{ $newsletter['title'] }}</h3>
                        <p>{{ $newsletter['description'] }}</p>
                        <a href="{{ $newsletter['url'] }}" target="_blank" rel="noopener noreferrer" class="newsletter-link">Baca newsletter <span>↗</span></a>
                    </div>
                </article>
            @endforeach
        </section>

        <section class="newsletter-note">
            <strong>Sumber resmi DDTC</strong>
            <p>Konten newsletter dirangkum dari katalog publikasi DDTC. Buka kartu untuk membaca artikel lengkap pada situs sumber.</p>
        </section>
    </main>
</div>
<style>
    .newsletter-page { min-height: 100vh; background: #f3f7f5; color: #173042; }
    .newsletter-hero { border-top: 5px solid #e8b84b; background: linear-gradient(118deg, rgba(10,40,60,.88), rgba(8,127,120,.58)), url('https://cdn.phototourl.com/member/2026-09-12-99a0cea5-88d4-4d18-a531-f011da78e5a0.jpg') center / cover; color: #fff; }
    .newsletter-hero-inner, .newsletter-content { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .newsletter-hero-inner { padding: 42px 0 48px; }.newsletter-back, .newsletter-eyebrow, .newsletter-label { color: #c8f4e8; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-decoration: none; }.newsletter-back { display: inline-block; margin-bottom: 28px; }.newsletter-eyebrow, .newsletter-label { display: block; }.newsletter-eyebrow { color: #ffe08a; }.newsletter-hero h1 { margin: 0; color: #fff; text-shadow: 0 2px 10px rgba(0,0,0,.25); font: 700 clamp(34px, 4vw, 50px)/1.08 'Playfair Display', serif; }.newsletter-hero p { max-width: 690px; margin: 16px 0 0; color: #f0fffb; font-size: clamp(14px, 1.2vw, 16px); line-height: 1.75; }
    .newsletter-content { padding: 42px 0 72px; }.newsletter-heading { display: flex; justify-content: space-between; align-items: end; gap: 24px; margin-bottom: 22px; }.newsletter-label { color: #087f78; }.newsletter-heading h2 { margin: 8px 0 0; color: #123f59; font: 700 clamp(26px, 3vw, 36px)/1.15 'Playfair Display', serif; }.newsletter-source, .newsletter-link { color: #087f78; font-size: 13px; font-weight: 800; }.newsletter-source:hover, .newsletter-link:hover { color: #1763a5; text-decoration: underline; }
    .newsletter-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 17px; }.newsletter-card { overflow: hidden; display: flex; flex-direction: column; border: 1px solid #dce8e3; border-top: 4px solid #087f78; border-radius: 12px; background: #fff; box-shadow: 0 10px 24px rgba(18, 63, 89, .07); transition: transform .2s ease, box-shadow .2s ease; }.newsletter-card:hover { transform: translateY(-3px); box-shadow: 0 16px 30px rgba(18,63,89,.13); }.newsletter-card:nth-child(3n + 2) { border-top-color: #3d78c4; }.newsletter-card:nth-child(3n + 3) { border-top-color: #e1a92e; }.newsletter-card-cover { position: relative; display: grid; place-items: center; height: 170px; overflow: hidden; color: #fff; background: #087f78; font: 700 22px/1.05 'Playfair Display', serif; text-align: center; }.newsletter-card-cover::after { position: absolute; inset: 0; content: ''; background: linear-gradient(135deg, rgba(18, 63, 89, .58), rgba(8, 127, 120, .32)); }.newsletter-card-cover img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }.newsletter-card-cover span { z-index: 1; text-shadow: 0 2px 12px rgba(0, 0, 0, .35); }.newsletter-card-cover strong { font-size: 30px; letter-spacing: .04em; }.newsletter-card-body { display: flex; flex: 1; flex-direction: column; padding: 20px; }.newsletter-type { color: #087f78; font-size: 10px; font-weight: 800; letter-spacing: .1em; }.newsletter-card h3 { margin: 12px 0 10px; color: #123f59; font-size: 17px; line-height: 1.4; }.newsletter-card p { flex: 1; margin: 0 0 20px; color: #526b76; font-size: 13px; line-height: 1.7; }.newsletter-link span { margin-left: 4px; }
    .newsletter-note { margin-top: 34px; padding: 22px 24px; border-left: 4px solid #e8b84b; border-radius: 8px; background: #fff9e8; }.newsletter-note strong { font: 700 20px 'Playfair Display', serif; }.newsletter-note p { margin: 7px 0 0; color: #6b5a2d; font-size: 14px; line-height: 1.65; }
    @media (max-width: 900px) { .newsletter-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }.newsletter-card-cover { flex-shrink: 0; }
    @media (max-width: 620px) { .newsletter-hero-inner { padding: 36px 0 40px; }.newsletter-content { padding-top: 28px; }.newsletter-heading { display: block; }.newsletter-heading h2 { font-size: 29px; }.newsletter-source { display: inline-block; margin-top: 14px; }.newsletter-grid { grid-template-columns: 1fr; }.newsletter-card h3 { font-size: 16px; } }
</style>
@else
<div class="ebook-page">
    <header class="ebook-hero">
        <div class="ebook-hero-inner">
            <a href="{{ route('dashboard') }}" class="ebook-back">BERANDA</a>
            <span class="ebook-eyebrow">PUBLIKASI DJP</span>
            <h1>Buku Elektronik Perpajakan</h1>
            <p>Kumpulan buku elektronik resmi dari Direktorat Jenderal Pajak untuk membantu memahami aturan, layanan, dan kebijakan perpajakan.</p>
        </div>
    </header>

    <main class="ebook-content">
        <div class="ebook-heading">
            <div>
                <span class="ebook-label">E-BOOK RESMI</span>
                <h2>Belajar pajak dari sumber DJP</h2>
            </div>
            <a href="{{ $ebookSource }}" target="_blank" rel="noopener noreferrer" class="ebook-source">Buka katalog DJP ↗</a>
        </div>

        <section class="ebook-grid" aria-label="Katalog buku elektronik DJP">
            @foreach($ebooks as $ebook)
                <article class="ebook-card">
                    <div class="ebook-cover-wrap">
                        <img class="ebook-cover" src="{{ $ebook['image'] }}" alt="Cover {{ $ebook['title'] }}" loading="lazy">
                    </div>
                    <div class="ebook-card-top">
                        <span class="ebook-icon">E</span>
                        <span class="ebook-type">BUKU ELEKTRONIK</span>
                    </div>
                    <h3>{{ $ebook['title'] }}</h3>
                    <p>{{ $ebook['description'] }}</p>
                    <a href="{{ $ebook['url'] }}" target="_blank" rel="noopener noreferrer" class="ebook-link">Baca sinopsis dan unduh <span>↗</span></a>
                </article>
            @endforeach
        </section>

        <section class="ebook-note">
            <div>
                <span class="ebook-label">SUMBER</span>
                <h2>Informasi selalu merujuk ke situs resmi DJP</h2>
            </div>
            <p>Judul dan tautan pada katalog ini bersumber dari halaman Buku Elektronik Direktorat Jenderal Pajak. Klik kartu untuk membaca sinopsis atau mengunduh buku di situs resminya.</p>
        </section>
    </main>
</div>

<style>
    .ebook-page { min-height: 100vh; background: #f6f8f5; color: #173042; }
    .ebook-hero { border-top: 5px solid #e8b84b; background: linear-gradient(118deg, rgba(10,40,60,.88), rgba(8,127,120,.58)), url('https://cdn.phototourl.com/member/2026-09-12-09a2514a-a2e0-4fe7-b8c8-32898cc5c82e.jpg') center / cover; color: #fff; }
    .ebook-hero-inner, .ebook-content { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .ebook-hero-inner { padding: 42px 0 48px; }
    .ebook-back, .ebook-eyebrow, .ebook-label { color: #a9e5d9; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-decoration: none; }
    .ebook-back { display: inline-block; margin-bottom: 28px; }
    .ebook-eyebrow, .ebook-label { display: block; }
    .ebook-hero h1 { margin: 0; color: #fff; text-shadow: 0 2px 10px rgba(0,0,0,.25); font: 700 clamp(34px, 4vw, 50px)/1.08 'Playfair Display', serif; }
    .ebook-hero p { max-width: 680px; margin: 16px 0 0; color: #f0fffb; font-size: clamp(14px, 1.2vw, 16px); line-height: 1.75; }
    .ebook-content { padding: 42px 0 72px; }
    .ebook-heading { display: flex; justify-content: space-between; align-items: end; gap: 24px; margin-bottom: 22px; }
    .ebook-label { color: #087f78; }
    .ebook-heading h2 { margin: 8px 0 0; color: #123f59; font: 700 clamp(26px, 3vw, 36px)/1.15 'Playfair Display', serif; }
    .ebook-source, .ebook-link { color: #087f78; font-size: 13px; font-weight: 800; }
    .ebook-source:hover, .ebook-link:hover { text-decoration: underline; }
    .ebook-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 17px; }
    .ebook-card { display: flex; flex-direction: column; min-height: 260px; padding: 14px; border: 1px solid #dce8e3; border-top: 4px solid #087f78; border-radius: 12px; background: #fff; box-shadow: 0 10px 24px rgba(18, 63, 89, .07); overflow: hidden; transition: transform .2s ease, box-shadow .2s ease; }
    .ebook-card:hover { transform: translateY(-3px); box-shadow: 0 16px 30px rgba(18,63,89,.13); }
    .ebook-card:nth-child(3n + 2) { border-top-color: #3d78c4; }
    .ebook-card:nth-child(3n + 3) { border-top-color: #e1a92e; }
    .ebook-cover-wrap { display: grid; place-items: center; height: 190px; overflow: hidden; border-radius: 7px; background: #edf4f0; }
    .ebook-cover { width: 100%; height: 100%; object-fit: contain; padding: 12px; }
    .ebook-card-top { display: flex; align-items: center; gap: 10px; }
    .ebook-icon { display: grid; place-items: center; width: 34px; height: 40px; border-radius: 5px 5px 8px 5px; color: #fff; background: #087f78; font: 700 16px 'Playfair Display', serif; box-shadow: 0 5px 10px rgba(8,127,120,.2); }
    .ebook-type { color: #087f78; font-size: 10px; font-weight: 800; letter-spacing: .1em; }
    .ebook-card h3 { margin: 18px 8px 10px; color: #123f59; font-size: 17px; line-height: 1.4; }
    .ebook-card .ebook-card-top, .ebook-card p, .ebook-card .ebook-link { margin-left: 8px; margin-right: 8px; }
    .ebook-card p { flex: 1; margin: 0 0 20px; color: #526b76; font-size: 13px; line-height: 1.7; }
    .ebook-link span { margin-left: 4px; }
    .ebook-note { display: grid; grid-template-columns: 1fr 1.2fr; gap: 30px; margin-top: 34px; padding: 24px; border-left: 4px solid #e8b84b; border-radius: 8px; background: #fff9e8; }
    .ebook-note h2 { margin: 8px 0 0; font: 700 23px/1.2 'Playfair Display', serif; }
    .ebook-note p { margin: 0; color: #6b5a2d; font-size: 14px; line-height: 1.7; }
    @media (max-width: 900px) { .ebook-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 620px) { .ebook-hero-inner { padding: 36px 0 40px; }.ebook-content { padding-top: 28px; }.ebook-heading { display: block; }.ebook-source { display: inline-block; margin-top: 14px; }.ebook-grid { grid-template-columns: 1fr; }.ebook-card { min-height: 0; }.ebook-card h3 { font-size: 16px; }.ebook-note { grid-template-columns: 1fr; gap: 14px; } }
</style>
@endif

<section class="publication-contact" aria-labelledby="publication-contact-title">
    <div class="publication-contact-inner">
        <div class="publication-contact-heading">
            <span class="publication-contact-eyebrow">HUBUNGI KAMI</span>
            <h2 id="publication-contact-title">Informasi dan layanan BPKPD</h2>
            <p>Gunakan kanal resmi berikut untuk menghubungi atau mendapatkan bantuan.</p>
        </div>
        <div class="publication-contact-grid">
            <a class="publication-contact-card" href="https://www.google.com/maps/search/?api=1&amp;query=88Q4%2B7W4%2C%20Palopat%20PK%2C%20Kec.%20Padangsidimpuan%20Utara%2C%20Kota%20Padang%20Sidempuan%2C%20Sumatera%20Utara%2022733" target="_blank" rel="noopener noreferrer">
                <strong>Alamat</strong>
                <span>88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733</span>
                <small>Buka lokasi di Google Maps ↗</small>
            </a>
            <a class="publication-contact-card" href="https://lapor.go.id/" target="_blank" rel="noopener noreferrer">
                <strong>Pelayanan</strong>
                <span>Layanan aspirasi dan pengaduan masyarakat melalui LAPOR!</span>
                <small>Buka lapor.go.id ↗</small>
            </a>
            <a class="publication-contact-card" href="https://bpkpd.padangsidimpuankota.go.id/struktur-organisasi/" target="_blank" rel="noopener noreferrer">
                <strong>Butuh bantuan?</strong>
                <span>Kunjungi halaman resmi BPKPD untuk informasi dan bantuan.</span>
                <small>Buka portal BPKPD ↗</small>
            </a>
            <a class="publication-contact-card" href="tel:+6263427075">
                <strong>Telepon</strong>
                <span>(0634) 27075</span>
                <small>Hubungi melalui telepon</small>
            </a>
            <a class="publication-contact-card" href="mailto:bpkpd@padangsidimpuankota.go.id">
                <strong>Email</strong>
                <span>bpkpd@padangsidimpuankota.go.id</span>
                <small>Kirim email</small>
            </a>
            <a class="publication-contact-card" href="https://www.instagram.com/bpkpdsidempuan?stkn=ejd2bDQxeDZra3V6" target="_blank" rel="noopener noreferrer">
                <strong>Instagram</strong>
                <span>@bpkpdsidempuan</span>
                <small>Kunjungi Instagram ↗</small>
            </a>
        </div>
    </div>
</section>

<style>
    .publication-contact { padding: 48px 16px 56px; background: #eaf2f1; }
    .publication-contact-inner { width: min(100%, 1180px); margin: 0 auto; }
    .publication-contact-heading { margin-bottom: 20px; }
    .publication-contact-eyebrow { color: #087f78; font-size: 11px; font-weight: 800; letter-spacing: .12em; }
    .publication-contact-heading h2 { margin: 8px 0; color: #123f59; font: 700 clamp(25px, 3vw, 34px)/1.15 'Playfair Display', serif; }
    .publication-contact-heading p { margin: 0; color: #526b76; font-size: 14px; line-height: 1.7; }
    .publication-contact-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
    .publication-contact-card { display: flex; min-width: 0; flex-direction: column; gap: 9px; padding: 18px; border: 1px solid #dce8e3; border-radius: 10px; background: #fff; box-shadow: 0 8px 20px rgba(18, 63, 89, .06); transition: transform .2s ease, box-shadow .2s ease; }
    .publication-contact-card:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(18, 63, 89, .12); }
    .publication-contact-card strong { color: #123f59; font-size: 14px; }
    .publication-contact-card span { overflow-wrap: anywhere; color: #526b76; font-size: 13px; line-height: 1.6; }
    .publication-contact-card small { margin-top: auto; color: #087f78; font-size: 12px; font-weight: 800; }
    @media (max-width: 760px) { .publication-contact-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 520px) { .publication-contact { padding: 34px 16px 40px; }.publication-contact-grid { grid-template-columns: 1fr; } }
</style>
@endsection
