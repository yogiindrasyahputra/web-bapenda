@extends('layouts.app')

@section('content')
@if($isJurnalPajak)
<div class="journal-page">
    <header class="journal-hero">
        <div class="journal-hero-content">
        <a href="{{ route('dashboard') }}" class="journal-back">BERANDA</a>
        <p class="journal-eyebrow">JURNAL PAJAK</p>
        <h1>Scientax</h1>
        <p>Jurnal Kajian Ilmiah Perpajakan Indonesia yang memuat hasil penelitian dan kajian teoritis maupun empiris mengenai isu perpajakan.</p>
        </div>
    </header>

    <main class="journal-content">
        <section class="journal-current">
            <div class="journal-current-copy">
                <span class="journal-label">CURRENT ISSUE</span>
                <h2>Rethinking Tax Administration in the Digital Economy</h2>
                <p class="journal-volume">Vol. 7 No. 2 (2026)</p>
                <p>Edisi ini membahas perubahan administrasi pajak di era digital, mulai dari analitik data dan kecerdasan buatan, desain kebijakan, penagihan pajak, perilaku kepatuhan, hingga penguatan organisasi.</p>
                <p>Artikel-artikelnya ditujukan bagi peneliti, praktisi, pegawai pajak, pembuat kebijakan, dan pemerhati perpajakan.</p>
                <a href="https://ejurnal.pajak.go.id/st/issue/current" target="_blank" rel="noopener noreferrer" class="journal-button">Buka edisi terbaru ↗</a>
            </div>
            <img class="journal-cover" src="https://ejurnal.pajak.go.id/RujUxYuks/journals/1/cover_issue_31_en.jpg" alt="Sampul Scientax Vol. 7 No. 2 tahun 2026">
        </section>

        <div class="journal-heading">
            <div><span class="journal-label">ARTICLES</span><h2>Artikel dalam edisi ini</h2></div>
            <a href="https://ejurnal.pajak.go.id/st/issue/archive" target="_blank" rel="noopener noreferrer">Lihat semua edisi ↗</a>
        </div>
        <section class="journal-grid" aria-label="Artikel Scientax">
            <article class="journal-card"><span>135-154</span><h3>Reevaluating Tax Debt Collection in Indonesia: A Policy and Legal Framework Analysis</h3><p>Muhammad Fandy Zainuddin, Afira Nida ‘Ulayya, Riska Oktiani</p><a href="https://ejurnal.pajak.go.id/st/article/view/152/191" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>155-167</span><h3>Pengaruh Inclusive Leadership dan Job Crafting terhadap Work Engagement dengan Person-Job Fit sebagai Variabel Mediasi</h3><p>Apritama Nur Hidayat, Fanny Martdianty</p><a href="https://ejurnal.pajak.go.id/st/article/view/900/187" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>168-187</span><h3>The Effects of Indonesia’s Country-by-Country Reporting Regulation on Multinational Enterprises’ Real Investment</h3><p>Apryogi Hardoko</p><a href="https://ejurnal.pajak.go.id/st/article/view/907/190" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>188-207</span><h3>Utilizing Natural Language Processing and Logistic Regression Model for Automated Detection and Classification of Tax Objects in Tax Audit Processes</h3><p>Wishnu Kusumo Agung Erlangga, Bagas Dwi Suryo Wibowo</p><a href="https://ejurnal.pajak.go.id/st/article/view/927/192" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>208-227</span><h3>Analisis Pengenaan Pajak Pertambahan Nilai (PPN) pada Daging Premium: Usulan Desain Kebijakan</h3><p>Helmalia Cahyani, Riko Riandoko</p><a href="https://ejurnal.pajak.go.id/st/article/view/1185/193" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>228-247</span><h3>E-Commerce Value-Added Tax Enforcement Strategies: A Comprehensive SWOT Analysis Approach</h3><p>Destiny Wulandari, Antonius Ragil Kuncoro</p><a href="https://ejurnal.pajak.go.id/st/article/view/922/184" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>248-270</span><h3>Penerapan Model Natural Language Processing dan Diagram Sankey dalam Analisis Rantai Pasokan pada Bidang Perpajakan</h3><p>Ryan Agatha Nanda Widiiswa, Sigit Hariyanto, Muhammad Rifqi Aziz, Ajar Parama Adhi</p><a href="https://ejurnal.pajak.go.id/st/article/view/930/183" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
            <article class="journal-card"><span>271-283</span><h3>Exploring the Drivers of Voluntary Tax Compliance among MSMEs</h3><p>Siska Intan Wulandari, Aryani Intan Endah Rahmawati</p><a href="https://ejurnal.pajak.go.id/st/article/view/923/188" target="_blank" rel="noopener noreferrer">Baca PDF ↗</a></article>
        </section>

        <section class="journal-facts"><strong>Tentang Scientax</strong><p>Scientax diterbitkan oleh Direktorat Jenderal Pajak, menggunakan proses peer review, dan terbit dua kali setahun pada April dan Oktober. Jurnal ini terbuka bagi peneliti, praktisi, pegawai, dan pemerhati perpajakan.</p><a href="https://ejurnal.pajak.go.id/st" target="_blank" rel="noopener noreferrer">Kunjungi eJurnal Pajak ↗</a></section>
    </main>
