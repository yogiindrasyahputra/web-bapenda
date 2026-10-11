@extends('layouts.app')

@section('content')
<div class="uu-page {{ $isPajakDaerah ? 'uu-page-daerah' : ($isPajakP3b ? 'uu-page-p3b' : ($isPajakPusat ? 'uu-page-pusat' : ($isRekapPeraturan ? 'uu-page-rekap' : ''))) }}">
    <header class="uu-masthead {{ $isPajakDaerah ? 'uu-masthead-daerah' : ($isPajakP3b ? 'uu-masthead-p3b' : ($isPajakPusat ? 'uu-masthead-pusat' : ($isRekapPeraturan ? 'uu-masthead-rekap' : 'uu-masthead-hpp'))) }}">
            <div class="uu-masthead-inner">
                <a href="{{ route('dashboard') }}" class="uu-kicker">BERANDA</a>
                <h1>{{ $isPajakDaerah ? 'Jenis Pajak Daerah dan Ketentuannya' : ($isPajakP3b ? 'P3B: Pengertian, Prosedur, dan Syarat Pemanfaatannya' : ($isPajakPusat ? 'Jenis Pajak Pusat' : ($isRekapPeraturan ? 'Rekap Peraturan Pajak' : 'Konsolidasi Fiskal dan Implementasi UU HPP'))) }}</h1>
            </div>
        </header>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show uu-alert" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <main class="uu-layout">
            <section class="uu-main-column">
                <div class="uu-section-heading">
                    <div>
                        <span class="uu-eyebrow">{{ $isPajakDaerah ? 'PAJAK DAERAH' : ($isPajakP3b ? 'PAJAK INTERNASIONAL' : ($isPajakPusat ? 'PAJAK PUSAT' : ($isRekapPeraturan ? 'REKAP PERATURAN' : 'DOKUMEN HUKUM'))) }}</span>
                        <h2>{{ $isPajakDaerah ? 'Jenis Pajak Daerah' : ($isPajakP3b ? 'Perjanjian Penghindaran Pajak Berganda' : ($isPajakPusat ? 'Jenis Pajak Pusat' : ($isRekapPeraturan ? 'Rekap Peraturan Pajak' : 'Konsolidasi Fiskal dan UU HPP'))) }}</h2>
                        <p>{{ $isPajakDaerah ? 'Kenali jenis pajak, tarif maksimum, dan ketentuan pembayarannya.' : ($isPajakP3b ? 'Memahami pengertian, tujuan, prosedur, dan syarat pemanfaatan P3B dalam transaksi lintas negara.' : ($isPajakPusat ? 'Pajak-pajak pusat yang dikelola oleh Direktorat Jenderal Pajak.' : ($isRekapPeraturan ? 'Ringkasan aturan pajak berdasarkan topik untuk membantu memahami ketentuan yang berlaku.' : 'Pelajari arah konsolidasi fiskal, kebijakan strategis, dan implementasi UU Harmonisasi Peraturan Perpajakan.'))) }}</p>
                    </div>
                </div>

                <div class="uu-feature">
                    <div class="uu-feature-art">
                        <img src="{{ $isPajakP3b ? 'https://cdn.phototourl.com/member/2026-09-06-5acb218f-c339-4ded-9669-cab0e24c7186.jpg' : ($isPajakDaerah ? 'https://cdn.phototourl.com/member/2026-09-06-3474ec4c-d089-4153-b25e-9a1a27aec30d.jpg' : ($isPajakPusat ? 'https://cdn.phototourl.com/member/2026-09-07-7bb3c594-d60f-4ede-8625-ad3069d625fd.jpg' : ($isRekapPeraturan ? 'https://cdn.phototourl.com/member/2026-09-07-49a1efa7-93c9-4d85-91cd-156f0f44f1a4.jpg' : 'https://cdn.phototourl.com/member/2026-09-05-53b70d24-f59d-4c46-ae71-a262ab41b4bb.jpg'))) }}" alt="{{ $isPajakP3b ? 'Informasi P3B' : ($isPajakDaerah ? 'Informasi Pajak Daerah' : ($isPajakPusat ? 'Informasi Pajak Pusat' : ($isRekapPeraturan ? 'Informasi Rekap Peraturan' : 'Informasi Konsolidasi Fiskal'))) }}">
                    </div>
                    <div class="uu-feature-copy">
                        <span class="uu-feature-label">PUSAT INFORMASI</span>
                        @if($isRekapPeraturan)
                        <h3>Temukan aturan pajak berdasarkan topik</h3>
                        <p>Rekap peraturan merangkum ketentuan perpajakan secara tematik, sehingga pengguna dapat memahami aturan yang relevan tanpa harus menelusuri banyak dokumen secara terpisah.</p>
                        <div class="uu-feature-related">
                            <strong>115 hasil rekap peraturan</strong>
                            <a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/pencarian" class="uu-feature-link" target="_blank" rel="noopener noreferrer">Lihat sumber DDTC <span>↗</span></a>
                        </div>
                        <div class="uu-feature-documents">
                            <span>Topik yang tersedia</span>
                            <span>KUP · PPh · PPN &amp; PPnBM · Bea Cukai · PBB · Bea Meterai · Pajak Internasional</span>
                        </div>
                        @elseif($isPajakP3b)
                        <h3>P3B adalah instrumen penting dalam perpajakan internasional</h3>
                        <p>P3B atau Perjanjian Penghindaran Pajak Berganda adalah perjanjian antar negara yang membagi hak pemajakan atas penghasilan agar tidak terjadi pemajakan ganda yang memberatkan.</p>
                        <div class="uu-feature-related">
                            <strong>Tujuan P3B</strong>
                            <a href="#tujuan-p3b" class="uu-feature-link">Lihat penjelasan <span>↓</span></a>
                        </div>
                        <div class="uu-feature-related">
                            <strong>Prosedur Penerapan</strong>
                            <a href="#prosedur-penerapan-p3b" class="uu-feature-link">Lihat langkahnya <span>↓</span></a>
                        </div>
                        <div class="uu-feature-documents">
                            <span>Referensi utama</span>
                            <a href="https://www.oecd.org/tax/treaties/" target="_blank" rel="noopener noreferrer">Model OECD <span>↗</span></a>
                            <a href="https://financing.dpr.go.id/" target="_blank" rel="noopener noreferrer">Model UN <span>↗</span></a>
                            <a href="https://www.pajak.go.id/id/aturan/peraturan-dirjen-pajak-nomor-25pj2018" target="_blank" rel="noopener noreferrer">PER 25/PJ/2018 <span>↗</span></a>
                        </div>
                        @elseif($isPajakPusat)
                        <h3>Pajak pusat untuk mendukung penerimaan negara</h3>
                        <p>Pajak pusat dikelola oleh Direktorat Jenderal Pajak dan meliputi pajak atas penghasilan, konsumsi, dokumen, tanah atau bangunan tertentu, serta emisi karbon.</p>
                        <div class="uu-feature-related">
                            <strong>Pajak Penghasilan (PPh)</strong>
                            <a href="#pajak-penghasilan" class="uu-feature-link">Lihat penjelasan <span>↓</span></a>
                        </div>
                        <div class="uu-feature-related">
                            <strong>Pajak Pertambahan Nilai (PPN)</strong>
                            <a href="#pajak-pertambahan-nilai" class="uu-feature-link">Lihat penjelasan <span>↓</span></a>
                        </div>
                        <div class="uu-feature-documents">
                            <span>Sumber resmi</span>
                            <a href="https://pajak.go.id/id/jenis-pajak-pusat" target="_blank" rel="noopener noreferrer">DJP: Jenis Pajak Pusat <span>↗</span></a>
                            <a href="https://www.pajak.go.id/id/peraturan/harmonisasi-peraturan-perpajakan" target="_blank" rel="noopener noreferrer">UU HPP <span>↗</span></a>
                        </div>
                        @elseif(!$isPajakDaerah)
                        <h3>Memahami konsolidasi fiskal dan arah kebijakan UU HPP</h3>
                        <p>Pelajari kebijakan strategis, tujuan reformasi perpajakan, serta dokumen resmi yang menjadi dasar implementasi Undang-Undang Harmonisasi Peraturan Perpajakan.</p>
                        <div class="uu-feature-related">
                            <strong>UU No. 7 Tahun 2021</strong>
                            <a href="https://peraturan.bpk.go.id/Details/185162/uu-no-7-tahun-2021" class="uu-feature-link" target="_blank" rel="noopener noreferrer">Buka dokumen resmi <span>↗</span></a>
                        </div>
                        <div class="uu-feature-related">
                            <strong>UU No. 6 Tahun 2023</strong>
                            <a href="https://peraturan.bpk.go.id/Details/246523/uu-no-6-tahun-2023" class="uu-feature-link" target="_blank" rel="noopener noreferrer">Buka dokumen resmi <span>↗</span></a>
                        </div>
                        <div class="uu-feature-documents">
                            <span>Dokumen terkait lainnya</span>
                            <a href="https://peraturan.bpk.go.id/Details/137323/uu-no-2-tahun-2020" target="_blank" rel="noopener noreferrer">UU No. 2 Tahun 2020 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/135060/perpu-no-1-tahun-2020" target="_blank" rel="noopener noreferrer">Perpu No. 1 Tahun 2020 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/38787/uu-no-42-tahun-2009" target="_blank" rel="noopener noreferrer">UU No. 42 Tahun 2009 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/39704/uu-no-36-tahun-2008" target="_blank" rel="noopener noreferrer">UU No. 36 Tahun 2008 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/39962/uu-no-39-tahun-2007" target="_blank" rel="noopener noreferrer">UU No. 39 Tahun 2007 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/46203/uu-no-11-tahun-1995" target="_blank" rel="noopener noreferrer">UU No. 11 Tahun 1995 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/46990/uu-no-8-tahun-1983" target="_blank" rel="noopener noreferrer">UU No. 8 Tahun 1983 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/46988/uu-no-7-tahun-1983" target="_blank" rel="noopener noreferrer">UU No. 7 Tahun 1983 <span>↗</span></a>
                            <a href="https://peraturan.bpk.go.id/Details/46986/uu-no-6-tahun-1983" target="_blank" rel="noopener noreferrer">UU No. 6 Tahun 1983 <span>↗</span></a>
                        </div>
                        @else
                        <h3>Pajak daerah untuk provinsi dan kabupaten/kota</h3>
                        <p>Pajak daerah dikelola pemerintah daerah sesuai potensi dan ketentuan yang berlaku di wilayah masing-masing.</p>
                        <div class="uu-feature-related">
                            <strong>Pajak Provinsi</strong>
                            <a href="#pajak-provinsi" class="uu-feature-link">Lihat jenisnya <span>↓</span></a>
                        </div>
                        <div class="uu-feature-related">
                            <strong>Pajak Kabupaten/Kota</strong>
                            <a href="#pajak-kabupaten-kota" class="uu-feature-link">Lihat jenisnya <span>↓</span></a>
                        </div>
                        <div class="uu-feature-documents">
                            <span>Catatan penting</span>
                            <a href="https://klikpajak.id/blog/jenis-pajak-daerah-beserta-tarifnya/" target="_blank" rel="noopener noreferrer">Baca artikel lengkap <span>↗</span></a>
                            <a href="https://klikpajak.id/blog/pajak-yang-dipungut-pemerintah-daerah/" target="_blank" rel="noopener noreferrer">Pajak yang dipungut Pemda <span>↗</span></a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="uu-list-header" id="daftar-peraturan">
                    <h3>{{ $isPajakDaerah ? 'Peraturan Pajak Daerah' : ($isPajakPusat ? 'Jenis Pajak Pusat' : ($isRekapPeraturan ? 'Rekap Peraturan Terbaru' : 'Peraturan Terbaru')) }}</h3>
                    <span>{{ $isRekapPeraturan ? '10 topik pilihan' : $peraturans->total() . ' dokumen' }}</span>
                </div>
                @if($isRekapPeraturan)
                <article class="uu-article">
                    <span class="uu-document-type">REKAP PERATURAN DDTC</span>
                    <h3>Rekap Peraturan Pajak Berdasarkan Topik</h3>
                    <p>Halaman ini merangkum peraturan perpajakan berdasarkan topik agar pencarian ketentuan menjadi lebih cepat dan terarah. Daftar berikut mengambil contoh rekap terbaru dari Perpajakan DDTC.</p>
                    <p>Rekap peraturan membantu wajib pajak, pelaku usaha, konsultan, dan petugas administrasi memahami hubungan antara undang-undang, peraturan pemerintah, peraturan menteri, serta ketentuan teknis lain yang berlaku pada suatu isu. Dengan pendekatan tematik, pengguna dapat memulai pencarian dari jenis kegiatan atau objek pajaknya, kemudian membuka dokumen yang menjadi dasar pengaturan.</p>
                    <h4>Bagaimana Menggunakan Rekap Ini?</h4>
                    <ol class="uu-tax-steps">
                        <li>Pilih topik yang paling sesuai dengan transaksi, kegiatan usaha, atau kewajiban pajak yang ingin diperiksa.</li>
                        <li>Baca ringkasan untuk mengetahui ruang lingkup pembahasan dan jenis ketentuan yang terkait.</li>
                        <li>Buka rekap DDTC untuk melihat daftar peraturan, kronologi perubahan, dan referensi yang lebih lengkap.</li>
                        <li>Pastikan penerapan akhirnya disesuaikan dengan kondisi wajib pajak, periode pajak, dan ketentuan daerah atau instansi yang berwenang.</li>
                    </ol>
                    <p>Topik dalam rekap mencakup administrasi perpajakan, pajak penghasilan, PPN dan PPnBM, pajak daerah, perdagangan digital, kendaraan bermotor, energi, serta jasa tertentu. Daftar di bawah ini merupakan pilihan topik yang tersedia pada halaman sumber dan dapat diperbarui mengikuti perkembangan regulasi.</p>
                    <h4>Topik Rekap Terbaru</h4>
                    <ul class="uu-tax-list">
                        <li><strong>Pengawasan Kepatuhan Wajib Pajak</strong><span>Membahas prosedur pengawasan, klarifikasi data, dan langkah pemenuhan kewajiban ketika wajib pajak menjadi objek pengawasan.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-atas-pengawasan-kepatuhan-wajib-pajak" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pajak atas Reklame</strong><span>Menjelaskan aspek pajak atas iklan komersial di ruang publik, termasuk objek, penyelenggara, dan pemungutannya.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pajak-atas-reklame" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Kuasa Wajib Pajak</strong><span>Merangkum ketentuan mengenai pihak yang dapat menjadi kuasa, kompetensi, dan persyaratan pemberian kuasa.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-atas-kuasa-wajib-pajak" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pemajakan Liquefied Petroleum Gas</strong><span>Menguraikan aspek pajak LPG, khususnya hubungan antara penjualan LPG 3 kg dan kebijakan subsidi negara.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pemajakan-atas-liquefied-petroleum-gas" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pungutan Negara untuk Balik Nama Kendaraan Bermotor</strong><span>Membantu memahami pungutan dan kewajiban yang perlu diperhatikan dalam proses balik nama kendaraan bermotor.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-atas-pungutan-negara-untuk-balik-nama-kendaraan-bermotor" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pemajakan atas Alat Berat</strong><span>Menjelaskan alat berat sebagai objek pajak daerah serta hal yang perlu diperhatikan pemilik atau penguasanya.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pemajakan-atas-alat-berat" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pajak atas Mandi Uap (Spa)</strong><span>Menguraikan alasan jasa mandi uap atau spa dapat menjadi objek pajak daerah dan bagaimana ketentuannya diterapkan.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pajak-atas-mandi-uap-spa" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pajak atas Jasa Boga atau Katering</strong><span>Membahas perlakuan pajak atas penyediaan makanan dan minuman melalui jasa boga atau katering.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pajak-atas-jasa-boga-atau-katering" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pajak atas Perdagangan Melalui Sistem Elektronik (PMSE)</strong><span>Menjelaskan penunjukan pihak yang memungut, menyetor, dan melaporkan pajak atas transaksi digital.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pajak-atas-perdagangan-melalui-sistem-elektronik-pmse" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                        <li><strong>Pajak atas Bahan Bakar Kendaraan Bermotor</strong><span>Merangkum jenis pajak yang dapat muncul dalam penjualan bahan bakar kendaraan bermotor.</span><a href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/rekap-peraturan-pajak-atas-bahan-bakar-kendaraan-bermotor" target="_blank" rel="noopener noreferrer">Buka rekap ↗</a></li>
                    </ul>
                    <a class="uu-article-source" href="https://perpajakan.ddtc.co.id/id/panduan-pajak/rekap-peraturan/pencarian" target="_blank" rel="noopener noreferrer">Lihat seluruh rekap peraturan di DDTC <span>↗</span></a>
                </article>
                @elseif($isPajakDaerah)
                <article class="uu-article">
                    <span class="uu-document-type">PANDUAN PAJAK</span>
                    <h3>Jenis Pajak Daerah, Tarif, dan Ketentuan Pembayarannya</h3>
                    <p>Pajak daerah dipungut dan dikelola oleh pemerintah daerah, berbeda dari pajak pusat yang dikelola pemerintah nasional. Jenis dan tarifnya dapat menyesuaikan potensi serta kebijakan masing-masing daerah.</p>
                    <p>Penerimaan pajak daerah digunakan untuk mendukung pelayanan publik, pembangunan infrastruktur, pendidikan, kesehatan, dan kebutuhan pemerintahan di wilayah terkait. Karena itu, pembayaran pajak daerah menjadi salah satu bentuk partisipasi masyarakat dan pelaku usaha dalam pembangunan daerah.</p>
                    <p>Perbedaan utamanya terletak pada kewenangan pemungutannya. Pajak provinsi dikelola oleh pemerintah provinsi dan biasanya memiliki objek yang lintas kabupaten/kota, sedangkan pajak kabupaten/kota dikelola oleh pemerintah kabupaten atau kota dan lebih dekat dengan aktivitas masyarakat serta usaha di wilayah tersebut.</p>
                    <h4 id="pajak-provinsi">Pajak Provinsi</h4>
                    <p>Pajak provinsi dikenakan atas objek pajak yang cakupannya berada di tingkat provinsi. Jenis pajak yang umum dibahas meliputi:</p>
                    <ul class="uu-tax-list">
                        <li><strong>Pajak Kendaraan Bermotor</strong><span>Kepemilikan atau penguasaan kendaraan bermotor.</span></li>
                        <li><strong>Bea Balik Nama Kendaraan Bermotor</strong><span>Penyerahan hak milik kendaraan bermotor.</span></li>
                        <li><strong>Pajak Bahan Bakar Kendaraan Bermotor</strong><span>Pembelian bahan bakar kendaraan, dengan tarif maksimum 10%.</span></li>
                        <li><strong>Pajak Air Permukaan</strong><span>Pemanfaatan air permukaan, dengan tarif maksimum 10%.</span></li>
                        <li><strong>Pajak Alat Berat</strong><span>Kepemilikan atau penguasaan alat berat sesuai ketentuan daerah.</span></li>
                        <li><strong>Pajak Rokok</strong><span>Dipungut bersamaan dengan cukai rokok sebesar 10% dari cukai.</span></li>
                    </ul>
                    <h4 id="pajak-kabupaten-kota">Pajak Kabupaten/Kota</h4>
                    <p>Pajak kabupaten/kota mendukung pembiayaan layanan publik dan pembangunan di wilayah tempat objek pajak berada. Jenisnya meliputi:</p>
                    <ul class="uu-tax-list">
                        <li><strong>Pajak Hotel dan Restoran</strong><span>Jasa penginapan serta pelayanan makanan dan minuman.</span></li>
                        <li><strong>Pajak Hiburan</strong><span>Penyelenggaraan kegiatan hiburan sesuai kategori yang ditetapkan.</span></li>
                        <li><strong>Pajak Reklame dan Penerangan Jalan</strong><span>Media promosi serta penggunaan tenaga listrik.</span></li>
                        <li><strong>Pajak Mineral Bukan Logam dan Batuan</strong><span>Pengambilan mineral dan batuan, maksimum 25%.</span></li>
                        <li><strong>Pajak Parkir dan Pajak Air Tanah</strong><span>Parkir di luar badan jalan maksimum 30% dan air tanah maksimum 20%.</span></li>
                        <li><strong>PBB Perdesaan dan Perkotaan serta BPHTB</strong><span>Objek bumi/bangunan dan perolehan hak atas tanah atau bangunan, BPHTB maksimum 5%.</span></li>
                    </ul>
                    <h4>Bagaimana Pembayarannya?</h4>
                    <p>Ketentuan pembayaran ditetapkan oleh kepala daerah melalui peraturan daerah. Secara umum, wajib pajak perlu memperhatikan tiga hal berikut:</p>
                    <ol class="uu-tax-steps">
                        <li>Periksa objek pajak, dasar pengenaan, dan jumlah pajak pada surat ketetapan atau pemberitahuan.</li>
                        <li>Bayar sebelum jatuh tempo, umumnya paling lama 30 hari kerja setelah pajak terutang atau paling lama enam bulan sejak SPPT diterima.</li>
                        <li>Ajukan angsuran atau penundaan kepada pemerintah daerah apabila memenuhi persyaratan yang berlaku.</li>
                    </ol>
                    <p>Untuk pelaku usaha, pencatatan transaksi dan dokumen pendukung perlu disimpan dengan baik. Data tersebut membantu proses pelaporan, pemeriksaan, dan pengajuan keberatan apabila terdapat perbedaan antara perhitungan wajib pajak dan ketetapan pemerintah daerah.</p>
                    <p>Ringkasan ini merujuk pada artikel Klikpajak. Tarif dan mekanisme teknis dapat berbeda di setiap wilayah, sehingga wajib pajak perlu membaca peraturan daerah setempat.</p>
                    <a class="uu-article-source" href="https://klikpajak.id/blog/jenis-pajak-daerah-beserta-tarifnya/" target="_blank" rel="noopener noreferrer">Baca artikel lengkap di Klikpajak <span>↗</span></a>
                </article>
                @elseif($isPajakPusat)
                <article class="uu-article">
                    <span class="uu-document-type">ARTIKEL PAJAK PUSAT</span>
                    <h3>Jenis Pajak Pusat</h3>
                    <p>Pajak-pajak pusat yang dikelola oleh Direktorat Jenderal Pajak meliputi beberapa jenis pajak berikut.</p>
                    <h4 id="pajak-penghasilan">1. Pajak Penghasilan (PPh)</h4>
                    <p>PPh adalah pajak yang dikenakan kepada orang pribadi atau badan atas penghasilan yang diterima atau diperoleh dalam suatu Tahun Pajak. Penghasilan mencakup setiap tambahan kemampuan ekonomis yang berasal dari Indonesia maupun luar Indonesia dan dapat digunakan untuk konsumsi atau menambah kekayaan, seperti keuntungan usaha, gaji, honorarium, dan hadiah.</p>
                    <h4 id="pajak-pertambahan-nilai">2. Pajak Pertambahan Nilai (PPN)</h4>
                    <p>PPN dikenakan atas konsumsi Barang Kena Pajak atau Jasa Kena Pajak di dalam Daerah Pabean atau wilayah Indonesia. Orang pribadi, perusahaan, maupun pemerintah yang mengonsumsi Barang Kena Pajak atau Jasa Kena Pajak dikenakan PPN, kecuali barang atau jasa tersebut dikecualikan oleh undang-undang.</p>
                    <h4>3. Pajak Penjualan atas Barang Mewah (PPnBM)</h4>
                    <p>Selain dikenakan PPN, konsumsi Barang Kena Pajak tertentu yang tergolong mewah juga dikenakan PPnBM. Barang mewah antara lain bukan kebutuhan pokok, dikonsumsi masyarakat tertentu atau berpenghasilan tinggi, digunakan untuk menunjukkan status, atau apabila dikonsumsi dapat merusak kesehatan dan moral serta mengganggu ketertiban masyarakat.</p>
                    <h4>4. Bea Meterai</h4>
                    <p>Bea Meterai adalah pajak atas pemanfaatan dokumen, seperti surat perjanjian, akta notaris, kuitansi pembayaran, surat berharga, dan efek yang memuat jumlah uang atau nominal di atas jumlah tertentu sesuai ketentuan.</p>
                    <h4>5. Pajak Bumi dan Bangunan (PBB) tertentu</h4>
                    <p>PBB dikenakan atas kepemilikan atau pemanfaatan tanah dan/atau bangunan. PBB merupakan pajak pusat, tetapi hampir seluruh realisasi penerimaannya diserahkan kepada pemerintah daerah. Sejak 1 Januari 2014, PBB Perdesaan dan Perkotaan menjadi pajak daerah; PBB Perkebunan, Perhutanan, dan Pertambangan tetap merupakan pajak pusat.</p>
                    <h4>6. Pajak Karbon</h4>
                    <p>Pajak Karbon dikenakan atas emisi karbon yang memberikan dampak negatif bagi lingkungan hidup. Ketentuannya diatur dalam Undang-Undang Harmonisasi Peraturan Perpajakan (UU HPP) yang disahkan pada 7 Oktober 2021.</p>
                    <a class="uu-article-source" href="https://pajak.go.id/id/jenis-pajak-pusat" target="_blank" rel="noopener noreferrer">Baca sumber resmi di pajak.go.id <span>↗</span></a>
                </article>
                @elseif($isPajakP3b)
                <article class="uu-article">
                    <span class="uu-document-type">ARTIKEL PAJAK INTERNASIONAL</span>
                    <h3>P3B: Pengertian, Prosedur, dan Syarat Pemanfaatannya</h3>
                    <p>Dalam dunia perpajakan internasional, P3B atau Perjanjian Penghindaran Pajak Berganda adalah perjanjian yang mengatur pembagian hak pemajakan antara negara asal penghasilan dan negara domisili wajib pajak. Tujuannya adalah agar penghasilan tidak dikenakan pajak dua kali secara berlebihan.</p>
                    <p>P3B dibuat untuk mencegah pemajakan ganda yang memberatkan iklim usaha, mendorong investasi, meningkatkan kapasitas sumber daya manusia, memperkuat pertukaran informasi untuk mencegah penghindaran pajak, dan menjaga kedudukan yang setara antara penduduk kedua negara.</p>
                    <h4 id="tujuan-p3b">Tujuan P3B</h4>
                    <p>Secara umum, P3B ditujukan untuk menempatkan hak pemajakan pada negara yang tepat, sehingga tidak ada pembebanan yang berlebihan atas transaksi lintas negara. Dalam praktiknya, P3B membantu menciptakan kepastian hukum, meningkatkan iklim investasi, dan meminimalkan konflik pemajakan antarnegara.</p>
                    <p>Dalam perjanjian ini, negara sumber biasanya memiliki hak atas penghasilan tertentu, sementara negara domisili memberikan keringanan atau kredit pajak sesuai ketentuan yang berlaku. Dengan demikian, satu transaksi tidak semestinya dikenakan pajak berulang di dua yurisdiksi.</p>
                    <h4>Model P3B</h4>
                    <p>Ada dua model utama yang umum dijadikan acuan: model OECD dan model UN. Model OECD cenderung menitikberatkan hak pemajakan di negara domisili, sedangkan model UN lebih mempertimbangkan kebutuhan negara berkembang dan memberi ruang yang lebih luas bagi negara sumber.</p>
                    <p>Indonesia sendiri mengembangkan model yang merupakan kombinasi dari keduanya, agar tetap relevan dengan kebutuhan investasi, perdagangan, dan kepastian hukum.</p>
                    <h4 id="prosedur-penerapan-p3b">Prosedur Penerapan P3B</h4>
                    <p>Untuk memakai P3B, terdapat tahapan yang perlu dilakukan secara sistematis, yaitu:</p>
                    <ol class="uu-tax-steps">
                        <li>Menilai apakah subjek pajak, objek pajak, negara, dan ketentuan pemberlakuan P3B tercakup dalam ruang lingkup perjanjian.</li>
                        <li>Memastikan definisi penghasilan yang dibahas sesuai dengan pasal substantif yang relevan.</li>
                        <li>Menentukan pasal substantif yang berlaku agar hak pemajakan dapat ditetapkan secara tepat.</li>
                        <li>Menghilangkan dampak pajak berganda melalui mekanisme exemption atau credit sesuai ketentuan domestik masing-masing negara.</li>
                        <li>Apabila masih terdapat perbedaan interpretasi, digunakan prosedur persetujuan bersama atau Mutual Agreement Procedure (MAP).</li>
                    </ol>
                    <h4>Syarat Memanfaatkan P3B</h4>
                    <p>Menurut tata cara penerapan P3B, pemungut atau pemotong pajak dapat menerapkan tarif P3B apabila syarat-syarat berikut terpenuhi:</p>
                    <ol class="uu-tax-steps">
                        <li>Adanya perbedaan antara ketentuan UU PPh dan ketentuan P3B serta adanya tarif yang lebih rendah dalam P3B.</li>
                        <li>Penerima penghasilan bukan subjek pajak dalam negeri Indonesia, sehingga pengenaan dilakukan sesuai ketentuan P3B dan bukan pemotongan domestik biasa.</li>
                        <li>Wajib pajak luar negeri menyampaikan Surat Keterangan Domisili (SKD) yang sah dan melengkapi persyaratan administratif, termasuk formulir yang sesuai.</li>
                        <li>Tidak terjadi penyalahgunaan P3B, seperti transaksi yang tidak didukung substansi ekonomi yang jelas atau mekanisme yang hanya bertujuan menekan pajak.</li>
                        <li>Penerima penghasilan berstatus beneficial owner sesuai persyaratan yang ditentukan dalam P3B, bukan hanya bertindak sebagai perantara atau nominee.</li>
                    </ol>
                    <p>Dengan kata lain, manfaat P3B bukan sekadar tarif yang lebih rendah, tetapi juga menuntut kepatuhan administratif, substansi ekonomi, dan status kepemilikan yang sah. Hal ini penting agar penerapan P3B tidak disalahgunakan demi keuntungan pajak yang tidak sesuai prinsip perpajakan yang sehat.</p>
                    <a class="uu-article-source" href="https://enforcea.com/Blog/p3b-pengertian-prosedur-dan-syarat-pemanfaatannya" target="_blank" rel="noopener noreferrer">Baca artikel lengkap di EnforceA <span>↗</span></a>
                </article>
                @else
                <article class="uu-article">
                    <span class="uu-document-type">ARTIKEL KEBIJAKAN</span>
                    <h3>Konsolidasi Fiskal dan Implementasi UU HPP</h3>
                    <h4>Latar Belakang Konsolidasi Fiskal</h4>
                    <p>Salah satu strategi agar konsolidasi fiskal berhasil adalah optimalisasi penerimaan pajak yang dapat diukur dengan rasio pajak. Rasio pajak Indonesia (dalam arti luas) saat ini masih sangat rendah, yaitu hanya 9,11% pada 2021 dan ditargetkan menjadi 10,97% pada 2022. Padahal, agar suatu negara memiliki keleluasaan untuk menjalankan program pembangunan, IMF mematok standar rasio pajak sebesar 15%. Artinya, ketika rasio pajak berhasil didongkrak, pemerintah akan memiliki sumber dana yang cukup untuk memenuhi kebutuhan belanja tanpa harus menambah utang sehingga defisit anggaran dapat kembali ke level yang aman. Kunci keberhasilan mendongkrak rasio pajak terletak pada implementasi Undang-Undang Harmonisasi Peraturan Perpajakan (UU HPP).</p>
                    <h4>Ruang Lingkup UU HPP</h4>
                    <p>Secara garis besar, UU HPP mengatur kebijakan strategis yang mencakup: (1) UU KUP, (2) UU PPh, (3) UU PPN, (4) program pengungkapan sukarela, (5) pajak karbon, dan (6) cukai. Namun, tulisan ini mencoba membahas UU HPP dari bingkai perspektif pemajakan yang sejalan dengan model devaluasi fiskal Pestel dan Sommer (2016), yaitu pergeseran perspektif pemajakan dari berbasis penghasilan menjadi konsumsi. Pemerintah memang menaikkan tarif PPN, yaitu dari 10% menjadi 11% mulai tahun ini, tetapi tetap memberikan berbagai insentif bagi pajak penghasilan dan modal.</p>
                    <h4>Pergeseran Kebijakan Pajak</h4>
                    <p>Di Indonesia, pergeseran ini sebenarnya telah dimulai sejak beberapa tahun silam di mana pemerintah memangkas beban pajak penghasilan dan modal, seperti penurunan tarif PPh final bagi UMKM pada 2018 dari 1% menjadi 0,5%, penurunan tarif PPh Badan dari 25% menjadi 22% dan dapat turun lagi sebesar 3% jika memenuhi syarat kepemilikan publik, serta fasilitas pajak bagi investasi, sebut saja tax holiday, tax allowance, dan superdeduction tax. UU HPP hadir mengafirmasi pergeseran tersebut, seperti melalui kenaikan ambang batas pada tax bracket terendah dari Rp50 juta menjadi Rp60 juta serta pembebasan pengenaan pajak penghasilan bagi UMKM dengan omzet di bawah Rp500 juta setahun.</p>
                    <h4>Dampak terhadap Konsumsi dan Produksi</h4>
                    <p>Sayangnya, masyarakat selalu mendapat suguhan berita kenaikan PPN yang dianggap menambah penderitaan masyarakat. Padahal, ada sisi lain dari kenaikan ini. Pertama, kenaikan tersebut diharapkan mampu mengompensasi penerimaan pajak yang hilang akibat berbagai insentif pajak yang diberikan. Kedua, kenaikan tarif PPN akan menjadi disinsentif bagi konsumsi. Dalam jangka panjang, pelaku ekonomi diharapkan lebih terdorong untuk berproduksi sehingga Indonesia mampu menjadi negara produsen, bukan sekadar negara konsumen. Dengan rezim perpajakan yang ramah dan kondusif bagi penghasilan dan modal, produktivitas tenaga kerja dan investasi di sektor-sektor fundamental akan meningkat.</p>
                    <h4>Tabungan Nasional dan Investasi</h4>
                    <p>Insentif pajak juga akan memberikan tax savings bagi korporasi dan rumah tangga yang dapat digunakan untuk menambah konsumsi atau meningkatkan tabungan. Namun, skenario yang lebih rasional adalah tax savings dipakai untuk meningkatkan tabungan mengingat masyarakat menghadapi harga barang yang lebih mahal akibat kenaikan tarif PPN. Jika skenario tersebut terjadi, tax savings akan mengalir ke tabungan masyarakat.</p>
                    <p>Kenaikan tabungan masyarakat akan berimplikasi pada dua hal. Pertama, tingkat tabungan nasional akan meningkat sehingga diharapkan mampu memenuhi kebutuhan investasi. Selama ini, tabungan nasional tidak cukup untuk membiayai investasi di Indonesia sehingga harus bergantung pada aliran modal asing. Kedua, peningkatan tabungan masyarakat akan memberikan sumber dana yang lebih melimpah dan menekan biaya pinjaman rata-rata (lending rate) yang saat ini masih tinggi dibandingkan negara lain, yaitu 9-10%.</p>
                    <h4>Arah Reformasi Perpajakan</h4>
                    <p>UU HPP didesain secara komprehensif tidak hanya untuk meningkatkan penerimaan pajak guna menopang proses pemulihan dalam jangka pendek, tetapi juga untuk mempercepat transformasi ekonomi dan reformasi perpajakan agar proses pemulihan dapat berlanjut menjadi pertumbuhan yang kuat dan berkesinambungan. Konsolidasi fiskal hanya dapat berhasil jika pengetatan anggaran dilakukan secara bertahap dan mampu dikompensasi oleh penerimaan pajak yang optimal. Kinerja pajak yang optimal adalah salah satu syarat agar Indonesia mampu berdikari secara ekonomi. Besar harapan kita agar UU HPP menjadi panasea bagi kinerja perpajakan yang belum optimal.</p>
                    <a class="uu-article-source" href="https://pajak.go.id/id/artikel/konsolidasi-fiskal-dan-implementasi-uu-hpp" target="_blank" rel="noopener noreferrer">Lebih lanjut di pajak.go.id <span>↗</span></a>
                </article>
                @endif
                @if(!$isRekapPeraturan)
                <div class="uu-document-list">
                    @foreach($peraturans as $item)
                        <article class="uu-document-item">
                            <div class="uu-document-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="uu-document-body">
                                <span class="uu-document-type">{{ $isPajakDaerah ? 'DOKUMEN PAJAK DAERAH' : 'PERATURAN PERPAJAKAN' }}</span>
                                <h4>{{ $item->judul }}</h4>
                                <p>{{ $item->nomor }} <span>•</span> Berlaku {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                            </div>
                            <span class="uu-status {{ $item->status === 'aktif' ? 'is-active' : 'is-inactive' }}">{{ ucfirst($item->status) }}</span>
                        </article>
                    @endforeach
                </div>
                <div class="uu-pagination">{{ $peraturans->links() }}</div>
                @endif
            </section>

            <aside class="uu-sidebar">
                <div class="uu-sidebar-title">BERITA {{ $newsCategoryLabel }} · KALDERA</div>
                @forelse($kalderaNews as $news)
                    <a href="{{ $news['url'] }}" class="uu-story-card" target="_blank" rel="noopener noreferrer">
                        <strong>{{ $news['title'] }}</strong>
                        <span class="uu-story-summary">{{ $news['summary'] }}</span>
                        @if($news['image'])
                            <div class="uu-story-image uu-story-house"><img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" loading="lazy"></div>
                        @endif
                        <span class="uu-story-action">Baca Berita ↗</span>
                    </a>
                @empty
                    <a href="{{ $newsSourceUrl }}" class="uu-story-card" target="_blank" rel="noopener noreferrer">
                        <strong>Lihat berita terbaru Kaldera.id</strong>
                        <span class="uu-story-summary">Berita akan dimuat kembali saat sumber tersedia.</span>
                        <span class="uu-story-action">Buka Kaldera ↗</span>
                    </a>
                @endforelse

                <a href="{{ route('dashboard') }}" class="uu-back-link">← Kembali ke Dashboard</a>
            </aside>
        </main>
    </div>

<style>
    .uu-page {
        min-height: 100vh;
        background: #edf3f5;
        color: #173042;
        font-family: 'DM Sans', sans-serif;
    }
    .uu-masthead {
        background: linear-gradient(118deg, #102f43 0%, #164e63 68%, #087f91 100%);
        border-top: 5px solid #f0c45b;
        box-shadow: inset 0 -6px 0 #0bb2a4;
    }
    .uu-masthead-hpp {
        background: linear-gradient(118deg, rgba(16,47,67,.9) 0%, rgba(22,78,99,.72) 68%, rgba(8,127,145,.58) 100%), url('https://cdn.phototourl.com/member/2026-09-10-447178ba-cb5f-40dc-a5dd-e40ca914e938.jpg') center/cover;
    }
    .uu-masthead-daerah {
        background: linear-gradient(118deg, rgba(16,47,67,.88) 0%, rgba(22,78,99,.7) 68%, rgba(8,127,145,.56) 100%), url('https://cdn.phototourl.com/member/2026-09-10-46febb41-326c-40c3-8001-e18bf2f5a86b.jpg') center/cover;
    }
    .uu-masthead-p3b {
        background: linear-gradient(118deg, rgba(16,47,67,.88) 0%, rgba(22,78,99,.7) 68%, rgba(8,127,145,.56) 100%), url('https://cdn.phototourl.com/member/2026-09-10-847fff42-7b65-4936-b42c-a0c61a485e46.jpg') center/cover;
    }
    .uu-masthead-pusat {
        background-color: #164e63;
        background-image: linear-gradient(118deg, rgba(16,47,67,.72) 0%, rgba(22,78,99,.48) 68%, rgba(8,127,145,.32) 100%), url('https://cdn.phototourl.com/member/2026-09-10-1b257642-d5ed-48a1-8696-3177abf6d2e8.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .uu-masthead-rekap {
        background: linear-gradient(118deg, rgba(16,47,67,.86) 0%, rgba(22,78,99,.68) 68%, rgba(8,127,145,.52) 100%), url('https://cdn.phototourl.com/free/2026-09-10-e0bc7859-084f-4254-b558-3bf04d539c55.jpg') center/cover;
    }
    .uu-masthead-inner {
        width: min(100% - 48px, 1720px);
        margin: 0 auto;
        padding: 38px 2px 42px;
    }
    .uu-kicker {
        color: #9ce7dc;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: .08em;
        text-decoration: none;
    }
    .uu-masthead h1 {
        max-width: 980px;
        margin: 10px 0 0;
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: clamp(30px, 3.4vw, 48px);
        font-weight: 700;
        line-height: 1.08;
        letter-spacing: 0;
    }
    .uu-alert {
        width: min(100% - 48px, 1500px);
        margin: 28px auto -4px;
    }
    .uu-layout {
        width: min(100% - 48px, 1720px);
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 32px;
        margin: 42px auto 70px;
    }
    .uu-main-column {
        min-width: 0;
        padding: 42px 46px 48px;
        border: 1px solid #d8e5e8;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 16px 36px rgba(28, 61, 75, .1);
    }
    .uu-section-heading {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }
    .uu-eyebrow, .uu-feature-label, .uu-document-type {
        color: #087f91;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .12em;
    }
    .uu-section-heading h2 {
        margin: 7px 0 4px;
        color: #173042;
        font-size: 30px;
        font-weight: 700;
    }
    .uu-section-heading p {
        margin: 0;
        color: #6f7d86;
        font-size: 14px;
    }
    .uu-feature {
        display: grid;
        grid-template-columns: minmax(260px, .85fr) 1.15fr;
        min-height: 270px;
        margin-bottom: 42px;
        overflow: hidden;
        border: 1px solid #cfe3e5;
        border-radius: 12px;
        background: #eef8f7;
        box-shadow: 0 10px 22px rgba(25, 78, 96, .08);
    }
    .uu-feature-art {
        position: relative;
        overflow: hidden;
        display: grid;
        place-items: center;
        background: #dcefed;
        padding: 12px;
        min-height: 270px;
    }
    .uu-feature-art img {
        display: block;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        object-position: center;
        background: transparent;
    }
    .uu-feature-copy {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 32px 38px;
    }
    .uu-feature-copy h3 {
        margin: 8px 0 10px;
        color: #173042;
        font-size: 25px;
        line-height: 1.16;
    }
    .uu-feature-copy p { margin: 0 0 20px; color: #536b75; font-size: 14px; line-height: 1.65; }
    .uu-feature-link { color: #087f91; font-size: 14px; font-weight: 800; }
    .uu-feature-link span { margin-left: 8px; font-size: 20px; }
    .uu-feature-related {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-top: 18px;
        padding: 12px 14px;
        border: 1px solid #c9e0e8;
        border-left: 4px solid #e8b84b;
        border-radius: 8px;
        background: rgba(255, 255, 255, .82);
    }
    .uu-feature-related strong { color: #1c3347; font-size: 14px; line-height: 1.3; }
    .uu-feature-related .uu-feature-link { flex: 0 0 auto; font-size: 12px; white-space: nowrap; }
    .uu-feature-documents {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 6px 14px;
        margin-top: 16px;
        padding-top: 12px;
        border-top: 1px solid #c9e0e8;
    }
    .uu-feature-documents span {
        grid-column: 1 / -1;
        color: #6b7e88;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
    }
    .uu-feature-documents a {
        color: #087f91;
        font-size: 12px;
        font-weight: 700;
    }
    .uu-feature-documents a span { display: inline; color: inherit; font-size: 14px; letter-spacing: 0; }
    .uu-page-daerah .uu-section-heading h2 { font-size: clamp(24px, 2.4vw, 30px); line-height: 1.2; }
    .uu-page-daerah .uu-section-heading p { max-width: 680px; font-size: 13px; line-height: 1.6; }
    .uu-page-daerah .uu-feature { grid-template-columns: minmax(230px, .78fr) 1.22fr; min-height: 250px; margin-bottom: 34px; }
    .uu-page-daerah .uu-feature-copy { padding: 26px 32px; }
    .uu-page-daerah .uu-feature-copy h3 { margin: 7px 0 9px; font-size: 22px; line-height: 1.22; }
    .uu-page-daerah .uu-feature-copy p { margin-bottom: 14px; font-size: 13px; line-height: 1.6; }
    .uu-page-daerah .uu-feature-related { margin-top: 12px; padding: 10px 12px; }
    .uu-page-daerah .uu-feature-related strong { font-size: 13px; }
    .uu-page-daerah .uu-feature-documents { margin-top: 12px; padding-top: 10px; }
    .uu-page-daerah .uu-article { margin-top: 20px; padding: 24px 28px 26px; }
    .uu-page-daerah .uu-article h3 { margin-bottom: 14px; font-size: 23px; }
    .uu-page-daerah .uu-article h4 { margin: 22px 0 8px; font-size: 17px; }
    .uu-page-daerah .uu-article p { margin-bottom: 13px; font-size: 14px; line-height: 1.72; }
    .uu-page-p3b .uu-masthead h1 { max-width: 860px; font-size: clamp(28px, 3.1vw, 42px); line-height: 1.12; }
    .uu-page-p3b .uu-section-heading h2 { font-size: clamp(24px, 2.4vw, 30px); line-height: 1.2; }
    .uu-page-p3b .uu-section-heading p { max-width: 720px; font-size: 13px; line-height: 1.6; }
    .uu-page-p3b .uu-feature-copy { padding: 28px 34px; }
    .uu-page-p3b .uu-feature-copy h3 { font-size: 22px; line-height: 1.22; }
    .uu-page-p3b .uu-feature-copy p { font-size: 13px; line-height: 1.65; }
    .uu-page-p3b .uu-article h3 { font-size: 24px; }
    .uu-page-p3b .uu-article p { font-size: 14px; line-height: 1.75; }
    .uu-page-pusat .uu-masthead h1 { max-width: 780px; font-size: clamp(28px, 3.1vw, 42px); line-height: 1.12; }
    .uu-page-pusat .uu-section-heading h2 { font-size: clamp(24px, 2.4vw, 30px); line-height: 1.2; }
    .uu-page-pusat .uu-section-heading p { max-width: 680px; font-size: 13px; line-height: 1.6; }
    .uu-page-pusat .uu-feature-copy { padding: 28px 34px; }
    .uu-page-pusat .uu-feature-copy h3 { font-size: 22px; line-height: 1.22; }
    .uu-page-pusat .uu-feature-copy p { font-size: 13px; line-height: 1.65; }
    .uu-page-pusat .uu-feature-art img { width: 100%; height: 100%; object-fit: cover; object-position: center; }
    .uu-page-pusat .uu-article h3 { font-size: 24px; }
    .uu-page-pusat .uu-article p { font-size: 14px; line-height: 1.75; }
    .uu-page-rekap .uu-masthead h1 { max-width: 760px; font-size: clamp(29px, 3.3vw, 44px); line-height: 1.1; }
    .uu-page-rekap .uu-section-heading h2 { font-size: clamp(24px, 2.4vw, 30px); line-height: 1.2; }
    .uu-page-rekap .uu-section-heading p { max-width: 680px; font-size: 13px; line-height: 1.6; }
    .uu-page-rekap .uu-feature-copy { padding: 28px 34px; }
    .uu-page-rekap .uu-feature-copy h3 { font-size: 22px; line-height: 1.22; }
    .uu-page-rekap .uu-feature-copy p { font-size: 13px; line-height: 1.65; }
    .uu-page-rekap .uu-article h3 { font-size: 24px; }
    .uu-page-rekap .uu-article p { font-size: 14px; line-height: 1.75; }
    .uu-list-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 2px solid #173042;
        padding-bottom: 14px;
    }
    .uu-list-header h3 { margin: 0; font-size: 21px; }
    .uu-list-header span { color: #7c8b92; font-size: 13px; }
    .uu-article {
        max-width: 900px;
        margin: 26px 0 34px;
        padding: 28px 32px 30px;
        border-left: 4px solid #0a9bd5;
        background: linear-gradient(135deg, #f0faf9 0%, #fff 72%);
        box-shadow: 0 8px 18px rgba(25, 78, 96, .06);
    }
    .uu-article h3 {
        margin: 8px 0 18px;
        color: #173042;
        font-size: 26px;
        line-height: 1.2;
    }
    .uu-article p {
        margin: 0 0 16px;
        color: #536873;
        font-size: 15px;
        line-height: 1.82;
    }
    .uu-article h4 {
        margin: 26px 0 10px;
        color: #173042;
        font-size: 18px;
        line-height: 1.3;
    }
    .uu-tax-list, .uu-tax-steps {
        margin: 0 0 22px;
        padding: 0;
        color: #536873;
        font-size: 14px;
        line-height: 1.55;
    }
    .uu-tax-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        list-style: none;
    }
    .uu-tax-list li {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding: 12px 14px;
        border: 1px solid #d7e8e8;
        border-left: 3px solid #0bb2a4;
        border-radius: 7px;
        background: #f5fbfa;
    }
    .uu-tax-list strong { color: #173042; font-size: 13px; }
    .uu-tax-list span { color: #657a82; font-size: 12px; }
    .uu-tax-steps { padding-left: 22px; }
    .uu-tax-steps li { padding-left: 6px; margin-bottom: 8px; }
    .uu-article p:last-of-type { margin-bottom: 22px; }
    .uu-article-source {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #087cbb;
        font-size: 13px;
        font-weight: 800;
    }
    .uu-article-source span { font-size: 18px; }
    .uu-document-item {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 19px 8px;
        border-bottom: 1px solid #e3eaed;
        transition: background .2s ease, padding .2s ease;
    }
    .uu-document-item:hover { padding-left: 14px; background: #f2f9fc; }
    .uu-document-number { width: 30px; color: #0a9bd5; font-size: 18px; font-weight: 800; }
    .uu-document-body { flex: 1; min-width: 0; }
    .uu-document-body h4 { margin: 5px 0 6px; color: #1b3348; font-size: 16px; }
    .uu-document-body p { margin: 0; color: #71818a; font-size: 13px; }
    .uu-document-body p span { margin: 0 5px; color: #0a9bd5; }
    .uu-status { padding: 5px 9px; font-size: 11px; font-weight: 800; }
    .uu-status.is-active { color: #08764f; background: #dff5e9; }
    .uu-status.is-inactive { color: #a14a3b; background: #ffe8e2; }
    .uu-pagination { padding-top: 24px; }
    .uu-pagination nav { display: flex; justify-content: center; }
    .uu-sidebar { min-width: 0; }
    .uu-sidebar-title {
        display: inline-block;
        margin-bottom: 8px;
        padding: 6px 11px;
        border-radius: 4px 4px 4px 0;
        color: #fff;
        background: #087f91;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: .1em;
    }
    .uu-sidebar-title-next { margin-top: 28px; }
    .uu-story-card {
        display: block;
        overflow: hidden;
        border: 1px solid #d9e5e7;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 10px 22px rgba(21, 47, 65, .1);
        text-decoration: none;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .uu-story-card:hover { transform: translateY(-3px); box-shadow: 0 14px 26px rgba(21, 47, 65, .15); }
    .uu-story-image { display: grid; place-items: center; height: 180px; }
    .uu-story-image img { width: 100%; height: 100%; object-fit: contain; object-position: center; background: #eef3f5; }
    .uu-story-image span { color: rgba(255,255,255,.92); font-size: 30px; font-weight: 800; line-height: 1; text-align: center; letter-spacing: .05em; }
    .uu-story-house { background: linear-gradient(145deg, #84c8df, #e5c78b 58%, #98724d); }
    .uu-story-paper { background: linear-gradient(145deg, #176b91, #71c4d7 50%, #e6b85d); }
    .uu-story-card strong { display: block; padding: 16px 16px 3px; color: #173042; font-size: 17px; line-height: 1.3; text-align: center; }
    .uu-story-summary { display: block; min-height: 42px; padding: 0 16px 13px; color: #64727b; font-size: 13px; line-height: 1.45; text-align: center; }
    .uu-story-action { display: block; padding: 13px 15px; color: #fff; background: #173042; font-size: 13px; font-weight: 800; text-align: right; }
    .uu-back-link { display: inline-block; margin-top: 28px; color: #087f91; font-weight: 700; }
    @media (max-width: 900px) {
        .uu-layout { grid-template-columns: 1fr; }
        .uu-sidebar { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; align-items: start; }
        .uu-sidebar-title-next { margin-top: 0; }
        .uu-back-link { grid-column: 1 / -1; }
    }
    @media (max-width: 600px) {
        .uu-masthead-inner, .uu-layout { width: min(100% - 28px, 1720px); }
        .uu-masthead-inner { padding: 28px 0 32px; }
        .uu-layout { margin-top: 28px; }
        .uu-main-column { padding: 24px 18px 30px; }
        .uu-section-heading { align-items: start; flex-direction: column; }
        .uu-feature, .uu-page-daerah .uu-feature { grid-template-columns: 1fr; }
        .uu-feature-art { min-height: 0; aspect-ratio: 16 / 9; }
        .uu-feature-copy, .uu-page-daerah .uu-feature-copy { padding: 24px; }
        .uu-page-daerah .uu-section-heading h2 { font-size: 24px; }
        .uu-page-daerah .uu-section-heading p { font-size: 13px; }
        .uu-page-daerah .uu-feature-copy h3 { font-size: 20px; }
        .uu-page-daerah .uu-article { padding: 22px 18px; }
        .uu-page-p3b .uu-masthead h1 { font-size: 28px; }
        .uu-page-p3b .uu-feature-copy { padding: 24px; }
        .uu-page-p3b .uu-feature-copy h3 { font-size: 20px; }
        .uu-page-p3b .uu-article { padding: 22px 18px; }
        .uu-page-pusat .uu-masthead h1 { font-size: 28px; }
        .uu-page-pusat .uu-feature-copy { padding: 24px; }
        .uu-page-pusat .uu-feature-copy h3 { font-size: 20px; }
        .uu-page-pusat .uu-article { padding: 22px 18px; }
        .uu-page-rekap .uu-masthead h1 { font-size: 29px; }
        .uu-page-rekap .uu-feature-copy { padding: 24px; }
        .uu-page-rekap .uu-feature-copy h3 { font-size: 20px; }
        .uu-page-rekap .uu-article { padding: 22px 18px; }
        .uu-feature-related { align-items: flex-start; flex-direction: column; gap: 6px; }
        .uu-feature-related .uu-feature-link { white-space: normal; }
        .uu-feature-documents { grid-template-columns: 1fr; }
        .uu-article { padding: 22px 18px; }
        .uu-article p { font-size: 13px; line-height: 1.7; text-align: left; }
        .uu-tax-list { grid-template-columns: 1fr; }
        .uu-document-item { align-items: flex-start; gap: 10px; }
        .uu-status { margin-left: auto; }
        .uu-sidebar { grid-template-columns: 1fr; }
    }
</style>

@endsection
