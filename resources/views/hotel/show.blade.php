@extends('layouts.app')

@section('title', $hotel->nama . ' | Jarak ke Kantor BEKAUDA')

@section('meta')
    <meta name="description" content="{{ $hotel->nama }} berjarak {{ $distanceKm ? number_format($distanceKm, 2, ',', '.') . ' km' : 'sedang dihitung' }} dari Kantor BEKAUDA.">
    <meta property="og:title" content="{{ $hotel->nama }} | Jarak ke Kantor BEKAUDA">
    <meta property="og:description" content="{{ $hotel->nama }} berjarak {{ $distanceKm ? number_format($distanceKm, 2, ',', '.') . ' km' : 'sedang dihitung' }} dari Kantor BEKAUDA.">
    <meta property="og:url" content="{{ route('hotel.share', $hotel) }}">
@endsection

@section('content')
<div class="container">
    <div class="hotel-detail-heading mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-end gap-3">
                <div>
                    <span class="hotel-detail-eyebrow">PROFIL HOTEL</span>
                    <h1>{{ $hotel->nama }}</h1>
                    <p class="hotel-detail-subtitle">Informasi lokasi dan status hotel di Kota Padangsidimpuan.</p>
                </div>
                <div>
                    @if($isShared ?? false)
                        <span class="badge bg-info">Tautan publik</span>
                    @else
                        <a href="{{ route('hotel.index') }}" class="btn btn-outline-secondary">← Kembali ke daftar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card hotel-detail-card">
                <div class="card-body">
                    <div class="hotel-detail-actions mb-4">
                        <div>
                            <span class="hotel-distance-label">JARAK KE KANTOR BEKAUDA</span>
                            <strong id="hotel-distance" data-address="{{ $hotel->alamat }}" data-lat="{{ $hotel->lat ?? '' }}" data-lng="{{ $hotel->lng ?? '' }}" data-distance="{{ $distanceKm ?? '' }}">{{ $distanceKm !== null ? number_format($distanceKm, 2, ',', '.') . ' km' : 'Menghitung jarak...' }}</strong>
                            <small id="hotel-distance-status">{{ $distanceKm !== null ? 'Jarak garis lurus dari Kantor BEKAUDA.' : 'Berdasarkan alamat hotel dan titik kantor BEKAUDA.' }}</small>
                        </div>
                        @php($mapQuery = $hotel->lat !== null && $hotel->lng !== null ? $hotel->lat . ',' . $hotel->lng : $hotel->alamat)
                        <a href="https://www.google.com/maps/search/?api=1&amp;query={{ urlencode($mapQuery) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Buka di Google Maps</a>
                    </div>
                    <div class="hotel-detail-photo-wrap mb-4">
                        @if($hotel->foto)
                            <img src="{{ filter_var($hotel->foto, FILTER_VALIDATE_URL) ? $hotel->foto : asset('storage/' . $hotel->foto) }}" alt="Foto {{ $hotel->nama }}" class="hotel-detail-photo">
                        @else
                            <div class="hotel-detail-placeholder">🏨<span>Foto hotel belum ditambahkan</span></div>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Nama Hotel:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $hotel->nama }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Alamat:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $hotel->alamat }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Wajib Pajak:</strong>
                        </div>
                        <div class="col-md-8">
                            <span class="badge {{ $hotel->wajib_pajak ? 'bg-success' : 'bg-secondary' }}">{{ $hotel->wajib_pajak ? '✓ Ya' : 'Tidak' }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Titik Koordinat:</strong>
                        </div>
                        <div class="col-md-8">
                            @if($hotel->lat !== null && $hotel->lng !== null)
                                {{ number_format((float) $hotel->lat, 7, '.', '') }}, {{ number_format((float) $hotel->lng, 7, '.', '') }}
                            @else
                                <span class="text-muted">Belum tersedia, menggunakan titik dari alamat.</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-md-8">
                            @if($hotel->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Dibuat:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $hotel->created_at->format('d-m-Y H:i:s') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Diperbarui:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $hotel->updated_at->format('d-m-Y H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .hotel-detail-heading { position: relative; overflow: hidden; padding: 28px 30px; border-radius: 20px; color: #fff; background: linear-gradient(115deg, #103c69, #087f78 64%, #e1a92e); box-shadow: 0 16px 34px rgba(18,63,89,.16); }
    .hotel-detail-heading::after { position: absolute; right: 28px; bottom: -50px; width: 160px; height: 160px; content: ''; border: 18px solid rgba(255,255,255,.15); border-radius: 50%; transform: rotate(25deg); }
    .hotel-detail-heading h1 { position: relative; z-index: 1; margin: 5px 0 0; color: #fff; font-size: clamp(26px, 4vw, 42px); font-weight: 800; letter-spacing: -.02em; }
    .hotel-detail-eyebrow { position: relative; z-index: 1; color: #ffe08a; font-size: 10px; font-weight: 800; letter-spacing: .14em; }
    .hotel-detail-subtitle { position: relative; z-index: 1; margin: 7px 0 0; color: rgba(255,255,255,.78); font-size: 12px; }
    .hotel-detail-heading .btn { position: relative; z-index: 1; border-color: rgba(255,255,255,.55); color: #fff; background: rgba(255,255,255,.12); }
    .hotel-detail-heading .btn:hover { color: #123f59; background: #fff; }
    .hotel-detail-card { overflow: hidden; border: 0; border-radius: 22px; box-shadow: 0 18px 42px rgba(18,63,89,.12); }
    .hotel-detail-card .card-body { padding: 24px; }
    .hotel-detail-photo-wrap { overflow: hidden; border: 5px solid #fff; border-radius: 18px; background: linear-gradient(135deg, #d9f4ed, #fff0bf); box-shadow: 0 12px 26px rgba(18,63,89,.14); }
    .hotel-detail-photo { display: block; width: 100%; max-height: 520px; object-fit: contain; object-position: center; background: #f5f8fa; transition: transform .35s ease; }
    .hotel-detail-photo-wrap:hover .hotel-detail-photo { transform: scale(1.025); }
    .hotel-detail-placeholder { display: grid; place-items: center; gap: 8px; min-height: 220px; color: #087f78; font-size: 42px; }
    .hotel-detail-placeholder span { color: #6f7f8d; font-size: 13px; }
    .hotel-detail-actions { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px; border: 1px solid #cfe5df; border-radius: 16px; background: linear-gradient(135deg, #f0faf7, #f8fbff); }
    .hotel-distance-label { display: block; color: #087f78; font-size: 10px; font-weight: 800; letter-spacing: .1em; }
    .hotel-detail-actions strong, .hotel-detail-actions small { display: block; }
    .hotel-detail-actions strong { margin-top: 4px; color: #123f59; font-size: 23px; }
    .hotel-detail-actions small { margin-top: 3px; color: #718293; font-size: 11px; }
    .hotel-detail-actions .btn-primary { border: 0; border-radius: 11px; color: #173b62; background: linear-gradient(135deg, #ffc338, #f0a928); box-shadow: 0 8px 16px rgba(225,169,46,.25); font-weight: 800; }
    .hotel-detail-actions .btn-primary:hover { color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); }
    .hotel-detail-card .card-body > .row.mb-3 { margin: 0 0 9px !important; padding: 13px 14px; border: 1px solid #e4efec; border-radius: 12px; background: #fbfefd; }
    .hotel-detail-card .card-body > .row.mb-3:nth-of-type(odd) { background: #f1faf7; }
    .hotel-detail-card .card-body > .row.mb-3 > div:first-child { color: #087f78; font-size: 11px; font-weight: 800; letter-spacing: .03em; }
    .hotel-detail-card .card-body > .row.mb-3 > div:last-child { color: #3f5968; font-size: 13px; font-weight: 600; }
    .hotel-detail-card .badge { padding: 7px 11px; border-radius: 8px; font-size: 11px; }
    @media (max-width: 560px) { .hotel-detail-heading { padding: 22px 20px; }.hotel-detail-heading .d-flex { align-items: flex-start !important; flex-direction: column; }.hotel-detail-card .card-body { padding: 16px; }.hotel-detail-actions { align-items: flex-start; flex-direction: column; }.hotel-detail-actions .btn { width: 100%; } }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const distanceElement = document.getElementById('hotel-distance');
        const distanceStatus = document.getElementById('hotel-distance-status');
        const originAddress = '88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733';
        let calculatedDistance = null;

        function distanceKm(first, second) {
            const radians = value => value * Math.PI / 180;
            const dLat = radians(second.lat - first.lat);
            const dLng = radians(second.lng - first.lng);
            const a = Math.sin(dLat / 2) ** 2 + Math.cos(radians(first.lat)) * Math.cos(radians(second.lat)) * Math.sin(dLng / 2) ** 2;
            return 6371 * 2 * Math.asin(Math.sqrt(a));
        }

        async function geocode(address) {
            const cacheKey = `hotel-geocode:${address}`;
            const cached = localStorage.getItem(cacheKey);
            if (cached) return JSON.parse(cached);
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=jsonv2&limit=1&q=${encodeURIComponent(address)}`, { headers: { Accept: 'application/json' } });
            const results = await response.json();
            if (!results.length) return null;
            const point = { lat: Number(results[0].lat), lng: Number(results[0].lon) };
            localStorage.setItem(cacheKey, JSON.stringify(point));
            return point;
        }

        async function calculateDistance() {
            if (distanceElement.dataset.distance) return;

            try {
                const hotelPoint = distanceElement.dataset.lat && distanceElement.dataset.lng
                    ? { lat: Number(distanceElement.dataset.lat), lng: Number(distanceElement.dataset.lng) }
                    : await geocode(distanceElement.dataset.address);
                const officePoint = await geocode(originAddress);
                if (!hotelPoint || !officePoint) throw new Error('Lokasi tidak ditemukan');
                calculatedDistance = distanceKm(officePoint, hotelPoint);
                distanceElement.textContent = `${calculatedDistance.toFixed(2)} km`;
                distanceStatus.textContent = 'Jarak garis lurus dari Kantor BEKAUDA.';
            } catch (error) {
                distanceElement.textContent = 'Belum tersedia';
                distanceStatus.textContent = 'Jalankan fitur tracking untuk mencari lokasi.';
            }
        }

        const distancePromise = calculateDistance();

    });
</script>
@endsection
