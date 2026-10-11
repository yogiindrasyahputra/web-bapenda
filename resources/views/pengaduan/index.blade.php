@extends('layouts.app')

@section('content')
<div class="container complaint-page">
    <section class="complaint-feature mb-4">
        <a href="{{ route('dashboard') }}" class="complaint-back">&#8592; Kembali ke Dashboard</a>
        <div class="complaint-hero">
            <span class="text-uppercase text-success fw-bold small">Layanan Pengaduan</span>
            <h1 class="mb-2">Tata Cara Pengaduan</h1>
            <p class="text-muted mb-0">Sampaikan laporan terkait pelayanan, penyalahgunaan wewenang, atau pelanggaran melalui kanal resmi berikut. Pilih saluran yang paling sesuai dan sertakan informasi yang jelas agar laporan dapat ditindaklanjuti dengan baik.</p>
        </div>

        <div class="lapor-page-banner">
        <div class="lapor-page-copy">
            <span>Layanan aspirasi dan pengaduan masyarakat</span>
            <h2>LAPOR!</h2>
            <p>Sampaikan aduan, permintaan informasi, dan aspirasi Anda melalui kanal resmi pemerintah.</p>
            <a href="https://lapor.go.id/" target="_blank" rel="noopener noreferrer" class="lapor-page-link">Buka layanan LAPOR! <span aria-hidden="true">&#8594;</span></a>
        </div>
        <div class="lapor-page-device" aria-hidden="true">
            <div class="lapor-page-screen"><b>Layanan Pengaduan</b><small>Online Rakyat</small><i></i><i></i><i></i></div>
        </div>
        </div>
    </section>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card channel-card channel-web h-100 border-0 shadow-sm">
                <div class="card-body">
                    <span class="badge rounded-pill text-bg-success mb-3">01 · Situs resmi</span>
                    <h5>Portal Pengaduan DJP</h5>
                    <p class="text-muted small">Ajukan pengaduan secara online dan ikuti prosesnya melalui portal resmi.</p>
                    <a href="https://pengaduan.pajak.go.id/" target="_blank" rel="noopener noreferrer" class="fw-semibold">Buka portal pengaduan ↗</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card channel-card channel-phone h-100 border-0 shadow-sm">
                <div class="card-body">
                    <span class="badge rounded-pill text-bg-warning mb-3">02 · Telepon</span>
                    <h5>Kring Pajak</h5>
                    <p class="text-muted small">Sampaikan laporan atau minta bantuan melalui layanan telepon.</p>
                    <a href="tel:1500200" class="fw-semibold">1500200</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card channel-card channel-email h-100 border-0 shadow-sm">
                <div class="card-body">
                    <span class="badge rounded-pill text-bg-info mb-3">03 · Email</span>
                    <h5>Email Pengaduan</h5>
                    <p class="text-muted small">Kirim uraian laporan dan dokumen pendukung melalui email resmi.</p>
                    <a href="mailto:pengaduan@pajak.go.id" class="fw-semibold">pengaduan@pajak.go.id</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card channel-card channel-skm h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="skm-card-top">
                        <span class="skm-mark" aria-hidden="true">SKM</span>
                        <span class="skm-label">04 · Survei layanan</span>
                    </div>
                    <h5>Survei Kepuasan Masyarakat</h5>
                    <p class="text-muted small">Berikan penilaian dan masukan Anda melalui survei kepuasan masyarakat.</p>
                    <a href="https://skm.go.id/share/instansi/c060fc43-52cf-4405-98a0-04506521db7c/1" target="_blank" rel="noopener noreferrer" class="skm-link">Isi survei sekarang <span aria-hidden="true">&#8594;</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card channel-card channel-fax h-100 border-0 shadow-sm">
                <div class="card-body">
                    <span class="badge rounded-pill text-bg-secondary mb-3">05 · Faksimile</span>
                    <h5>Faksimile</h5>
                    <p class="text-muted small mb-0">Kirim dokumen pengaduan melalui faksimile ke nomor resmi DJP.</p>
                    <strong>(021) 584792</strong>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card channel-card channel-office h-100 border-0 shadow-sm">
                <div class="card-body">
                    <span class="badge rounded-pill text-bg-dark mb-3">06 · Surat atau langsung</span>
                    <h5>Datang ke Kantor DJP</h5>
                    <p class="text-muted small mb-0">Direktorat Penyuluhan, Pelayanan dan Hubungan Masyarakat, Gedung Utama Lantai 16, Kantor Pusat DJP, Jalan Gatot Subroto Kavling 40-42, Jakarta 12190. Kotak Pos 124.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-light border shadow-sm mb-4">
        <strong>Sebelum mengirim laporan:</strong> jelaskan kejadian secara kronologis, cantumkan waktu dan lokasi, nama pihak terkait bila diketahui, serta lampirkan bukti pendukung bila tersedia. Pastikan nomor kontak atau alamat email yang digunakan dapat dihubungi untuk keperluan tindak lanjut.
        <a href="https://www.pajak.go.id/id/tata-cara-pengaduan" target="_blank" rel="noopener noreferrer" class="alert-link ms-1">Lihat tata cara resmi DJP ↗</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</div>
