@extends('layouts.app')

@section('content')
@php($currentUser = auth()->user() ?? (object) ['name' => 'Tamu', 'profile_photo_path' => null])
@php($displayName = explode(' ', trim($currentUser->name))[0] ?? $currentUser->name)
<div class="app-shell dashboard-shell">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-mark">
                <img class="brand-logo" src="https://cdn.phototourl.com/member/2026-09-09-492110fd-2dae-4e72-a8d1-e42be48c0ba2.png" alt="Logo Salumpat Saindege">
            </div>
            <div class="brand-text">
                <span class="brand-title">Sistem Informasi Perpajakan</span>
                <small class="brand-subtitle">Pusat kendali pajak daerah</small>
            </div>
        </div>

        <div class="nav-group">
            <a href="{{ route('dashboard') }}" class="nav-link active"><span class="nav-icon">🏠</span> Dashboard</a>
            <a href="{{ route('hotel.index') }}" class="nav-link"><span class="nav-icon">🏨</span> Hotel</a>
            <a href="{{ route('struktur-organisasi.index') }}" class="nav-link"><span class="nav-icon">🏛️</span> Struktur Organisasi</a>
            <a href="{{ route('peta.index') }}" class="nav-link"><span class="nav-icon">🗺️</span> Peta &amp; Tracking</a>
            <a href="{{ route('pengaduan.index') }}" class="nav-link"><span class="nav-icon">📣</span> Laporan Pengaduan</a>
        </div>

        <button class="nav-title nav-section-toggle" type="button" aria-expanded="true" data-sidebar-section="sumber-hukum"><span>Pusat</span><b>⌃</b></button>
        <div class="nav-group nav-section-content" data-sidebar-content="sumber-hukum">
            <a href="{{ route('peraturan.index') }}" class="nav-link"><span class="nav-icon">📜</span> UU Konsilidasi</a>
            <a href="{{ route('peraturan.index', ['jenis' => 'pajak-daerah']) }}" class="nav-link"><span class="nav-icon">🏛️</span> Pajak Daerah</a>
            <a href="{{ route('peraturan.index', ['jenis' => 'p3b']) }}" class="nav-link"><span class="nav-icon">🌐</span> P3B</a>
            <a href="{{ route('peraturan.index', ['jenis' => 'pajak-pusat']) }}" class="nav-link"><span class="nav-icon">⚖️</span> Pajak Pusat</a>
        </div>

        <button class="nav-title nav-section-toggle" type="button" aria-expanded="true" data-sidebar-section="pembagian-pajak"><span>Pilar</span><b>⌃</b></button>
        <div class="nav-group nav-section-content" data-sidebar-content="pembagian-pajak">
            <a href="{{ route('laporan.index') }}" class="nav-link nav-link-guide"><span class="nav-icon">💳</span> Panduan Pembayaran Pajak</a>
            <a href="{{ route('laporan.index', ['jenis' => 'jurnal-pajak']) }}" class="nav-link"><span class="nav-icon">📖</span> Jurnal Pajak</a>
            <a href="{{ route('peraturan.index', ['jenis' => 'rekap-peraturan']) }}" class="nav-link"><span class="nav-icon">📊</span> Rekap Peraturan</a>
        </div>

        <button class="nav-title nav-section-toggle" type="button" aria-expanded="true" data-sidebar-section="publikasi"><span>Media</span><b>⌃</b></button>
        <div class="nav-group nav-section-content" data-sidebar-content="publikasi">
            <a href="{{ route('publikasi.index') }}" class="nav-link"><span class="nav-icon">📚</span> E-book</a>
            <a href="{{ route('publikasi.index', ['kind' => 'newsletter']) }}" class="nav-link"><span class="nav-icon">📰</span> Newsletter</a>
        </div>

        <button class="nav-title nav-section-toggle" type="button" aria-expanded="true" data-sidebar-section="pengaturan"><span>Pengaturan</span><b>⌃</b></button>
        <div class="nav-group nav-section-content" data-sidebar-content="pengaturan">
            <a href="{{ route('account.edit') }}" class="nav-link"><span class="nav-icon">⚙️</span> Kelola Sistem</a>
        </div>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button class="logout-btn" type="submit"><span class="nav-icon">🚪</span> Keluar</button>
            </form>
        </div>
    </aside>

    <button class="sidebar-backdrop" type="button" aria-label="Tutup menu" hidden></button>

    <main class="main-panel">
        <header class="topbar">
            <button class="menu-toggle" type="button" aria-label="Buka menu" aria-expanded="false">☰</button>
            <div class="search-box">
                <span>⌕</span>
                <input type="search" placeholder="Cari menu, data, laporan..." aria-label="Cari menu" />
            </div>
            <div class="topbar-right">
                <button class="icon-box" type="button" aria-label="Buka notifikasi" aria-expanded="false" data-popover-target="notification-popover">
                    <span class="control-symbol" aria-hidden="true">🔔</span>
                    @if(($statusPengaduan['terbuka'] ?? 0) + ($statusPengaduan['proses'] ?? 0) > 0)
                        <span class="dot"></span>
                    @endif
                </button>
                <button class="icon-box settings-control" type="button" aria-label="Buka pengaturan" aria-expanded="false" data-popover-target="settings-popover"><span class="control-symbol" aria-hidden="true">⚙️</span></button>
                <button class="icon-box theme-control" type="button" id="dashboard-theme-toggle" aria-label="Aktifkan mode gelap" aria-pressed="false"><span class="control-symbol" aria-hidden="true">☀</span></button>
                <form action="{{ route('logout') }}" method="POST" class="header-logout-form">
                    @csrf
                    <button type="submit" class="header-logout-btn" title="Keluar" aria-label="Keluar">
                        <span class="control-symbol" aria-hidden="true">↪</span>
                    </button>
                </form>
                <div class="profile-box">
                    @if ($currentUser->profile_photo_path)
                        <img src="{{ asset('storage/' . $currentUser->profile_photo_path) }}" alt="Foto profil {{ $currentUser->name }}" class="user-avatar profile-photo">
                    @else
                        <div class="user-avatar">{{ strtoupper(substr($currentUser->name, 0, 1)) }}</div>
                    @endif
                    <div class="profile-name">
                        {{ $currentUser->name }}
                    </div>
                </div>
            </div>
            <section class="dashboard-popover" id="notification-popover" hidden>
                <div class="popover-head"><strong>Notifikasi</strong><button type="button" class="popover-close" data-close-popover>×</button></div>
                <p class="popover-summary">{{ ($statusPengaduan['terbuka'] ?? 0) + ($statusPengaduan['proses'] ?? 0) }} pengaduan membutuhkan perhatian.</p>
                @forelse(($pengaduanTerbaru ?? collect())->take(3) as $item)
                    <a class="notification-item" href="{{ route('pengaduan.index') }}">
                        <strong>{{ $item->judul }}</strong>
                        <small>{{ ucfirst($item->status) }} · {{ $item->created_at?->format('d/m/Y H:i') }}</small>
                    </a>
                @empty
                    <p class="popover-empty">Belum ada pengaduan terbaru.</p>
                @endforelse
                <a class="popover-link" href="{{ route('pengaduan.index') }}">Lihat semua pengaduan</a>
            </section>
            <section class="dashboard-popover settings-popover" id="settings-popover" hidden>
                <div class="popover-head"><strong>Pengaturan</strong><button type="button" class="popover-close" data-close-popover>×</button></div>
                <a class="popover-link" href="{{ route('account.edit') }}">Kelola pengaturan akun</a>
                <label class="setting-row"><span>Mode ringkas</span><input type="checkbox" id="compact-mode"></label>
                <p class="popover-help">Kurangi jarak antar panel agar lebih banyak data terlihat.</p>
            </section>
        </header>

        <div class="dashboard-welcome">
            <div class="welcome-text">
                <span>Selamat datang kembali,</span>
                <strong>{{ $displayName }}</strong>
            </div>
            <div class="date-box">
                <strong id="dashboard-date">{{ now()->translatedFormat('l, d F Y') }}</strong>
                <span id="dashboard-time">{{ now()->format('H:i:s') }} WIB</span>
            </div>
        </div>

        <div class="dashboard-header">
            <div class="dashboard-header-slides" aria-label="Galeri dashboard">
                <img class="dashboard-header-slide is-active" src="https://cdn.phototourl.com/member/2026-09-11-5c89e68d-6def-4cbb-b542-6970405fd326.jpg" alt="Pemandangan daerah" aria-hidden="false">
                <img class="dashboard-header-slide" src="https://cdn.phototourl.com/member/2026-09-10-bb5d9cdb-2025-4ef6-96e3-753a680bf3e2.jpg" alt="Potensi daerah" aria-hidden="true">
                <img class="dashboard-header-slide" src="https://cdn.phototourl.com/member/2026-09-10-ca4640ba-60a1-489d-ac73-f8516cfd173a.jpg" alt="Pembangunan daerah" aria-hidden="true">
                <img class="dashboard-header-slide" src="https://cdn.phototourl.com/member/2026-09-10-900ac2e2-4b0f-482a-9fae-8f15ce513305.jpg" alt="Kemajuan daerah" aria-hidden="true">
                <div class="dashboard-header-slide-overlay" aria-hidden="true"></div>
                <div class="dashboard-header-dots" aria-label="Pilih foto dashboard">
                    <button type="button" class="is-active" aria-label="Tampilkan foto pertama" aria-current="true"></button>
                    <button type="button" aria-label="Tampilkan foto kedua" aria-current="false"></button>
                    <button type="button" aria-label="Tampilkan foto ketiga" aria-current="false"></button>
                    <button type="button" aria-label="Tampilkan foto keempat" aria-current="false"></button>
                </div>
            </div>
            <div class="dashboard-banner-copy">
                <h2>Optimalkan Potensi Pajak Daerah</h2>
                <p><strong>Bangga Bayar Pajak, Membangun Daerah.</strong> <em>Wujud rasa memiliki dan kontribusi nyata untuk kemajuan kota Padangsidimpuan.</em></p>
            </div>
        </div>

        <p class="dashboard-search-empty" id="dashboard-search-empty" hidden role="status">Tidak ada menu atau data yang cocok dengan pencarian.</p>

        <section class="stats-grid">
            <div class="stat-card">
                <div class="dashboard-hotel-slides" aria-label="Galeri foto hotel aktif">
                    <span class="dashboard-hotel-slide dashboard-hotel-slide-one" aria-hidden="true"></span>
                    <span class="dashboard-hotel-slide dashboard-hotel-slide-two" aria-hidden="true"></span>
                    <span class="dashboard-hotel-slide dashboard-hotel-slide-three" aria-hidden="true"></span>
                    <span class="dashboard-hotel-slide dashboard-hotel-slide-four" aria-hidden="true"></span>
                    <span class="dashboard-hotel-slide dashboard-hotel-slide-five" aria-hidden="true"></span>
                </div>
                <a href="{{ route('hotel.index', ['status' => 'aktif']) }}" class="stat-card-link" aria-label="Buka daftar hotel aktif">
                    <p class="label">Hotel Aktif</p>
                    <strong>{{ number_format($hotel ?? 0, 0, ',', '.') }}</strong>
                </a>
                <span class="meta">{{ number_format($hotelTotal ?? 0, 0, ',', '.') }} total hotel</span>
            </div>

            <div class="stat-card">
                <a href="{{ route('peta.index') }}" class="stat-card-link" aria-label="Buka peta lokasi hotel">
                    <p class="label">Lokasi Terpetakan</p>
                    <strong>{{ number_format($lokasi ?? 0, 0, ',', '.') }}</strong>
                    <span class="meta">Perlu koordinat peta</span>
                </a>
            </div>

            <div class="stat-card">
                <div class="dashboard-complaint-background" aria-hidden="true"></div>
                <a href="{{ route('pengaduan.index') }}" class="stat-card-link" aria-label="Buka laporan pengaduan">
                    <p class="label">Pengaduan Terbuka</p>
                    <strong>{{ number_format($pengaduan ?? 0, 0, ',', '.') }}</strong>
                </a>
            </div>

            <div class="stat-card">
                <div class="dashboard-regulation-background" aria-hidden="true"></div>
                <a href="{{ route('peraturan.index', ['status' => 'aktif']) }}" class="stat-card-link" aria-label="Buka peraturan aktif">
                    <p class="label">Peraturan Aktif</p>
                    <strong>{{ number_format($peraturan ?? 0, 0, ',', '.') }}</strong>
                </a>
            </div>
        </section>

        <section class="main-grid">
            <div class="panel">
                <div class="panel-head">
                    <h3>Hotel Terbaru</h3>
                    <a href="{{ route('hotel.index') }}">Lihat semua</a>
                </div>

                <div class="hotel-list">
                    @forelse(($hotelTerbaru ?? collect())->take(4) as $item)
                        <a href="{{ route('hotel.show', $item) }}" class="hotel-item hotel-item-link" aria-label="Buka detail {{ $item->nama }}">
                            @if($item->foto)
                                <img src="{{ filter_var($item->foto, FILTER_VALIDATE_URL) ? $item->foto : asset('storage/' . $item->foto) }}" alt="Foto {{ $item->nama }}" class="hotel-thumb hotel-thumb-photo">
                            @else
                                <div class="hotel-thumb">🏨</div>
                            @endif
                            <div>
                                <strong>{{ $item->nama }}</strong>
                                <span>{{ $item->alamat }}</span>
                            </div>
                            <span class="status-badge">{{ ucfirst($item->status ?? 'Aktif') }}</span>
                        </a>
                    @empty
                        <div class="hotel-item">
                            <div class="hotel-thumb">🏨</div>
                            <div><strong>Hotel Grand Permata</strong><span>Jl. Sudirman No. 45, Padang</span></div>
                            <span class="status-badge">Aktif</span>
                        </div>
                        <div class="hotel-item">
                            <div class="hotel-thumb">🏨</div>
                            <div><strong>Hotel Putra</strong><span>Jl. Diponegoro No. 12, Padang</span></div>
                            <span class="status-badge">Aktif</span>
                        </div>
                        <div class="hotel-item">
                            <div class="hotel-thumb">🏨</div>
                            <div><strong>Hotel Samudra</strong><span>Jl. Pantai Air Manis No. 1, Padang</span></div>
                            <span class="status-badge">Aktif</span>
                        </div>
                        <div class="hotel-item">
                            <div class="hotel-thumb">🏨</div>
                            <div><strong>Hotel Bintang Indah</strong><span>Jl. Khatib Sulaiman No. 78, Padang</span></div>
                            <span class="status-badge">Aktif</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="panel map-panel">
                <div class="panel-head">
                    <h3>Peta &amp; Tracking</h3>
                    <a href="{{ route('peta.index') }}">Buka peta</a>
                </div>
                <a href="{{ route('peta.index') }}" class="map-card" aria-label="Buka peta dan tracking hotel">
                    <span class="map-grid" aria-hidden="true"></span>
                    <span class="map-road map-road-one" aria-hidden="true"></span>
                    <span class="map-road map-road-two" aria-hidden="true"></span>
                    <span class="map-point map-point-office" aria-label="Kantor BEKAUDA">K</span>
                    <span class="map-point map-point-hotel-one" aria-label="Hotel">1</span>
                    <span class="map-point map-point-hotel-two" aria-label="Hotel">2</span>
                    <span class="map-point map-point-hotel-three" aria-label="Hotel">3</span>
                    <span class="map-caption"><strong>Kantor BEKAUDA</strong><small>{{ $lokasi ?? 0 }} lokasi hotel terpetakan</small></span>
                </a>
                <div class="map-panel-actions">
                    <span>Jarak hotel dari kantor</span>
                    <a href="{{ route('tracking.index') }}">Lihat tracking <span aria-hidden="true">→</span></a>
                </div>
            </div>

        </section>

        <section class="bottom-grid">
            <div class="mini-panel">
                <div class="panel-head">
                    <h3>Laporan Pengaduan</h3>
                    <a href="{{ route('pengaduan.index') }}">Lihat semua</a>
                </div>
                <a class="lapor-banner" href="https://lapor.go.id/" target="_blank" rel="noopener noreferrer" aria-label="Buka layanan LAPOR!">
                    <div class="lapor-banner-copy">
                        <span class="lapor-kicker">Layanan aspirasi publik</span>
                        <strong>LAPOR!</strong>
                        <p>Sampaikan aduan, permintaan informasi, dan aspirasi Anda.</p>
                        <span class="lapor-action">Buka lapor.go.id <span aria-hidden="true">&#8594;</span></span>
                    </div>
                    <div class="lapor-phone" aria-hidden="true">
                        <div class="lapor-phone-screen">
                            <b>Layanan Pengaduan</b>
                            <span>Online Rakyat</span>
                            <i></i><i></i><i></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mini-panel">
                <div class="panel-head">
                    <h3>Rekap Peraturan Terbaru</h3>
                    <a href="{{ route('peraturan.index') }}">Lihat semua</a>
                </div>
                <div class="mini-list">
                    @forelse(($peraturanTerbaru ?? collect())->take(3) as $item)
                        <div class="mini-item">
                            <div><strong>{{ $item->judul }}</strong><small>{{ $item->nomor }} · {{ optional($item->tanggal)->format('d F Y') }}</small></div>
                            <span class="tag">{{ ucfirst($item->status) }}</span>
                        </div>
                    @empty
                        <div class="regulation-empty">
                            <div>
                                <strong>Belum ada peraturan</strong>
                                <small>Dokumen peraturan terbaru akan tampil di sini.</small>
                            </div>
                            <a href="{{ route('peraturan.index') }}" class="regulation-empty-link">Buka pusat peraturan <span>→</span></a>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="mini-panel">
                <div class="panel-head">
                    <h3>Pilar</h3>
                    <a href="{{ route('laporan.index') }}">Lihat detail</a>
                </div>
                <div class="pillar-copy">
                    <strong>PANDUAN PEMBAYARAN PAJAK</strong>
                    <h4>Pajak Restoran dan Hotel</h4>
                    <p>Pengertian, tarif, perhitungan, pembayaran, dan pelaporan pajak restoran atau PB1 serta pajak hotel.</p>
                </div>
            </div>

            <div class="mini-panel">
                <div class="panel-head">
                    <h3>Media Terbaru</h3>
                    <a href="{{ route('publikasi.index') }}">Lihat semua</a>
                </div>
                <div class="pub-list">
                    @forelse(($publikasiTerbaru ?? collect())->take(3) as $item)
                        <div class="pub-item">
                            <div class="pub-left">
                                <div class="pub-thumb">📘</div>
                                <div><strong>{{ $item->kategori }}</strong><small>{{ $item->judul }}</small></div>
                            </div>
                            @if($item->file)
                                <a href="{{ asset('storage/' . $item->file) }}" download>Unduh</a>
                            @endif
                        </div>
                    @empty
                        <div class="pub-item"><div class="pub-left"><div><strong>Belum ada media</strong><small>Media terbaru akan tampil di sini.</small></div></div></div>
                    @endforelse
                </div>
            </div>
        </section>

    </main>
