<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Controllers\Controller;

class PetaController extends Controller
{
    public function index()
    {
        $hotels = Hotel::orderBy('nama')->get();
        $trackingHotels = $hotels->map(function (Hotel $hotel) {
            return [
                'id' => $hotel->id,
                'nama' => $hotel->nama,
                'alamat' => $hotel->alamat,
                'lat' => $hotel->lat,
                'lng' => $hotel->lng,
                'foto' => $hotel->foto,
                'status' => $hotel->status,
            ];
        })->values();
        $wilayah = [
            'nama' => 'Kantor BEKAUDA',
            'alamat' => '88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733',
            'kecamatan' => 'Padangsidimpuan Utara',
            'kota' => 'Kota Padang Sidempuan',
            'provinsi' => 'Sumatera Utara',
            'lat' => 1.3721801,
            'lng' => 99.2730146,
            'url' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode('88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733'),
        ];
        $tamanBaruas = [
            'nama' => 'Taman Baruas',
            'alamat' => '9852+WPP, Pudun Jae, Kec. Padangsidimpuan Batunadua, Kota Padang Sidempuan, Sumatera Utara 22733',
            'lat' => 1.3564044,
            'lng' => 99.3060805,
            'foto' => 'https://cdn.phototourl.com/member/2026-09-18-df790183-4f0e-41ef-84e6-3b1f6a7f28ab.jpg',
            'url' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode('9852+WPP, Pudun Jae, Kec. Padangsidimpuan Batunadua, Kota Padang Sidempuan, Sumatera Utara 22733'),
        ];

        return view('peta.index', compact('hotels', 'trackingHotels', 'wilayah', 'tamanBaruas'));
    }
}
