@extends('layouts.app')

@section('content')
<div class="hotel-public-page">
    <header class="hotel-public-nav">
        <nav class="hotel-top-sidebar" aria-label="Menu utama sistem">
            <div class="hotel-top-sidebar-inner">
                <a href="{{ route('dashboard') }}" class="hotel-top-menu">Beranda</a>
                <a href="{{ route('hotel.index') }}" class="hotel-top-menu hotel-top-menu-active">Hotel</a>
                <a href="{{ route('profile') }}" class="hotel-top-menu">Profil</a>
                <a href="{{ route('publikasi.index', ['kind' => 'newsletter']) }}" class="hotel-top-menu">Berita dan Pengumuman</a>
                <a href="{{ route('faq.index') }}" class="hotel-top-menu">FAQ</a>
                <a href="{{ route('peta.index') }}" class="hotel-top-menu">Peta Lokasi</a>
            </div>
        </nav>
    </header>

    <section class="hotel-hero">
        <span class="hotel-home-hero-overlay" aria-hidden="true"></span>
        <div class="hotel-hero-copy">
            <span class="hotel-kicker">Bersama Membangun Daerah</span>
            <h1>Pajak Hotel<br><em>Untuk Pembangunan<br>Kota Padangsidimpuan</em></h1>
            <p>Bayar pajak hotel tepat waktu, wujudkan pelayanan publik yang lebih baik dan pembangunan daerah yang berkelanjutan.</p>
            <a href="{{ route('laporan.index') }}" class="hotel-primary-action">▣ &nbsp; Panduan Pembayaran Pajak <span>→</span></a>
        </div>
    </section>

    <main class="hotel-public-main">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="hotel-directory-block">
        <div class="hotel-directory-heading">
            <div><span class="hotel-section-label">DIREKTORI HOTEL</span><h2>{{ $status === 'aktif' ? 'Hotel Aktif' : ($status === 'nonaktif' ? 'Hotel Nonaktif' : 'Daftar Hotel Terdaftar') }}</h2></div>
            <div class="hotel-actions d-flex gap-2">
                @if($status)
                    <a href="{{ route('hotel.index') }}" class="btn btn-outline-secondary">Semua Hotel</a>
                @endif
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('hotel.create') }}" class="btn btn-primary">+ Tambah Hotel</a>
                    @endif
                @endauth
            </div>
        </div>
    <div class="hotel-summary-grid mb-4">
        <a href="{{ route('hotel.index') }}" class="hotel-summary-card summary-total">
            <span class="summary-total-slide summary-total-slide-1" aria-hidden="true"></span>
            <span class="summary-total-slide summary-total-slide-2" aria-hidden="true"></span>
            <span class="summary-total-slide summary-total-slide-3" aria-hidden="true"></span>
            <span class="summary-total-slide summary-total-slide-4" aria-hidden="true"></span>
            <span class="summary-total-slide summary-total-slide-5" aria-hidden="true"></span>
            <span>Total Hotel</span><strong>{{ number_format($hotelTotal, 0, ',', '.') }}</strong><small>Seluruh data</small>
        </a>
        <a href="{{ route('hotel.index', ['status' => 'aktif']) }}" class="hotel-summary-card summary-active">
            <span class="summary-active-slide summary-active-slide-1" aria-hidden="true"></span>
            <span class="summary-active-slide summary-active-slide-2" aria-hidden="true"></span>
            <span class="summary-active-slide summary-active-slide-3" aria-hidden="true"></span>
            <span class="summary-active-slide summary-active-slide-4" aria-hidden="true"></span>
            <span class="summary-active-slide summary-active-slide-5" aria-hidden="true"></span>
            <span>Hotel Aktif</span><strong>{{ number_format($hotelAktif, 0, ',', '.') }}</strong><small>Bisa beroperasi</small>
        </a>
        <a href="{{ route('hotel.index', ['status' => 'nonaktif']) }}" class="hotel-summary-card summary-inactive">
            <span>Hotel Nonaktif</span><strong>{{ number_format($hotelNonaktif, 0, ',', '.') }}</strong><small>Perlu diperiksa</small>
        </a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card hotel-table-card">
                <div class="card-body">
                    <form method="GET" action="{{ route('hotel.index') }}" class="hotel-search-form mb-3" id="hotel-search-form">
                        @if($status)
                            <input type="hidden" name="status" value="{{ $status }}">
                        @endif
                        <input type="search" name="q" value="{{ $search }}" class="form-control" id="hotel-search-input" placeholder="Cari nama atau alamat hotel..." aria-label="Cari hotel" autocomplete="off">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        @if($search)
                            <a href="{{ route('hotel.index', $status ? ['status' => $status] : []) }}" class="btn btn-outline-secondary">Reset</a>
                        @endif
                    </form>
                    <div class="table-responsive">
                        <table class="table hotel-table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Wajib Pajak</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($hotels as $item)
                                    <tr>
                                        <td class="hotel-number">{{ $hotels->firstItem() + $loop->index }}</td>
                                        <td class="hotel-name-cell">
                                            <a href="{{ route('hotel.show', $item) }}" class="hotel-name-link" aria-label="Buka detail {{ $item->nama }}">
                                                @if($item->foto)
                                                    <img src="{{ filter_var($item->foto, FILTER_VALIDATE_URL) ? $item->foto : asset('storage/' . $item->foto) }}" alt="Foto {{ $item->nama }}" class="hotel-list-photo">
                                                @else
                                                    <span class="hotel-list-photo hotel-list-placeholder" aria-label="Foto hotel belum tersedia">H</span>
                                                @endif
                                                <strong>{{ $item->nama }}</strong>
                                                <small>Data hotel · Buka detail</small>
                                            </a>
                                        </td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            <span class="tax-status {{ $item->wajib_pajak ? 'is-checked' : 'is-unchecked' }}">
                                                <span class="tax-checkmark">{{ $item->wajib_pajak ? '✓' : '−' }}</span>
                                                {{ $item->wajib_pajak ? 'Ya' : 'Tidak' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->status == 'aktif')
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="hotel-row-actions">
                                                <a href="{{ route('hotel.show', $item) }}" class="btn btn-sm btn-outline-primary">Detail</a>

                                                @auth
                                                    <a href="{{ route('hotel.edit', $item) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteHotelModal" data-delete-url="{{ route('hotel.destroy', $item) }}" data-hotel-name="{{ $item->nama }}">Hapus</button>
                                                @endauth
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="hotel-pagination-bar">
                        <div class="hotel-pagination-meta">
                            <span class="hotel-pagination-icon" aria-hidden="true">▦</span>
                            <span>Menampilkan <strong>{{ $hotels->firstItem() ?? 0 }}–{{ $hotels->lastItem() ?? 0 }}</strong> dari <strong>{{ $hotels->total() }}</strong> hotel</span>
                        </div>
                        <div class="hotel-pagination" aria-label="Navigasi halaman hotel">
                            {{ $hotels->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                    <footer class="hotel-public-footer"><strong class="hotel-footer-brand"><span>BPKPD</span><small>PADANGSIDIMPUAN</small></strong><small>© {{ date('Y') }} Pemerintah Kota Padangsidimpuan. All rights reserved.</small><span>⌖ 88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara,<br>Kota Padang Sidempuan, Sumatera Utara 22733</span></footer>
                </div>
            </div>
        </div>
    </div>
    </section>
    </main>
</div>

@auth
    <div class="modal fade" id="deleteHotelModal" tabindex="-1" aria-labelledby="deleteHotelModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content hotel-delete-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteHotelModalLabel">Hapus Hotel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-1">Anda akan menghapus data hotel:</p>
                        <strong id="deleteHotelName"></strong>
                        <p class="hotel-delete-warning mb-0">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <form method="POST" id="deleteHotelForm">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya, Hapus Hotel</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script>
        const deleteHotelModal = document.getElementById('deleteHotelModal');
        const deleteHotelForm = document.getElementById('deleteHotelForm');

        if (deleteHotelModal && deleteHotelForm) {
            deleteHotelModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                deleteHotelForm.action = button.getAttribute('data-delete-url');
                document.getElementById('deleteHotelName').textContent = button.getAttribute('data-hotel-name');
            });

            deleteHotelForm.addEventListener('submit', function (event) {
                const hotelName = document.getElementById('deleteHotelName').textContent.trim();
                const confirmed = window.confirm('Apakah Anda yakin ingin menghapus hotel ' + hotelName + '? Data yang sudah dihapus tidak dapat dikembalikan.');

                if (!confirmed) {
                    event.preventDefault();
                }
            });
        }
    </script>
@endauth

<style>
    .hotel-hero { position: relative; isolation: isolate; overflow: hidden; background: #123f59 url('https://cdn.phototourl.com/member/2026-09-12-2a1e9be2-995f-427b-97f7-ab2b27507f1d.jpg') center/cover no-repeat; }
    .hotel-hero-copy { position: relative; z-index: 2; }
    .hotel-home-hero-overlay { position: absolute; inset: 0; display: block; }
    .hotel-home-hero-overlay { z-index: -1; background: linear-gradient(90deg, rgba(3,39,78,.94) 0%, rgba(3,67,105,.68) 45%, rgba(8,102,96,.26) 100%), linear-gradient(135deg, rgba(8,127,120,.2), rgba(213,154,32,.12)); }
    .hotel-public-page { display: flex; flex-direction: column; min-height: 100vh; margin: -24px -28px -20px; overflow-x: clip; color: #173b62; background: #fff; }
    .hotel-public-nav, .hotel-hero-copy, .hotel-public-main, .hotel-public-footer { width: min(100% - 104px, 1180px); margin: auto; }
    .hotel-profile-menu { position: relative; display: flex; align-items: stretch; }.hotel-profile-menu > a { color: #2775b8; }.hotel-profile-chevron { margin-left: 5px; font-size: 14px; }.hotel-profile-submenu { position: absolute; z-index: 5; top: calc(100% - 1px); left: -12px; display: none; min-width: 190px; padding: 8px; border: 1px solid #dcebe8; border-radius: 8px; background: #fff; box-shadow: 0 12px 26px rgba(18,63,89,.14); }.hotel-profile-menu:hover .hotel-profile-submenu, .hotel-profile-menu:focus-within .hotel-profile-submenu { display: grid; gap: 2px; }.hotel-profile-submenu a { height: auto !important; padding: 9px 10px; color: #456277 !important; border: 0 !important; font-size: 11px; white-space: nowrap; }.hotel-profile-submenu a:hover { color: #087f78 !important; background: #eef8f3; }
    .hotel-public-nav { min-height: 84px; display: flex; align-items: center; justify-content: space-between; gap: 24px; padding-top: 12px; }
    .hotel-public-actions { display: flex; align-items: center; gap: 8px; margin-left: auto; }.hotel-public-login, .hotel-public-register, .hotel-public-theme { min-height: 34px; display: inline-flex; align-items: center; justify-content: center; border-radius: 7px; font-size: 11px; font-weight: 700; white-space: nowrap; }.hotel-public-login { padding: 0 13px; color: #087f78; border: 1px solid #b9ded4; background: rgba(255,255,255,.78); }.hotel-public-register { padding: 0 14px; color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 6px 14px rgba(8,127,120,.18); }.hotel-public-theme { gap: 6px; padding: 0 11px; color: #173b62; border: 1px solid #cfe3df; background: rgba(255,255,255,.78); cursor: pointer; }.hotel-public-theme span { color: #d59a20; font-size: 16px; }.hotel-public-login:hover, .hotel-public-theme:hover { color: #087f78; border-color: #087f78; }
    .hotel-top-sidebar { position: relative; z-index: 4; width: min(100% - 104px, 1180px); margin: 0 auto 14px; padding: 8px; border: 1px solid #cfe3df; border-radius: 14px; background: linear-gradient(100deg, rgba(239,250,247,.96), rgba(242,247,255,.96)); box-shadow: 0 10px 24px rgba(18,63,89,.08); }.hotel-top-sidebar-inner { display: flex; align-items: center; gap: 5px; }.hotel-top-menu, .hotel-top-group summary { display: inline-flex; align-items: center; gap: 8px; min-height: 36px; padding: 0 11px; border: 0; border-radius: 8px; color: #34556f; background: transparent; font-size: 11px; font-weight: 700; white-space: nowrap; cursor: pointer; transition: color .2s ease, background .2s ease, transform .2s ease; }.hotel-top-menu-icon { position: relative; display: inline-grid; place-items: center; width: 22px; height: 22px; border: 1px solid #b9ded4; border-radius: 6px; color: #087f78; background: rgba(255,255,255,.72); font-size: 10px; font-weight: 900; line-height: 1; }.hotel-top-menu-icon::before { content: attr(data-mark); }.icon-dashboard::before { content: 'D'; }.icon-hotel::before { content: 'H'; }.icon-map::before { content: 'M'; }.icon-report::before { content: 'L'; }.icon-center::before { content: 'P'; }.icon-pillar::before { content: 'P'; }.icon-media::before { content: 'N'; }.icon-settings::before { content: 'S'; }.hotel-top-menu:hover, .hotel-top-group summary:hover, .hotel-top-menu-active { color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 6px 14px rgba(8,127,120,.16); transform: translateY(-1px); }.hotel-top-menu:hover .hotel-top-menu-icon, .hotel-top-menu-active .hotel-top-menu-icon, .hotel-top-group summary:hover .hotel-top-menu-icon, .hotel-top-group[open] .hotel-top-menu-icon { color: #fff; border-color: rgba(255,255,255,.45); background: rgba(255,255,255,.16); }.hotel-top-group { position: relative; }.hotel-top-group summary { list-style: none; }.hotel-top-group summary::-webkit-details-marker { display: none; }.hotel-top-group summary b { margin-left: 3px; color: #087f78; font-size: 13px; }.hotel-top-group[open] summary { color: #fff; background: #1763a5; }.hotel-top-group[open] summary b { color: #f7c957; }.hotel-top-dropdown { position: absolute; top: calc(100% + 7px); left: 0; display: grid; min-width: 205px; padding: 8px; border: 1px solid #cfe3df; border-radius: 10px; background: #fff; box-shadow: 0 14px 26px rgba(18,63,89,.16); }.hotel-top-dropdown a { padding: 9px 10px; border-radius: 6px; color: #456277; font-size: 11px; font-weight: 600; white-space: nowrap; }.hotel-top-dropdown a:hover { color: #087f78; background: #eef8f3; }
    .hotel-top-sidebar { width: min(100% - 104px, 1180px); padding: 0; border: 0; border-radius: 0; background: #fff; box-shadow: 0 8px 22px rgba(18,63,89,.08); }.hotel-top-sidebar-inner { min-height: 58px; gap: 2px; padding: 0 8px; }.hotel-top-menu, .hotel-top-group summary { min-height: 58px; padding: 0 17px; border-radius: 0; color: #173b62; font-size: 12px; font-weight: 700; letter-spacing: .02em; }.hotel-top-menu:hover, .hotel-top-group summary:hover, .hotel-top-menu-active { color: #fff; background: #00b982; box-shadow: none; transform: none; }.hotel-top-group summary b { color: #00a875; }.hotel-top-group[open] summary { color: #fff; background: #00b982; }.hotel-top-group[open] summary b { color: #fff; }.hotel-top-dropdown { top: 58px; left: 0; min-width: 280px; padding: 20px 0 14px; border: 0; border-radius: 0 0 3px 3px; background: #fff; box-shadow: 0 12px 24px rgba(18,63,89,.16); }.hotel-top-dropdown a { padding: 10px 28px; border-radius: 0; color: #4e4e4e; font-size: 15px; font-weight: 600; }.hotel-top-dropdown a:hover { color: #00a875; background: #f1fbf7; }.hotel-top-search { display: inline-grid; place-items: center; min-width: 52px; min-height: 58px; margin-left: auto; color: #173b62; font-size: 27px; line-height: 1; }.hotel-top-search:hover { color: #00a875; background: #f1fbf7; }
    .hotel-public-nav > .hotel-top-sidebar { width: auto; flex: 1 1 auto; min-width: 0; margin: 0; box-shadow: none; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-sidebar-inner { padding-left: 0; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-menu, .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary { padding-left: 13px; padding-right: 13px; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-search { min-width: 42px; }
    .hotel-public-nav > .hotel-top-sidebar { background: linear-gradient(110deg, #112d4d, #174b83); box-shadow: 0 8px 18px rgba(13,35,60,.2); }.hotel-public-nav > .hotel-top-sidebar .hotel-top-sidebar-inner { padding: 0 6px; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-menu, .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary { color: #c7dcfa; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-menu:hover, .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary:hover, .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu-active, .hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary { color: #fff; background: linear-gradient(90deg, #2869d7, #174b9b); box-shadow: inset 0 -3px 0 #9bc7ff; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary b { color: #8fb9f1; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary b { color: #d7eaff; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-dropdown { border: 1px solid #315a84; background: #173957; box-shadow: 0 14px 26px rgba(4,19,44,.3); }.hotel-public-nav > .hotel-top-sidebar .hotel-top-dropdown a { color: #c7dcfa; }.hotel-public-nav > .hotel-top-sidebar .hotel-top-dropdown a:hover { color: #fff; background: rgba(75,145,236,.24); }
    .hotel-public-page.theme-dark { color: #e5f2f2; background: linear-gradient(135deg, #122b3c, #172d3b 52%, #172f32); }.hotel-public-page.theme-dark .hotel-nav-links a { color: #d7e7e9; }.hotel-public-page.theme-dark .hotel-nav-links a.is-active, .hotel-public-page.theme-dark .hotel-profile-menu > a { color: #8ce0d0; border-color: #8ce0d0; }.hotel-public-page.theme-dark .hotel-profile-submenu { border-color: #385866; background: #193542; }.hotel-public-page.theme-dark .hotel-profile-submenu a { color: #d7e7e9 !important; }.hotel-public-page.theme-dark .hotel-profile-submenu a:hover { color: #8ce0d0 !important; background: #234b55; }.hotel-public-page.theme-dark .hotel-top-sidebar { border-color: #385b63; background: linear-gradient(100deg, #183b43, #1b3445); }.hotel-public-page.theme-dark .hotel-top-menu, .hotel-public-page.theme-dark .hotel-top-group summary { color: #d7e7e9; }.hotel-public-page.theme-dark .hotel-top-menu:hover, .hotel-public-page.theme-dark .hotel-top-group summary:hover, .hotel-public-page.theme-dark .hotel-top-menu-active, .hotel-public-page.theme-dark .hotel-top-group[open] summary { color: #fff; }.hotel-public-page.theme-dark .hotel-top-dropdown { border-color: #385b63; background: #193542; }.hotel-public-page.theme-dark .hotel-top-dropdown a { color: #d7e7e9; }.hotel-public-page.theme-dark .hotel-top-dropdown a:hover { color: #8ce0d0; background: #234b55; }.theme-dark .hotel-public-login, .theme-dark .hotel-public-theme { color: #dff4f0; border-color: #4d777c; background: rgba(18,47,58,.82); }.theme-dark .hotel-public-theme:hover, .theme-dark .hotel-public-login:hover { color: #8ce0d0; border-color: #8ce0d0; }.theme-dark .hotel-public-main { color: #e5f2f2; }.theme-dark .hotel-directory-block { border-color: #385b63; background: linear-gradient(145deg, #183b43, #1b3445 52%, #423a27); }.theme-dark .hotel-directory-heading h2, .theme-dark .hotel-pagination-meta strong { color: #f1f8f7; }.theme-dark .hotel-section-label { color: #8ce0d0; }.theme-dark .hotel-summary-card, .theme-dark .hotel-table-card { border-color: #385b63; }.theme-dark .summary-inactive { background: linear-gradient(135deg, #4a302d, #263844); }.theme-dark .hotel-table-card, .theme-dark .hotel-table tbody tr { background: #1b3744; }.theme-dark .hotel-search-form, .theme-dark .hotel-pagination-bar { border-color: #385b63; background: #203e49; }.theme-dark .hotel-search-form .form-control { color: #e5f2f2; border-color: #4d777c; background: #193542; }.theme-dark .hotel-table tbody td { color: #c7d9db; border-color: #385b63; }.theme-dark .hotel-table tbody tr:nth-child(n) { background: #1b3744; }.theme-dark .hotel-name-cell strong { color: #f1f8f7; }.theme-dark .hotel-name-cell small, .theme-dark .hotel-pagination-meta { color: #afc6c9; }.theme-dark .hotel-pagination .page-link { color: #8ce0d0; border-color: #4d777c; background: #193542; }.theme-dark .hotel-pagination .page-item.active .page-link { color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); }.theme-dark .hotel-public-footer { border-color: #385b63; }
    .hotel-brand { display: flex; align-items: center; gap: 10px; color: #173b62; white-space: nowrap; }.hotel-brand-mark { display: grid; place-items: center; width: 32px; height: 38px; border-radius: 8px 8px 12px 12px; color: #fff; background: linear-gradient(145deg, #4fae43, #12722e); font-size: 10px; font-weight: 800; }.hotel-brand strong, .hotel-brand small { display: block; }.hotel-brand strong { font-size: 15px; }.hotel-brand small { margin-top: 2px; color: #718196; font-size: 9px; }.hotel-nav-links { display: flex; align-self: stretch; align-items: center; gap: clamp(14px, 2.2vw, 30px); }.hotel-nav-links a { display: flex; align-items: center; height: 100%; color: #173b62; font-size: 11px; font-weight: 600; white-space: nowrap; }.hotel-nav-links a.is-active { color: #2775b8; border-bottom: 2px solid #2775b8; }.hotel-nav-links a span { margin-right: 5px; font-size: 16px; }.hotel-login-link { padding: 7px 14px; border: 1px solid #8da3ba; border-radius: 20px; color: #173b62; font-size: 11px; white-space: nowrap; }.hotel-login-link span { margin-right: 5px; }
    .hotel-hero { min-height: 292px; background: linear-gradient(90deg, rgba(3,57,116,.98) 0%, rgba(3,67,131,.82) 36%, rgba(3,67,131,.05) 74%), url('{{ asset('images/login-bg.jpg') }}') center/cover; }.hotel-hero-copy { padding: 34px 0; color: #fff; }.hotel-kicker { font-size: 12px; }.hotel-hero h1 { margin: 9px 0; font-size: clamp(28px, 3.8vw, 40px); line-height: 1.14; }.hotel-hero h1 em { color: #ffc338; font-style: normal; }.hotel-hero p { max-width: 390px; margin: 0 0 17px; color: rgba(255,255,255,.87); font-size: 12px; line-height: 1.45; }.hotel-primary-action { display: inline-flex; align-items: center; gap: 5px; padding: 11px 17px; border-radius: 22px; color: #173b62; background: #ffc338; font-size: 11px; font-weight: 800; }.hotel-primary-action span { margin-left: 5px; font-size: 18px; }.hotel-public-main { padding: 22px 0 34px; }.hotel-intro-grid { display: grid; grid-template-columns: 1fr 1.45fr 1fr; gap: 22px; align-items: stretch; padding: 20px 0 18px; }.hotel-city-photo { position: relative; min-height: 176px; overflow: hidden; border-radius: 5px; }.hotel-city-photo img { width: 100%; height: 100%; object-fit: cover; }.hotel-city-photo::after { position: absolute; inset: 45% 0 0; content: ''; background: linear-gradient(transparent, rgba(4,39,78,.85)); }.hotel-city-photo div { position: absolute; z-index: 1; bottom: 14px; left: 16px; color: #fff; }.hotel-city-photo strong, .hotel-city-photo small { display: block; }.hotel-city-photo strong { font-size: 11px; }.hotel-city-photo small { margin-top: 2px; color: #d5dfeb; font-size: 9px; }.hotel-about-copy { padding: 12px 0; }.hotel-section-label { color: #1763a5; font-size: 11px; font-weight: 800; letter-spacing: .08em; }.hotel-about-copy h2, .hotel-directory-heading h2 { margin: 7px 0 9px; color: #173b62; font-size: 18px; }.hotel-about-copy p { margin: 0; color: #617895; font-size: 11px; line-height: 1.7; }.hotel-about-copy ul { display: grid; gap: 8px; margin: 12px 0 0; padding: 0; list-style: none; color: #617895; font-size: 10px; }.hotel-about-copy li::before { content: '●'; margin-right: 9px; color: #0962ad; }.hotel-access-card { padding: 15px; border: 1px solid #dce6f0; border-radius: 6px; box-shadow: 0 5px 14px rgba(23,59,98,.06); }.hotel-access-icon { color: #1763a5; font-size: 22px; }.hotel-access-card h2 { display: inline; margin-left: 8px; color: #173b62; font-size: 16px; }.hotel-access-card p { margin: 7px 0 10px; color: #617895; font-size: 10px; }.hotel-access-button { display: flex; justify-content: space-between; padding: 9px 12px; border-radius: 4px; color: #fff; background: #0861ad; font-size: 10px; font-weight: 700; }.hotel-access-links { display: flex; justify-content: space-around; margin-top: 10px; }.hotel-access-links a { color: #0962ad; font-size: 9px; }.hotel-directory-block { border-top: 1px solid #e7edf3; padding-top: 22px; }.hotel-directory-heading { display: flex; justify-content: space-between; align-items: center; gap: 16px; }.hotel-add-button { padding: 9px 14px; border-radius: 4px; color: #fff; background: #0861ad; font-size: 11px; font-weight: 700; }
    .hotel-hero { background-image: linear-gradient(90deg, rgba(3,57,116,.18) 0%, rgba(3,67,131,.08) 36%, rgba(3,67,131,0) 74%), url('https://cdn.phototourl.com/member/2026-09-12-2a1e9be2-995f-427b-97f7-ab2b27507f1d.jpg'); background-position: center; background-size: cover; }
    .hotel-city-photo div { padding: 16px 18px; text-shadow: 0 2px 8px rgba(0,0,0,.55); }
    .hotel-city-photo div strong { color: #fff; font-size: 15px; font-weight: 800; letter-spacing: .01em; }
    .hotel-city-photo div small { display: block; margin-top: 6px; color: rgba(255,255,255,.95); font-size: 12px; font-weight: 600; line-height: 1.4; }
    .hotel-about-copy h2 { color: #123f59; font-weight: 800; letter-spacing: -.01em; text-shadow: 0 1px 0 rgba(255,255,255,.8); }
    .hotel-about-copy p, .hotel-about-copy li { color: #456277; font-weight: 500; }
    .hotel-summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .hotel-summary-card { position: relative; overflow: hidden; padding: 18px 20px; border: 1px solid rgba(220,236,229,.9); border-radius: 16px; color: #123f59; text-decoration: none; box-shadow: 0 10px 24px rgba(18, 63, 89, .07); transition: transform .2s ease, box-shadow .2s ease; }
    .hotel-summary-card:hover { color: #123f59; transform: translateY(-2px); box-shadow: 0 14px 26px rgba(18, 63, 89, .1); }
    .hotel-summary-card span, .hotel-summary-card strong, .hotel-summary-card small { display: block; }
    .hotel-summary-card span { font-size: 12px; font-weight: 700; }
    .hotel-summary-card strong { margin-top: 5px; font-size: 28px; }
    .hotel-summary-card small { margin-top: 3px; color: #6f7f8d; font-size: 11px; }
    .summary-total { position: relative; isolation: isolate; background: #edf8ff; border-top: 3px solid #4d9fd4; }
    .summary-total::after { position: absolute; z-index: -1; inset: 0; content: ''; background: linear-gradient(105deg, rgba(8,48,78,.7), rgba(8,48,78,.18)); }
    .summary-total > span:not(.summary-total-slide), .summary-total > strong, .summary-total > small { position: relative; z-index: 1; color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,.35); }
    .summary-total-slide { position: absolute; z-index: -2; inset: 0; opacity: 0; background-position: center; background-size: cover; animation: hotel-total-background 25s infinite; }
    .summary-total-slide-1 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-eebceb8f-5105-4c20-b582-c51f9f7b642c.jpg'); animation-delay: 0s; }
    .summary-total-slide-2 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-f52dfb8b-2116-4651-a166-90cc7f22badd.jpg'); animation-delay: 5s; }
    .summary-total-slide-3 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-3aba30df-0d3e-4411-ac0d-672b7a6d6a43.jpg'); animation-delay: 10s; }
    .summary-total-slide-4 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-65e2ab43-7e56-418a-85ec-6cc9912bcf79.jpg'); animation-delay: 15s; }
    .summary-total-slide-5 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-7825f5b8-3cd1-42bd-8cd1-05459d3df545.jpg'); animation-delay: 20s; }
    @keyframes hotel-total-background { 0%, 16% { opacity: 1; } 20%, 100% { opacity: 0; } }
    .summary-active { position: relative; isolation: isolate; background: #e8f8f1; border-top: 3px solid #087f78; }
    .summary-active::after { position: absolute; z-index: -1; inset: 0; content: ''; background: linear-gradient(105deg, rgba(4,68,54,.72), rgba(4,68,54,.18)); }
    .summary-active > span:not(.summary-active-slide), .summary-active > strong, .summary-active > small { position: relative; z-index: 1; color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,.35); }
    .summary-active-slide { position: absolute; z-index: -2; inset: 0; opacity: 0; background-position: center; background-size: cover; animation: hotel-active-background 25s infinite; }
    .summary-active-slide-1 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-a9306fe9-2896-44fe-8a9a-59cc585cf334.jpg'); animation-delay: 2.5s; }
    .summary-active-slide-2 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-8deb0854-a687-4766-99ec-8d513738adb9.jpg'); animation-delay: 7.5s; }
    .summary-active-slide-3 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-aedf566d-292b-4f94-ae04-d2ad220b2bbb.jpg'); animation-delay: 12.5s; }
    .summary-active-slide-4 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-2df9e0b4-2cee-456d-a8af-ad97f0ca5094.jpg'); animation-delay: 17.5s; }
    .summary-active-slide-5 { background-image: url('https://cdn.phototourl.com/member/2026-09-10-51961c09-984c-489b-b7ef-4e33b1ea5693.jpg'); animation-delay: 22.5s; }
    @keyframes hotel-active-background { 0%, 16% { opacity: 1; } 20%, 100% { opacity: 0; } }
    .summary-inactive { background: linear-gradient(135deg, #fff1eb, #fff); border-top: 3px solid #ef765d; }
    .hotel-directory-block { padding: 26px; border: 1px solid #dcebe8; border-radius: 22px; background: linear-gradient(145deg, #f7fcfb 0%, #eef7ff 52%, #fff8ed 100%); box-shadow: 0 18px 40px rgba(18,63,89,.08); }
    .hotel-intro-grid { grid-template-columns: minmax(220px, .9fr) 1.6fr; }
    .hotel-city-photo { grid-column: auto; width: auto; margin-left: 0; border-radius: 8px; box-shadow: 0 16px 30px rgba(18,63,89,.16); }
    .hotel-city-photo div { left: 16px; }
    .hotel-about-copy { grid-column: auto; padding: 18px 24px; border-left: 5px solid #087f78; border-radius: 0 14px 14px 0; background: linear-gradient(110deg, #e7f8f2, #fff8e8); }
    .hotel-directory-heading h2 { margin-bottom: 0; color: #123f59; font-size: 25px; font-weight: 800; letter-spacing: -.02em; }
    .hotel-directory-heading h2::after { display: block; width: 48px; height: 4px; margin-top: 9px; border-radius: 4px; content: ''; background: linear-gradient(90deg, #087f78, #ffc338); }
    .hotel-summary-card { border-color: rgba(255,255,255,.9); box-shadow: 0 12px 24px rgba(18,63,89,.1); }
    .summary-total strong { color: #267db2; }
    .summary-active strong { color: #087f78; }
    .summary-inactive strong { color: #d7654e; }
    .hotel-table-card { overflow: hidden; border: 1px solid #e0ebe7; border-radius: 18px; box-shadow: 0 14px 30px rgba(18,63,89,.07); }
    .hotel-table-card .card-body { padding: 22px; }
    .hotel-search-form { display: flex; gap: 8px; padding: 10px; border: 1px solid #e2eee9; border-radius: 12px; background: #f7fbf9; }
    .hotel-search-form .form-control { min-width: 0; }
    .hotel-search-form .form-control:focus { border-color: #087f78; box-shadow: 0 0 0 .2rem rgba(8,127,120,.12); }
    .hotel-search-form .btn-primary { border-color: #087f78; background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 6px 14px rgba(8,127,120,.2); }
    .hotel-search-form .btn-primary:hover { border-color: #1763a5; background: linear-gradient(135deg, #1763a5, #087f78); }
    .hotel-table { margin-bottom: 0; border-collapse: separate; border-spacing: 0 10px; }
    .hotel-table thead th { padding: 12px; color: #fff; background: linear-gradient(100deg, #1763a5, #087f78); border-bottom: 0; font-size: 10px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; white-space: nowrap; }
    .hotel-table thead th:first-child { border-radius: 10px 0 0 10px; }
    .hotel-table thead th:last-child { border-radius: 0 10px 10px 0; }
    .hotel-table tbody tr { background: #fff; box-shadow: 0 5px 16px rgba(18,63,89,.06); transition: background .2s ease, transform .2s ease, box-shadow .2s ease; }
    .hotel-table tbody tr:hover { background: #f0faf6; box-shadow: 0 8px 20px rgba(18,63,89,.1); transform: translateY(-1px); }
    .hotel-table tbody td { padding: 12px; border-top: 1px solid #e8f0ed; border-bottom: 1px solid #e8f0ed; color: #52676a; font-size: 12px; line-height: 1.45; }
    .hotel-table tbody td:first-child { border-left: 1px solid #e8f0ed; border-radius: 12px 0 0 12px; }
    .hotel-table tbody td:last-child { border-right: 1px solid #e8f0ed; border-radius: 0 12px 12px 0; }
    .hotel-table tbody tr:nth-child(5n + 1) { border-left: 4px solid #087f78; background: linear-gradient(90deg, #effaf7, #fff 28%); }
    .hotel-table tbody tr:nth-child(5n + 2) { border-left: 4px solid #3d78c4; background: linear-gradient(90deg, #f1f6ff, #fff 28%); }
    .hotel-table tbody tr:nth-child(5n + 3) { border-left: 4px solid #e1a92e; background: linear-gradient(90deg, #fff9e9, #fff 28%); }
    .hotel-table tbody tr:nth-child(5n + 4) { border-left: 4px solid #d96b58; background: linear-gradient(90deg, #fff3ef, #fff 28%); }
    .hotel-table tbody tr:nth-child(5n + 5) { border-left: 4px solid #62a65d; background: linear-gradient(90deg, #f3faef, #fff 28%); }
    .hotel-table tbody tr:nth-child(5n + 1) .hotel-number { color: #087f78; }
    .hotel-table tbody tr:nth-child(5n + 2) .hotel-number { color: #3d78c4; }
    .hotel-table tbody tr:nth-child(5n + 3) .hotel-number { color: #bd8614; }
    .hotel-table tbody tr:nth-child(5n + 4) .hotel-number { color: #c05545; }
    .hotel-table tbody tr:nth-child(5n + 5) .hotel-number { color: #4a8b46; }
    .hotel-table tbody tr:hover { background: #eaf7f4; }
    .hotel-number { width: 54px; color: #087f78; font-weight: 800; }
    .hotel-pagination-bar { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 18px; margin-top: 22px; padding: 14px 16px; border: 1px solid #dcebe8; border-radius: 14px; background: linear-gradient(100deg, #f7fcfb, #f4f8ff); }
    .hotel-pagination-meta { display: flex; align-items: center; gap: 9px; color: #718293; font-size: 11px; white-space: nowrap; }
    .hotel-pagination-meta strong { color: #123f59; font-weight: 800; }
    .hotel-pagination-icon { display: grid; place-items: center; width: 30px; height: 30px; border-radius: 9px; color: #087f78; background: #dff4ed; font-size: 16px; }
    .hotel-pagination { display: flex; grid-column: 2; justify-content: center; }
    .hotel-pagination nav { display: flex; justify-content: center; }
    .hotel-pagination .pagination { flex-wrap: wrap; justify-content: center; margin: 0; gap: 5px; }
    .hotel-pagination .page-item { margin: 0; }
    .hotel-pagination .page-link { display: grid; place-items: center; min-width: 36px; height: 36px; padding: 7px 10px; border: 1px solid #d6e7e2; border-radius: 9px !important; color: #087f78; background: #fff; font-size: 12px; font-weight: 700; text-align: center; transition: color .2s ease, background .2s ease, border-color .2s ease, transform .2s ease; }
    .hotel-pagination .page-link:hover { z-index: 1; border-color: #087f78; color: #087f78; background: #e9f8f3; transform: translateY(-1px); }
    .hotel-pagination .page-item.active .page-link { border-color: #087f78; color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 5px 12px rgba(8,127,120,.2); }
    .hotel-pagination .page-item.disabled .page-link { color: #a9b8b5; background: #f1f6f4; }
    .hotel-pagination .page-item.disabled .page-link:hover { transform: none; }
    .hotel-name-cell strong, .hotel-name-cell small { display: block; }
    .hotel-name-cell { min-width: 250px; }
    .hotel-list-photo { float: left; display: inline-grid; place-items: center; width: 66px; height: 58px; margin: 0 12px 0 0; object-fit: cover; border: 3px solid #fff; border-radius: 10px; background: linear-gradient(135deg, #d9f4ed, #fff0bf); box-shadow: 0 5px 12px rgba(18,63,89,.13); color: #087f78; font-size: 25px; }
    .hotel-row-actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
    .hotel-row-actions .btn { min-height: 32px; border-radius: 8px; font-size: 12px; font-weight: 700; }
    .hotel-row-actions form { display: inline-block; }
    .hotel-delete-modal { border: 0; border-radius: 18px; box-shadow: 0 18px 42px rgba(18,63,89,.2); }
    .hotel-delete-modal .modal-header { border-bottom: 1px solid #e8efed; }
    .hotel-delete-modal .modal-title { color: #123f59; font-weight: 800; }
    .hotel-delete-modal .modal-body { color: #5d7385; line-height: 1.7; }
    .hotel-delete-modal #deleteHotelName { display: block; margin: 4px 0 12px; color: #123f59; font-size: 18px; }
    .hotel-delete-warning { padding: 10px 12px; border-radius: 9px; color: #a04e3e; background: #fff1ed; font-size: 12px; }
    .tax-status { display: inline-flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 700; }
    .tax-checkmark { display: inline-grid; place-items: center; width: 22px; height: 22px; border-radius: 6px; font-size: 14px; }
    .tax-status.is-checked { color: #16815f; }.tax-status.is-checked .tax-checkmark { background: #d9f4e8; box-shadow: 0 0 0 4px rgba(22,129,95,.08); }.tax-status.is-unchecked { color: #8a6b62; }.tax-status.is-unchecked .tax-checkmark { background: #f5e7e2; }
    .hotel-name-link { display: block; min-height: 58px; color: inherit; text-decoration: none; }
    .hotel-name-link:hover strong { color: #087f78; }
    .hotel-name-cell strong { padding-top: 4px; color: #123f59; font-size: 13px; font-weight: 800; transition: color .2s ease; }
    .hotel-name-cell small { margin-top: 4px; color: #7b8b8d; font-size: 10px; }
    .hotel-table tbody tr:nth-child(even) { background: #fff; }
    .hotel-table .badge.bg-success { background-color: #087f78 !important; }
    .hotel-table .badge.bg-danger { background-color: #d7654e !important; }
    .hotel-public-main { flex: 1; }
    .hotel-public-footer { width: 100%; min-height: 76px; margin: 28px 0 0; padding: 0 52px; display: flex; align-items: center; gap: 18px; overflow: hidden; border-radius: 0; color: #fff; background: linear-gradient(105deg, #103c69, #14547c 58%, #087f78); font-size: 11px; }.hotel-footer-brand { display: flex; flex-direction: column; gap: 4px; min-width: 190px; line-height: 1; letter-spacing: .08em; }.hotel-footer-brand span { color: #fff; font-size: 16px; font-weight: 900; }.hotel-footer-brand small { margin: 0; color: #d8f5ed; font-size: 10px; font-weight: 800; letter-spacing: .16em; text-align: left; }.hotel-public-footer > small { flex: 1; margin-left: auto; color: #d0e3ee; font-size: 10px; text-align: center; }.hotel-public-footer > span:last-child { margin-right: 0; color: #e1edf4; font-size: 10px; line-height: 1.5; text-align: right; }.hotel-public-footer .hotel-brand-mark { flex: 0 0 32px; }.hotel-public-footer strong { font-size: 12px; }
    @media (max-width: 1100px) { .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu, .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary { padding-left: 8px; padding-right: 8px; font-size: 10px; }.hotel-public-actions { gap: 5px; }.hotel-public-login, .hotel-public-register, .hotel-public-theme { padding-left: 9px; padding-right: 9px; } }
    @media (max-width: 900px) { .hotel-public-nav, .hotel-hero-copy, .hotel-public-main, .hotel-public-footer, .hotel-top-sidebar { width: min(100% - 40px, 720px); }.hotel-public-nav { flex-wrap: wrap; }.hotel-top-sidebar-inner { flex-wrap: wrap; }.hotel-public-nav > .hotel-top-sidebar { flex-basis: 100%; order: 2; }.hotel-public-actions { order: 1; margin-left: auto; }.hotel-intro-grid { grid-template-columns: 1fr 1.4fr; }.hotel-access-card { grid-column: 1 / -1; }.hotel-city-photo { min-height: 210px; } }
    @media (max-width: 640px) { .hotel-public-page { margin: -24px -12px -20px; }.hotel-public-nav, .hotel-hero-copy, .hotel-public-main, .hotel-top-sidebar { width: calc(100% - 28px); }.hotel-top-sidebar-inner { display: grid; grid-template-columns: repeat(2, 1fr); }.hotel-top-menu, .hotel-top-group summary { justify-content: center; }.hotel-top-group { min-width: 0; }.hotel-top-dropdown { right: 0; left: auto; }.hotel-public-actions { width: 100%; justify-content: flex-start; margin-left: 0; }.hotel-public-nav { align-items: flex-start; flex-wrap: wrap; padding: 12px 0; }.hotel-public-footer { width: 100%; min-height: 118px; padding: 16px 20px; gap: 8px; }.hotel-login-link { padding: 7px 9px; }.hotel-hero { min-height: 350px; }.hotel-hero-copy { padding-top: 42px; }.hotel-intro-grid { grid-template-columns: 1fr; }.hotel-city-photo { width: 100%; min-height: 180px; margin-left: 0; }.hotel-city-photo div { left: 14px; }.hotel-about-copy { padding: 16px; }.hotel-directory-heading { align-items: flex-start; flex-direction: column; }.hotel-summary-grid { grid-template-columns: 1fr; }.hotel-search-form { flex-wrap: wrap; }.hotel-search-form .form-control { flex-basis: 100%; }.hotel-table-card .card-body { padding: 12px; }.hotel-table thead th, .hotel-table tbody td { padding: 11px 9px; }.hotel-list-photo { width: 58px; height: 52px; margin-right: 9px; }.hotel-pagination-bar { grid-template-columns: 1fr; justify-items: center; gap: 12px; }.hotel-pagination-meta, .hotel-pagination { grid-column: 1; }.hotel-public-footer { flex-wrap: wrap; }.hotel-footer-brand { min-width: 145px; }.hotel-footer-brand span { font-size: 14px; }.hotel-footer-brand small { font-size: 9px; }.hotel-public-footer > small { flex-basis: 100%; order: 3; margin: 3px 0 0; text-align: left; }.hotel-public-footer > span:last-child { margin-left: auto; font-size: 9px; } }
</style>
<style>
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar { align-self: stretch; background: #fff; border: 1px solid #e6eeec; border-left: 0; border-radius: 0 12px 12px 0; box-shadow: 0 10px 24px rgba(18,63,89,.08); }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-sidebar-inner { padding-left: 0; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar { align-self: center; border: 0; border-radius: 0; box-shadow: none; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-sidebar-inner { min-height: 34px; gap: 8px; padding: 0; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary { min-height: 34px; padding: 0 12px; border: 1px solid #cfe3df; border-radius: 7px; background: #fff; color: #087f78; font-size: 11px; letter-spacing: 0; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu:hover, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary:hover, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu-active, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary { border-color: transparent; color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 6px 14px rgba(8,127,120,.18); transform: translateY(-1px); }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-dropdown { top: 41px; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu:hover, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary:hover, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu-active, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary { background: linear-gradient(135deg, #087f78, #1763a5); box-shadow: 0 6px 14px rgba(8,127,120,.18); }
    .hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar { align-self: center; background: transparent; box-shadow: none; }.hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-sidebar-inner { min-height: 34px; gap: 8px; padding: 0; }.hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu, .hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary { min-height: 34px; padding: 0 12px; border: 1px solid #4d777c; border-radius: 7px; background: #1b3744; color: #dff4f0; font-size: 11px; }.hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu:hover, .hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary:hover, .hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu-active, .hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary { border-color: transparent; color: #fff; background: linear-gradient(135deg, #087f78, #1763a5); }.hotel-public-page.theme-dark .hotel-public-nav > .hotel-top-sidebar .hotel-top-dropdown { top: 41px; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary { color: #173b62; transition: color .2s ease, background .2s ease, box-shadow .2s ease, transform .2s ease; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu:hover, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary:hover, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu-active, .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary { color: #fff; background: linear-gradient(135deg, #00b982, #087f78); box-shadow: 0 7px 16px rgba(0,185,130,.2); transform: translateY(-2px); }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu:not(.hotel-top-menu-active):hover { animation: hotel-sidebar-pulse .35s ease-out; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group summary b { color: #00a875; }.hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-group[open] summary b { color: #fff; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-dropdown { animation: hotel-sidebar-dropdown .2s ease-out; }
    .hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-search { color: #173b62; transition: color .2s ease, background .2s ease, transform .2s ease; }.hotel-public-page:not(.theme-dark) .hotel-public-nav > .hotel-top-sidebar .hotel-top-search:hover { color: #00a875; background: #f1fbf7; transform: scale(1.08); }
    @keyframes hotel-sidebar-dropdown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes hotel-sidebar-pulse { 0% { transform: translateY(0); } 55% { transform: translateY(-3px); } 100% { transform: translateY(-2px); } }
</style>
<style>
    .hotel-public-page { --hotel-ink: #173b62; --hotel-deep: #123f59; --hotel-muted: #526d88; --hotel-teal: #087f78; --hotel-blue: #1763a5; --hotel-gold: #d59a20; }
    .hotel-public-page .hotel-public-actions a, .hotel-public-page .hotel-public-theme { font-size: 12px; }
    .hotel-public-page .hotel-hero-copy { padding-top: 46px; }.hotel-public-page .hotel-kicker { color: #f7c957; font-size: 13px; font-weight: 800; letter-spacing: .04em; }.hotel-public-page .hotel-hero h1 { color: #fff; font-size: clamp(31px, 4vw, 44px); font-weight: 800; line-height: 1.16; }.hotel-public-page .hotel-hero p { max-width: 470px; color: rgba(255,255,255,.92); font-size: 14px; line-height: 1.65; }.hotel-public-page .hotel-primary-action { font-size: 12px; }
    .hotel-public-page .hotel-directory-heading h2 { color: var(--hotel-deep); font-size: 27px; line-height: 1.25; }.hotel-public-page .hotel-section-label { color: var(--hotel-blue); font-size: 12px; }.hotel-public-page .hotel-summary-card span { font-size: 13px; }.hotel-public-page .hotel-summary-card strong { font-size: 30px; }.hotel-public-page .hotel-summary-card small { font-size: 12px; }
    .hotel-public-page .hotel-search-form .form-control { color: var(--hotel-ink); font-size: 14px; }.hotel-public-page .hotel-search-form .form-control::placeholder { color: #718293; }.hotel-public-page .hotel-search-form .btn { font-size: 12px; font-weight: 700; }.hotel-public-page .hotel-table thead th { font-size: 11px; letter-spacing: .06em; }.hotel-public-page .hotel-table tbody td { color: #405d70; font-size: 13px; line-height: 1.55; }.hotel-public-page .hotel-name-cell strong { color: var(--hotel-deep); font-size: 14px; }.hotel-public-page .hotel-name-cell small { color: #657b88; font-size: 11px; }.hotel-public-page .tax-status { font-size: 13px; }.hotel-public-page .hotel-table .badge { font-size: 11px; }
    .hotel-public-page .hotel-pagination-meta { color: #5f7482; font-size: 12px; }.hotel-public-page .hotel-pagination-meta strong { color: var(--hotel-deep); }.hotel-public-page .hotel-pagination .page-link { font-size: 13px; }.hotel-public-page .hotel-public-footer { font-size: 11px; }.hotel-public-page .hotel-footer-brand span { font-size: 17px; }
    .hotel-public-page.theme-dark .hotel-directory-heading h2, .hotel-public-page.theme-dark .hotel-name-cell strong, .hotel-public-page.theme-dark .hotel-pagination-meta strong { color: #f1f8f7; }.hotel-public-page.theme-dark .hotel-table tbody td { color: #d0e0e2; }.hotel-public-page.theme-dark .hotel-name-cell small, .hotel-public-page.theme-dark .hotel-pagination-meta { color: #b5cbce; }.hotel-public-page.theme-dark .hotel-search-form .form-control { color: #e5f2f2; }.hotel-public-page.theme-dark .hotel-section-label { color: #8ce0d0; }
    @media (max-width: 640px) { .hotel-public-page .hotel-hero h1 { font-size: 30px; }.hotel-public-page .hotel-hero p { font-size: 13px; }.hotel-public-page .hotel-directory-heading h2 { font-size: 23px; }.hotel-public-page .hotel-table tbody td { font-size: 12px; }.hotel-public-page .hotel-name-cell strong { font-size: 13px; } }
    @media (max-width: 640px) {
        .hotel-public-page { margin: 0; }
        .hotel-public-nav, .hotel-top-sidebar { width: 100%; }
        .hotel-public-nav { margin: 0; padding: 0 10px; }
        .hotel-public-nav > .hotel-top-sidebar { width: 100%; }
        .hotel-public-nav > .hotel-top-sidebar .hotel-top-sidebar-inner { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 6px; padding: 8px 0; }
        .hotel-public-nav > .hotel-top-sidebar .hotel-top-menu { min-width: 0; min-height: 42px; padding: 0 6px; font-size: 11px; text-align: center; white-space: normal; }
        .hotel-hero-copy, .hotel-public-main { width: calc(100% - 28px); }
        .hotel-hero { min-height: 330px; }
        .hotel-hero-copy { padding: 34px 0; }
        .hotel-public-main { padding-top: 16px; }
        .hotel-directory-block { padding: 16px 12px; border-radius: 16px; }
        .hotel-table-card .card-body { padding: 10px; }
        .hotel-table { min-width: 650px; }
        .hotel-pagination-bar { padding: 12px; }
        .hotel-public-footer { width: 100%; padding: 18px 16px; }
    }
</style>
<style>
    .hotel-public-page {
        --hotel-premium-navy: #102f4b;
        --hotel-premium-blue: #1b587d;
        --hotel-premium-gold: #c79a42;
        --hotel-premium-line: #dbe3e8;
        background: #f4f6f8;
    }
    .hotel-public-page .hotel-public-nav {
        width: min(100% - 96px, 1240px);
        min-height: 74px;
        padding-top: 14px;
    }
    .hotel-public-page .hotel-top-sidebar {
        border-radius: 8px;
        background: var(--hotel-premium-navy);
        box-shadow: 0 12px 24px rgba(16,47,75,.14);
    }
    .hotel-public-page .hotel-top-sidebar-inner { min-height: 52px; }
    .hotel-public-page .hotel-top-menu,
    .hotel-public-page .hotel-top-group summary {
        min-height: 52px;
        color: #cbdbe6;
        letter-spacing: .025em;
    }
    .hotel-public-page .hotel-top-menu:hover,
    .hotel-public-page .hotel-top-group summary:hover,
    .hotel-public-page .hotel-top-menu-active,
    .hotel-public-page .hotel-top-group[open] summary {
        color: #fff;
        background: var(--hotel-premium-blue);
        box-shadow: inset 0 -3px 0 var(--hotel-premium-gold);
        transform: none;
    }
    .hotel-public-page .hotel-hero {
        min-height: 370px;
        background-image: linear-gradient(90deg, rgba(7,27,47,.95) 0%, rgba(16,58,86,.78) 48%, rgba(16,58,86,.12) 100%), url('https://cdn.phototourl.com/member/2026-09-12-2a1e9be2-995f-427b-97f7-ab2b27507f1d.jpg');
        background-position: center;
        background-size: cover;
    }
    .hotel-public-page .hotel-hero::after { position: absolute; inset: 16px; border: 1px solid rgba(255,255,255,.2); content: ''; pointer-events: none; }
    .hotel-public-page .hotel-hero-copy { padding-top: 62px; }
    .hotel-public-page .hotel-kicker { color: #e3bb68; letter-spacing: .16em; text-transform: uppercase; }
    .hotel-public-page .hotel-hero h1 { font-family: 'DM Sans', sans-serif; font-size: clamp(34px, 4vw, 50px); letter-spacing: -.045em; }
    .hotel-public-page .hotel-hero h1 em { color: #e3bb68; }
    .hotel-public-page .hotel-primary-action { border-radius: 6px; color: var(--hotel-premium-navy); background: #e3bb68; box-shadow: 0 10px 20px rgba(0,0,0,.18); }
    .hotel-public-page .hotel-public-main { width: min(100% - 96px, 1240px); padding-top: 32px; }
    .hotel-public-page .hotel-directory-block {
        padding: 30px;
        border: 1px solid var(--hotel-premium-line);
        border-radius: 10px;
        background: #f9fafb;
        box-shadow: 0 20px 44px rgba(16,47,75,.08);
    }
    .hotel-public-page .hotel-directory-heading { margin-bottom: 22px; }
    .hotel-public-page .hotel-directory-heading h2 { color: var(--hotel-premium-navy); font-family: 'DM Sans', sans-serif; letter-spacing: -.035em; }
    .hotel-public-page .hotel-section-label { display: inline-flex; align-items: center; gap: 10px; color: var(--hotel-premium-gold); letter-spacing: .16em; }
    .hotel-public-page .hotel-section-label::before { width: 26px; height: 2px; background: var(--hotel-premium-gold); content: ''; }
    .hotel-public-page .hotel-actions .btn { border-radius: 5px; font-weight: 700; }
    .hotel-public-page .hotel-actions .btn-primary { border-color: var(--hotel-premium-navy); background: var(--hotel-premium-navy); }
    .hotel-public-page .hotel-summary-grid { gap: 12px; }
    .hotel-public-page .hotel-summary-card { min-height: 118px; border: 1px solid var(--hotel-premium-line); border-top: 3px solid var(--hotel-premium-gold); border-radius: 7px; box-shadow: 0 8px 18px rgba(16,47,75,.06); }
    .hotel-public-page .summary-inactive { border-top-color: #a86f58; background: #fff; }
    .hotel-public-page .hotel-summary-card strong { font-family: 'DM Sans', sans-serif; }
    .hotel-public-page .hotel-table-card { border: 1px solid var(--hotel-premium-line); border-radius: 8px; box-shadow: 0 12px 26px rgba(16,47,75,.06); }
    .hotel-public-page .hotel-table-card .card-body { padding: 24px; }
    .hotel-public-page .hotel-search-form { border: 1px solid var(--hotel-premium-line); border-radius: 6px; background: #fff; }
    .hotel-public-page .hotel-search-form .btn-primary { border-color: var(--hotel-premium-navy); background: var(--hotel-premium-navy); box-shadow: none; }
    .hotel-public-page .hotel-table { border-spacing: 0 7px; }
    .hotel-public-page .hotel-table thead th { background: var(--hotel-premium-navy); border-radius: 0 !important; letter-spacing: .12em; }
    .hotel-public-page .hotel-table tbody tr { box-shadow: 0 4px 14px rgba(16,47,75,.045); }
    .hotel-public-page .hotel-table tbody td { border-color: #e5eaee; }
    .hotel-public-page .hotel-table tbody tr:nth-child(n) { border-left-color: var(--hotel-premium-blue); background: #fff; }
    .hotel-public-page .hotel-table tbody tr:hover { background: #f5f9fb; transform: none; }
    .hotel-public-page .hotel-list-photo { border-radius: 6px; border-color: #fff; box-shadow: 0 4px 10px rgba(16,47,75,.12); }
    .hotel-public-page .hotel-pagination-bar { border-radius: 6px; background: #fff; }
    .hotel-public-page .hotel-pagination .page-item.active .page-link { border-color: var(--hotel-premium-navy); background: var(--hotel-premium-navy); box-shadow: none; }
    .hotel-public-page .hotel-public-footer { background: var(--hotel-premium-navy); }
    .hotel-public-page .hotel-list-photo {
        width: 86px;
        height: 70px;
        margin-right: 14px;
        border: 2px solid #fff;
        border-radius: 7px;
        object-fit: cover;
        object-position: center;
        background: #edf2f5;
        box-shadow: 0 5px 12px rgba(16,47,75,.14);
    }
    @media (max-width: 640px) {
        .hotel-public-page .hotel-public-nav, .hotel-public-page .hotel-public-main { width: calc(100% - 28px); }
        .hotel-public-page .hotel-directory-block { padding: 18px 12px; }
        .hotel-public-page .hotel-table-card .card-body { padding: 12px; }
        .hotel-public-page .hotel-hero { min-height: 350px; }
        .hotel-public-page .hotel-hero-copy { padding-top: 48px; }
        .hotel-public-page .hotel-list-photo { width: 72px; height: 60px; margin-right: 10px; }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = Array.from(document.querySelectorAll('.hotel-hero-slide'));
        const dots = Array.from(document.querySelectorAll('.hotel-hero-dots button'));
        let activeSlide = 0;

        function showSlide(index) {
            activeSlide = index;
            slides.forEach(function (slide, slideIndex) {
                const isActive = slideIndex === activeSlide;
                slide.classList.toggle('is-active', isActive);
                slide.setAttribute('aria-hidden', String(!isActive));
            });
            dots.forEach(function (dot, dotIndex) {
                const isActive = dotIndex === activeSlide;
                dot.classList.toggle('is-active', isActive);
                dot.setAttribute('aria-current', String(isActive));
            });
        }

        dots.forEach(function (dot, dotIndex) {
            dot.addEventListener('click', function () {
                showSlide(dotIndex);
            });
        });

        if (slides.length > 1) {
            window.setInterval(function () {
                showSlide((activeSlide + 1) % slides.length);
            }, 5000);
        }

    });
</script>
@endsection