</div>

<style>
    .dashboard-shell {
        --dashboard-teal: #087f78;
        --dashboard-deep: #123f59;
        --dashboard-coral: #ef765d;
        --dashboard-gold: #e8b84b;
        --dashboard-sky: #4d9fd4;
        --dashboard-lilac: #8b78b8;
        position: relative;
        overflow-x: clip;
    }
    .dashboard-shell .main-panel {
        position: relative;
        isolation: isolate;
    }
    .dashboard-shell .main-panel::before {
        content: "";
        position: absolute;
        inset: -22px -28px auto;
        height: 390px;
        z-index: -1;
        pointer-events: none;
        background:
            radial-gradient(circle at 12% 20%, rgba(8, 127, 120, .12), transparent 26%),
            radial-gradient(circle at 88% 5%, rgba(232, 184, 75, .12), transparent 24%),
            linear-gradient(135deg, rgba(255, 255, 255, .4), transparent 68%);
    }
    .dashboard-shell::before {
        content: "";
        position: fixed;
        width: 310px;
        height: 310px;
        right: -110px;
        bottom: -130px;
        border: 1px solid rgba(8, 127, 120, .12);
        border-radius: 50%;
        box-shadow: 0 0 0 34px rgba(8, 127, 120, .035), 0 0 0 72px rgba(232, 184, 75, .035);
        pointer-events: none;
    }
    .dashboard-shell .brand-mark {
        width: 56px;
        height: 56px;
        flex: 0 0 56px;
        padding: 5px;
        background: linear-gradient(135deg, #ffe4a2, #efb85d);
        color: #21465a;
        border: 1px solid rgba(255, 255, 255, .7);
        border-radius: 14px;
    }
    .dashboard-shell .brand-logo {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 9px;
    }
    .dashboard-shell .brand-text {
        display: grid;
        min-width: 0;
    }
    .dashboard-shell .brand-title {
        display: block;
        max-width: 152px;
        color: #fff;
        font-size: 14.5px;
        font-weight: 700;
        letter-spacing: .015em;
        line-height: 1.25;
    }
    .dashboard-shell .nav-link-guide {
        align-items: flex-start;
        line-height: 1.3;
    }
    .dashboard-shell .nav-link-guide .nav-icon {
        margin-top: 1px;
    }
    .dashboard-shell .topbar {
        padding-top: 6px;
    }
    .dashboard-shell .search-box {
        background: rgba(255, 255, 255, .9);
        border-color: rgba(8, 127, 120, .12);
        box-shadow: 0 12px 28px rgba(18, 63, 89, .07);
    }
    .dashboard-shell .search-box span {
        color: var(--dashboard-teal);
    }
    .dashboard-shell .icon-box,
    .dashboard-shell .profile-box {
        background: rgba(255, 255, 255, .9);
        border-color: rgba(8, 127, 120, .12);
        box-shadow: 0 8px 20px rgba(18, 63, 89, .05);
    }
    .dashboard-shell .icon-box,
    .dashboard-shell .header-logout-btn {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        transition: color .2s ease, background .2s ease, border-color .2s ease, transform .2s ease, box-shadow .2s ease;
    }
    .dashboard-shell .icon-box .control-symbol,
    .dashboard-shell .header-logout-btn .control-symbol {
        display: grid;
        place-items: center;
        width: 24px;
        height: 24px;
        font-size: 19px;
        line-height: 1;
    }
    .dashboard-shell .icon-box:first-child {
        color: #087f78;
        background: #e7f7f2;
        border-color: #c5ebe0;
    }
    .dashboard-shell .settings-control {
        color: #2869d7;
        background: #edf4ff;
        border-color: #d4e3fb;
    }
    .dashboard-shell .theme-control {
        color: #8a6418;
        background: #fff7d9;
        border-color: #f1df9d;
    }
    .dashboard-shell .header-logout-btn {
        color: #c56852;
        background: #fff1ec;
        border: 1px solid #f5d5ca;
        cursor: pointer;
        padding: 0;
    }
    .dashboard-shell .icon-box:hover,
    .dashboard-shell .header-logout-btn:hover {
        border-color: currentColor;
        box-shadow: 0 8px 18px rgba(18, 63, 89, .12);
        transform: translateY(-2px);
    }
    .dashboard-shell .icon-box:focus-visible,
    .dashboard-shell .header-logout-btn:focus-visible {
        outline: 3px solid rgba(40, 105, 215, .2);
        outline-offset: 2px;
    }
    .dashboard-shell .dashboard-header {
        position: relative;
        overflow: hidden;
        margin-top: 14px;
        padding: 24px 26px;
        border: 1px solid rgba(255, 255, 255, .35);
        border-radius: 20px;
        background: linear-gradient(115deg, #0b746f 0%, #126080 58%, #e07b5d 150%);
        box-shadow: 0 18px 34px rgba(13, 79, 87, .16);
        animation: dashboard-header-in .55s ease both;
    }
    .dashboard-shell .dashboard-header::before,
    .dashboard-shell .dashboard-header::after {
        content: "";
        position: absolute;
        border: 1px solid rgba(255, 255, 255, .16);
        border-radius: 50%;
        pointer-events: none;
    }
    .dashboard-shell .dashboard-header::before {
        width: 240px;
        height: 240px;
        right: 8%;
        top: -170px;
    }
    .dashboard-shell .dashboard-header::after {
        width: 150px;
        height: 150px;
        right: -34px;
        bottom: -92px;
        box-shadow: 0 0 0 22px rgba(255, 255, 255, .05);
    }
    .dashboard-shell .welcome-text,
    .dashboard-shell .date-box {
        position: relative;
        z-index: 1;
    }
    .dashboard-shell .welcome-text span,
    .dashboard-shell .welcome-text strong {
        color: #fff;
    }
    .dashboard-shell .welcome-text span {
        opacity: .78;
    }
    .dashboard-shell .welcome-text strong {
        font-size: 21px;
        letter-spacing: -.03em;
    }
    .dashboard-shell .date-box {
        color: rgba(255, 255, 255, .76);
        background: rgba(255, 255, 255, .12);
        border-color: rgba(255, 255, 255, .2);
        backdrop-filter: blur(8px);
    }
    .dashboard-shell .date-box strong {
        color: #fff;
    }
    .dashboard-shell .stats-grid,
    .dashboard-shell .main-grid,
    .dashboard-shell .bottom-grid {
        position: relative;
        z-index: 1;
    }
    .dashboard-shell .stat-card {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(141, 160, 163, .18);
        border-top: 4px solid var(--dashboard-teal);
        background: linear-gradient(145deg, rgba(255, 255, 255, .98), rgba(236, 250, 247, .9));
        box-shadow: 0 12px 24px rgba(18, 63, 89, .06);
        animation: dashboard-rise .45s ease both;
    }
    .dashboard-shell .stat-card .stat-icon {
        border: 1px solid currentColor;
        box-shadow: 0 8px 16px rgba(18, 63, 89, .08);
    }
    .dashboard-shell .stat-card:nth-child(1) .stat-icon { background: #d9f4ed; color: var(--dashboard-teal); }
    .dashboard-shell .stat-card:nth-child(2) .stat-icon { background: #dcefff; color: var(--dashboard-sky); }
    .dashboard-shell .stat-card:nth-child(3) .stat-icon { background: #ffe1d7; color: var(--dashboard-coral); }
    .dashboard-shell .stat-card:nth-child(4) .stat-icon { background: #fff0bf; color: #a9781f; }
    .dashboard-shell .stat-card::after {
        content: "";
        position: absolute;
        width: 86px;
        height: 86px;
        right: -33px;
        bottom: -39px;
        border: 1px solid currentColor;
        border-radius: 50%;
        opacity: .08;
    }
    .dashboard-shell .stat-card:nth-child(1) { color: var(--dashboard-teal); animation-delay: .04s; }
    .dashboard-shell .stat-card:nth-child(2) { color: var(--dashboard-sky); border-top-color: var(--dashboard-sky); background: linear-gradient(145deg, rgba(255, 255, 255, .98), rgba(235, 247, 255, .92)); animation-delay: .09s; }
    .dashboard-shell .stat-card:nth-child(3) { color: var(--dashboard-coral); border-top-color: var(--dashboard-coral); background: linear-gradient(145deg, rgba(255, 255, 255, .98), rgba(255, 241, 236, .92)); animation-delay: .14s; }
    .dashboard-shell .stat-card:nth-child(4) { color: #9b72a7; border-top-color: var(--dashboard-gold); background: linear-gradient(145deg, rgba(255, 255, 255, .98), rgba(255, 248, 225, .92)); animation-delay: .19s; }
    .dashboard-shell .stat-card .label,
    .dashboard-shell .stat-card strong,
    .dashboard-shell .stat-card .meta { position: relative; z-index: 1; }
    .dashboard-shell .stat-card:first-child .dashboard-hotel-slides { position: absolute; z-index: 0; inset: 0; overflow: hidden; background: #16516b; }
    .dashboard-shell .stat-card:first-child .dashboard-hotel-slides::after { position: absolute; inset: 0; content: ''; background: linear-gradient(120deg, rgba(7,48,72,.82), rgba(8,127,120,.32)); }
    .dashboard-shell .dashboard-hotel-slide { position: absolute; inset: 0; opacity: 0; background-position: center; background-size: cover; animation: dashboard-hotel-background 25s infinite; }
    .dashboard-shell .dashboard-hotel-slide-one { background-image: url('https://cdn.phototourl.com/member/2026-09-10-a9306fe9-2896-44fe-8a9a-59cc585cf334.jpg'); animation-delay: 0s; }
    .dashboard-shell .dashboard-hotel-slide-two { background-image: url('https://cdn.phototourl.com/member/2026-09-10-8deb0854-a687-4766-99ec-8d513738adb9.jpg'); animation-delay: 5s; }
    .dashboard-shell .dashboard-hotel-slide-three { background-image: url('https://cdn.phototourl.com/member/2026-09-10-aedf566d-292b-4f94-ae04-d2ad220b2bbb.jpg'); animation-delay: 10s; }
    .dashboard-shell .dashboard-hotel-slide-four { background-image: url('https://cdn.phototourl.com/member/2026-09-10-2df9e0b4-2cee-456d-a8af-ad97f0ca5094.jpg'); animation-delay: 15s; }
    .dashboard-shell .dashboard-hotel-slide-five { background-image: url('https://cdn.phototourl.com/member/2026-09-10-51961c09-984c-489b-b7ef-4e33b1ea5693.jpg'); animation-delay: 20s; }
    .dashboard-shell .stat-card:first-child .stat-head,
    .dashboard-shell .stat-card:first-child .stat-card-link,
    .dashboard-shell .stat-card:first-child .meta { position: relative; z-index: 1; }
    .dashboard-shell .stat-card:first-child .label,
    .dashboard-shell .stat-card:first-child strong,
    .dashboard-shell .stat-card:first-child .meta { color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,.35); }
    .dashboard-shell .stat-card:first-child .stat-icon { border-color: rgba(255,255,255,.8); background: rgba(255,255,255,.18); color: #fff; }
    @keyframes dashboard-hotel-background { 0%, 16% { opacity: 1; } 20%, 100% { opacity: 0; } }
    .dashboard-shell .stat-card:nth-child(3) .dashboard-complaint-background { position: absolute; z-index: 0; inset: 0; background: linear-gradient(120deg, rgba(94,36,34,.82), rgba(183,78,67,.34)), url('https://cdn.phototourl.com/free/2026-09-10-af68e3df-1ecf-4d17-a08f-b719a395a852.jpg') center/cover; }
    .dashboard-shell .stat-card:nth-child(3) .stat-head,
    .dashboard-shell .stat-card:nth-child(3) .stat-card-link,
    .dashboard-shell .stat-card:nth-child(3) .meta { position: relative; z-index: 1; }
    .dashboard-shell .stat-card:nth-child(3) .label,
    .dashboard-shell .stat-card:nth-child(3) strong,
    .dashboard-shell .stat-card:nth-child(3) .meta { color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,.35); }
    .dashboard-shell .stat-card:nth-child(3) .stat-icon { border-color: rgba(255,255,255,.8); background: rgba(255,255,255,.18); color: #fff; }
    .dashboard-shell .stat-card:nth-child(4) .dashboard-regulation-background { position: absolute; z-index: 0; inset: 0; background: linear-gradient(120deg, rgba(49,35,81,.84), rgba(117,85,145,.36)), url('https://cdn.phototourl.com/member/2026-09-11-25d85a1d-c979-4c87-88fd-54741b2b5945.jpg') center/cover; }
    .dashboard-shell .stat-card:nth-child(4) .stat-card-link { position: relative; z-index: 1; }
    .dashboard-shell .stat-card:nth-child(4) .label,
    .dashboard-shell .stat-card:nth-child(4) strong,
    .dashboard-shell .stat-card:nth-child(4) .meta { color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,.35); }
    .dashboard-shell .stat-card:nth-child(4) .stat-icon { border-color: rgba(255,255,255,.8); background: rgba(255,255,255,.18); color: #fff; }
    .dashboard-shell .stat-card:nth-child(4) .stat-card-link:hover .label { color: #fff; }
    .dashboard-shell .stat-card-link { display: block; color: inherit; text-decoration: none; }
    .dashboard-shell .stat-card-link:hover .label { color: var(--dashboard-teal); }
    .dashboard-shell .stat-card .label { color: var(--muted); }
    .dashboard-shell .stat-card strong { color: var(--ink); font-size: 28px; }
    .dashboard-shell .panel,
    .dashboard-shell .mini-panel {
        border-color: rgba(141, 160, 163, .18);
        box-shadow: 0 12px 24px rgba(18, 63, 89, .055);
        background: rgba(255, 255, 255, .94);
    }

    @keyframes dashboard-page-in {
        from { opacity: 0; transform: translateY(18px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes dashboard-sidebar-in {
        from { opacity: 0; transform: translateX(-28px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes dashboard-banner-in {
        from { opacity: 0; transform: translateY(24px) scale(0.985); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .dashboard-shell .sidebar {
        animation: dashboard-sidebar-in .75s cubic-bezier(.22, 1, .36, 1) both;
    }

    .dashboard-shell .topbar {
        animation: dashboard-page-in .6s .12s ease both;
    }

    .dashboard-shell .dashboard-welcome {
        animation: dashboard-page-in .65s .22s ease both;
    }

    .dashboard-shell .dashboard-header {
        animation: dashboard-banner-in .85s .3s cubic-bezier(.22, 1, .36, 1) both;
    }

    .dashboard-shell .stats-grid,
    .dashboard-shell .main-grid,
    .dashboard-shell .bottom-grid {
        animation: dashboard-page-in .7s .46s ease both;
    }

    .dashboard-shell .main-grid { animation-delay: .56s; }
    .dashboard-shell .bottom-grid { animation-delay: .66s; }

    .dashboard-shell .nav-group .nav-link,
    .dashboard-shell .nav-section-toggle {
        animation: none;
    }

    .dashboard-shell .topbar-right > * {
        animation: dashboard-page-in .45s ease both;
    }

    .dashboard-shell .topbar-right > :nth-child(1) { animation-delay: .2s; }
    .dashboard-shell .topbar-right > :nth-child(2) { animation-delay: .24s; }
    .dashboard-shell .topbar-right > :nth-child(3) { animation-delay: .28s; }
    .dashboard-shell .topbar-right > :nth-child(4) { animation-delay: .32s; }
    .dashboard-shell .topbar-right > :nth-child(5) { animation-delay: .36s; }

    @media (prefers-reduced-motion: reduce) {
        .dashboard-shell *,
        .dashboard-shell *::before,
        .dashboard-shell *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            scroll-behavior: auto !important;
            transition-duration: .01ms !important;
        }
    }
    .dashboard-shell .panel-head a {
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(8, 127, 120, .08);
        transition: background .2s ease, transform .2s ease;
    }
    .dashboard-shell .panel-head a:hover {
        background: rgba(8, 127, 120, .16);
        transform: translateX(2px);
    }
    .dashboard-shell .hotel-item,
    .dashboard-shell .mini-item,
    .dashboard-shell .pub-item {
        border-radius: 12px;
        transition: background .2s ease, transform .2s ease, border-color .2s ease;
    }
    .dashboard-shell .hotel-item-link {
        color: inherit;
        text-decoration: none;
    }
    .dashboard-shell .hotel-item-link:focus-visible {
        outline: 3px solid rgba(8, 127, 120, .3);
        outline-offset: 2px;
    }
    .dashboard-shell .hotel-item:hover,
    .dashboard-shell .mini-item:hover,
    .dashboard-shell .pub-item:hover {
        background: #f4fbf8;
        border-color: rgba(8, 127, 120, .12);
        transform: translateX(3px);
    }
    .dashboard-shell .panel:nth-child(1) { border-top: 3px solid var(--dashboard-teal); }
    .dashboard-shell .panel:nth-child(2) { border-top: 3px solid var(--dashboard-sky); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) { border-top: 3px solid var(--dashboard-coral); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) { border-top: 3px solid var(--dashboard-gold); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) { border-top: 3px solid #8b78b8; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) { border-top: 3px solid #38a978; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) { background: linear-gradient(180deg, #fffaf8 0%, #fff 34%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) { background: linear-gradient(180deg, #fffdf5 0%, #fff 34%); }
    .dashboard-shell .regulation-empty {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 12px;
        align-items: center;
        min-height: 148px;
        padding: 20px;
        border: 1px dashed rgba(232, 184, 75, .55);
        border-radius: 14px;
        background: linear-gradient(135deg, #fffaf0, #f8fcfb);
    }
    .dashboard-shell .regulation-empty-icon {
        display: grid;
        place-items: center;
        width: 44px;
        height: 44px;
        border-radius: 13px;
        color: #9a721b;
        background: #ffe8a8;
        font: 700 25px/1 'Playfair Display', serif;
        box-shadow: 0 8px 16px rgba(232, 184, 75, .18);
    }
    .dashboard-shell .regulation-empty strong,
    .dashboard-shell .regulation-empty small { display: block; }
    .dashboard-shell .regulation-empty strong { color: var(--dashboard-deep); font-size: 14px; }
    .dashboard-shell .regulation-empty small { margin-top: 5px; color: #71817e; font-size: 11px; line-height: 1.5; }
    .dashboard-shell .regulation-empty-link { grid-column: 2; color: #9a721b; font-size: 11px; font-weight: 800; }
    .dashboard-shell .regulation-empty-link span { margin-left: 4px; font-size: 15px; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) { background: linear-gradient(180deg, #fbf9ff 0%, #fff 34%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) { background: linear-gradient(180deg, #f5fcf8 0%, #fff 34%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .donut { box-shadow: 0 12px 24px rgba(239, 93, 87, .12); }
    .dashboard-shell .complaint-visual {
        position: relative;
        height: 190px;
        overflow: hidden;
        margin: 4px 0 18px;
        border-radius: 14px;
        background: #123f59;
    }
    .dashboard-shell .complaint-visual img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        filter: saturate(.9) contrast(1.05);
    }
    .dashboard-shell .complaint-visual::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(10,49,74,.86), rgba(8,127,120,.18));
    }
    .dashboard-shell .complaint-visual-overlay {
        position: absolute;
        inset: 0;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 22px;
        color: #fff;
    }
    .dashboard-shell .complaint-visual-overlay span,
    .dashboard-shell .complaint-visual-overlay small { color: rgba(255,255,255,.78); font-size: 11px; font-weight: 700; }
    .dashboard-shell .complaint-visual-overlay strong { margin: 5px 0 1px; color: #ffc338; font-size: 42px; line-height: 1; }
    .dashboard-shell .lapor-banner {
        position: relative;
        display: flex;
        min-height: 145px;
        overflow: hidden;
        align-items: center;
        justify-content: space-between;
        margin: 4px 0 12px;
        padding: 18px 20px;
        border-radius: 14px;
        color: #fff;
        text-decoration: none;
        background-image: linear-gradient(110deg, rgba(14, 73, 170, .9), rgba(25, 128, 171, .58)), url('https://cdn.phototourl.com/member/2026-09-13-5784783b-b710-41d6-bf37-2041b8c9696c.jpg');
        background-position: center;
        background-size: cover;
        box-shadow: 0 10px 22px rgba(172, 27, 40, .16);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .dashboard-shell .lapor-banner::before,
    .dashboard-shell .lapor-banner::after {
        position: absolute;
        content: '';
        width: 100px;
        height: 100px;
        border: 14px solid rgba(255,255,255,.28);
        border-radius: 50%;
        transform: rotate(35deg);
    }
    .dashboard-shell .lapor-banner::before { right: -46px; top: -58px; }
    .dashboard-shell .lapor-banner::after { left: -72px; bottom: -70px; border-color: rgba(18, 63, 89, .16); }
    .dashboard-shell .lapor-banner:hover { color: #fff; transform: translateY(-2px); box-shadow: 0 14px 26px rgba(18, 63, 89, .24); }
    .dashboard-shell .lapor-banner-copy { position: relative; z-index: 1; width: 62%; }
    .dashboard-shell .lapor-kicker { display: block; margin-bottom: 3px; color: rgba(255, 255, 255, .82); font-size: 9px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
    .dashboard-shell .lapor-banner-copy strong { display: block; color: #fff; font-size: 30px; line-height: 1; letter-spacing: .04em; }
    .dashboard-shell .lapor-banner-copy p { max-width: 190px; margin: 7px 0 10px; color: rgba(255, 255, 255, .9); font-size: 10px; font-weight: 700; line-height: 1.35; }
    .dashboard-shell .lapor-action { display: inline-flex; gap: 5px; align-items: center; color: #fff; font-size: 10px; font-weight: 800; }
    .dashboard-shell .lapor-phone { position: relative; z-index: 1; width: 54px; height: 106px; padding: 5px; border: 3px solid #191919; border-radius: 11px; background: #161616; box-shadow: 0 7px 12px rgba(80, 0, 0, .24); transform: rotate(7deg); }
    .dashboard-shell .lapor-phone::before { display: block; width: 18px; height: 3px; margin: 0 auto 4px; border-radius: 3px; content: ''; background: #555; }
    .dashboard-shell .lapor-phone-screen { display: flex; height: 88px; flex-direction: column; gap: 4px; padding: 8px 4px; border-radius: 5px; color: #fff; background: linear-gradient(180deg, #174b9b, #123f59); font-size: 5px; }
    .dashboard-shell .lapor-phone-screen span { font-size: 4px; opacity: .9; }
    .dashboard-shell .lapor-phone-screen i { display: block; height: 8px; margin-top: 3px; border-radius: 2px; background: rgba(255,255,255,.8); }
    .dashboard-shell .complaint-total { display: flex; align-items: baseline; gap: 7px; margin: 0 0 10px; color: #768294; font-size: 10px; }
    .dashboard-shell .complaint-total strong { color: #d74e4d; font-size: 20px; }
    .dashboard-shell .complaint-total small { font-size: 10px; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .tag { background: #fff2c9; color: #9a721b; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .bar-chart { background: linear-gradient(180deg, rgba(139, 120, 184, .08), transparent); border-radius: 12px; padding: 10px 10px 0; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-thumb { background: #dff5eb; color: #23865f; }
    .dashboard-shell .sidebar .nav-group:nth-of-type(1) .nav-link:nth-child(1) .nav-icon { color: #2869d7; }
    .dashboard-shell .sidebar .nav-group:nth-of-type(1) .nav-link:nth-child(2) .nav-icon { color: #18a875; }
    .dashboard-shell .sidebar .nav-group:nth-of-type(1) .nav-link:nth-child(3) .nav-icon { color: #ef9d38; }
    .dashboard-shell .sidebar .nav-group:nth-of-type(1) .nav-link:nth-child(4) .nav-icon { color: #e96d68; }
    .dashboard-shell .sidebar .nav-title { color: #7384a0; }
    .dashboard-shell .dashboard-header { background: linear-gradient(110deg, rgba(14,73,170,.98), rgba(25,128,171,.64) 62%, rgba(239,123,91,.52)), url('{{ asset('images/login-bg.jpg') }}') center/cover; }
    .dashboard-shell .stat-card:nth-child(1) { border-left-color: #2869d7; background: linear-gradient(145deg, #fff, #eef5ff); }
    .dashboard-shell .stat-card:nth-child(2) { border-left-color: #18a875; background: linear-gradient(145deg, #fff, #edfbf5); }
    .dashboard-shell .stat-card:nth-child(3) { border-left-color: #ef6b63; background: linear-gradient(145deg, #fff, #fff1ef); }
    .dashboard-shell .stat-card:nth-child(4) { border-left-color: #e4aa32; background: linear-gradient(145deg, #fff, #fff8e4); }
    .dashboard-shell .stat-card:nth-child(1) .stat-icon { color: #2869d7; background: #dfeaff; }
    .dashboard-shell .stat-card:nth-child(2) .stat-icon { color: #18a875; background: #d9f5e8; }
    .dashboard-shell .stat-card:nth-child(3) .stat-icon { color: #e65e58; background: #ffe0dc; }
    .dashboard-shell .stat-card:nth-child(4) .stat-icon { color: #b37a13; background: #ffedb7; }
    .dashboard-shell .main-grid > .panel:first-child { border-top: 4px solid #18a875; }
    .dashboard-shell .main-grid > .panel:nth-child(2) { border-top: 4px solid #2869d7; }
    .dashboard-shell .main-grid > .panel:nth-child(2) .panel-head a { color: #2869d7; background: #eaf1ff; }
    .dashboard-shell .map-card { background: linear-gradient(135deg, #d9edff 0%, #e1f8f1 54%, #fff1cf 100%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) { border-top-color: #ef6b63; background: linear-gradient(180deg, #fff4f1, #fff 38%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) { border-top-color: #e4aa32; background: linear-gradient(180deg, #fff9e8, #fff 38%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) { border-top-color: #806bd1; background: linear-gradient(180deg, #f4f1ff, #fff 38%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) { border-top-color: #18a875; background: linear-gradient(180deg, #edf9f4, #fff 38%); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .panel-head a { color: #806bd1; background: #eeeaff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .panel-head a { color: #168c65; background: #e1f7ed; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .legend-dot { box-shadow: 0 0 0 3px rgba(239,107,99,.1); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-thumb { border-radius: 10px; background: #d8f3e7; color: #168c65; }
    .dashboard-shell .main-panel { background: linear-gradient(135deg, #f4f8ff 0%, #f9fbff 48%, #f3fbf8 100%); }
    .dashboard-shell .topbar { border-bottom: 1px solid #e3ebf5; }
    .dashboard-shell .panel-head a,
    .dashboard-shell .panel-head a:hover { color: #1557b7; background: #e8f0ff; }
    .dashboard-shell .add-hotel-btn { background: linear-gradient(135deg, #2869d7, #154aab); }
    .dashboard-shell .status-badge { color: #13855f; background: #dff7eb; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .panel-head a { color: #d25750; background: #ffebe8; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .panel-head a { color: #a87512; background: #fff1c9; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .bar-chart { border: 1px solid #e5defb; background: linear-gradient(180deg, #eeeaff, #fff); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item { border-color: #d8eee5; }
    .dashboard-shell .dashboard-header {
        min-height: 236px;
        width: calc(100% + 20px);
        margin-left: -10px;
        padding: 20px 26px;
        border-radius: 14px;
        background: linear-gradient(90deg, rgba(8,61,151,.98) 0%, rgba(22,85,181,.78) 48%, rgba(22,85,181,.16) 100%), url('{{ asset('images/login-bg.jpg') }}') center/cover;
    }
    .dashboard-shell .dashboard-header::before {
        display: block;
        width: 260px;
        height: 260px;
        right: 26%;
        top: -190px;
        border-color: rgba(255,255,255,.12);
    }
    .dashboard-shell .dashboard-header::after { right: 10%; bottom: -96px; }
    .dashboard-shell .dashboard-banner-copy { position: relative; z-index: 1; align-self: flex-start; max-width: 420px; margin-top: 4px; color: #fff; }
    .dashboard-shell .dashboard-banner-copy h2 { margin: 0 0 10px; color: #fff; font-size: clamp(24px, 2.8vw, 36px); font-weight: 900; line-height: 1.08; letter-spacing: -.025em; }
    .dashboard-shell .dashboard-banner-copy p { margin: 0; color: rgba(255,255,255,.86); font-size: 13px; line-height: 1.55; }
    .dashboard-shell .dashboard-banner-copy p strong { color: #ffc338; font-weight: 900; }
    .dashboard-shell .dashboard-banner-copy p em { color: rgba(255,255,255,.92); font-style: italic; }
    .dashboard-shell .welcome-text { max-width: 430px; }
    .dashboard-shell .welcome-text::before { content: 'Optimalkan Potensi Pajak Daerah'; display: block; max-width: 320px; margin-bottom: 10px; color: #fff; font-size: clamp(24px, 2.7vw, 34px); font-weight: 900; line-height: 1.08; }
    .dashboard-shell .welcome-text span { margin-bottom: 7px; color: rgba(255,255,255,.78); }
    .dashboard-shell .welcome-text strong { color: #ffc338; font-size: 14px; }
    .dashboard-shell .date-box { padding: 9px 13px; }
    .dashboard-shell .main-grid { grid-template-columns: 1.25fr .95fr; }
    .dashboard-shell .main-grid > .panel:first-child { min-height: 318px; }
    .dashboard-shell .main-grid > .panel:nth-child(2) { min-height: 318px; }
    .dashboard-shell .map-card { min-height: 252px; background: linear-gradient(135deg, #c8e2ff, #dff7ef 58%, #fff0bd); }
    .dashboard-shell .bottom-grid { grid-template-columns: 1fr 1fr 1fr 1fr; }
    .dashboard-shell .bottom-grid .mini-panel { min-height: 220px; }
    .dashboard-shell .panel-head h3, .dashboard-shell .mini-panel h3 { color: #14233b; font-size: 16px; font-weight: 800; }
    .dashboard-shell .panel-head a { color: #1557b7; background: #e8f0ff; }
    .dashboard-shell .topbar { min-height: 48px; background: #fff; padding: 6px 10px 6px 8px; border: 1px solid #e5ebf2; border-radius: 10px; }
    .dashboard-shell .menu-toggle { display: grid; place-items: center; width: 38px; height: 36px; margin-right: 8px; border: 1px solid #dbe8f4; border-radius: 10px; color: #1557b7; background: #f4f8ff; cursor: pointer; font-size: 22px; line-height: 1; transition: color .2s ease, background .2s ease, transform .2s ease; }
    .dashboard-shell .menu-toggle:hover { color: #fff; background: #2869d7; transform: translateY(-1px); }
    .dashboard-shell.sidebar-collapsed { gap: 0; }
    .dashboard-shell.sidebar-collapsed .sidebar { width: 0; flex-basis: 0; padding-right: 0; padding-left: 0; border-width: 0; opacity: 0; overflow: hidden; }
    .dashboard-shell .profile-box { border: 0; background: transparent; }
    .dashboard-shell .topbar-right { gap: 8px; }
    .dashboard-shell .dashboard-header { overflow: hidden; }
    .dashboard-shell .dashboard-header::marker { display: none; }
    .dashboard-shell .dashboard-header-slides,
    .dashboard-shell .dashboard-header-slide,
    .dashboard-shell .dashboard-header-slide-overlay { position: absolute; inset: 0; }
    .dashboard-shell .dashboard-header-slides { z-index: 0; }
    .dashboard-shell .dashboard-header-slide { width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity .8s ease; }
    .dashboard-shell .dashboard-header-slide.is-active { opacity: 1; }
    .dashboard-shell .dashboard-header-slide-overlay { background: linear-gradient(90deg, rgba(13,66,155,.88), rgba(21,87,183,.48) 52%, rgba(21,87,183,.15)); }
    .dashboard-shell .dashboard-header-dots { display: none; }
    .dashboard-shell .dashboard-header-dots button { width: 8px; height: 8px; padding: 0; border: 1px solid rgba(255,255,255,.85); border-radius: 50%; background: transparent; cursor: pointer; }
    .dashboard-shell .dashboard-header-dots button.is-active { border-color: #ffc338; background: #ffc338; }
    .dashboard-shell .stats-grid .stat-card { display: flex; flex-direction: column; justify-content: center; }
    .dashboard-shell .main-grid { align-items: stretch; }
    .dashboard-shell .main-grid > .panel { min-width: 0; }
    .dashboard-shell .main-grid > .panel:nth-child(2) .panel-head { margin-bottom: 14px; }
    .dashboard-shell .hotel-list { min-height: 244px; }
    .dashboard-shell .map-card::after { content: 'Tracking & Analisis Data'; position: absolute; top: 14px; right: 14px; padding: 12px 14px; border-radius: 10px; color: #173545; background: rgba(255,255,255,.9); font-size: 12px; font-weight: 800; box-shadow: 0 8px 20px rgba(20,56,99,.1); }
    .dashboard-shell .bottom-grid .mini-panel { box-shadow: 0 8px 20px rgba(20,56,99,.07); }
    .dashboard-shell .bottom-grid .panel-head { min-height: 26px; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-list { display: grid; grid-template-columns: 1fr; gap: 2px; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item { min-height: 48px; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) { position: relative; overflow: hidden; border-top-color: #174b9b; background: linear-gradient(120deg, rgba(8,37,69,.92), rgba(23,75,155,.72)), url('https://cdn.phototourl.com/member/2026-09-11-cb68d0e8-79e9-4d57-bffc-b14634f40bc5.jpg') center/cover; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .panel-head,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .mini-list { position: relative; z-index: 1; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .panel-head h3,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .panel-head a { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .panel-head a { background: rgba(255,255,255,.14); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .mini-item { border-color: rgba(255,255,255,.2); background: rgba(7,32,62,.28); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .mini-item:hover { background: rgba(255,255,255,.16); border-color: rgba(255,255,255,.34); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .mini-item strong,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .mini-item small { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .mini-item small { color: rgba(255,255,255,.72); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .tag { color: #123f59; background: #d9eaff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .regulation-empty { grid-template-columns: 1fr; min-height: 112px; border-color: rgba(255,255,255,.2); background: rgba(7,32,62,.28); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .regulation-empty strong { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .regulation-empty small { color: rgba(255,255,255,.72); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(2) .regulation-empty-link { grid-column: 1; color: #d9eaff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) { position: relative; overflow: hidden; min-height: 220px; border-top-color: #174b9b; background: linear-gradient(120deg, rgba(8,37,69,.92), rgba(23,75,155,.72)), url('https://cdn.phototourl.com/member/2026-09-11-363f10cb-efd9-4459-a8d2-9b050f788020.jpg') center/cover; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .panel-head { position: relative; z-index: 1; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .panel-head h3,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .panel-head a { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .panel-head a { background: rgba(255,255,255,.14); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) { position: relative; overflow: hidden; border-top-color: #174b9b; background: linear-gradient(120deg, rgba(8,37,69,.92), rgba(23,75,155,.72)), url('https://cdn.phototourl.com/member/2026-09-11-ea650f86-8d4d-4520-8cb5-713db02ff219.webp') center/cover; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .panel-head,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-list { position: relative; z-index: 1; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .panel-head h3,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .panel-head a { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .panel-head a { background: rgba(255,255,255,.14); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item { border-color: rgba(255,255,255,.2); background: rgba(7,32,62,.28); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item:hover { background: rgba(255,255,255,.16); border-color: rgba(255,255,255,.34); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item strong,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item small { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item small { color: rgba(255,255,255,.72); }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(4) .pub-item a { color: #d9eaff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) { position: relative; overflow: hidden; border-top-color: #174b9b; background: linear-gradient(120deg, rgba(8,37,69,.92), rgba(23,75,155,.72)), url('https://cdn.phototourl.com/member/2026-09-11-363f10cb-efd9-4459-a8d2-9b050f788020.jpg') center/cover; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .panel-head { position: relative; z-index: 1; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .panel-head h3,
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .panel-head a { color: #fff; }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(1) .panel-head a { background: rgba(255,255,255,.14); }
    .dashboard-shell .dashboard-welcome { grid-column: 1 / -1; display: flex; align-items: end; justify-content: space-between; gap: 20px; padding: 4px 0 0; }
    .dashboard-shell .dashboard-welcome .welcome-text { display: block; max-width: none; }
    .dashboard-shell .dashboard-welcome .welcome-text::before { display: none; }
    .dashboard-shell .dashboard-welcome .welcome-text span { display: inline; margin: 0 4px 0 0; color: #14233b; font-size: 17px; font-weight: 800; }
    .dashboard-shell .dashboard-welcome .welcome-text strong { display: inline; color: #14233b; font-size: 17px; font-weight: 800; line-height: 1.08; letter-spacing: 0; }
    .dashboard-shell .dashboard-welcome .date-box { flex: 0 0 auto; padding: 0 2px; border: 0; color: #7b8da5; background: transparent; text-align: right; }
    .dashboard-shell .dashboard-welcome .date-box strong { color: #14233b; font-size: 12px; }
    .dashboard-shell .dashboard-welcome .date-box span { font-size: 11px; }
    @media (max-width: 600px) { .dashboard-shell .dashboard-welcome { align-items: flex-start; flex-direction: column; gap: 10px; }.dashboard-shell .dashboard-welcome .date-box { text-align: left; } }
    .dashboard-shell .panel-head h3 { color: var(--dashboard-deep); }
    .dashboard-shell .panel-head a,
    .dashboard-shell .popover-link { color: var(--dashboard-teal); }
    .dashboard-shell .add-hotel-btn {
        background: linear-gradient(135deg, var(--dashboard-teal), var(--dashboard-deep));
        box-shadow: 0 8px 16px rgba(8, 127, 120, .18);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .dashboard-shell .add-hotel-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 20px rgba(8, 127, 120, .24);
    }
    .dashboard-shell .hotel-thumb {
        background: linear-gradient(145deg, #d9f4ed, #b7e4dd);
        color: var(--dashboard-teal);
    }
    .dashboard-shell .hotel-thumb-photo { object-fit: cover; }
    .dashboard-shell .map-card {
        background: linear-gradient(135deg, #dff5f0 0%, #eaf5fb 52%, #fff4d8 100%);
        border-color: rgba(8, 127, 120, .16);
    }
    .dashboard-shell .map-card {
        position: relative;
        display: block;
        min-height: 252px;
        overflow: hidden;
        border: 1px solid rgba(8, 127, 120, .16);
        border-radius: 10px;
        box-shadow: inset 0 0 0 1px rgba(255,255,255,.25);
    }
    .dashboard-shell .map-grid {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(rgba(39, 108, 126, .13) 1px, transparent 1px), linear-gradient(90deg, rgba(39, 108, 126, .13) 1px, transparent 1px);
        background-size: 26px 26px;
        transform: rotate(-3deg) scale(1.12);
    }
    .dashboard-shell .map-road {
        position: absolute;
        display: block;
        height: 13px;
        border: 3px solid rgba(255,255,255,.8);
        border-radius: 999px;
        background: rgba(73, 139, 154, .3);
        box-shadow: 0 0 0 1px rgba(57, 117, 133, .1);
        transform: rotate(-28deg);
    }
    .dashboard-shell .map-road-one { width: 125%; left: -12%; top: 48%; }
    .dashboard-shell .map-road-two { width: 82%; left: 20%; top: 30%; transform: rotate(35deg); }
    .dashboard-shell .map-point {
        position: absolute;
        z-index: 2;
        display: grid;
        place-items: center;
        width: 28px;
        height: 28px;
        border: 3px solid #fff;
        border-radius: 50%;
        color: #fff;
        background: #18a875;
        box-shadow: 0 5px 12px rgba(20, 56, 99, .2);
        font-size: 10px;
        font-weight: 800;
    }
    .dashboard-shell .map-point-office { left: 45%; top: 48%; width: 34px; height: 34px; background: #e65e58; }
    .dashboard-shell .map-point-hotel-one { left: 19%; top: 28%; }
    .dashboard-shell .map-point-hotel-two { right: 18%; top: 22%; background: #2869d7; }
    .dashboard-shell .map-point-hotel-three { right: 24%; bottom: 18%; background: #e8a934; }
    .dashboard-shell .map-caption {
        position: absolute;
        z-index: 3;
        left: 14px;
        bottom: 14px;
        display: grid;
        gap: 2px;
        padding: 9px 11px;
        border: 1px solid rgba(255,255,255,.75);
        border-radius: 8px;
        color: #173545;
        background: rgba(255,255,255,.9);
        box-shadow: 0 8px 18px rgba(20,56,99,.1);
    }
    .dashboard-shell .map-caption strong { font-size: 12px; }
    .dashboard-shell .map-caption small { color: #6b7c8d; font-size: 10px; }
    .dashboard-shell .map-panel-actions { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-top: 12px; color: #6b7c8d; font-size: 11px; }
    .dashboard-shell .map-panel-actions a { color: #087f78; font-weight: 800; }
    .dashboard-shell .map-grid {
        opacity: .42;
    }
    .dashboard-shell .bar-chart .bar:nth-child(1) { background: linear-gradient(180deg, #ef765d, #d95c4c); }
    .dashboard-shell .bar-chart .bar:nth-child(2) { background: linear-gradient(180deg, #e8b84b, #d89d2e); }
    .dashboard-shell .bar-chart .bar:nth-child(3) { background: linear-gradient(180deg, #8b78b8, #66549d); }
    /* Dashboard presentation layer: preserves all existing content while matching the reference composition. */
    .dashboard-shell {
        --dashboard-blue: #1557b7;
        display: flex;
        gap: 0;
        padding: 0;
        background: #f5f8fc;
    }
    .dashboard-shell .sidebar {
        width: 232px;
        flex: 0 0 232px;
        min-height: 100vh;
        padding: 20px 12px;
        border: 0;
        border-radius: 0;
        background: #fff;
        color: #13233b;
        box-shadow: 1px 0 0 #e7edf4;
        transition: width .25s ease, flex-basis .25s ease, padding .25s ease, opacity .2s ease;
    }
    .dashboard-shell .brand { margin: 4px 10px 34px; color: #13233b; }
    .dashboard-shell .brand-mark { width: 56px; height: 56px; overflow: hidden; border: 0; border-radius: 14px; background: transparent; color: #173b62; box-shadow: none; }
    .dashboard-shell .brand-mark img { display: block; width: 100%; height: 100%; padding: 3px; object-fit: contain; }
    .dashboard-shell .brand-text { color: #13233b; font-size: 16px; font-weight: 900; }
    .dashboard-shell .brand-title { display: block; color: #eef5ff; font-size: 16px; font-weight: 900; line-height: 1.2; }
    .dashboard-shell .brand-text small { color: #7d8da2; }
    .dashboard-shell .nav-title { margin: 22px 12px 8px; color: #8b98aa; font-size: 10px; }
    .dashboard-shell .nav-section-toggle { width: calc(100% - 24px); display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 0; border: 0; background: transparent; cursor: pointer; text-align: left; }
    .dashboard-shell .nav-section-toggle span { color: #7384a0; }
    .dashboard-shell .nav-section-toggle b { color: #2869d7; font-size: 15px; line-height: 1; transition: transform .2s ease; }
    .dashboard-shell .nav-section-toggle[aria-expanded="false"] b { transform: rotate(180deg); }
    .dashboard-shell .nav-section-content { overflow: hidden; max-height: 260px; opacity: 1; transition: max-height .25s ease, opacity .2s ease, margin .25s ease; }
    .dashboard-shell .nav-section-content.is-collapsed { max-height: 0; opacity: 0; margin-bottom: 0; }
    .dashboard-shell .nav-section-toggle:nth-of-type(1) span { color: #2869d7; }
    .dashboard-shell .nav-section-toggle:nth-of-type(2) span { color: #e39a25; }
    .dashboard-shell .nav-section-toggle:nth-of-type(3) span { color: #18a875; }
    .dashboard-shell .sidebar { background: linear-gradient(180deg, #102f57 0%, #0b2344 100%); color: #eef5ff; }
    .dashboard-shell .brand-text, .dashboard-shell .brand-text small { color: #eef5ff; }
    .dashboard-shell .brand-text small { color: #a9bdd8; }
    .dashboard-shell .nav-link { color: #c7d6eb; }
    .dashboard-shell .nav-link .nav-icon { color: #9eb7d8; }
    .dashboard-shell .nav-link:hover { color: #fff; background: rgba(77,140,226,.18); }
    .dashboard-shell .nav-link.active { color: #fff; background: linear-gradient(90deg, #1e5ab5, #17488f); box-shadow: inset 3px 0 0 #79b1ff, 0 8px 18px rgba(4,19,44,.2); }
    .dashboard-shell .nav-link.active .nav-icon { color: #b9d8ff; }
    .dashboard-shell .nav-section-toggle span { color: #a9c5e8 !important; }
    .dashboard-shell .nav-section-toggle b { color: #79b1ff; }
    .dashboard-shell .nav-group { gap: 3px; }
    .dashboard-shell .nav-link { padding: 10px 12px; border-radius: 8px; color: #c7dcfa; font-size: 12px; }
    .dashboard-shell .nav-link .nav-icon { color: #8fb9f1; }
    .dashboard-shell .nav-link:hover { color: #fff; background: rgba(75, 145, 236, .24); transform: translateX(2px); }
    .dashboard-shell .nav-link.active { color: #fff; background: linear-gradient(90deg, #2869d7, #174b9b); box-shadow: inset 3px 0 0 #9bc7ff, 0 8px 18px rgba(4,19,44,.24); }
    .dashboard-shell .nav-link.active .nav-icon { color: #d7eaff; }
    .dashboard-shell .nav-link .nav-icon, .dashboard-shell .logout-btn .nav-icon { display: inline-grid; place-items: center; width: 23px; min-width: 23px; margin-right: 3px; font-family: "Segoe UI Emoji", "Apple Color Emoji", sans-serif; font-size: 17px; line-height: 1; }
    .dashboard-shell .logout-btn { color: #b8d2f4; background: rgba(54, 117, 207, .2); border: 1px solid rgba(124, 177, 240, .16); }
    .dashboard-shell .logout-btn:hover { color: #fff; background: rgba(54, 117, 207, .36); }
    .dashboard-shell .nav-section-toggle { position: relative; margin: 18px 8px 8px; width: calc(100% - 16px); padding: 9px 10px 9px 12px; border: 1px solid rgba(169,197,232,.16); border-radius: 10px; background: rgba(255,255,255,.06); transition: background .2s ease, border-color .2s ease, transform .2s ease; }
    .dashboard-shell .nav-section-toggle::before { width: 5px; height: 5px; margin-right: 7px; flex: 0 0 5px; content: ''; border-radius: 50%; background: #79b1ff; box-shadow: 0 0 0 4px rgba(121,177,255,.12); }
    .dashboard-shell .nav-section-toggle span { flex: 1; color: #e5efff !important; font-size: 10px; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; }
    .dashboard-shell .nav-section-toggle b { display: grid; place-items: center; width: 20px; height: 20px; border-radius: 6px; color: #d7eaff; background: rgba(121,177,255,.16); font-size: 13px; }
    .dashboard-shell .nav-section-toggle:hover, .dashboard-shell .nav-section-toggle:focus-visible { border-color: rgba(169,197,232,.38); background: rgba(75,145,236,.18); transform: translateX(2px); outline: none; }
    .dashboard-shell .nav-section-toggle[data-sidebar-section="pembagian-pajak"]::before { background: #ffc338; box-shadow: 0 0 0 4px rgba(255,195,56,.12); }
    .dashboard-shell .nav-section-toggle[data-sidebar-section="publikasi"]::before { background: #55d4b1; box-shadow: 0 0 0 4px rgba(85,212,177,.12); }
    .dashboard-shell .nav-section-toggle[data-sidebar-section="pengaturan"]::before { background: #f18b7a; box-shadow: 0 0 0 4px rgba(241,139,122,.12); }
    .dashboard-shell .main-panel {
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(300px, .9fr);
        align-content: start;
        gap: 18px;
        width: calc(100% - 232px);
        padding: 18px 24px 30px;
    }
    .dashboard-shell .topbar,
    .dashboard-shell .dashboard-search-empty,
    .dashboard-shell .main-grid,
    .dashboard-shell .bottom-grid { grid-column: 1 / -1; }
    .dashboard-shell .topbar { padding: 0 0 4px; }
    .dashboard-shell .search-box { max-width: 560px; padding: 10px 14px; border-radius: 9px; background: #fff; box-shadow: none; }
    .dashboard-shell .icon-box, .dashboard-shell .profile-box { background: #fff; box-shadow: none; }
    .dashboard-shell .dashboard-header {
        grid-column: 1;
        min-height: 210px;
        width: 100%;
        margin: 0;
        padding: 28px 30px;
        align-items: end;
        border-radius: 12px;
        background: linear-gradient(90deg, rgba(13,66,155,.98), rgba(21,87,183,.4)), url('{{ asset('images/login-bg.jpg') }}') center/cover;
        box-shadow: 0 12px 24px rgba(24, 74, 143, .13);
    }
    .dashboard-shell .dashboard-header::before { display: none; }
    .dashboard-shell .dashboard-header::after { width: 120px; height: 120px; right: 18px; bottom: -68px; }
    .dashboard-shell .welcome-text { display: block; max-width: 420px; }
    .dashboard-shell .welcome-text span { display: block; margin-bottom: 8px; color: rgba(255,255,255,.78); font-size: 13px; }
    .dashboard-shell .welcome-text strong { display: block; color: #fff; font-size: clamp(23px, 2.5vw, 34px); line-height: 1.12; }
    .dashboard-shell .date-box { align-self: start; color: rgba(255,255,255,.82); background: rgba(255,255,255,.12); border-color: rgba(255,255,255,.22); }
    .dashboard-shell .date-box strong { color: #fff; }
    .dashboard-shell .stats-grid {
        grid-column: 2;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        align-content: stretch;
        position: relative;
        padding-top: 30px;
    }
    .dashboard-shell .stats-grid::before { content: 'Dashboard Pajak'; position: absolute; top: 0; left: 0; color: var(--dashboard-deep); font-size: 16px; font-weight: 800; }
    .dashboard-shell .stat-card { min-height: 99px; padding: 14px; border-top-width: 0; border-left: 3px solid var(--dashboard-teal); border-radius: 12px; box-shadow: 0 8px 18px rgba(20, 56, 99, .07); }
    .dashboard-shell .stat-head { float: right; margin: 0; }
    .dashboard-shell .stat-icon { width: 30px; height: 30px; font-size: 14px; }
    .dashboard-shell .stat-card .label { margin: 0 0 5px; font-size: 11px; }
    .dashboard-shell .stat-card strong { font-size: 23px; }
    .dashboard-shell .stat-card .meta { margin-top: 5px; font-size: 10px; }
    .dashboard-shell .main-grid { grid-template-columns: 1fr 1.05fr; gap: 18px; margin-bottom: 0; }
    .dashboard-shell .main-grid > .panel:first-child { grid-column: 2; }
    .dashboard-shell .main-grid > .panel:nth-child(2) { grid-column: 1; grid-row: 1; }
    .dashboard-shell .panel, .dashboard-shell .mini-panel { border-radius: 12px; background: #fff; }
    .dashboard-shell .panel { padding: 18px; }
    .dashboard-shell .panel-head h3, .dashboard-shell .mini-panel h3 { font-size: 15px; }
    .dashboard-shell .map-card { min-height: 300px; border-radius: 10px; }
    .dashboard-shell .stat-card:nth-child(2) { position: relative; overflow: hidden; color: #fff; background: linear-gradient(120deg, rgba(8,37,69,.86), rgba(22,101,151,.62)), url('https://tile.openstreetmap.org/13/6355/4064.png') center/cover; }
    .dashboard-shell .stat-card:nth-child(2) .stat-card-link { position: relative; z-index: 1; }
    .dashboard-shell .stat-card:nth-child(2) .label,
    .dashboard-shell .stat-card:nth-child(2) strong,
    .dashboard-shell .stat-card:nth-child(2) .meta { color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,.35); }
    .dashboard-shell .map-card { background: linear-gradient(120deg, rgba(8,37,69,.78), rgba(22,101,151,.42)), url('https://tile.openstreetmap.org/13/6355/4064.png') center/cover; }
    .dashboard-shell .map-card .map-grid { opacity: .2; }
    .dashboard-shell .bottom-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }
    .dashboard-shell .mini-panel { padding: 16px; }
    .dashboard-shell .complaint-visual { height: 145px; }
    .dashboard-shell .regulation-empty { min-height: 112px; padding: 14px; }
    .dashboard-shell .pub-item, .dashboard-shell .mini-item { padding: 8px 0; }
    @media (max-width: 1050px) {
        .dashboard-shell .main-panel { grid-template-columns: 1fr; }
        .dashboard-shell .dashboard-header, .dashboard-shell .stats-grid { grid-column: 1; }
        .dashboard-shell .stats-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); padding-top: 30px; }
        .dashboard-shell .main-grid > .panel:first-child, .dashboard-shell .main-grid > .panel:nth-child(2) { grid-column: auto; grid-row: auto; }
    }
    @media (max-width: 900px) {
        .dashboard-shell .sidebar { width: 245px; flex-basis: 245px; }
        .dashboard-shell .main-panel { width: 100%; padding: 14px 16px 24px; }
            .dashboard-shell .sidebar { width: 100%; padding: 16px 14px 10px; border-radius: 0 0 22px 22px; }
    }
    @media (max-width: 600px) {
        .dashboard-shell .main-grid, .dashboard-shell .bottom-grid { grid-template-columns: 1fr; }
        .dashboard-shell .dashboard-header { width: 100%; margin-left: 0; min-height: 190px; padding: 22px; }
        .dashboard-shell .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @keyframes dashboard-rise {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes dashboard-header-in {
        from { opacity: 0; transform: translateY(-6px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .menu-toggle { border: 0; background: transparent; cursor: pointer; font-size: 1.2rem; }
    .sidebar-backdrop { display: none; }
    .dashboard-hidden { display: none !important; }
    .dashboard-search-empty {
        margin: 0 0 18px;
        padding: 14px 18px;
        color: #8a5f32;
        background: #fff8e8;
        border: 1px solid #f2d99b;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 700;
    }
    .topbar { position: relative; }
    .icon-box { border: 0; cursor: pointer; font: inherit; }
    .dashboard-popover { position: absolute; right: 12px; top: 58px; z-index: 10; width: min(340px, calc(100vw - 32px)); padding: 16px; background: #fff; border: 1px solid #e3edf1; border-radius: 12px; box-shadow: 0 18px 40px rgba(16, 38, 51, .16); }
    .popover-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 10px; }
    .popover-close { border: 0; background: transparent; color: #6f7f8d; cursor: pointer; font-size: 1.3rem; line-height: 1; }
    .popover-summary, .popover-empty, .popover-help { margin: 0 0 12px; color: #6f7f8d; font-size: .82rem; }
    .notification-item { display: block; padding: 10px 0; border-top: 1px solid #eef3f4; }
    .notification-item strong, .notification-item small { display: block; }
    .notification-item strong { font-size: .85rem; }
    .notification-item small { margin-top: 3px; color: #6f7f8d; font-size: .74rem; }
    .popover-link { display: block; margin-top: 10px; color: #0a7d7a; font-size: .82rem; font-weight: 700; }
    .setting-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 10px 0; border-top: 1px solid #eef3f4; font-size: .85rem; }
    body.compact-dashboard .panel, body.compact-dashboard .mini-panel { padding: 14px; }
    body.compact-dashboard .stats-grid, body.compact-dashboard .main-grid, body.compact-dashboard .bottom-grid { gap: 10px; }
    @media (max-width: 900px) {
        .dashboard-shell .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .dashboard-shell .main-grid { grid-template-columns: 1fr; }
        .dashboard-shell .bottom-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .sidebar { position: fixed; inset: 0 auto 0 0; z-index: 20; transform: translateX(-105%); transition: transform .25s ease; }
        .sidebar.is-open { transform: translateX(0); }
        .sidebar-backdrop {
            display: block;
            position: fixed;
            inset: 0;
            z-index: 19;
            border: 0;
            padding: 0;
            background: rgba(11, 31, 48, .42);
            opacity: 0;
            pointer-events: none;
            transition: opacity .25s ease;
        }
        .sidebar-backdrop.is-visible {
            opacity: 1;
            pointer-events: auto;
        }
        body.sidebar-open { overflow: hidden; }
    }
    @media (max-width: 600px) {
        .dashboard-shell .stats-grid,
        .dashboard-shell .bottom-grid { grid-template-columns: 1fr; }
        .dashboard-shell .dashboard-header { padding: 20px; }
        .dashboard-shell .date-box { margin-top: 14px; }
        .dashboard-shell .main-panel::before { inset: -14px -12px auto; }
    }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .pillar-copy {
        position: relative;
        z-index: 1;
        max-width: 270px;
        margin-top: 28px;
    }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .pillar-copy strong {
        display: block;
        margin-bottom: 8px;
        color: #ffc338;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .12em;
        line-height: 1.3;
    }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .pillar-copy h4 {
        margin: 0 0 8px;
        color: #fff;
        font-size: 22px;
        font-weight: 800;
        line-height: 1.15;
    }
    .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .pillar-copy p {
        max-width: 245px;
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 12px;
        font-weight: 500;
        line-height: 1.55;
    }
    @media (max-width: 600px) {
        .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .pillar-copy {
            max-width: 100%;
            margin-top: 22px;
        }
        .dashboard-shell .bottom-grid .mini-panel:nth-child(3) .pillar-copy h4 { font-size: 20px; }
    }
    .dashboard-shell .sidebar {
        position: relative;
        overflow: hidden;
        border-right: 1px solid rgba(151, 194, 255, .16);
        background:
            radial-gradient(circle at 12% 8%, rgba(76, 151, 239, .28), transparent 28%),
            radial-gradient(circle at 94% 72%, rgba(27, 177, 157, .16), transparent 30%),
            linear-gradient(180deg, #102f57 0%, #091d3a 100%);
        box-shadow: 12px 0 32px rgba(4, 20, 45, .14);
    }
    .dashboard-shell .sidebar::before {
        position: absolute;
        top: 110px;
        right: -62px;
        width: 150px;
        height: 150px;
        content: '';
        border: 1px solid rgba(255, 255, 255, .08);
        border-radius: 50%;
        box-shadow: 0 0 0 20px rgba(255, 255, 255, .025), 0 0 0 42px rgba(255, 255, 255, .018);
        pointer-events: none;
    }
    .dashboard-shell .sidebar > * { position: relative; z-index: 1; }
    .dashboard-shell .brand {
        align-items: center;
        gap: 12px;
        margin: 0 2px 26px;
        padding: 12px 10px 18px;
        border-bottom: 1px solid rgba(169, 197, 232, .18);
    }
    .dashboard-shell .brand-mark {
        width: 52px;
        height: 52px;
        flex-basis: 52px;
        padding: 4px;
        border-radius: 16px;
        box-shadow: 0 10px 22px rgba(0, 0, 0, .2), 0 0 0 4px rgba(255, 218, 137, .1);
    }
    .dashboard-shell .brand-title { font-size: 13px; line-height: 1.25; }
    .dashboard-shell .brand-subtitle {
        display: block;
        margin-top: 5px;
        color: #8eadd2;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .06em;
        line-height: 1.35;
        text-transform: uppercase;
    }
    .dashboard-shell .brand + .nav-group { margin-top: 0; }
    .dashboard-shell .nav-group { gap: 5px; }
    .dashboard-shell .nav-link {
        position: relative;
        min-height: 42px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 12px;
        color: #bed0e7;
        font-size: 11.5px;
        font-weight: 650;
        transition: color .2s ease, background .2s ease, border-color .2s ease, transform .2s ease, box-shadow .2s ease;
    }
    .dashboard-shell .nav-link .nav-icon,
    .dashboard-shell .logout-btn .nav-icon {
        width: 27px;
        min-width: 27px;
        height: 27px;
        margin-right: 8px;
        border: 1px solid rgba(159, 194, 238, .16);
        border-radius: 9px;
        background: rgba(255, 255, 255, .07);
        font-size: 15px;
        transition: background .2s ease, border-color .2s ease, transform .2s ease;
    }
    .dashboard-shell .nav-link:hover {
        border-color: rgba(137, 188, 255, .22);
        background: rgba(75, 145, 236, .16);
        transform: translateX(3px);
        box-shadow: 0 8px 16px rgba(2, 17, 39, .12);
    }
    .dashboard-shell .nav-link:hover .nav-icon { border-color: rgba(181, 219, 255, .36); background: rgba(128, 188, 255, .2); transform: scale(1.05); }
    .dashboard-shell .nav-link.active {
        border-color: rgba(145, 201, 255, .24);
        background: linear-gradient(100deg, rgba(48, 123, 224, .94), rgba(24, 77, 157, .82));
        box-shadow: 0 10px 22px rgba(1, 15, 38, .24), inset 0 1px 0 rgba(255, 255, 255, .14);
    }
    .dashboard-shell .nav-link.active::before {
        position: absolute;
        top: 9px;
        bottom: 9px;
        left: -13px;
        width: 3px;
        content: '';
        border-radius: 0 4px 4px 0;
        background: #ffc338;
        box-shadow: 0 0 12px rgba(255, 195, 56, .7);
    }
    .dashboard-shell .nav-link.active .nav-icon { border-color: rgba(255, 255, 255, .3); background: rgba(255, 255, 255, .16); }
    .dashboard-shell .nav-title {
        margin: 18px 8px 7px;
        padding: 8px 10px;
        border-color: rgba(169, 197, 232, .13);
        background: rgba(255, 255, 255, .045);
    }
    .dashboard-shell .nav-title:hover { transform: translateX(2px); }
    .dashboard-shell .nav-section-content { padding: 0 2px; }
    .dashboard-shell .sidebar-footer {
        margin: 22px 2px 0;
        padding-top: 16px;
        border-top: 1px solid rgba(169, 197, 232, .16);
    }
    .dashboard-shell .logout-btn {
        width: 100%;
        min-height: 42px;
        padding: 7px 12px;
        border-color: rgba(241, 139, 122, .2);
        border-radius: 12px;
        color: #ffc8bc;
        background: rgba(241, 139, 122, .1);
        font-size: 11.5px;
        font-weight: 750;
        text-align: left;
        transition: background .2s ease, border-color .2s ease, transform .2s ease;
    }
    .dashboard-shell .logout-btn:hover { border-color: rgba(255, 177, 161, .4); background: rgba(241, 139, 122, .2); transform: translateY(-1px); }
    .dashboard-shell .logout-btn .nav-icon { border-color: rgba(241, 139, 122, .26); background: rgba(241, 139, 122, .12); }
    .dashboard-shell {
        --dashboard-bg: #f4f8fc;
        --dashboard-surface: #ffffff;
        --dashboard-surface-soft: #f1f7ff;
        --dashboard-surface-alt: #eef7f3;
        --dashboard-text: #10233b;
        --dashboard-text-soft: #52657a;
        --dashboard-text-muted: #72839a;
        --dashboard-line: #e5edf6;
        --dashboard-blue: #1d5ed6;
        --dashboard-blue-deep: #123d91;
        --dashboard-green: #0d9b74;
        --dashboard-gold: #d2932b;
        --dashboard-coral: #dc6f5c;
        --dashboard-shadow: rgba(19, 42, 72, 0.08);
        --dashboard-shadow-strong: rgba(19, 42, 72, 0.14);
    }

    body.dark-dashboard {
        color: #eff5fb;
        background: #09141f;
    }

    body.dark-dashboard .dashboard-shell {
        --dashboard-bg: #0b1523;
        --dashboard-surface: #111d2d;
        --dashboard-surface-soft: #13263b;
        --dashboard-surface-alt: #112d2b;
        --dashboard-text: #eef5ff;
        --dashboard-text-soft: #d8e6f8;
        --dashboard-text-muted: #9bb0c8;
        --dashboard-line: #223349;
        --dashboard-blue: #7db6ff;
        --dashboard-blue-deep: #b9d5ff;
        --dashboard-green: #7fe0c1;
        --dashboard-gold: #ffd77a;
        --dashboard-coral: #ff9d8b;
        --dashboard-shadow: rgba(0, 0, 0, 0.2);
        --dashboard-shadow-strong: rgba(0, 0, 0, 0.28);
    }

    body.dark-dashboard .dashboard-shell .main-panel {
        background: linear-gradient(135deg, #111c2e 0%, #101827 48%, #10231f 100%);
    }

    body.dark-dashboard .dashboard-shell .search-box,
    body.dark-dashboard .dashboard-shell .profile-box,
    body.dark-dashboard .dashboard-shell .icon-box {
        color: #dce8f7;
        background: #18263a;
        border-color: #2b4059;
    }

    body.dark-dashboard .dashboard-shell .icon-box:first-child {
        color: #73dcc8;
        background: #153c3b;
        border-color: #23645e;
    }

    body.dark-dashboard .dashboard-shell .settings-control {
        color: #9ec2ff;
        background: #1a3151;
        border-color: #31527c;
    }

    body.dark-dashboard .dashboard-shell .theme-control {
        color: #ffe08a;
        background: #463b1f;
        border-color: #806b2c;
    }

    body.dark-dashboard .dashboard-shell .header-logout-btn {
        color: #ffb3a3;
        background: #422b2a;
        border-color: #75423b;
    }

    body.dark-dashboard .dashboard-shell .stat-card,
    body.dark-dashboard .dashboard-shell .panel,
    body.dark-dashboard .dashboard-shell .mini-panel {
        color: #e5edf8;
        background: #172438;
        border-color: #2b4059;
    }

    body.dark-dashboard .dashboard-shell .panel-head h3,
    body.dark-dashboard .dashboard-shell .stat-card strong,
    body.dark-dashboard .dashboard-shell .mini-item strong,
    body.dark-dashboard .dashboard-shell .pub-item strong {
        color: #f1f6fc;
    }

    body.dark-dashboard .dashboard-shell .stat-card .label,
    body.dark-dashboard .dashboard-shell .mini-item small,
    body.dark-dashboard .dashboard-shell .pub-item small {
        color: #9eb0c5;
    }

    body.dark-dashboard .dashboard-shell .hotel-item,
    body.dark-dashboard .dashboard-shell .mini-item,
    body.dark-dashboard .dashboard-shell .pub-item {
        border-color: #2b4059;
        background: #1b2b41;
    }

    body.dark-dashboard .dashboard-shell .hotel-item:hover,
    body.dark-dashboard .dashboard-shell .mini-item:hover,
    body.dark-dashboard .dashboard-shell .pub-item:hover {
        background: #243a55;
    }

    body.dark-dashboard .dashboard-shell .dashboard-popover {
        color: #e5edf8;
        background: #172438;
        border-color: #2b4059;
    }

    body.dark-dashboard .dashboard-shell .notification-item,
    body.dark-dashboard .dashboard-shell .setting-row {
        border-color: #2b4059;
    }

    body.dark-dashboard .dashboard-shell .notification-item small,
    body.dark-dashboard .dashboard-shell .popover-summary,
    body.dark-dashboard .dashboard-shell .popover-empty,
    body.dark-dashboard .dashboard-shell .popover-help {
        color: #9eb0c5;
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome {
        color: #e5edf8;
        background: #172438;
        border-color: #2b4059;
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome .welcome-text span,
    body.dark-dashboard .dashboard-shell .dashboard-welcome .date-box {
        color: #aebed0;
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome .welcome-text strong,
    body.dark-dashboard .dashboard-shell .dashboard-welcome .date-box strong {
        color: #f1f6fc;
    }

    body.dark-dashboard .dashboard-shell .panel-head a,
    body.dark-dashboard .dashboard-shell .map-panel-actions a,
    body.dark-dashboard .dashboard-shell .popover-link {
        color: #7fe0ce;
    }

    body.dark-dashboard .dashboard-shell .map-caption strong,
    body.dark-dashboard .dashboard-shell .hotel-item strong {
        color: #f1f6fc;
    }

    body.dark-dashboard .dashboard-shell .hotel-item span,
    body.dark-dashboard .dashboard-shell .map-caption small,
    body.dark-dashboard .dashboard-shell .map-panel-actions,
    body.dark-dashboard .dashboard-shell .complaint-total {
        color: #aebed0;
    }

    body.dark-dashboard .dashboard-shell .regulation-empty strong {
        color: #f1f6fc;
    }

    body.dark-dashboard .dashboard-shell .regulation-empty small {
        color: #aebed0;
    }

    body.dark-dashboard .dashboard-shell .regulation-empty-link {
        color: #ffe08a;
    }

    body.dark-dashboard .dashboard-shell .status-badge {
        color: #8ff0c5; background: #164b3e;
    }

    body.dark-dashboard .dashboard-shell .stat-card .meta {
        color: #b9c9da;
    }

    body.dark-dashboard .dashboard-shell .stat-card:first-child .meta,
    body.dark-dashboard .dashboard-shell .stat-card:nth-child(3) .meta,
    body.dark-dashboard .dashboard-shell .stat-card:nth-child(4) .meta {
        color: #f1f6fc;
    }

    body.dark-dashboard .dashboard-shell .popover-close {
        color: #aebed0;
    }

    .dashboard-shell .main-panel,
    .dashboard-shell .search-box,
    .dashboard-shell .profile-box,
    .dashboard-shell .icon-box,
    .dashboard-shell .stat-card,
    .dashboard-shell .panel,
    .dashboard-shell .mini-panel,
    .dashboard-shell .dashboard-popover {
        transition: background .3s ease, border-color .3s ease, box-shadow .3s ease, color .3s ease;
    }

    .dashboard-shell .topbar {
        position: sticky;
        top: 12px;
        z-index: 8;
        padding: 10px 12px;
        border: 1px solid rgba(255,255,255,.55);
        border-radius: 18px;
        background: rgba(255,255,255,.58);
        backdrop-filter: blur(18px);
        box-shadow: 0 12px 28px rgba(18,63,89,.06);
    }

    .dashboard-shell .search-box {
        border-radius: 13px;
    }

    .dashboard-shell .profile-box {
        border-radius: 13px;
    }

    .dashboard-shell .stat-card,
    .dashboard-shell .panel,
    .dashboard-shell .mini-panel {
        border-radius: 18px;
        box-shadow: 0 14px 30px rgba(18,63,89,.07);
    }

    .dashboard-shell .stat-card:hover,
    .dashboard-shell .panel:hover,
    .dashboard-shell .mini-panel:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 38px rgba(18,63,89,.12);
    }

    .dashboard-shell .hotel-item-link {
        border-radius: 13px;
    }

    .dashboard-shell .hotel-item-link strong,
    .dashboard-shell .mini-item strong,
    .dashboard-shell .pub-item strong {
        letter-spacing: -.01em;
    }

    body.dark-dashboard .dashboard-shell .topbar {
        border-color: #2b4059;
        background: rgba(17,30,48,.78);
        box-shadow: 0 14px 30px rgba(0,0,0,.18);
    }

    body.dark-dashboard .dashboard-shell .stat-card:hover,
    body.dark-dashboard .dashboard-shell .panel:hover,
    body.dark-dashboard .dashboard-shell .mini-panel:hover {
        box-shadow: 0 20px 38px rgba(0,0,0,.24);
    }

    .dashboard-shell .dashboard-welcome {
        min-height: 54px;
        padding: 12px 16px;
        border: 1px solid transparent;
        border-radius: 14px;
    }

    .dashboard-shell .dashboard-welcome .welcome-text {
        display: flex;
        align-items: baseline;
        gap: 6px;
    }

    .dashboard-shell .dashboard-welcome .welcome-text span,
    .dashboard-shell .dashboard-welcome .welcome-text strong {
        margin: 0;
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome {
        box-shadow: 0 10px 24px rgba(0,0,0,.14);
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome .welcome-text {
        gap: 8px;
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome .welcome-text span {
        color: #b7c7d9;
        font-weight: 600;
    }

    body.dark-dashboard .dashboard-shell .dashboard-welcome .welcome-text strong {
        color: #ffe08a;
        font-weight: 800;
    }

    .dashboard-shell .dashboard-header,
    .dashboard-shell .dashboard-welcome,
    .dashboard-shell .topbar,
    .dashboard-shell .stat-card,
    .dashboard-shell .panel,
    .dashboard-shell .mini-panel,
    .dashboard-shell .search-box,
    .dashboard-shell .profile-box,
    .dashboard-shell .icon-box {
        font-size: 15px;
    }

    .dashboard-shell .stat-card strong {
        font-size: clamp(1.8rem, 2vw, 2.4rem);
        line-height: 1.1;
    }

    .dashboard-shell .panel-head h3,
    .dashboard-shell .mini-panel h3 {
        font-size: 1.05rem;
        line-height: 1.3;
    }

    .dashboard-shell .hotel-item strong,
    .dashboard-shell .mini-item strong,
    .dashboard-shell .pub-item strong,
    .dashboard-shell .dashboard-welcome .welcome-text strong {
        font-size: 0.97rem;
    }

    .dashboard-shell .hotel-item span,
    .dashboard-shell .mini-item small,
    .dashboard-shell .pub-item small,
    .dashboard-shell .dashboard-welcome .welcome-text span,
    .dashboard-shell .date-box {
        font-size: 0.8rem;
        line-height: 1.5;
    }

    .dashboard-shell .nav-link,
    .dashboard-shell .nav-section-toggle,
    .dashboard-shell .logout-btn {
        font-size: 0.82rem;
        line-height: 1.4;
    }

    .dashboard-shell .sidebar {
        scrollbar-color: rgba(255,255,255,.24) transparent;
    }

    .dashboard-shell .sidebar::-webkit-scrollbar {
        width: 8px;
    }

    .dashboard-shell .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,.22);
        border-radius: 999px;
    }

    .dashboard-shell .menu-toggle {
        font-size: 1.2rem;
    }
    @media (max-width: 600px) {
        .dashboard-shell .dashboard-welcome { width: 100%; }
        .dashboard-shell .dashboard-welcome .welcome-text { flex-wrap: wrap; }
    }
    @media (max-width: 600px) {
        .dashboard-shell { min-width: 0; padding: 0; }
        .dashboard-shell .main-panel { min-width: 0; padding: 10px 10px 20px; }
        .dashboard-shell .topbar { align-items: stretch; flex-wrap: wrap; gap: 8px; padding: 8px; }
        .dashboard-shell .search-box { order: 2; width: 100%; max-width: none; }
        .dashboard-shell .topbar-right { order: 1; width: 100%; justify-content: flex-end; }
        .dashboard-shell .profile-name { display: none; }
        .dashboard-shell .dashboard-header { min-height: 210px; padding: 18px; }
        .dashboard-shell .dashboard-banner-copy { max-width: 100%; }
        .dashboard-shell .dashboard-banner-copy h2 { font-size: 25px; }
        .dashboard-shell .dashboard-banner-copy p { font-size: 12px; }
        .dashboard-shell .stats-grid { gap: 10px; }
        .dashboard-shell .stat-card { min-width: 0; padding: 14px; }
        .dashboard-shell .stat-card strong { font-size: 24px; }
        .dashboard-shell .panel, .dashboard-shell .mini-panel { min-width: 0; padding: 14px; }
        .dashboard-shell .panel-head { align-items: flex-start; flex-wrap: wrap; gap: 8px; }
        .dashboard-shell .hotel-item { grid-template-columns: 42px minmax(0, 1fr) auto; gap: 8px; }
        .dashboard-shell .hotel-item span, .dashboard-shell .hotel-item small { overflow-wrap: anywhere; }
        .dashboard-shell .map-card { min-height: 220px; }
    }

    @keyframes dashboard-light-sweep {
        0% { transform: translateX(-125%) skewX(-18deg); opacity: 0; }
        18% { opacity: .42; }
        48% { opacity: .12; }
        100% { transform: translateX(225%) skewX(-18deg); opacity: 0; }
    }

    @keyframes dashboard-orbit {
        0%, 100% { transform: translate3d(0, 0, 0) scale(1); opacity: .55; }
        50% { transform: translate3d(18px, 20px, 0) scale(1.08); opacity: .9; }
    }

    @keyframes dashboard-card-in {
        from { opacity: 0; transform: translateY(22px) rotateX(5deg); }
        to { opacity: 1; transform: translateY(0) rotateX(0); }
    }

    @keyframes dashboard-icon-pop {
        0%, 100% { transform: rotate(0) scale(1); }
        45% { transform: rotate(-10deg) scale(1.16); }
        75% { transform: rotate(7deg) scale(1.04); }
    }

    @keyframes dashboard-card-shimmer {
        from { transform: translateX(-130%) skewX(-20deg); opacity: 0; }
        30% { opacity: .55; }
        to { transform: translateX(230%) skewX(-20deg); opacity: 0; }
    }

    .dashboard-shell .sidebar::after {
        position: absolute;
        right: -86px;
        bottom: 14%;
        width: 210px;
        height: 210px;
        content: '';
        border: 1px solid rgba(121, 177, 255, .12);
        border-radius: 50%;
        box-shadow: 0 0 0 24px rgba(121, 177, 255, .035), 0 0 0 52px rgba(85, 212, 177, .025);
        pointer-events: none;
        animation: dashboard-orbit 7s ease-in-out infinite;
    }

    .dashboard-shell .dashboard-header::before {
        display: block;
        inset: -25% auto -25% -28%;
        width: 24%;
        height: 150%;
        border: 0;
        border-radius: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .22), transparent);
        filter: blur(8px);
        transform: translateX(-125%) skewX(-18deg);
        animation: dashboard-light-sweep 7s 1.25s ease-in-out infinite;
    }

    .dashboard-shell .dashboard-header::after {
        animation: dashboard-orbit 8s ease-in-out infinite;
    }

    .dashboard-shell .stat-card {
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        animation-name: dashboard-card-in;
        animation-duration: .7s;
        animation-timing-function: cubic-bezier(.22, 1, .36, 1);
    }

    .dashboard-shell .stat-card::after {
        position: absolute;
        inset: 0 auto 0 -32%;
        width: 24%;
        content: '';
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .45), transparent);
        pointer-events: none;
        opacity: 0;
    }

    .dashboard-shell .stat-card:hover {
        z-index: 3;
        transform: translateY(-7px) rotateX(2deg) rotateY(-1deg);
        box-shadow: 0 20px 34px rgba(20, 56, 99, .16);
    }

    .dashboard-shell .stat-card:hover::after {
        animation: dashboard-card-shimmer .8s ease-out;
    }

    .dashboard-shell .nav-link:hover .nav-icon,
    .dashboard-shell .nav-section-toggle:hover b {
        animation: dashboard-icon-pop .55s ease-out;
    }

    .dashboard-shell .dashboard-banner-copy {
        transition: transform .45s cubic-bezier(.22, 1, .36, 1), filter .45s ease;
    }

    .dashboard-shell .dashboard-header:hover .dashboard-banner-copy {
        transform: translate3d(8px, -3px, 0);
        filter: drop-shadow(0 10px 18px rgba(3, 28, 78, .18));
    }

    .dashboard-shell .panel,
    .dashboard-shell .mini-panel {
        transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s ease;
    }

    .dashboard-shell .panel:hover,
    .dashboard-shell .mini-panel:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 34px rgba(20, 56, 99, .13);
    }

    .dashboard-shell .dashboard-header-slide {
        transform: scale(1.04);
        transition: opacity .8s ease, transform 7s ease;
    }

    .dashboard-shell .dashboard-header-slide.is-active {
        transform: scale(1);
    }

    @media (prefers-reduced-motion: reduce) {
        .dashboard-shell .sidebar::after,
        .dashboard-shell .dashboard-header::before,
        .dashboard-shell .dashboard-header::after {
            animation: none !important;
        }

        .dashboard-shell .stat-card:hover,
        .dashboard-shell .panel:hover,
        .dashboard-shell .mini-panel:hover,
        .dashboard-shell .dashboard-header:hover .dashboard-banner-copy {
            transform: none;
        }
    }

    @media (min-width: 901px) {
        .dashboard-shell .menu-toggle {
            display: none;
        }
    }

    @media (max-width: 1200px) {
        .dashboard-shell .main-panel {
            grid-template-columns: 1fr;
        }

        .dashboard-shell .dashboard-header,
        .dashboard-shell .stats-grid,
        .dashboard-shell .main-grid,
        .dashboard-shell .bottom-grid {
            grid-column: 1;
        }

        .dashboard-shell .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .dashboard-shell .bottom-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 900px) {
        .dashboard-shell {
            display: block;
        }

        .dashboard-shell .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 40;
            width: min(82vw, 290px);
            max-width: 290px;
            min-height: 100vh;
            transform: translateX(-110%);
            transition: transform .25s ease;
        }

        .dashboard-shell .sidebar.is-open {
            transform: translateX(0);
        }

        .dashboard-shell .main-panel {
            width: 100%;
            padding: 14px 14px 24px;
        }

        .dashboard-shell .topbar {
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px 12px;
        }

        .dashboard-shell .menu-toggle {
            display: grid;
            order: 1;
        }

        .dashboard-shell .search-box {
            order: 2;
            flex: 1 1 100%;
            max-width: none;
        }

        .dashboard-shell .topbar-right {
            order: 3;
            width: 100%;
            justify-content: space-between;
            gap: 8px;
        }

        .dashboard-shell .profile-box .profile-name {
            display: none;
        }

        .dashboard-shell .dashboard-header {
            min-height: 180px;
            width: 100%;
            margin-left: 0;
            padding: 22px 18px;
        }

        .dashboard-shell .stats-grid,
        .dashboard-shell .bottom-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .dashboard-shell .main-grid {
            grid-template-columns: 1fr;
        }

        .sidebar-backdrop {
            display: block;
            position: fixed;
            inset: 0;
            z-index: 30;
            border: 0;
            background: rgba(11, 31, 48, .42);
            opacity: 0;
            pointer-events: none;
            transition: opacity .25s ease;
        }

        .sidebar-backdrop.is-visible {
            opacity: 1;
            pointer-events: auto;
        }

        body.sidebar-open {
            overflow: hidden;
        }
    }

    @media (max-width: 600px) {
        .dashboard-shell .topbar {
            align-items: center;
        }

        .dashboard-shell .topbar-right {
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .dashboard-shell .search-box {
            padding: 10px 12px;
        }

        .dashboard-shell .dashboard-welcome {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .dashboard-shell .dashboard-welcome .date-box {
            text-align: left;
            width: 100%;
        }

        .dashboard-shell .stats-grid,
        .dashboard-shell .bottom-grid,
        .dashboard-shell .main-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-shell .dashboard-header {
            min-height: 170px;
            padding: 20px 18px;
        }

        .dashboard-shell .dashboard-header .welcome-text strong {
            font-size: 22px;
        }

        .dashboard-shell .map-card {
            min-height: 220px;
        }

        .dashboard-shell .hotel-item {
            grid-template-columns: 40px 1fr;
        }

        .dashboard-shell .hotel-item .status-badge {
            grid-column: 2;
            justify-self: start;
            margin-top: 6px;
        }

        .dashboard-shell .lapor-banner {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .dashboard-shell .lapor-banner-copy {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        const dashboardShell = document.querySelector('.dashboard-shell');
        const sidebarBackdrop = document.querySelector('.sidebar-backdrop');
        const sidebarLinks = Array.from(document.querySelectorAll('.sidebar .nav-link'));
        const searchInput = document.querySelector('.search-box input');
        const searchableSections = Array.from(document.querySelectorAll('.nav-link, .stat-card, .panel, .mini-panel'));
        const searchEmptyState = document.querySelector('#dashboard-search-empty');
        const popoverButtons = Array.from(document.querySelectorAll('[data-popover-target]'));
        const popovers = Array.from(document.querySelectorAll('.dashboard-popover'));
        const compactMode = document.querySelector('#compact-mode');
        const themeToggle = document.querySelector('#dashboard-theme-toggle');
        const dashboardDate = document.querySelector('#dashboard-date');
        const dashboardTime = document.querySelector('#dashboard-time');
        const sidebarSectionToggles = Array.from(document.querySelectorAll('[data-sidebar-section]'));
        const dashboardSlides = Array.from(document.querySelectorAll('.dashboard-header-slide'));
        const dashboardDots = Array.from(document.querySelectorAll('.dashboard-header-dots button'));
        let activeDashboardSlide = 0;

        const applyDashboardTheme = function (theme) {
            const isDark = theme === 'dark';
            document.body.classList.toggle('dark-dashboard', isDark);
            themeToggle.setAttribute('aria-pressed', String(isDark));
            themeToggle.setAttribute('aria-label', isDark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap');
            themeToggle.querySelector('.control-symbol').textContent = isDark ? '☾' : '☀';
            localStorage.setItem('dashboard-theme', theme);
        };

        applyDashboardTheme(localStorage.getItem('dashboard-theme') || 'light');
        themeToggle.addEventListener('click', function () {
            applyDashboardTheme(document.body.classList.contains('dark-dashboard') ? 'light' : 'dark');
        });

        const showDashboardSlide = function (index) {
            activeDashboardSlide = index;
            dashboardSlides.forEach(function (slide, slideIndex) {
                const isActive = slideIndex === activeDashboardSlide;
                slide.classList.toggle('is-active', isActive);
                slide.setAttribute('aria-hidden', String(!isActive));
            });
            dashboardDots.forEach(function (dot, dotIndex) {
                const isActive = dotIndex === activeDashboardSlide;
                dot.classList.toggle('is-active', isActive);
                dot.setAttribute('aria-current', String(isActive));
            });
        };

        dashboardDots.forEach(function (dot, dotIndex) {
            dot.addEventListener('click', function () { showDashboardSlide(dotIndex); });
        });

        if (dashboardSlides.length > 1) {
            window.setInterval(function () {
                showDashboardSlide((activeDashboardSlide + 1) % dashboardSlides.length);
            }, 5000);
        }

        sidebarSectionToggles.forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const section = document.querySelector('[data-sidebar-content="' + toggle.dataset.sidebarSection + '"]');
                const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                toggle.setAttribute('aria-expanded', String(!isExpanded));
                section.classList.toggle('is-collapsed', isExpanded);
            });
        });

        const updateDashboardClock = function () {
            const currentTime = new Date();
            dashboardDate.textContent = new Intl.DateTimeFormat('id-ID', {
                timeZone: 'Asia/Jakarta',
                weekday: 'long',
                day: '2-digit',
                month: 'long',
                year: 'numeric',
            }).format(currentTime);
            dashboardTime.textContent = new Intl.DateTimeFormat('id-ID', {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hourCycle: 'h23',
            }).format(currentTime) + ' WIB';
        };

        updateDashboardClock();
        window.setInterval(updateDashboardClock, 1000);

        const closePopovers = function () {
            popovers.forEach(function (popover) { popover.hidden = true; });
            popoverButtons.forEach(function (button) { button.setAttribute('aria-expanded', 'false'); });
        };

        const closeSidebar = function () {
            sidebar.classList.remove('is-open');
            dashboardShell.classList.remove('sidebar-collapsed');
            sidebarBackdrop.classList.remove('is-visible');
            sidebarBackdrop.hidden = true;
            document.body.classList.remove('sidebar-open');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Buka menu');
        };

        menuToggle?.addEventListener('click', function () {
            const isMobile = window.matchMedia('(max-width: 900px)').matches;
            let menuIsOpen;
            if (isMobile) {
                menuIsOpen = sidebar.classList.toggle('is-open');
                sidebarBackdrop.hidden = !menuIsOpen;
                sidebarBackdrop.classList.toggle('is-visible', menuIsOpen);
                document.body.classList.toggle('sidebar-open', menuIsOpen);
            } else {
                const isCollapsed = dashboardShell.classList.toggle('sidebar-collapsed');
                menuIsOpen = !isCollapsed;
                sidebarBackdrop.hidden = true;
                sidebarBackdrop.classList.remove('is-visible');
            }
            menuToggle.setAttribute('aria-expanded', String(menuIsOpen));
            menuToggle.setAttribute('aria-label', menuIsOpen ? 'Tutup menu' : 'Buka menu');
        });

        sidebarBackdrop?.addEventListener('click', closeSidebar);
        sidebarLinks.forEach(function (link) { link.addEventListener('click', closeSidebar); });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && sidebar.classList.contains('is-open')) closeSidebar();
        });

        searchInput?.addEventListener('input', function () {
            const term = this.value.trim().toLocaleLowerCase('id-ID');
            let visibleCount = 0;

            searchableSections.forEach(function (section) {
                const matches = term === '' || section.textContent.toLocaleLowerCase('id-ID').includes(term);
                section.classList.toggle('dashboard-hidden', !matches);
                if (matches) visibleCount += 1;
            });

            searchEmptyState.hidden = term === '' || visibleCount > 0;
        });

        searchInput?.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                this.value = '';
                this.dispatchEvent(new Event('input'));
                this.focus();
            }
        });

        popoverButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const popover = document.getElementById(button.dataset.popoverTarget);
                const wasHidden = popover.hidden;
                closePopovers();
                popover.hidden = !wasHidden;
                button.setAttribute('aria-expanded', String(wasHidden));
            });
        });

        document.querySelectorAll('[data-close-popover]').forEach(function (button) {
            button.addEventListener('click', closePopovers);
        });

        compactMode.checked = localStorage.getItem('dashboard-compact') === 'true';
        document.body.classList.toggle('compact-dashboard', compactMode.checked);
        compactMode.addEventListener('change', function () {
            document.body.classList.toggle('compact-dashboard', this.checked);
            localStorage.setItem('dashboard-compact', String(this.checked));
        });
    });
</script>
@endsection
