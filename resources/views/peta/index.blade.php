@extends('layouts.app')

@section('content')
<div class="container-fluid tracking-page">
    <div class="tracking-heading">
        <div>
            <span class="tracking-eyebrow">PETA &amp; TRACKING</span>
            <h1>Jarak Hotel dari Kantor BEKAUDA</h1>
            <p class="text-muted mb-0">{{ $wilayah['alamat'] }}</p>
        </div>
        <div class="tracking-heading-actions">
            <button type="button" id="tracking-theme-toggle" class="tracking-theme-toggle" aria-label="Aktifkan mode gelap" aria-pressed="false"><span aria-hidden="true">☾</span><b>Mode gelap</b></button>
            <a href="{{ $wilayah['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">Buka titik asal ↗</a>
        </div>
    </div>

    <div class="tracking-toolbar">
        <button type="button" id="start-tracking" class="btn btn-primary">Perbarui rute hotel</button>
        <button type="button" id="clear-tracking" class="btn btn-outline-secondary">Hapus hasil</button>
        <span id="tracking-status" class="text-muted" role="status">Siap memproses {{ $hotels->count() }} hotel.</span>
    </div>

    <div class="tracking-layout">
        <aside class="tracking-list-panel">
            <div class="tracking-list-head">
                <div><span class="tracking-panel-kicker">DAFTAR TUJUAN</span><strong>Jarak dari Kantor BEKAUDA</strong></div>
                <span id="tracking-count">0/{{ $hotels->count() }}</span>
            </div>
            <div class="tracking-search-wrap">
                <input type="search" id="tracking-search" placeholder="Cari nama hotel atau alamat..." aria-label="Cari hotel atau alamat">
            </div>
            <div id="tracking-list" class="tracking-list">
                <div class="tracking-empty">Rute hotel akan tampil otomatis berdasarkan titik koordinat yang tersedia.</div>
            </div>
        </aside>
        <div id="map" class="tracking-map"></div>
    </div>
</div>

