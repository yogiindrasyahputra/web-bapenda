@extends('layouts.app')

@section('content')
<div class="hotel-faq-page">
    <header class="hotel-faq-hero">
        <div class="hotel-faq-hero-inner">
            <a href="{{ route('hotel.index') }}" class="hotel-faq-back">BERANDA HOTEL</a>
            <span class="hotel-faq-eyebrow">PUSAT BANTUAN PAJAK HOTEL</span>
            <h1>Pertanyaan yang Sering Ditanyakan</h1>
            <p>Temukan jawaban singkat mengenai pendaftaran, pembayaran, pelaporan, dan layanan digital pajak daerah.</p>
            <div class="hotel-faq-stats"><span><strong>08</strong> Pertanyaan utama</span><span><strong>24/7</strong> Akses informasi</span><span><strong>Resmi</strong> Referensi DJP</span></div>
        </div>
    </header>

    <main class="hotel-faq-content">
        <div class="hotel-faq-heading">
            <div>
                <span class="hotel-section-label">FAQ PAJAK DAERAH</span>
                <h2>Informasi untuk wajib pajak hotel</h2>
            </div>
            <a href="https://pajak.go.id/id/reformdjp/faq" target="_blank" rel="noopener noreferrer" class="hotel-faq-source">FAQ resmi DJP ↗</a>
        </div>

        <div class="hotel-faq-list">
            <details open>
                <summary>Apakah memiliki NIK otomatis menjadikan seseorang wajib pajak?</summary>
                <p>Tidak. NIK menjadi NPWP tidak otomatis membuat seseorang wajib melaporkan SPT atau membayar pajak. Kewajiban pajak muncul apabila terdapat penghasilan atau kegiatan usaha yang memenuhi ketentuan perpajakan.</p>
            </details>
            <details>
                <summary>Bagaimana cara mendaftarkan usaha hotel sebagai wajib pajak?</summary>
                <p>Pendaftaran dapat dilakukan melalui layanan pemerintah daerah sesuai domisili usaha. Siapkan identitas pemilik atau badan usaha, data usaha, alamat hotel, serta dokumen perizinan yang diminta.</p>
            </details>
            <details>
                <summary>Apa yang perlu dilakukan setelah hotel terdaftar?</summary>
                <p>Pastikan data hotel dan wajib pajak selalu terbaru, catat seluruh transaksi, hitung pajak sesuai ketentuan daerah, lalu lakukan pembayaran dan pelaporan sebelum batas waktu.</p>
            </details>
            <details>
                <summary>Bagaimana cara membayar pajak hotel?</summary>
                <p>Gunakan kanal pembayaran yang ditetapkan pemerintah daerah. Periksa nominal tagihan, buat atau gunakan kode billing jika diwajibkan, kemudian simpan bukti pembayaran untuk kebutuhan pelaporan.</p>
            </details>
            <details>
                <summary>Berapa lama masa berlaku kode billing?</summary>
                <p>Kode billing umumnya memiliki masa berlaku terbatas. Periksa tanggal kedaluwarsa yang tercantum pada billing dan buat kode baru apabila masa berlakunya sudah lewat.</p>
            </details>
            <details>
                <summary>Bagaimana cara melaporkan pajak hotel?</summary>
                <p>Siapkan rekap omzet dan bukti pembayaran, isi laporan pada kanal yang disediakan pemerintah daerah, lalu kirimkan sebelum batas waktu pelaporan yang berlaku di Kota Padangsidimpuan.</p>
            </details>
            <details>
                <summary>Apakah status pembayaran dan pelaporan dapat dilacak?</summary>
                <p>Gunakan menu pelacakan pada sistem untuk melihat riwayat permohonan, pembayaran, atau laporan yang telah dikirim. Simpan nomor transaksi agar proses pencarian lebih mudah.</p>
            </details>
            <details>
                <summary>Bagaimana keamanan data akun wajib pajak?</summary>
                <p>Jaga kerahasiaan email, kata sandi, dan kode verifikasi. Jangan membagikan kredensial kepada pihak lain dan segera hubungi pengelola layanan apabila menemukan aktivitas yang tidak dikenal.</p>
            </details>
        </div>
        <div class="hotel-faq-help"><strong>Belum menemukan jawaban?</strong><span>Hubungi petugas melalui layanan pengaduan.</span><a href="https://api.whatsapp.com/send?text=FAQ%20Coretax%20http%3A%2F%2Fpajak.go.id%2Fid%2Freformdjp%2Ffaq" target="_blank" rel="noopener noreferrer">Kirim pertanyaan →</a></div>
    </main>