</div>
<style>
    .journal-page { min-height: 100vh; background: #f3f7f5; color: #173042; font-family: 'DM Sans', sans-serif; }.journal-hero { position: relative; overflow: hidden; padding: 44px max(24px, calc((100% - 1180px) / 2)); color: #fff; background: linear-gradient(118deg, rgba(18,63,89,.88), rgba(8,127,120,.58)), url('https://cdn.phototourl.com/free/2026-09-10-55353036-8c5c-41dd-91be-30c36b42b44f.jpg') center/cover; border-top: 5px solid #e8b84b; }.journal-hero-content { position: relative; z-index: 1; max-width: 760px; }.journal-back, .journal-eyebrow, .journal-label { color: #a9e5d9; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-decoration: none; }.journal-back { display: inline-block; margin-bottom: 24px; }.journal-eyebrow { margin: 0 0 8px; color: #ffc338; }.journal-hero h1 { margin: 0; color: #fff; font: 700 clamp(32px, 4vw, 48px)/1.08 'Playfair Display', serif; }.journal-hero p:last-child { max-width: 650px; margin: 14px 0 0; color: #e1f3ee; font-size: clamp(13px, 1.2vw, 15px); line-height: 1.65; }.journal-content { width: min(100% - 32px, 1180px); margin: 0 auto; padding: 42px 0 70px; }.journal-current { display: grid; grid-template-columns: 1fr 270px; gap: 34px; align-items: center; padding: 34px; border: 1px solid #dce8e3; border-radius: 14px; background: #fff; box-shadow: 0 14px 30px rgba(18, 63, 89, .08); }.journal-current h2 { margin: 10px 0 5px; font: 700 clamp(27px, 3.5vw, 40px)/1.12 'Playfair Display', serif; }.journal-volume { margin: 0 0 15px; color: #087f78; font-weight: 800; }.journal-current-copy > p:not(.journal-volume) { color: #536b75; font-size: 15px; line-height: 1.7; }.journal-cover { width: 100%; border: 1px solid #dce8e3; box-shadow: 0 10px 20px rgba(18, 63, 89, .12); }.journal-button, .journal-card a, .journal-heading > a, .journal-facts a { color: #087f78; font-size: 13px; font-weight: 800; }.journal-button { display: inline-block; margin-top: 8px; padding: 11px 15px; border-radius: 7px; background: #eaf8ef; }.journal-heading { display: flex; justify-content: space-between; align-items: end; gap: 20px; margin: 42px 0 22px; }.journal-label { color: #087f78; }.journal-heading h2 { margin: 8px 0 0; font: 700 30px 'Playfair Display', serif; }.journal-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }.journal-card { padding: 22px; border: 1px solid #dce8e3; border-radius: 10px; background: #fff; }.journal-card > span { color: #087f78; font-size: 11px; font-weight: 800; }.journal-card h3 { margin: 9px 0 10px; font-size: 18px; line-height: 1.3; }.journal-card p { min-height: 38px; margin: 0 0 17px; color: #71817e; font-size: 13px; line-height: 1.5; }.journal-facts { margin-top: 30px; padding: 24px; border-left: 4px solid #e8b84b; border-radius: 8px; background: #fff9e8; }.journal-facts strong { font-size: 18px; }.journal-facts p { color: #6b5a2d; font-size: 14px; line-height: 1.65; }.journal-facts a { color: #6b5a2d; }.journal-card a:hover, .journal-heading > a:hover, .journal-facts a:hover { text-decoration: underline; } @media (max-width: 700px) { .journal-hero { padding: 34px 24px 38px; }.journal-hero h1 { font-size: 34px; }.journal-hero p:last-child { font-size: 13px; }.journal-current { grid-template-columns: 1fr; padding: 24px; }.journal-cover { max-width: 270px; }.journal-grid { grid-template-columns: 1fr; }.journal-heading { display: block; }.journal-heading > a { display: inline-block; margin-top: 12px; } }
</style>
<style>
    .journal-hero { background: linear-gradient(118deg, rgba(10,40,60,.86), rgba(8,127,120,.56)), url('https://cdn.phototourl.com/member/2026-09-12-9b849ed3-a03b-47f3-b47a-907f98c40d7c.jpg') center / cover !important; }
    .journal-hero-content { text-shadow: 0 2px 10px rgba(0,0,0,.24); }
    .journal-eyebrow { color: #ffe08a; font-size: 12px; text-shadow: 0 1px 6px rgba(0,0,0,.28); }
    .journal-hero h1 { font-size: clamp(34px, 4vw, 50px); line-height: 1.08; letter-spacing: .01em; }
    .journal-hero p:last-child { max-width: 650px; color: #f0fffb; font-size: clamp(14px, 1.2vw, 16px); line-height: 1.75; }
    .journal-current h2 { color: #123f59; font-size: clamp(27px, 3.5vw, 40px); line-height: 1.18; }
    .journal-current-copy > p:not(.journal-volume) { color: #3f5968; font-size: 15px; line-height: 1.8; }
    .journal-button { color: #173b62; background: linear-gradient(135deg, #ffe08a, #ffc338); box-shadow: 0 7px 14px rgba(225,169,46,.26); }
    .journal-heading h2 { color: #123f59; }
    .journal-card { border-radius: 12px; box-shadow: 0 10px 22px rgba(18,63,89,.08); transition: transform .2s ease, box-shadow .2s ease; }
    .journal-card:hover { transform: translateY(-3px); box-shadow: 0 16px 28px rgba(18,63,89,.13); }
    .journal-card:nth-child(4n + 2) { border-top-color: #3d78c4; }
    .journal-card:nth-child(4n + 3) { border-top-color: #e1a92e; }
    .journal-card:nth-child(4n + 4) { border-top-color: #d96b58; }
    .journal-card h3 { color: #123f59; font-size: 15px; line-height: 1.45; }
    .journal-card p { color: #526b76; line-height: 1.6; }
    .journal-facts strong { color: #123f59; }
    .journal-facts p { color: #4f626a; line-height: 1.7; }
    @media (max-width: 620px) {
        .journal-hero { padding: 36px 24px 40px; }
        .journal-hero h1 { font-size: 34px; }
        .journal-hero p:last-child { font-size: 14px; line-height: 1.7; }
        .journal-current { padding: 24px 20px; }
        .journal-current h2 { font-size: 29px; }
        .journal-current-copy > p:not(.journal-volume) { font-size: 14px; line-height: 1.75; }
    }
</style>
@else
<div class="tax-guide-page">
    <header class="tax-guide-hero">
        <div class="tax-guide-hero-content">
        <a href="{{ route('dashboard') }}" class="tax-guide-back">BERANDA</a>
        <p class="tax-guide-eyebrow">PANDUAN PEMBAYARAN PAJAK</p>
        <h1>Pajak Restoran dan Hotel</h1>
        <p class="tax-guide-intro">Pengertian, tarif, perhitungan, pembayaran, dan pelaporan pajak restoran atau PB1 serta pajak hotel.</p>
        </div>
    </header>

    <main class="tax-guide-content">
        <article class="tax-guide-article">
            <div class="tax-guide-article-meta">PANDUAN PAJAK DAERAH <span>•</span> Diperbarui 19 Januari 2026</div>
            <h2>Pajak Restoran dan Hotel: Tarif, Perhitungan, Bayar, dan Lapor</h2>
            <p class="tax-guide-lead">Pajak restoran, hotel, dan hiburan merupakan pajak atas pelayanan yang pemanfaatan serta pemungutannya dilakukan oleh pemerintah daerah. Panduan ini merangkum ketentuan penting agar pelaku usaha memahami kewajiban pajaknya.</p>

            <div class="tax-guide-overview">
                <strong>Gambaran Umum</strong>
                <p>Dalam praktiknya, konsumen membayar pajak saat membeli makanan, minuman, atau menggunakan layanan hotel. Pengusaha kemudian memungut, mencatat, menyetor, dan melaporkan pajak tersebut kepada pemerintah daerah. Karena setiap kabupaten atau kota dapat memiliki peraturan teknis yang berbeda, tarif dan batas waktu perlu dikonfirmasi kepada Bapenda setempat.</p>
            </div>

            <h3>Pajak Restoran</h3>
            <p>Pajak restoran adalah pajak atas pelayanan yang disediakan oleh restoran. Restoran mencakup rumah makan, kafetaria, kantin, warung, bar, jasa boga, katering, dan usaha sejenis yang menyediakan makanan atau minuman dengan dipungut bayaran.</p>
            <p>Pajak yang tercantum dalam struk makanan dan minuman umumnya bukan PPN, melainkan Pajak Restoran atau PB1. PB1 termasuk pajak daerah kabupaten/kota dan diatur melalui peraturan daerah.</p>

            <h3>Perbedaan PPN dan PB1</h3>
            <p>PPN dipungut oleh pemerintah pusat melalui Direktorat Jenderal Pajak, sedangkan PB1 dipungut oleh pemerintah daerah. Keduanya sama-sama dapat muncul dari transaksi jual beli, tetapi pemungut dan dasar hukumnya berbeda.</p>

            <h3>Objek, Subjek, dan Wajib Pajak Restoran</h3>
            <ul>
                <li><strong>Objek pajak:</strong> pelayanan penjualan makanan atau minuman, baik dikonsumsi di tempat, dibawa pulang, maupun melalui layanan antar.</li>
                <li><strong>Subjek pajak:</strong> konsumen yang membeli atau menggunakan pelayanan restoran.</li>
                <li><strong>Wajib pajak:</strong> pemilik atau pengusaha restoran yang memungut PB1 dari konsumen dan menyetorkannya kepada pemerintah daerah.</li>
            </ul>

            <h3>Tarif Pajak Restoran</h3>
            <p>Tarif PB1 ditetapkan oleh pemerintah kabupaten atau kota masing-masing. Berdasarkan UU PDRD, tarif Pajak Restoran paling tinggi sebesar <strong>10% dari dasar pengenaan pajak</strong>. Beberapa daerah dapat menerapkan tarif yang lebih rendah sesuai peraturan daerahnya.</p>
            <p>PB1 berbeda dari service charge. PB1 merupakan pajak yang ditetapkan pemerintah, sedangkan service charge adalah biaya layanan yang ditentukan oleh restoran dan masuk ke kas usaha sesuai kebijakan pengelola.</p>

            <h3>Cara Menghitung Pajak Restoran</h3>
            <p>Dasar pengenaan pajak adalah jumlah pembayaran yang diterima atau seharusnya diterima restoran, termasuk service charge apabila dibebankan kepada konsumen.</p>
            <div class="tax-guide-formula"><strong>Rumus PB1</strong><span>DPP × Tarif Pajak Restoran</span></div>
            <p>Contoh: total makanan dan minuman sebesar Rp80.000 dengan service charge 5% menghasilkan biaya layanan Rp4.000. DPP menjadi Rp84.000. Jika tarif PB1 daerah sebesar 10%, pajak restoran yang harus dibayar adalah Rp8.400, sehingga total pembayaran menjadi Rp92.400.</p>

            <h3>Pajak Hotel</h3>
            <p>Pajak hotel dikenakan atas pelayanan yang disediakan hotel, termasuk motel, losmen, wisma, rumah penginapan, fasilitas penunjang, serta rumah kos dengan jumlah kamar lebih dari 10 pada satu lokasi atau beberapa lokasi yang dikelola satu wajib pajak.</p>
            <p>Objek pajaknya adalah pembayaran atau jumlah yang seharusnya dibayar kepada hotel. Subjek pajaknya adalah orang pribadi atau badan yang melakukan pembayaran, sedangkan wajib pajaknya adalah orang pribadi atau badan yang mengusahakan hotel. Tarif pajak hotel ditetapkan pemerintah daerah dan umumnya sebesar 10%.</p>

            <h3>Cara Membayar Pajak Restoran dan Hotel</h3>
            <p>Pembayaran PB1 dan pajak hotel dilakukan setiap bulan, paling lambat 30 hari setelah masa pajak berakhir. Pembayaran dapat dilakukan melalui Bapenda atau Dispenda kabupaten/kota maupun provinsi sesuai domisili usaha.</p>
            <ol>
                <li>Datang ke Bapenda atau Dispenda pada hari kerja.</li>
                <li>Siapkan Surat Setoran Pajak Daerah (SSPD) dan dokumen yang diperlukan.</li>
                <li>Isi formulir dan lengkapi proses pendaftaran atau NPWPD apabila diperlukan.</li>
                <li>Lakukan pembayaran pada loket atau kanal pembayaran yang tersedia.</li>
            </ol>
            <p>Keterlambatan pembayaran dapat dikenai sanksi administrasi berupa bunga sesuai ketentuan pemerintah daerah.</p>

            <h3>Cara Melaporkan Pajak Restoran dan Hotel</h3>
            <p>Wajib pajak menyampaikan Surat Pemberitahuan Pajak Daerah (SPTPD) kepada pemerintah daerah setempat. Laporan memuat omzet penerimaan bruto dan rekapitulasi penerimaan.</p>
            <p>Pelaporan dilakukan paling lambat 15 hari setelah masa pajak berakhir, atau mengikuti batas waktu yang ditetapkan dalam peraturan daerah. Tata cara, kanal pembayaran, batas omzet, dan fasilitas pajak dapat berbeda di setiap daerah.</p>

            <div class="tax-guide-note"><strong>Catatan:</strong> Periksa Peraturan Daerah di lokasi usaha untuk memastikan tarif, batas omzet tidak kena pajak, dokumen, jatuh tempo, dan kanal pembayaran yang berlaku.</div>
            <a href="https://klikpajak.id/blog/pajak-restoran-pengertian-tarif-hitung-bayar-dan-lapor-pb1/" target="_blank" rel="noopener noreferrer" class="tax-guide-source">Baca artikel sumber di Klikpajak ↗</a>
        </article>
    </main>
</div>

<style>
    .tax-guide-page { min-height: 100vh; background: #f3f7f5; color: #173042; font-family: 'DM Sans', sans-serif; }
    .tax-guide-hero { position: relative; overflow: hidden; padding: 42px max(24px, calc((100% - 1080px) / 2)); color: #fff; background: url('https://cdn.phototourl.com/member/2026-09-12-ee8e4cf1-757f-41a7-bfd7-bb94c215f302.png') center / cover; border-top: 5px solid #e8b84b; }
    .tax-guide-hero::after { position: absolute; z-index: 1; inset: 0; content: ''; background: linear-gradient(118deg, rgba(10,40,60,.9), rgba(8,127,120,.62)); }
    .tax-guide-hero-content { position: relative; z-index: 2; max-width: 780px; text-shadow: 0 2px 12px rgba(0,0,0,.25); }
    .tax-guide-back, .tax-guide-eyebrow { color: #c8f4e8; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-decoration: none; }.tax-guide-back { display: inline-block; margin-bottom: 24px; }.tax-guide-eyebrow { margin: 0 0 10px; color: #ffe08a; }.tax-guide-hero h1 { max-width: 620px; margin: 0; color: #fff; font-family: 'Playfair Display', serif; font-size: clamp(32px, 4vw, 46px); line-height: 1.12; }.tax-guide-intro { max-width: 650px; margin: 16px 0 0; color: #f0fffb; font-size: clamp(14px, 1.25vw, 16px); line-height: 1.7; }
    .tax-guide-content { width: min(100% - 32px, 920px); margin: 0 auto; padding: 42px 0 70px; }.tax-guide-article { padding: clamp(24px, 5vw, 56px); border: 1px solid #dce8e3; border-radius: 14px; background: #fff; box-shadow: 0 14px 30px rgba(18, 63, 89, .08); }.tax-guide-article-meta { color: #087f78; font-size: 11px; font-weight: 800; letter-spacing: .1em; }.tax-guide-article-meta span { margin: 0 7px; color: #e8b84b; }.tax-guide-article h2 { margin: 12px 0 18px; color: #123f59; font: 700 clamp(27px, 3.5vw, 38px)/1.18 'Playfair Display', serif; }.tax-guide-lead { color: #3f5968; font-size: 16px; font-weight: 500; line-height: 1.8; }.tax-guide-overview { margin: 26px 0 8px; padding: 18px 20px; border-left: 4px solid #087f78; border-radius: 7px; background: #eef8f7; }.tax-guide-overview strong { color: #123f59; font-size: 16px; }.tax-guide-overview p { margin: 7px 0 0; }.tax-guide-article h3 { margin: 34px 0 10px; color: #123f59; font-size: 21px; line-height: 1.3; }.tax-guide-article p, .tax-guide-article li { color: #3f5968; font-size: 15px; line-height: 1.8; }.tax-guide-article ul, .tax-guide-article ol { padding-left: 24px; }.tax-guide-formula { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin: 20px 0; padding: 18px 20px; border-left: 4px solid #e8b84b; border-radius: 7px; background: #eef8f7; color: #087f78; }.tax-guide-formula span { font-weight: 800; }.tax-guide-note { margin-top: 30px; padding: 18px 20px; border: 1px solid #f0d38b; border-radius: 8px; background: #fff9e8; color: #5f4d20; font-size: 14px; line-height: 1.7; }.tax-guide-source { display: inline-block; margin-top: 25px; color: #087f78; font-size: 14px; font-weight: 800; }.tax-guide-source:hover { color: #1763a5; text-decoration: underline; }
    @media (max-width: 620px) { .tax-guide-hero { padding: 32px 24px 36px; }.tax-guide-back { margin-bottom: 22px; }.tax-guide-hero h1 { font-size: 31px; line-height: 1.15; }.tax-guide-intro { margin-top: 12px; font-size: 14px; line-height: 1.7; }.tax-guide-content { padding-top: 24px; }.tax-guide-article { padding: 24px 20px; }.tax-guide-article h2 { font-size: 29px; }.tax-guide-article p, .tax-guide-article li { font-size: 14px; line-height: 1.75; }.tax-guide-formula { display: block; }.tax-guide-formula span { display: block; margin-top: 8px; } }
</style>
@endif
@endsection
