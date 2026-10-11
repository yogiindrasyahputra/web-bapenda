<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = [
            ['nama' => 'Hotel Fajar Koy', 'alamat' => 'Jl. Sisingamangaraja No.75, Wek V, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-fajar-koy.jpg'],
            ['nama' => 'Hotel Merdeka', 'alamat' => 'Jl. Merdeka No.166, Wek I, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-merdeka.jpg'],
            ['nama' => 'Hotel Istana I', 'alamat' => 'Jl. KH. Ahmad Dahlan No.62-64, Wek I, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-istana-i.jpg'],
            ['nama' => 'Hotel Istana II', 'alamat' => 'Jl. Sutombol No.9, Wek II, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22718', 'foto' => 'hotels/hotel-istana-ii.jpg'],
            ['nama' => 'Hotel Istana III', 'alamat' => 'Jl. Merdeka No.46, Wek II, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-istana-iii.jpg'],
            ['nama' => 'Hotel Istana XII', 'alamat' => 'Jl. Sisingamangaraja No.12, Wek V, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-istana-xii.jpg'],
            ['nama' => 'Hotel Surya', 'alamat' => '97JC+628, Jl. Sutombol, Wek II, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-surya.jpg'],
            ['nama' => 'Hotel Asean', 'alamat' => 'Jl. Sudirman No.79, Wek II, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22718', 'foto' => 'hotels/hotel-asean.png'],
            ['nama' => 'Hotel Natama', 'alamat' => 'Jl. Sisingamangaraja No.100, Wek V, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22723', 'foto' => 'hotels/hotel-natama.jpg'],
            ['nama' => 'Hotel MTM', 'alamat' => 'Jl. Kapten Koima No.164, Wek I, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-mtm.jpg'],
            ['nama' => 'Hotel Samudera', 'alamat' => 'Jl. Teuku Umar gang telkom No.98, Losung, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-samudera.jpg'],
            ['nama' => 'Losmen Sentral', 'alamat' => 'Jl. Sudirman No.32, Wek II, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22718', 'foto' => 'hotels/hotel-sentral.jpg'],
            ['nama' => 'Hotel Mega Permata', 'alamat' => 'Jl. Imam Bonjol No.178, Aek Tampang, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22726', 'foto' => 'hotels/hotel-mega-permata.png'],
            ['nama' => 'Hotel Mutiara', 'alamat' => 'Jl. Imam Bonjol No.303, Padang Matinggi, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22727', 'foto' => 'hotels/hotel-mutiara-cemerlang.jpg'],
            ['nama' => 'Hotel Maninjau', 'alamat' => 'Jl. Kapten Koima No.58, Bincar, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22718', 'foto' => 'hotels/hotel-maninjau.jpg'],
            ['nama' => 'Hotel Amanat Pidoli', 'alamat' => 'Jl. Tuanku Imam No.107-125, Wek V, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/hotel-amanat-pidoli.jpg'],
            ['nama' => 'Hotel Sunter Pidoli', 'alamat' => 'Jl. Imam Bonjol No.25, Wek V, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22723', 'foto' => 'hotels/hotel-sunter-pidol.jpg'],
            ['nama' => 'Kos Ungu Rambin', 'alamat' => 'Jl. D.I. Panjaitan No.6, Bincar, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/kos-ungu-rambin.jpg'],
            ['nama' => 'Minimax Home Stay', 'alamat' => 'Jl. Abdul Jalil Lubis, Batunadua Jae, Kec. Padangsidimpuan Batunadua, Kota Padang Sidempuan, Sumatera Utara 22733', 'foto' => 'hotels/minimax-homestay.jpg'],
            ['nama' => 'Daily Home Stay', 'alamat' => 'Jl. Sutan Moh. Arif No.121, Batang Ayumi Julu, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/daily-home-kost.jpg'],
            ['nama' => 'Hotel Sitamiang', 'alamat' => 'Jl. Sisingamangaraja No.189, Sitamiang, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22735', 'foto' => 'hotels/hotel-sitamiang.jpg'],
            ['nama' => 'Ruma Stay', 'alamat' => 'Komplek City Walk, Jl. Merdeka Blok C No. 6, Kantin, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'hotels/ruma-stay.jpg'],
            ['nama' => 'Hotel Lancar', 'alamat' => 'Jl. Imam Bonjol No. 243, Padang Matinggi, Padang Matinggi Lestari, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22723', 'foto' => 'hotels/hotel-lancar.jpg'],
            ['nama' => 'Kost Sutomo Indah', 'alamat' => 'Jl. Dr. Sutomo, Wek II, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22716', 'foto' => 'hotels/kost-sutomo-indah.jpg'],
            ['nama' => 'Pia Hotel', 'alamat' => 'Jl. Raja Inal Siregar, Batunadua Jae, Kec. Padangsidimpuan Batunadua, Kota Padang Sidempuan, Sumatera Utara 22733', 'foto' => 'hotels/hotel-pia.jpg'],
            ['nama' => 'Hotel Anata', 'alamat' => '97G9+CXV, Jl. Patrice Lumumba, Wek IV, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'https://cdn.phototourl.com/member/2026-09-18-b6bc422a-e648-43dc-a16c-becc1242bf73.jpg'],
            ['nama' => 'Kost Balaka Pidoli', 'alamat' => 'Jl. Imam Bonjol, Padang Matinggi, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22727', 'foto' => 'https://cdn.phototourl.com/member/2026-09-18-0d59518e-a348-4ece-8616-1681a9adc525.jpg'],
            ['nama' => 'Penginapan Si Anis', 'alamat' => '97GF+C26, Kantin, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'https://cdn.phototourl.com/member/2026-09-18-b34c2b65-c340-4a72-a100-c243cabf83be.jpg'],
            ['nama' => 'Natama Guest', 'alamat' => 'Dekat Jl. Cut Nyak Dhin 3-21, Wek IV, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'foto' => 'https://cdn.phototourl.com/member/2026-09-18-a03b2d5b-73b0-42e5-9dd8-066e31a8b6d1.jpg'],
            ['nama' => 'Taman Baruas', 'alamat' => '98Q5+WR, Taman Baruas Indah, Baruas, Kec. Padangsidimpuan Batunadua, Kota Padang Sidempuan, Sumatera Utara 22733', 'foto' => 'https://cdn.phototourl.com/member/2026-09-18-df790183-4f0e-41ef-84e6-3b1f6a7f28ab.jpg'],
        ];

        foreach ($hotels as $hotel) {
            Hotel::updateOrCreate(
                ['nama' => $hotel['nama']],
                ['alamat' => $hotel['alamat'], 'foto' => $hotel['foto'], 'status' => 'aktif']
            );
        }

        $hotelCoordinates = [
            'Hotel Fajar Koy' => [1.3800031, 99.2741281],
            'Hotel Merdeka' => [1.3833781, 99.2668781],
            'Hotel Istana I' => [1.3855031, 99.2670031],
            'Hotel Istana II' => [1.3797531, 99.2696281],
            'Hotel Istana III' => [1.3801281, 99.2687531],
            'Hotel Istana XII' => [1.3765031, 99.2743781],
            'Hotel Surya' => [1.3805031, 99.2700031],
            'Hotel Asean' => [1.3805031, 99.2681281],
            'Hotel Natama' => [1.3812531, 99.2745031],
            'Hotel MTM' => [1.3855031, 99.2673781],
            'Hotel Samudera' => [1.3791281, 99.2768781],
            'Losmen Sentral' => [1.3797531, 99.2692531],
            'Hotel Mega Permata' => [1.3723781, 99.2767531],
            'Hotel Mutiara' => [1.3582531, 99.2882531],
            'Hotel Maninjau' => [1.3817531, 99.2702531],
            'Hotel Amanat Pidoli' => [1.3718781, 99.2773781],
            'Hotel Sunter Pidoli' => [1.3752531, 99.2750031],
            'Kos Ungu Rambin' => [1.3825031, 99.2717531],
            'Minimax Home Stay' => [1.4043781, 99.2792531],
            'Daily Home Stay' => [1.3963781, 99.2695031],
            'Hotel Sitamiang' => [1.3873781, 99.2746281],
            'Ruma Stay' => [1.3756281, 99.2725031],
            'Hotel Lancar' => [1.3636281, 99.2851281],
            'Kost Sutomo Indah' => [1.3828781, 99.2686281],
            'Pia Hotel' => [1.4003781, 99.2768781],
            'Hotel Anata' => [1.3738000, 99.2728000],
            'Kost Balaka Pidoli' => [1.3585820, 99.2897640],
            'Penginapan Si Anis' => [1.3726000, 99.2700000],
            'Natama Guest' => [1.3721000, 99.2714000],
            'Taman Baruas' => [1.3564044, 99.3060805],
        ];

        foreach ($hotelCoordinates as $hotelName => [$lat, $lng]) {
            Hotel::where('nama', $hotelName)->update([
                'lat' => $lat,
                'lng' => $lng,
            ]);
        }
    }
}
