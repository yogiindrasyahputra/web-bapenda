<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Tracking;
use App\Models\Pengaduan;
use App\Models\Peraturan;
use App\Models\Publikasi;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $hotel = Hotel::where('status', 'aktif')->count();
        $hotelTotal = Hotel::count();
        $hotelNonaktif = Hotel::where('status', 'nonaktif')->count();
        $lokasi = Hotel::whereNotNull('lat')->whereNotNull('lng')->count();
        $pengaduan = Pengaduan::whereIn('status', ['terbuka', 'proses'])->count();
        $peraturan = Peraturan::where('status', 'aktif')->count();

        $hotelTerbaru = Hotel::latest()->take(4)->get();
        $tracking = Tracking::with('hotel')->latest()->take(4)->get();
        $pengaduanTerbaru = Pengaduan::latest()->take(5)->get();
        $peraturanTerbaru = Peraturan::latest()->take(5)->get();
        $publikasiTerbaru = Publikasi::latest('tanggal')->latest()->take(5)->get();

        $statusPengaduan = [
            'terbuka' => Pengaduan::where('status', 'terbuka')->count(),
            'proses' => Pengaduan::where('status', 'proses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
        ];

        $pembagianPajak = [
            ['label' => 'Pajak P3B', 'nilai' => 2150000000, 'persen' => 8.2],
            ['label' => 'Pajak Hotel', 'nilai' => 1890000000, 'persen' => 6.7],
            ['label' => 'Rekap Peraturan', 'nilai' => 845000000, 'persen' => 4.1],
        ];

        return view('admin.dashboard.index', compact(
            'hotel', 'hotelTotal', 'hotelNonaktif', 'lokasi', 'pengaduan', 'peraturan',
            'hotelTerbaru', 'tracking', 'pengaduanTerbaru',
            'peraturanTerbaru', 'publikasiTerbaru', 'statusPengaduan', 'pembagianPajak'
        ));
    }
}