<style>
    .complaint-page { max-width: 1180px; padding: 18px 0 48px; color: #173042; }
    .complaint-feature { position: relative; display: grid; grid-template-columns: 1fr 1fr; overflow: hidden; border-radius: 20px; background: linear-gradient(105deg, rgba(8,37,69,.9), rgba(12,65,103,.78)), url('https://cdn.phototourl.com/member/2026-09-10-b8f636ff-7fb8-4e6d-b503-ffda7101d377.jpg') center/cover; box-shadow: 0 18px 38px rgba(18,63,89,.16); }
    .complaint-hero { position: relative; overflow: hidden; padding: 58px 34px 34px; border-radius: 20px; background: transparent; color: #fff; box-shadow: 0 18px 38px rgba(18,63,89,.16); }
    .complaint-feature .complaint-hero { min-height: 100%; border-radius: 0; box-shadow: none; }
    .complaint-hero::after { position: absolute; right: -80px; bottom: -150px; width: 360px; height: 360px; border: 1px solid rgba(255,255,255,.2); border-radius: 50%; box-shadow: 0 0 0 32px rgba(255,255,255,.05), 0 0 0 68px rgba(255,255,255,.035); content: ''; }
    .complaint-back { position: absolute; z-index: 5; top: 18px; right: 24px; display: inline-flex; align-items: center; padding: 8px 13px; border: 1px solid rgba(255,255,255,.24); border-radius: 999px; color: rgba(255,255,255,.9); background: rgba(7,32,62,.3); font-size: 12px; font-weight: 800; text-decoration: none; transition: background .2s ease, color .2s ease, transform .2s ease; }
    .complaint-back:hover { color: #123f59; background: #ffc338; transform: translateY(-1px); }
    .complaint-hero h1 { position: relative; z-index: 1; margin-bottom: 12px !important; color: #fff; font: 700 clamp(30px, 4vw, 42px)/1.1 'Playfair Display', serif; }
    .complaint-hero h1 { max-width: 520px; text-shadow: 0 2px 8px rgba(0,0,0,.24); }
    .complaint-hero p { position: relative; z-index: 1; max-width: 560px; color: rgba(255,255,255,.92) !important; font-size: clamp(13px, 1.05vw, 15px); line-height: 1.65; text-shadow: 0 1px 4px rgba(0,0,0,.2); }
    .complaint-hero .text-success { color: #ffc338 !important; }
    .lapor-page-banner { position: relative; display: flex; min-height: 300px; overflow: hidden; align-items: center; justify-content: space-between; padding: 30px 46px; border-radius: 0; border-left: 0; color: #fff; background: rgba(7,32,62,.22); }
    .lapor-page-banner::before, .lapor-page-banner::after { position: absolute; content: ''; border: 18px solid rgba(255,255,255,.24); border-radius: 50%; transform: rotate(35deg); }
    .lapor-page-banner::before { width: 170px; height: 170px; right: -65px; top: -100px; }.lapor-page-banner::after { width: 150px; height: 150px; left: -105px; bottom: -115px; border-color: rgba(18,63,89,.18); }
    .lapor-page-copy { position: relative; z-index: 1; max-width: 500px; text-shadow: 0 1px 4px rgba(0,0,0,.22); }.lapor-page-copy > span { display: block; margin-bottom: 7px; color: #d9eaff; font-size: clamp(9px, .8vw, 11px); font-weight: 800; letter-spacing: .08em; line-height: 1.35; text-transform: uppercase; }.lapor-page-copy h2 { margin: 0; color: #fff; font-size: clamp(34px, 4vw, 52px); font-weight: 900; letter-spacing: .04em; line-height: 1; }.lapor-page-copy p { max-width: 420px; margin: 14px 0 20px; color: rgba(255,255,255,.92); font-size: clamp(12px, 1vw, 14px); line-height: 1.55; }.lapor-page-link { display: inline-flex; align-items: center; gap: 7px; padding: 10px 15px; border-radius: 7px; color: #fff; background: #123f59; font-size: clamp(11px, .9vw, 13px); font-weight: 800; text-decoration: none; transition: transform .2s ease, background .2s ease; text-shadow: none; }.lapor-page-link:hover { color: #fff; background: #0b2344; transform: translateY(-2px); }
    .lapor-page-device { position: relative; z-index: 1; width: 93px; height: 174px; padding: 7px; border: 4px solid #181818; border-radius: 18px; background: #111; box-shadow: 0 12px 18px rgba(18,63,89,.25); transform: rotate(7deg); }.lapor-page-device::before { display: block; width: 30px; height: 4px; margin: 0 auto 6px; border-radius: 5px; content: ''; background: #555; }.lapor-page-screen { display: flex; height: 147px; flex-direction: column; gap: 6px; padding: 12px 7px; border-radius: 9px; color: #fff; background: linear-gradient(180deg, #174b9b, #123f59); font-size: 9px; }.lapor-page-screen small { font-size: 7px; opacity: .85; }.lapor-page-screen i { display: block; height: 15px; margin-top: 5px; border-radius: 3px; background: rgba(255,255,255,.82); }
    .channel-card { overflow: hidden; position: relative; min-height: 190px; border-radius: 15px; transition: transform .2s ease, box-shadow .2s ease; }
    .channel-card::before { content: ''; position: absolute; inset: 0 auto 0 0; width: 5px; background: #087f78; }
    .channel-card:hover { transform: translateY(-3px); box-shadow: 0 16px 28px rgba(18,63,89,.12) !important; }
    .channel-card .card-body { padding: 24px 22px 21px 29px; }
    .channel-card .badge { font-size: 11px; letter-spacing: .02em; }
    .channel-card h5 { margin: 0 0 10px; color: #123f59; font-size: clamp(18px, 1.5vw, 21px); font-weight: 800; line-height: 1.25; }
    .channel-card p { margin-bottom: 18px; color: #5d707a !important; font-size: 13px; line-height: 1.65; }
    .channel-card a, .channel-card strong { color: #087f78; font-size: 13px; font-weight: 800; }
    .channel-web { background: linear-gradient(135deg, #ffffff, #eef9f3); }.channel-web::before { background: #087f78; }
    .channel-phone { background: linear-gradient(135deg, #fffdf5, #fff4d8); }.channel-phone::before { background: #e8b84b; }.channel-phone a { color: #a16d08; }
    .channel-email { background: linear-gradient(135deg, #ffffff, #eef7fc); }.channel-email::before { background: #4d9fd4; }.channel-email a { color: #2677a5; }
    .channel-skm { color: #fff; background: linear-gradient(120deg, rgba(9,40,58,.92), rgba(8,127,120,.62)), url('https://cdn.phototourl.com/member/2026-09-14-2aa8b3ac-1f99-4400-851d-0f911f421bba.jpg') center/cover; box-shadow: 0 14px 30px rgba(8,127,120,.2) !important; }
    .channel-skm::before { width: 8px; background: #ffc338; }
    .channel-skm::after { position: absolute; right: -34px; bottom: -54px; width: 145px; height: 145px; border: 1px solid rgba(255,255,255,.2); border-radius: 50%; box-shadow: 0 0 0 18px rgba(255,255,255,.05), 0 0 0 38px rgba(255,255,255,.035); content: ''; }
    .channel-skm .card-body { position: relative; z-index: 1; }
    .skm-card-top { display: flex; align-items: center; gap: 10px; margin-bottom: 22px; }
    .skm-mark { display: inline-flex; width: 42px; height: 42px; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,.38); border-radius: 12px; color: #123f59; background: #ffc338; font-size: 10px; font-weight: 900; letter-spacing: .04em; }
    .skm-label { color: rgba(255,255,255,.78); font-size: 10px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
    .channel-skm h5 { max-width: 240px; color: #fff; }
    .channel-skm p { color: rgba(255,255,255,.78) !important; }
    .skm-link { display: inline-flex; align-items: center; gap: 9px; padding: 10px 14px; border: 1px solid rgba(255,255,255,.32); border-radius: 8px; color: #123f59 !important; background: #fff; font-size: 12px !important; transition: transform .2s ease, background .2s ease, color .2s ease; }
    .skm-link:hover { color: #123f59 !important; background: #ffc338; transform: translateY(-2px); }
    .channel-fax { background: linear-gradient(135deg, #fbf9ff, #f1edfa); }.channel-fax::before { background: #8b78b8; }
    .channel-office { background: linear-gradient(135deg, #fffaf8, #fff0eb); }.channel-office::before { background: #ef765d; }
    .complaint-page .alert-light { border: 0 !important; border-left: 4px solid #e8b84b !important; border-radius: 10px; background: #fff9e8; color: #6b5a2d; font-size: 14px; line-height: 1.65; }
    @media (max-width: 640px) { .complaint-page { padding: 0 12px 28px; }.complaint-feature { display: block; }.complaint-hero { min-height: 0; padding: 62px 20px 27px; }.complaint-hero h1 { font-size: 30px; }.complaint-hero p { font-size: 13px; }.complaint-back { top: 16px; right: 16px; font-size: 11px; }.lapor-page-banner { min-height: 230px; padding: 24px 22px; }.lapor-page-copy { max-width: 72%; }.lapor-page-copy h2 { font-size: 37px; }.lapor-page-copy p { font-size: 12px; }.lapor-page-device { width: 70px; height: 132px; padding: 5px; border-width: 3px; }.lapor-page-screen { height: 111px; padding: 8px 5px; font-size: 6px; }.lapor-page-screen small { font-size: 5px; }.lapor-page-screen i { height: 10px; }.channel-card { min-height: 0; }.channel-card .card-body { padding: 22px 20px 20px 25px; }.channel-card h5 { font-size: 18px; }.channel-card p { font-size: 13px; } }
</style>
@endsection