</div>

<style>
    .hotel-faq-page { min-height: 100vh; background: #f3f7f5; color: #173042; }
    .hotel-faq-hero { border-top: 5px solid #e8b84b; color: #fff; background: linear-gradient(118deg, rgba(10,40,60,.88), rgba(8,127,120,.56)), url('https://cdn.phototourl.com/member/2026-09-12-deac1b56-e8a4-4d96-965e-184fdc79f849.jpg') center / cover; }
    .hotel-faq-hero-inner, .hotel-faq-content { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hotel-faq-hero-inner { padding: 42px 0 48px; }
    .hotel-faq-back, .hotel-faq-eyebrow, .hotel-section-label { color: #a9e5d9; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-decoration: none; }
    .hotel-faq-back { display: inline-block; margin-bottom: 28px; }
    .hotel-faq-eyebrow, .hotel-section-label { display: block; }
    .hotel-faq-hero h1 { margin: 0; color: #fff; font: 700 clamp(34px, 5vw, 58px)/1.05 'Playfair Display', serif; }
    .hotel-faq-hero p { max-width: 690px; margin: 16px 0 0; color: #d4eee8; font-size: 15px; line-height: 1.7; }
    .hotel-faq-stats { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 24px; }
    .hotel-faq-stats span { padding: 10px 14px; border: 1px solid rgba(255,255,255,.2); border-radius: 8px; color: rgba(255,255,255,.8); background: rgba(255,255,255,.1); font-size: 11px; font-weight: 700; }
    .hotel-faq-stats strong { margin-right: 5px; color: #ffc338; font-size: 17px; }
    .hotel-faq-content { padding: 42px 0 72px; }
    .hotel-faq-heading { display: flex; align-items: end; justify-content: space-between; gap: 24px; margin-bottom: 22px; }
    .hotel-faq-heading h2 { margin: 8px 0 0; color: #123f59; font: 700 clamp(26px, 3vw, 36px)/1.15 'Playfair Display', serif; }
    .hotel-section-label { color: #087f78; }
    .hotel-faq-source { flex: 0 0 auto; color: #087f78; font-size: 13px; font-weight: 800; text-decoration: none; }
    .hotel-faq-source:hover { text-decoration: underline; }
    .hotel-faq-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
    .hotel-faq-list details { border: 1px solid #dce8e3; border-radius: 10px; background: #fff; box-shadow: 0 8px 20px rgba(18,63,89,.04); }
    .hotel-faq-list summary { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 17px 18px; color: #173b62; cursor: pointer; font-size: 13px; font-weight: 800; list-style: none; }
    .hotel-faq-list summary::-webkit-details-marker { display: none; }
    .hotel-faq-list summary::after { content: '+'; color: #087f78; font-size: 20px; font-weight: 500; line-height: 1; }
    .hotel-faq-list details[open] summary { color: #087f78; border-bottom: 1px solid #e4efeb; }
    .hotel-faq-list details[open] summary::after { content: '−'; }
    .hotel-faq-list details p { margin: 0; padding: 0 18px 18px; color: #5b7078; font-size: 13px; line-height: 1.7; }
    .hotel-faq-help { display: flex; align-items: center; gap: 14px; margin-top: 22px; padding: 16px 18px; border-left: 4px solid #e8b84b; border-radius: 8px; background: #fff9e8; color: #6b5a2d; font-size: 12px; }
    .hotel-faq-help span { color: #806f43; }
    .hotel-faq-help a { margin-left: auto; color: #087f78; font-weight: 800; white-space: nowrap; }
    @media (max-width: 640px) { .hotel-faq-help { align-items: flex-start; flex-wrap: wrap; }.hotel-faq-help a { width: 100%; margin-left: 0; } }
    @media (max-width: 640px) { .hotel-faq-hero-inner { padding: 34px 0 38px; }.hotel-faq-content { padding-top: 28px; }.hotel-faq-heading { display: block; }.hotel-faq-source { display: inline-block; margin-top: 14px; }.hotel-faq-list { grid-template-columns: 1fr; } }
</style>
@endsection
