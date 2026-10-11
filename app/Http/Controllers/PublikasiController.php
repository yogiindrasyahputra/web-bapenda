<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PublikasiController extends Controller
{
    public function index()
    {
        $isNewsletter = request()->query('kind') === 'newsletter';
        $newsletterSource = 'https://ddtc.co.id/id/publikasi?kind=newsletter';
        $newsletters = [
            ['title' => 'Penyesuaian Kriteria Penerima Insentif Pajak yang Terdampak Covid-19', 'description' => 'Penyesuaian dan petunjuk teknis insentif pajak bagi wajib pajak terdampak Covid-19.', 'url' => 'https://ddtc.co.id/id/publikasi/penyesuaian-kriteria-penerima-insentif-pajak-yang-terdampak-covid-19_215'],
            ['title' => 'Menilik Kebijakan Baru dalam Undang-Undang Harmonisasi Perpajakan', 'description' => 'Overview kebijakan baru dalam UU Harmonisasi Peraturan Perpajakan (HPP).', 'url' => 'https://ddtc.co.id/id/publikasi/menilik-kebijakan-baru-dalam-undang-undang-harmonisasi-peraturan-perpajakan_214'],
            ['title' => 'Petunjuk Teknis Pemungutan PPN serta PPh atas Penjualan Pulsa dan Kartu Perdana', 'description' => 'Ketentuan teknis pemungutan PPN dan PPh atas penjualan pulsa serta kartu perdana.', 'url' => 'https://ddtc.co.id/id/publikasi/petunjuk-teknis-pemungutan-ppn-serta-pph-atas-penjualan-pulsa-dan-kartu-perdana_213'],
            ['title' => 'Penurunan Tarif Bunga Obligasi bagi Wajib Pajak Dalam Negeri dan Bentuk Usaha Tetap', 'description' => 'Penjelasan perubahan tarif bunga obligasi dari 15% menjadi 10%.', 'url' => 'https://ddtc.co.id/id/publikasi/penurunan-tarif-bunga-obligasi-bagi-wajib-pajak-dalam-negeri-dan-bentuk-usaha-tetap_212'],
            ['title' => 'Insentif Fiskal bagi Warga DKI Jakarta dan Penambahan Dokumen Setara Faktur Pajak', 'description' => 'Insentif fiskal daerah dan dokumen yang dipersamakan dengan faktur pajak.', 'url' => 'https://ddtc.co.id/id/publikasi/insentif-fiskal-bagi-warga-dki-jakarta-dan-penambahan-dokumen-setara-faktur-pajak_211'],
            ['title' => 'Perpanjangan Insentif PPN Ditanggung Pemerintah atas Rumah Tapak dan Hunian Rumah Susun', 'description' => 'Perpanjangan fasilitas PPN ditanggung pemerintah atas rumah tapak dan rumah susun.', 'url' => 'https://ddtc.co.id/id/publikasi/perpanjangan-insentif-ppn-ditanggung-pemerintah-atas-rumah-tapak-dan-unit-hunian-rumah-susun-dtp_210'],
            ['title' => 'BKP Tertentu Bersifat Strategis yang Tidak Dipungut PPN serta Aturan Baru Bea Masuk dan Cukai', 'description' => 'Ringkasan regulasi baru mengenai BKP strategis, bea masuk, dan cukai.', 'url' => 'https://ddtc.co.id/id/publikasi/bkp-tertentu-bersifat-strategis-yang-tidak-dipungut-ppn-serta-aturan-baru-bea-masuk-dan-cukai_209'],
            ['title' => 'Perpanjangan Insentif Perpajakan untuk Penanganan Covid-19', 'description' => 'Perkembangan fasilitas perpajakan untuk mendukung penanganan Covid-19.', 'url' => 'https://ddtc.co.id/id/publikasi/perpanjangan-insentif-perpajakan-untuk-penanganan-covid-19_208'],
            ['title' => 'Ketentuan Hak dan Kewajiban Perpajakan bagi Pemegang Izin Usaha Pertambangan', 'description' => 'Aturan perpajakan bagi pemegang izin usaha pertambangan dan perubahan kawasan berikat.', 'url' => 'https://ddtc.co.id/id/publikasi/ketentuan-hak-dan-kewajiban-perpajakan-bagi-pemegang-izin-usaha-pertambangan-serta-perubahan-kawasan-berikat_207'],
            ['title' => 'Aturan Baru Terkait Tata Cara Pencatatan dan Penyelenggaraan Pembukuan', 'description' => 'Ketentuan baru mengenai pencatatan, pembukuan, dan nilai transaksi untuk tujuan perpajakan.', 'url' => 'https://ddtc.co.id/id/publikasi/aturan-baru-terkait-tata-cara-pencatatan-dan-penyelenggaraan-pembukuan_206'],
        ];

        $newsletterImages = [
            'Penyesuaian Kriteria Penerima Insentif Pajak yang Terdampak Covid-19' => 'https://images.unsplash.com/photo-1584433144859-1fc3ab64a957?auto=format&fit=crop&w=900&q=80',
            'Menilik Kebijakan Baru dalam Undang-Undang Harmonisasi Perpajakan' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80',
            'Petunjuk Teknis Pemungutan PPN serta PPh atas Penjualan Pulsa dan Kartu Perdana' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=900&q=80',
            'Penurunan Tarif Bunga Obligasi bagi Wajib Pajak Dalam Negeri dan Bentuk Usaha Tetap' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=900&q=80',
            'Insentif Fiskal bagi Warga DKI Jakarta dan Penambahan Dokumen Setara Faktur Pajak' => 'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?auto=format&fit=crop&w=900&q=80',
            'Perpanjangan Insentif PPN Ditanggung Pemerintah atas Rumah Tapak dan Hunian Rumah Susun' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=900&q=80',
            'BKP Tertentu Bersifat Strategis yang Tidak Dipungut PPN serta Aturan Baru Bea Masuk dan Cukai' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80',
            'Perpanjangan Insentif Perpajakan untuk Penanganan Covid-19' => 'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=900&q=80',
            'Ketentuan Hak dan Kewajiban Perpajakan bagi Pemegang Izin Usaha Pertambangan' => 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=900&q=80',
            'Aturan Baru Terkait Tata Cara Pencatatan dan Penyelenggaraan Pembukuan' => 'https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80',
        ];

        foreach ($newsletters as &$newsletter) {
            $newsletter['image'] = $newsletterImages[$newsletter['title']];
        }
        unset($newsletter);

        if ($isNewsletter) {
            return view('publikasi.index', compact('isNewsletter', 'newsletters', 'newsletterSource'));
        }

        $ebookSource = 'https://www.pajak.go.id/id/buku-elektronik-page';
        $ebooks = [
            ['title' => 'Validasi dan Registrasi Massal NIK', 'description' => 'Panduan registrasi massal NIK sebagai NPWP melalui layanan DJP.', 'url' => $ebookSource],
            ['title' => 'Buku Fasilitas Pajak Penghasilan Badan di Indonesia 2025', 'description' => 'Mengenal fasilitas pajak penghasilan badan yang berlaku di Indonesia.', 'url' => 'https://www.pajak.go.id/id/baca-sinopsis-dan-unduh-buku-elektronik-fasilitas-pajak-penghasilan-badan-di-indonesia'],
            ['title' => 'Cara Lapor Realisasi Investasi', 'description' => 'Panduan melaporkan realisasi investasi pada aplikasi Coretax.', 'url' => 'https://www.pajak.go.id/id/baca-sinopsis-dan-unduh-buku-cara-lapor-realisasi-investasi-pada-aplikasi-coretax'],
            ['title' => 'NPPN', 'description' => 'Panduan pemberitahuan penggunaan Norma Penghitungan Penghasilan Neto.', 'url' => 'https://www.pajak.go.id/id/baca-sinopsis-dan-unduh-buku-panduan-pemberitahuan-penggunaan-norma-penghitungan-penghasilan-neto'],
            ['title' => 'Panduan Singkat Implementasi Coretax', 'description' => 'Panduan singkat implementasi Coretax bagi wajib pajak.', 'url' => 'https://www.pajak.go.id/id/baca-sinopsis-dan-unduh-buku-panduan-singkat-coretax'],
            ['title' => 'Jejak Pajak Indonesia 2', 'description' => 'Kisah dan pengetahuan perpajakan Indonesia dalam format buku elektronik.', 'url' => 'https://www.pajak.go.id/id/baca-sinopsis-dan-unduh-buku-jejak-pajak-indonesia-2'],
            ['title' => 'Petunjuk Penggunaan Aplikasi e-Bupot 21/26', 'description' => 'Petunjuk penggunaan aplikasi e-Bupot 21/26 untuk pemotongan pajak.', 'url' => 'https://www.pajak.go.id/id/baca-sinopsis-dan-unduh-buku-petunjuk-penggunaan-aplikasi-e-bupot-2126'],
            ['title' => 'Cermat Pemotongan PPh Pasal 21/26', 'description' => 'Ringkasan praktis pemotongan PPh Pasal 21/26.', 'url' => 'https://www.pajak.go.id/id/sinopsis-ringkas-dan-unduh-buku-cermat-pemotongan-pph-pasal-2126'],
            ['title' => 'Buku Reformasi Administrasi Pajak dari Masa ke Masa', 'description' => 'Perjalanan reformasi administrasi perpajakan Indonesia.', 'url' => 'https://www.pajak.go.id/id/artikel/buku-reformasi-administrasi-pajak-dari-masa-ke-masa'],
            ['title' => 'Cerita di Balik Reformasi Perpajakan', 'description' => 'Cerita dan wawasan mengenai reformasi perpajakan DJP.', 'url' => 'https://www.pajak.go.id/id/buku-reformasi-perpajakan'],
            ['title' => 'Jejak Pajak Indonesia', 'description' => 'Kumpulan pengetahuan mengenai sejarah dan perkembangan perpajakan Indonesia.', 'url' => $ebookSource . '?page=1'],
            ['title' => '50 Karya Terbaik Tema Manfaat Pajak', 'description' => 'Karya pilihan bertema manfaat pajak untuk pendidikan dan kesehatan.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'Panduan Ringkas Coretax DJP', 'description' => 'Panduan ringkas untuk memahami layanan Coretax DJP.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'SDSN Undang-Undang Perpajakan Edisi 2023', 'description' => 'Kompilasi undang-undang perpajakan edisi 2023.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'Perbandingan UU PPh, Cipta Kerja, dan HPP', 'description' => 'Perbandingan ketentuan pajak penghasilan, Cipta Kerja, dan HPP.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'Retrospeksi Pandemi Covid-19', 'description' => 'Tinjauan kebijakan perpajakan dalam menghadapi pandemi Covid-19.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'Harmoni Cinta untuk Negeri', 'description' => 'Buku elektronik perpajakan dari Direktorat Jenderal Pajak.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'Insentif Pajak Pandemi Covid-19', 'description' => 'Informasi mengenai insentif pajak selama masa pandemi.', 'url' => $ebookSource . '?page=1'],
            ['title' => 'Pengembangan CRM dan BI', 'description' => 'Pengembangan Compliance Risk Management dan Business Intelligence di DJP.', 'url' => $ebookSource . '?page=1'],
        ];

        $defaultCover = 'https://www.pajak.go.id/sites/default/files/LogoDJP11%20%281%29.png';
        $covers = [
            'Buku Fasilitas Pajak Penghasilan Badan di Indonesia 2025' => 'https://www.pajak.go.id/sites/default/files/styles/image_100x100_/public/2025-09/Buku%20Fasilitas%20Pajak%20Penghasilan%20Badan%20di%20Indonesia%202025.jpg?itok=77JzbR1a',
            'Buku Reformasi Administrasi Pajak dari Masa ke Masa' => 'https://www.pajak.go.id/sites/default/files/styles/image_100x100_/public/2023-09/Sampul%20Buku%20Reformasi%20Administrasi%20Perpajakan%20dari%20Masa%20ke%20Masa_0.jpg?itok=oiUiBcSy',
            'Cerita di Balik Reformasi Perpajakan' => 'https://www.pajak.go.id/sites/default/files/styles/image_100x100_/public/2022-07/Kover%20Buku%20Reformasi%20Perpajakan.png?itok=4AYiqPcb',
            'Validasi dan Registrasi Massal NIK' => 'https://www.pajak.go.id/sites/default/files/styles/image_100x100_/public/2025-11/validasi%20dan%20registrasi%20massal%20NIK.jpeg?itok=FI8sLIKA',
        ];

        foreach ($ebooks as &$ebook) {
            $ebook['image'] = $covers[$ebook['title']] ?? $defaultCover;
        }
        unset($ebook);

        return view('publikasi.index', compact('ebooks', 'ebookSource', 'isNewsletter'));
    }
}