<style>
    .tracking-page {
        min-height: calc(100vh - 50px);
        padding: 28px 22px 24px;
        color: #18314f;
        background:
            radial-gradient(circle at top left, rgba(59, 130, 246, 0.42), transparent 20%),
            radial-gradient(circle at bottom left, rgba(16, 185, 129, 0.2), transparent 24%),
            radial-gradient(circle at top right, rgba(168, 85, 247, 0.28), transparent 22%),
            radial-gradient(circle at bottom right, rgba(251, 146, 60, 0.14), transparent 24%),
            linear-gradient(135deg, #eef9ff 0%, #eef2ff 18%, #fff7ed 46%, #f3f9ff 100%);
    }

    .tracking-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 18px;
        padding: 8px 6px;
    }

    .tracking-eyebrow,
    .tracking-panel-kicker {
        color: #6658ff;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .14em;
    }

    .tracking-heading h1 {
        margin: 8px 0 8px;
        color: #132b46;
        font-size: clamp(28px, 3vw, 38px);
        font-weight: 900;
        line-height: 1.15;
        letter-spacing: -0.04em;
    }

    .tracking-heading .text-muted,
    .tracking-toolbar .text-muted {
        color: #526780 !important;
        font-size: 12px;
    }

    .tracking-toolbar {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 18px;
        padding: 14px 16px;
        border: 1px solid rgba(122, 148, 202, 0.22);
        border-radius: 18px;
        background: linear-gradient(135deg, rgba(255,255,255,0.92), rgba(207, 234, 255, 0.92), rgba(255, 226, 196, 0.9), rgba(242, 230, 255, 0.9));
        box-shadow: 0 16px 28px rgba(32, 64, 116, 0.08);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .tracking-toolbar::after {
        content: "";
        position: absolute;
        inset: auto -10% -30% 35%;
        height: 120px;
        background: radial-gradient(circle, rgba(89, 149, 255, 0.18), transparent 62%);
        pointer-events: none;
    }

    .tracking-toolbar .btn {
        position: relative;
        border-radius: 14px;
        padding: 11px 18px;
        font-weight: 800;
        letter-spacing: .01em;
        transition: transform .2s ease, box-shadow .2s ease, filter .2s ease;
    }

    .tracking-toolbar .btn:hover {
        transform: translateY(-2px);
        filter: brightness(1.04);
    }

    .tracking-toolbar .btn:active {
        transform: translateY(0);
    }

    .tracking-toolbar .btn-primary {
        border: 0;
        color: #fff;
        background: linear-gradient(135deg, #1a73e8 0%, #4d9aff 30%, #7a5cff 70%, #b64bff 100%);
        box-shadow: 0 14px 24px rgba(93, 106, 255, 0.28);
    }

    .tracking-toolbar .btn-primary::before {
        content: "";
        position: absolute;
        inset: 1px 1px auto 1px;
        height: 40%;
        border-radius: 13px 13px 12px 12px;
        background: linear-gradient(180deg, rgba(255,255,255,.38), rgba(255,255,255,0));
    }

    .tracking-toolbar .btn-outline-secondary {
        border: 1px solid rgba(148, 163, 184, 0.45);
        background: linear-gradient(135deg, #fffaf3 0%, #ffe9d8 30%, #eef6ff 100%);
        color: #304d75;
        box-shadow: 0 8px 16px rgba(252, 156, 79, 0.1);
    }

    .tracking-heading .btn-outline-primary {
        border: 1px solid rgba(90, 126, 255, 0.35);
        background: linear-gradient(135deg, #eef4ff 0%, #e7f3ff 50%, #f8eaff 100%);
        color: #2f4ca8;
        border-radius: 14px;
        padding: 10px 16px;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(118, 121, 255, 0.12);
    }

    .tracking-heading .btn-outline-primary:hover {
        background: linear-gradient(135deg, #e8f1ff 0%, #dfeaff 50%, #f5edff 100%);
    }

    .tracking-layout {
        display: grid;
        grid-template-columns: minmax(290px, 360px) minmax(0, 1fr);
        min-height: 620px;
        overflow: hidden;
        border: 1px solid rgba(143, 163, 198, 0.25);
        border-radius: 22px;
        background: linear-gradient(135deg, rgba(255,255,255,0.82), rgba(214, 235, 255, 0.92), rgba(255, 222, 196, 0.84), rgba(236, 224, 255, 0.9));
        box-shadow: 0 18px 42px rgba(44, 77, 134, 0.12);
        backdrop-filter: blur(8px);
        position: relative;
    }

    .tracking-layout::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(111, 182, 255, 0.08), rgba(151, 117, 255, 0.05), rgba(255, 202, 116, 0.06));
        pointer-events: none;
    }

    .tracking-list-panel {
        min-width: 0;
        border-right: 1px solid rgba(143, 163, 198, 0.28);
        background: linear-gradient(180deg, rgba(228, 243, 255, 0.96), rgba(255, 235, 211, 0.9), rgba(236, 222, 255, 0.9), rgba(224, 247, 235, 0.85));
    }

    .tracking-list-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 18px 18px 16px;
        border-bottom: 1px solid rgba(143, 163, 198, 0.2);
        color: #18314f;
        background: linear-gradient(135deg, rgba(180, 222, 255, 0.96), rgba(209, 229, 255, 0.94), rgba(255, 230, 194, 0.96), rgba(234, 220, 255, 0.92));
        box-shadow: inset 0 -1px 0 rgba(255,255,255,0.4);
    }

    .tracking-list-head strong {
        display: block;
        margin-top: 5px;
        font-size: 13px;
        color: #12345d;
        letter-spacing: -0.02em;
    }

    .tracking-list-head > span {
        display: inline-flex;
        align-items: center;
        min-height: 30px;
        padding: 6px 12px;
        border-radius: 999px;
        background: linear-gradient(135deg, #5d96ff, #6f7af7, #8d6afc, #ff8a65);
        color: #fff;
        font-size: 11px;
        font-weight: 900;
        box-shadow: 0 8px 18px rgba(108, 116, 255, 0.24);
    }

    .tracking-search-wrap {
        padding: 14px 16px 12px;
        border-bottom: 1px solid rgba(143, 163, 198, 0.2);
        background: linear-gradient(180deg, rgba(255,255,255,0.6), rgba(234, 241, 255, 0.7));
    }

    .tracking-search-wrap input {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid rgba(132, 151, 185, 0.45);
        border-radius: 14px;
        outline: 0;
        color: #18314f;
        background: linear-gradient(180deg, #ffffff, #f0f7ff 42%, #fff7ef 100%);
        font-size: 12px;
        box-shadow: inset 0 1px 2px rgba(31,45,61,.05), 0 8px 18px rgba(129, 148, 200, 0.08);
    }

    .tracking-search-wrap input:focus {
        border-color: rgba(60, 118, 255, 0.8);
        box-shadow: 0 0 0 4px rgba(60,118,255,.12);
    }

    .tracking-list {
        max-height: 620px;
        overflow: auto;
        background: linear-gradient(180deg, rgba(255,255,255,0.18), rgba(231, 240, 255, 0.32));
    }

    .tracking-empty {
        padding: 24px 18px;
        color: #58718f;
        font-size: 13px;
        line-height: 1.7;
    }

    .tracking-item {
        display: grid;
        grid-template-columns: 52px minmax(0, 1fr) auto;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 12px 14px;
        border: 0;
        border-bottom: 1px solid rgba(143, 163, 198, 0.18);
        background: linear-gradient(135deg, rgba(255,255,255,0.85), rgba(220, 238, 255, 0.9), rgba(255, 237, 214, 0.9));
        color: #18314f;
        text-align: left;
        cursor: pointer;
        transition: background .2s ease, transform .2s ease, box-shadow .2s ease;
    }

    .tracking-item:hover,
    .tracking-item:focus {
        outline: 0;
        background: linear-gradient(135deg, rgba(184, 221, 255, 0.98), rgba(255, 230, 199, 0.96), rgba(234, 217, 255, 0.96));
        box-shadow: inset 0 0 0 1px rgba(110,143,255,0.2), 0 10px 18px rgba(106, 122, 255, 0.08);
    }

    .tracking-item-photo {
        width: 52px;
        height: 52px;
        overflow: hidden;
        border: 1px solid rgba(110, 140, 190, 0.25);
        border-radius: 14px;
        background: linear-gradient(135deg, #edf4ff, #dfe9ff);
        box-shadow: 0 8px 18px rgba(64, 89, 155, 0.08);
    }

    .tracking-item-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tracking-item-copy {
        min-width: 0;
    }

    .tracking-item-copy strong,
    .tracking-item-copy small {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .tracking-item-copy strong {
        font-size: 12px;
        line-height: 1.4;
        background: linear-gradient(135deg, #1c4c8d, #355dcb, #7a5cff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 900;
        text-shadow: 0 1px 0 rgba(255,255,255,0.4);
    }

    .tracking-item-copy small {
        margin-top: 4px;
        color: #4d6482;
        font-size: 10px;
        line-height: 1.45;
        white-space: normal;
    }

    .tracking-item > b {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 54px;
        padding: 6px 8px;
        border-radius: 999px;
        background: linear-gradient(135deg, #2a7fff, #7a5cff, #ff7f50);
        color: #fff;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
        box-shadow: 0 8px 16px rgba(122, 92, 255, 0.18);
    }

    .tracking-map {
        min-height: 610px;
        background:
            linear-gradient(180deg, rgba(162, 215, 255, 0.24), rgba(255,255,255,0.06)),
            linear-gradient(135deg, #d8f0ff 0%, #e7f4ff 26%, #ebfdf3 52%, #fff0df 75%, #f3ebff 100%);
        position: relative;
        border-left: 1px solid rgba(143, 163, 198, 0.2);
    }

    .tracking-popup {
        width: 238px;
        overflow: hidden;
        border: 1px solid rgba(150, 170, 211, 0.3);
        border-radius: 14px;
        background: linear-gradient(180deg, #ffffff, #f7faff);
        box-shadow: 0 16px 28px rgba(31,45,61,.12);
    }

    .tracking-popup-photo {
        display: block;
        width: 100%;
        height: 112px;
        object-fit: cover;
        background: linear-gradient(135deg, #edf4ff, #d8ebff);
    }

    .tracking-popup-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tracking-popup-content {
        padding: 12px 12px 14px;
        color: #4a5d79;
        font-size: 11px;
        line-height: 1.5;
    }

    .tracking-popup-title {
        display: block;
        margin-bottom: 5px;
        color: #14345a;
        font-size: 15px;
        font-weight: 800;
        line-height: 1.25;
    }

    .tracking-popup-distance {
        display: block;
        margin-top: 6px;
        color: #1a4ab3;
        font-size: 11px;
        font-weight: 800;
    }

    .tracking-popup-link {
        display: inline-block;
        margin-top: 8px;
        color: #2e70f3;
        font-size: 11px;
        font-weight: 800;
    }

    .leaflet-popup-content { margin: 0 !important; }
    .leaflet-popup-content-wrapper { padding: 0 !important; overflow: hidden; border-radius: 14px; }
    .bekauda-map-marker {
        display: grid;
        place-items: center;
        border: 3px solid #fff;
        border-radius: 50%;
        background: linear-gradient(180deg, #ff726b, #ff4f70 58%, #d93b68);
        box-shadow: 0 10px 20px rgba(217, 59, 104, 0.28);
        font-size: 18px;
    }

    .leaflet-tooltip.bekauda-map-marker-label {
        border: 0;
        color: #17314f;
        background: rgba(255,255,255,.92);
        font-size: 11px;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(31,45,61,.08);
        border-radius: 9px;
    }

    .leaflet-control-layers {
        border: 0 !important;
        border-radius: 14px !important;
        box-shadow: 0 12px 25px rgba(31,45,61,.12) !important;
    }

    .leaflet-control-zoom a {
        border: 0 !important;
        color: #23415d !important;
    }

    .leaflet-top.leaflet-left .leaflet-control-zoom {
        border-radius: 10px;
        overflow: hidden;
    }

    /* Premium map workspace */
    .tracking-page {
        --tracking-navy: #102f4b;
        --tracking-blue: #1b587d;
        --tracking-gold: #c79a42;
        --tracking-line: #d9e2e8;
        padding: 34px clamp(18px, 3vw, 52px) 40px;
        color: var(--tracking-navy);
        background-color: #f3f6f8;
        background-image: linear-gradient(rgba(16,47,75,.025) 1px, transparent 1px), linear-gradient(90deg, rgba(16,47,75,.025) 1px, transparent 1px);
        background-size: 34px 34px;
    }
    .tracking-heading { max-width: 1380px; margin: 0 auto 20px; padding: 0 4px 18px; border-bottom: 1px solid var(--tracking-line); }
    .tracking-eyebrow, .tracking-panel-kicker { color: var(--tracking-gold); letter-spacing: .18em; }
    .tracking-eyebrow { display: inline-flex; align-items: center; gap: 10px; }
    .tracking-eyebrow::before { width: 28px; height: 2px; background: var(--tracking-gold); content: ''; }
    .tracking-heading h1 { color: var(--tracking-navy); font-family: 'DM Sans', sans-serif; font-size: clamp(28px, 3vw, 42px); letter-spacing: -.045em; }
    .tracking-heading .text-muted, .tracking-toolbar .text-muted { color: #6d7e8a !important; }
    .tracking-heading .btn-outline-primary { border: 1px solid var(--tracking-navy); border-radius: 5px; color: var(--tracking-navy); background: #fff; box-shadow: none; }
    .tracking-heading .btn-outline-primary:hover { color: #fff; background: var(--tracking-navy); }
    .tracking-toolbar { max-width: 1380px; margin: 0 auto 20px; padding: 12px 14px; border: 1px solid var(--tracking-line); border-radius: 7px; background: #fff; box-shadow: 0 8px 18px rgba(16,47,75,.05); backdrop-filter: none; }
    .tracking-toolbar::after { display: none; }
    .tracking-toolbar .btn { border-radius: 5px; padding: 10px 15px; font-size: 12px; }
    .tracking-toolbar .btn-primary { border: 1px solid var(--tracking-navy); background: var(--tracking-navy); box-shadow: none; }
    .tracking-toolbar .btn-primary::before { display: none; }
    .tracking-toolbar .btn-outline-secondary { border: 1px solid #cbd6de; color: #536978; background: #fff; box-shadow: none; }
    .tracking-layout { max-width: 1380px; min-height: 660px; margin: 0 auto; border: 1px solid var(--tracking-line); border-radius: 10px; background: #fff; box-shadow: 0 18px 40px rgba(16,47,75,.1); backdrop-filter: none; }
    .tracking-layout::before { display: none; }
    .tracking-list-panel { border-right: 1px solid var(--tracking-line); background: #f8fafb; }
    .tracking-list-head { padding: 20px 18px 17px; border-bottom: 1px solid var(--tracking-line); color: var(--tracking-navy); background: #fff; box-shadow: none; }
    .tracking-list-head strong { color: var(--tracking-navy); font-size: 14px; }
    .tracking-list-head > span { min-height: 28px; padding: 5px 10px; border: 1px solid rgba(199,154,66,.35); border-radius: 5px; color: #76571d; background: #fbf4e5; box-shadow: none; }
    .tracking-search-wrap { padding: 14px 16px; border-bottom: 1px solid var(--tracking-line); background: #f8fafb; }
    .tracking-search-wrap input { padding: 11px 12px; border: 1px solid #cfdbe2; border-radius: 5px; color: var(--tracking-navy); background: #fff; box-shadow: none; }
    .tracking-search-wrap input:focus { border-color: var(--tracking-blue); box-shadow: 0 0 0 3px rgba(27,88,125,.11); }
    .tracking-list { max-height: 660px; background: #f8fafb; }
    .tracking-empty { padding: 28px 18px; color: #6d7e8a; }
    .tracking-item { grid-template-columns: 56px minmax(0, 1fr) auto; padding: 13px 14px; border-bottom: 1px solid #e4eaee; background: #f8fafb; color: var(--tracking-navy); transition: background .2s ease, box-shadow .2s ease; }
    .tracking-item:hover, .tracking-item:focus { background: #eef5f8; box-shadow: inset 3px 0 0 var(--tracking-gold); }
    .tracking-item-photo { width: 56px; height: 56px; border: 1px solid #d4e0e6; border-radius: 6px; background: #edf2f5; box-shadow: none; }
    .tracking-item-copy strong { color: var(--tracking-navy); background: none; -webkit-text-fill-color: initial; text-shadow: none; }
    .tracking-item-copy small { color: #71818d; }
    .tracking-item > b { min-width: 60px; border: 1px solid rgba(199,154,66,.35); border-radius: 5px; color: #76571d; background: #fbf4e5; box-shadow: none; }
    .tracking-map { min-height: 650px; border-left: 0; background: #e7eef1; }
    .tracking-popup { width: 250px; border: 1px solid #d7e1e7; border-radius: 7px; background: #fff; box-shadow: 0 14px 28px rgba(16,47,75,.16); }
    .tracking-popup-photo { height: 126px; background: #edf2f5; }
    .tracking-popup-content { padding: 13px 14px 15px; color: #647783; }
    .tracking-popup-title { color: var(--tracking-navy); font-size: 15px; }
    .tracking-popup-distance { color: var(--tracking-blue); }
    .tracking-popup-link { color: var(--tracking-blue); }
    .leaflet-popup-content-wrapper { border-radius: 7px; box-shadow: 0 14px 28px rgba(16,47,75,.16); }
    .bekauda-map-marker { border: 3px solid #fff; background: var(--tracking-navy); box-shadow: 0 8px 16px rgba(16,47,75,.28); }
    .leaflet-tooltip.bekauda-map-marker-label { border: 1px solid #d6e0e6; border-radius: 5px; color: var(--tracking-navy); background: #fff; box-shadow: 0 6px 14px rgba(16,47,75,.1); }
    .leaflet-control-layers { border: 1px solid #d6e0e6 !important; border-radius: 6px !important; box-shadow: 0 8px 18px rgba(16,47,75,.12) !important; }
    .leaflet-control-zoom a { color: var(--tracking-navy) !important; background: #fff !important; }

    .tracking-heading-actions { display: flex; align-items: center; gap: 10px; }
    .tracking-theme-toggle { display: inline-flex; align-items: center; gap: 7px; min-height: 36px; padding: 0 12px; border: 1px solid #cbd6de; border-radius: 5px; color: var(--tracking-navy); background: #fff; font-size: 11px; font-weight: 800; cursor: pointer; }
    .tracking-theme-toggle span { color: var(--tracking-gold); font-size: 16px; line-height: 1; }
    .tracking-theme-toggle:hover { border-color: var(--tracking-gold); }
    .tracking-page.tracking-dark { color: #e4eef1; background-color: #0c1b27; background-image: linear-gradient(rgba(210,225,231,.025) 1px, transparent 1px), linear-gradient(90deg, rgba(210,225,231,.025) 1px, transparent 1px); }
    .tracking-dark .tracking-heading { border-color: #294451; }
    .tracking-dark .tracking-heading h1 { color: #edf5f6; }
    .tracking-dark .tracking-heading .text-muted, .tracking-dark .tracking-toolbar .text-muted { color: #a9bdc5 !important; }
    .tracking-dark .tracking-heading .btn-outline-primary, .tracking-dark .tracking-theme-toggle { border-color: #4d6978; color: #dcebef; background: #142d3b; }
    .tracking-dark .tracking-toolbar, .tracking-dark .tracking-layout { border-color: #294451; background: #122936; box-shadow: 0 18px 40px rgba(0,0,0,.22); }
    .tracking-dark .tracking-toolbar .btn-outline-secondary { border-color: #4d6978; color: #d0e0e4; background: #193744; }
    .tracking-dark .tracking-list-panel, .tracking-dark .tracking-search-wrap, .tracking-dark .tracking-list { border-color: #294451; background: #102530; }
    .tracking-dark .tracking-list-head { border-color: #294451; color: #edf5f6; background: #142f3d; }
    .tracking-dark .tracking-list-head strong { color: #edf5f6; }
    .tracking-dark .tracking-search-wrap input { border-color: #45616e; color: #edf5f6; background: #193744; }
    .tracking-dark .tracking-empty { color: #a9bdc5; }
    .tracking-dark .tracking-item { border-color: #294451; color: #e4eef1; background: #102530; }
    .tracking-dark .tracking-item:hover, .tracking-dark .tracking-item:focus { background: #193744; }
    .tracking-dark .tracking-item-copy strong { color: #eaf5f6; }
    .tracking-dark .tracking-item-copy small { color: #a9bdc5; }
    .tracking-dark .tracking-map { background: #1b313a; }
    .tracking-dark .tracking-popup { border-color: #45616e; background: #193744; }
    .tracking-dark .tracking-popup-content { color: #b8cbd0; }
    .tracking-dark .tracking-popup-title { color: #f0f7f7; }
    .tracking-dark .leaflet-tooltip.bekauda-map-marker-label { border-color: #45616e; color: #e4eef1; background: #193744; }
    .tracking-dark .leaflet-control-layers { border-color: #45616e !important; background: #193744; color: #e4eef1; }
    .tracking-dark .leaflet-control-zoom a { color: #e4eef1 !important; background: #193744 !important; }

    @media (max-width: 760px) {
        .tracking-page { padding: 14px; }
        .tracking-heading { align-items: flex-start; flex-direction: column; }
        .tracking-layout { grid-template-columns: 1fr; }
        .tracking-list-panel { order: 2; border-top: 1px solid rgba(143, 163, 198, 0.2); border-right: 0; }
        .tracking-list { max-height: 360px; }
        .tracking-map { min-height: 430px; order: 1; }
        .tracking-page { padding: 20px 14px 28px; }
        .tracking-layout { min-height: 0; }
        .tracking-map { min-height: 480px; }
        .tracking-heading-actions { width: 100%; flex-wrap: wrap; }
    }
</style>

@section('extra_js')
@php($googleMapsApiKey = config('services.google.maps_key'))
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const wilayah = @json($wilayah);
    const tamanBaruas = @json($tamanBaruas);
    const hotels = @json($trackingHotels);
    const googleMapsApiKey = @json($googleMapsApiKey);

    function escapeTrackingHtml(value) {
        return String(value).replace(/[&<>'"]/g, character => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;' })[character]);
    }

    function trackingPhotoUrl(photo) {
        if (!photo) return null;
        return String(photo).startsWith('http') ? photo : `{{ asset('storage') }}/${String(photo).replace(/^\/+/, '')}`;
    }

    function trackingPhotoMarkup(photo, className, alt) {
        const url = trackingPhotoUrl(photo);
        if (!url) return `<div class="${className}" aria-label="Foto ${escapeTrackingHtml(alt)} belum tersedia">🏨</div>`;
        return `<div class="${className}"><img src="${escapeTrackingHtml(url)}" alt="Foto ${escapeTrackingHtml(alt)}" loading="lazy" onerror="this.parentElement.innerHTML='🏨'" /></div>`;
    }

    function distanceKm(lat1, lng1, lat2, lng2) {
        const earthRadius = 6371;
        const radians = value => value * Math.PI / 180;
        const dLat = radians(lat2 - lat1);
        const dLng = radians(lng2 - lng1);
        const a = Math.sin(dLat / 2) ** 2 + Math.cos(radians(lat1)) * Math.cos(radians(lat2)) * Math.sin(dLng / 2) ** 2;
        return 2 * earthRadius * Math.asin(Math.sqrt(a));
    }

    function renderTrackingList(trackedHotels, focusHotel) {
        const listElement = document.getElementById('tracking-list');
        const countElement = document.getElementById('tracking-count');
        const searchElement = document.getElementById('tracking-search');
        const query = searchElement.value.trim().toLocaleLowerCase('id-ID');
        listElement.innerHTML = '';
        trackedHotels.filter(hotel => !query || `${hotel.nama} ${hotel.alamat}`.toLocaleLowerCase('id-ID').includes(query)).sort((first, second) => first.distance - second.distance).forEach((hotel, index) => {
            const item = document.createElement('button');
            item.type = 'button';
            item.className = 'tracking-item';
            item.innerHTML = `${trackingPhotoMarkup(hotel.foto, 'tracking-item-photo', hotel.nama)}<span class="tracking-item-copy"><strong>${escapeTrackingHtml(hotel.nama)}</strong><small>${escapeTrackingHtml(hotel.alamat)}</small></span><b>${hotel.distance.toFixed(2)} km</b>`;
            item.addEventListener('click', () => focusHotel(hotel));
            listElement.appendChild(item);
        });
        countElement.textContent = `${trackedHotels.length}/${hotels.length}`;
    }

    function initGoogleHotelMap() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: Number(wilayah.lat), lng: Number(wilayah.lng) },
            zoom: 14,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
            mapTypeId: 'satellite',
        });
        const statusElement = document.getElementById('tracking-status');
        const searchElement = document.getElementById('tracking-search');
        const startButton = document.getElementById('start-tracking');
        const clearButton = document.getElementById('clear-tracking');
        const markerList = [];
        const lineList = [];
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({ suppressMarkers: true, preserveViewport: true, polylineOptions: { color: '#ff6b35', weight: 5 } });
        directionsRenderer.setMap(map);
        let trackedHotels = hotels.filter(hotel => hotel.lat !== null && hotel.lng !== null).map(hotel => ({ ...hotel, lat: Number(hotel.lat), lng: Number(hotel.lng), distance: distanceKm(wilayah.lat, wilayah.lng, Number(hotel.lat), Number(hotel.lng)) }));

        const originMarker = new google.maps.Marker({ position: { lat: Number(wilayah.lat), lng: Number(wilayah.lng) }, map, title: 'Kantor BEKAUDA', label: 'B' });
        const tamanMarker = new google.maps.Marker({ position: { lat: Number(tamanBaruas.lat), lng: Number(tamanBaruas.lng) }, map, title: tamanBaruas.nama, label: 'T' });
        const infoWindow = new google.maps.InfoWindow();

        tamanMarker.addListener('click', () => infoWindow.setContent(`<div class="tracking-popup">${trackingPhotoMarkup(tamanBaruas.foto, 'tracking-popup-photo', tamanBaruas.nama)}<div class="tracking-popup-content"><strong class="tracking-popup-title">${escapeTrackingHtml(tamanBaruas.nama)}</strong><span>${escapeTrackingHtml(tamanBaruas.alamat)}</span><a class="tracking-popup-link" href="${tamanBaruas.url}" target="_blank" rel="noopener noreferrer">Buka di Google Maps ↗</a></div></div>`));
        tamanMarker.addListener('click', () => infoWindow.open({ map, anchor: tamanMarker }));

        function clearHotelLayers() {
            markerList.splice(0).forEach(marker => marker.setMap(null));
            lineList.splice(0).forEach(line => line.setMap(null));
            directionsRenderer.setDirections({ routes: [] });
        }

        function focusHotel(hotel) {
            const marker = markerList.find(item => item.hotelId === hotel.id);
            if (!marker) return;
            map.setZoom(16);
            map.panTo(marker.getPosition());
            infoWindow.setContent(`<div class="tracking-popup">${trackingPhotoMarkup(hotel.foto, 'tracking-popup-photo', hotel.nama)}<div class="tracking-popup-content"><strong class="tracking-popup-title">${escapeTrackingHtml(hotel.nama)}</strong><span>${escapeTrackingHtml(hotel.alamat)}</span><b class="tracking-popup-distance">${hotel.distance.toFixed(2)} km dari kantor</b><a class="tracking-popup-link" href="https://www.google.com/maps/search/?api=1&query=${hotel.lat},${hotel.lng}" target="_blank" rel="noopener noreferrer">Buka di Google Maps ↗</a></div></div>`);
            infoWindow.open({ map, anchor: marker });
            directionsService.route({ origin: { lat: Number(wilayah.lat), lng: Number(wilayah.lng) }, destination: { lat: hotel.lat, lng: hotel.lng }, travelMode: google.maps.TravelMode.DRIVING }, (result, status) => {
                if (status === 'OK') directionsRenderer.setDirections(result);
            });
        }

        function renderGoogleTracking() {
            clearHotelLayers();
            const bounds = new google.maps.LatLngBounds();
            bounds.extend(originMarker.getPosition());
            trackedHotels.forEach((hotel, index) => {
                const marker = new google.maps.Marker({ position: { lat: hotel.lat, lng: hotel.lng }, map, title: hotel.nama, label: `${index + 1}` });
                marker.hotelId = hotel.id;
                marker.addListener('click', () => focusHotel(hotel));
                markerList.push(marker);
                const line = new google.maps.Polyline({ path: [{ lat: Number(wilayah.lat), lng: Number(wilayah.lng) }, { lat: hotel.lat, lng: hotel.lng }], geodesic: true, strokeColor: ['#4f8cff', '#16a085', '#e1a92e', '#d7654e'][index % 4], strokeOpacity: .72, strokeWeight: 2, map });
                lineList.push(line);
                bounds.extend(marker.getPosition());
            });
            renderTrackingList(trackedHotels, focusHotel);
            if (trackedHotels.length) map.fitBounds(bounds, { top: 60, right: 60, bottom: 60, left: 60 });
        }

        startButton.addEventListener('click', () => { renderGoogleTracking(); statusElement.textContent = `${trackedHotels.length}/${hotels.length} hotel tampil di Google Maps dan berhasil ditracking.`; });
        searchElement.addEventListener('input', () => renderTrackingList(trackedHotels, focusHotel));
        clearButton.addEventListener('click', () => { trackedHotels = []; clearHotelLayers(); renderTrackingList(trackedHotels, focusHotel); originMarker.setMap(map); map.setCenter({ lat: Number(wilayah.lat), lng: Number(wilayah.lng) }); map.setZoom(14); statusElement.textContent = 'Siap memproses ulang di Google Maps.'; });
        renderGoogleTracking();
        statusElement.textContent = `${trackedHotels.length} hotel langsung ditampilkan di Google Maps.`;
    }

    if (googleMapsApiKey) {
        window.initGoogleHotelMap = initGoogleHotelMap;
    } else {
    const map = L.map('map', {
        zoomControl: true,
        zoomSnap: 0.5,
        scrollWheelZoom: true,
        attributionControl: true,
    }).setView([wilayah.lat, wilayah.lng], 13.5);
    const markerLayer = L.layerGroup().addTo(map);
    const routeLayer = L.layerGroup().addTo(map);
    const roadRouteLayer = L.layerGroup().addTo(map);
    const listElement = document.getElementById('tracking-list');
    const statusElement = document.getElementById('tracking-status');
    const countElement = document.getElementById('tracking-count');
    const searchElement = document.getElementById('tracking-search');
    const startButton = document.getElementById('start-tracking');
    const clearButton = document.getElementById('clear-tracking');
    let trackedHotels = [];

    const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri',
        maxZoom: 19,
    });
    satelliteLayer.addTo(map);

    const originMarker = L.marker([wilayah.lat, wilayah.lng], {
        icon: L.divIcon({
            className: 'bekauda-map-marker',
            html: '<span>🏛️</span>',
            iconSize: [42, 42],
            iconAnchor: [21, 21],
            popupAnchor: [0, -20],
        }),
        zIndexOffset: 1000,
    }).addTo(markerLayer)
        .bindPopup(`<strong>${wilayah.nama}</strong><br>${wilayah.alamat}<br><a href="${wilayah.url}" target="_blank" rel="noopener noreferrer">Buka di Google Maps ↗</a>`)
        .bindTooltip('Kantor BEKAUDA', { permanent: true, direction: 'top', offset: [0, -20], className: 'bekauda-map-marker-label' });

    const tamanMarker = L.marker([tamanBaruas.lat, tamanBaruas.lng]).addTo(markerLayer)
        .bindPopup(`<div class="tracking-popup">${photoMarkup(tamanBaruas.foto, 'tracking-popup-photo', tamanBaruas.nama)}<div class="tracking-popup-content"><strong class="tracking-popup-title">${escapeHtml(tamanBaruas.nama)}</strong><span>${escapeHtml(tamanBaruas.alamat)}</span><a class="tracking-popup-link" href="${tamanBaruas.url}" target="_blank" rel="noopener noreferrer">Buka di Google Maps ↗</a></div></div>`)
        .bindTooltip(tamanBaruas.nama, { permanent: true, direction: 'top', offset: [0, -10], className: 'bekauda-map-marker-label' });

    function escapeHtml(value) {
        return String(value).replace(/[&<>'"]/g, character => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;' })[character]);
    }

    function photoUrl(photo) {
        if (!photo) return null;
        return String(photo).startsWith('http') ? photo : `{{ asset('storage') }}/${String(photo).replace(/^\/+/, '')}`;
    }

    function photoMarkup(photo, className, alt) {
        const url = photoUrl(photo);
        if (!url) return `<div class="${className}" aria-label="Foto ${escapeHtml(alt)} belum tersedia">🏨</div>`;
        return `<div class="${className}"><img src="${escapeHtml(url)}" alt="Foto ${escapeHtml(alt)}" loading="lazy" onerror="this.parentElement.innerHTML='🏨'" /></div>`;
    }

    async function showRoadRoute(hotel) {
        const routeKey = `${wilayah.lng},${wilayah.lat};${hotel.lng},${hotel.lat}`;
        roadRouteLayer.clearLayers();
        statusElement.textContent = `Memuat rute jalan ke ${hotel.nama}...`;
        try {
            const response = await fetch(`https://router.project-osrm.org/route/v1/driving/${routeKey}?overview=full&geometries=geojson`);
            const data = await response.json();
            if (!data.routes?.length) throw new Error('Rute tidak ditemukan');
            L.geoJSON(data.routes[0].geometry, {
                style: { color: '#ff6b35', weight: 5, opacity: .9 },
            }).addTo(roadRouteLayer).bindTooltip(`Rute jalan · ${ (data.routes[0].distance / 1000).toFixed(2) } km`);
            statusElement.textContent = `Rute jalan ke ${hotel.nama} tampil.`;
        } catch (error) {
            statusElement.textContent = 'Rute jalan tidak tersedia, garis koordinat tetap ditampilkan.';
        }
    }

    function renderTracking() {
        markerLayer.clearLayers();
        routeLayer.clearLayers();
        originMarker.addTo(markerLayer);
        tamanMarker.addTo(markerLayer);
        listElement.innerHTML = '';
        const bounds = [[wilayah.lat, wilayah.lng]];

        const query = searchElement.value.trim().toLocaleLowerCase('id-ID');
        trackedHotels.filter(hotel => !query || `${hotel.nama} ${hotel.alamat}`.toLocaleLowerCase('id-ID').includes(query)).sort((first, second) => first.distance - second.distance).forEach((hotel, index) => {
            const hotelMapUrl = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(`${hotel.lat},${hotel.lng}`)}`;
            const marker = L.marker([hotel.lat, hotel.lng]).addTo(markerLayer)
                .bindPopup(`<div class="tracking-popup">${photoMarkup(hotel.foto, 'tracking-popup-photo', hotel.nama)}<div class="tracking-popup-content"><strong class="tracking-popup-title">${escapeHtml(hotel.nama)}</strong><span>${escapeHtml(hotel.alamat)}</span><b class="tracking-popup-distance">${hotel.distance.toFixed(2)} km dari kantor</b><a class="tracking-popup-link" href="${hotelMapUrl}" target="_blank" rel="noopener noreferrer">Buka di Google Maps ↗</a></div></div>`);
            marker.on('click', () => showRoadRoute(hotel));
            L.polyline([[wilayah.lat, wilayah.lng], [hotel.lat, hotel.lng]], {
                color: ['#4f8cff', '#16a085', '#e1a92e', '#d7654e'][index % 4],
                weight: 2,
                opacity: .72,
                dashArray: '7 6',
            }).addTo(routeLayer).bindTooltip(`${escapeHtml(hotel.nama)} · ${hotel.distance.toFixed(2)} km`);
            bounds.push([hotel.lat, hotel.lng]);
            const item = document.createElement('button');
            item.type = 'button';
            item.className = 'tracking-item';
            item.innerHTML = `${photoMarkup(hotel.foto, 'tracking-item-photo', hotel.nama)}<span class="tracking-item-copy"><strong>${escapeHtml(hotel.nama)}</strong><small>${escapeHtml(hotel.alamat)}</small></span><b>${hotel.distance.toFixed(2)} km</b>`;
            item.addEventListener('click', () => { map.setView([hotel.lat, hotel.lng], 16); marker.openPopup(); showRoadRoute(hotel); });
            listElement.appendChild(item);
        });
        countElement.textContent = `${trackedHotels.length}/${hotels.length}`;
        if (bounds.length > 1) map.fitBounds(bounds, { padding: [30, 30] });
    }

    trackedHotels = hotels
        .filter(hotel => hotel.lat !== null && hotel.lng !== null)
        .map(hotel => ({
            ...hotel,
            lat: Number(hotel.lat),
            lng: Number(hotel.lng),
            foto: hotel.foto || null,
            distance: distanceKm(wilayah.lat, wilayah.lng, Number(hotel.lat), Number(hotel.lng)),
        }));
    renderTracking();
    originMarker.openPopup();
    statusElement.textContent = `${trackedHotels.length} hotel langsung dipetakan dari koordinat tersimpan.`;

    async function geocode(address) {
        const cached = localStorage.getItem(`hotel-geocode:${address}`);
        if (cached) return JSON.parse(cached);
        const response = await fetch(`https://nominatim.openstreetmap.org/search?format=jsonv2&limit=1&q=${encodeURIComponent(address)}`, { headers: { Accept: 'application/json' } });
        const results = await response.json();
        if (!results.length) return null;
        const point = { lat: Number(results[0].lat), lng: Number(results[0].lon) };
        localStorage.setItem(`hotel-geocode:${address}`, JSON.stringify(point));
        return point;
    }

    async function startTracking() {
        startButton.disabled = true;
        searchElement.disabled = false;

        trackedHotels = hotels
            .filter(hotel => hotel.lat !== null && hotel.lng !== null)
            .map(hotel => ({
                ...hotel,
                lat: Number(hotel.lat),
                lng: Number(hotel.lng),
                distance: distanceKm(wilayah.lat, wilayah.lng, Number(hotel.lat), Number(hotel.lng)),
            }));
        renderTracking();
        statusElement.textContent = `${trackedHotels.length}/${hotels.length} hotel ditampilkan beserta trackingnya.`;

        const hotelsWithoutCoordinates = hotels.filter(hotel => hotel.lat === null || hotel.lng === null);
        for (let index = 0; index < hotelsWithoutCoordinates.length; index += 1) {
            const hotel = hotelsWithoutCoordinates[index];
            statusElement.textContent = `Mencari koordinat ${index + 1}/${hotelsWithoutCoordinates.length}: ${hotel.nama}`;
            try {
                const point = await geocode(hotel.alamat);
                if (point) {
                    trackedHotels.push({ ...hotel, ...point, distance: distanceKm(wilayah.lat, wilayah.lng, point.lat, point.lng) });
                    renderTracking();
                }
            } catch (error) { console.warn(`Gagal mencari ${hotel.nama}`, error); }
            if (index < hotelsWithoutCoordinates.length - 1) await new Promise(resolve => setTimeout(resolve, 1100));
        }
        renderTracking();
        statusElement.textContent = `${trackedHotels.length}/${hotels.length} hotel berhasil dipetakan dan ditracking.`;
        startButton.disabled = false;
    }

    startButton.addEventListener('click', startTracking);
    searchElement.addEventListener('input', renderTracking);
    clearButton.addEventListener('click', () => { trackedHotels = []; listElement.innerHTML = '<div class="tracking-empty">Hasil tracking dihapus.</div>'; countElement.textContent = `0/${hotels.length}`; markerLayer.clearLayers(); routeLayer.clearLayers(); roadRouteLayer.clearLayers(); originMarker.addTo(markerLayer); tamanMarker.addTo(markerLayer); map.setView([wilayah.lat, wilayah.lng], 13); statusElement.textContent = 'Siap memproses ulang.'; });

    const themeToggle = document.getElementById('tracking-theme-toggle');
    const themeStorageKey = 'peta-tracking-theme';
    const applyTrackingTheme = (theme) => {
        const isDark = theme === 'dark';
        document.querySelector('.tracking-page').classList.toggle('tracking-dark', isDark);
        themeToggle.setAttribute('aria-pressed', String(isDark));
        themeToggle.setAttribute('aria-label', isDark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap');
        themeToggle.querySelector('span').textContent = isDark ? '☀' : '☾';
        themeToggle.querySelector('b').textContent = isDark ? 'Mode terang' : 'Mode gelap';
    };
    applyTrackingTheme(localStorage.getItem(themeStorageKey) || 'light');
    themeToggle.addEventListener('click', () => {
        const nextTheme = document.querySelector('.tracking-page').classList.contains('tracking-dark') ? 'light' : 'dark';
        localStorage.setItem(themeStorageKey, nextTheme);
        applyTrackingTheme(nextTheme);
    });
    }
</script>
@if($googleMapsApiKey)
<script async src="https://maps.googleapis.com/maps/api/js?key={{ urlencode($googleMapsApiKey) }}&loading=async&callback=initGoogleHotelMap"></script>
@endif
@endsection
@endsection
