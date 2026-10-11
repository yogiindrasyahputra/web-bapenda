@extends('layouts.app')

@section('content')
<div class="hotel-create-page">
    <div class="hotel-create-hero">
        <div class="hotel-create-hero-content">
            <span class="hotel-eyebrow">DIREKTORI HOTEL</span>
            <h1>{{ isset($hotel) ? 'Edit Hotel' : 'Tambah Hotel' }}</h1>
            <p>{{ isset($hotel) ? 'Perbarui informasi hotel dengan data yang paling terbaru.' : 'Lengkapi data hotel agar dapat terdaftar dengan benar dan mudah diakses publik.' }}</p>
        </div>
        <div class="hotel-create-hero-badge">
            <span>Data Hotel</span>
            <strong>Terverifikasi</strong>
        </div>
    </div>

    <div class="hotel-create-grid">
        <div class="hotel-create-form-wrap">
            <div class="card hotel-form-card">
                <div class="card-body hotel-form-body">
                    <div class="form-section-heading">
                        <span class="form-section-kicker">Form Pendaftaran</span>
                        <h2>{{ isset($hotel) ? 'Perbarui Informasi Hotel' : 'Informasi Hotel' }}</h2>
                        <p>Lengkapi profil hotel secara akurat agar data lebih cepat diverifikasi dan lebih mudah diakses publik.</p>
                    </div>

                    <form id="hotelForm" data-mode="{{ isset($hotel) ? 'edit' : 'create' }}" action="{{ isset($hotel) ? route('hotel.update', $hotel) : route('hotel.store') }}" method="POST" enctype="multipart/form-data" class="hotel-form">
                        @csrf
                        @if(isset($hotel))
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Hotel <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $hotel->nama ?? '') }}" placeholder="Contoh: Hotel Sari Indah" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap hotel" required>{{ old('alamat', $hotel->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lat" class="form-label">Lintang</label>
                                <input type="number" step="0.0001" class="form-control @error('lat') is-invalid @enderror" id="lat" name="lat" value="{{ old('lat', $hotel->lat ?? '') }}" placeholder="1.3721">
                                @error('lat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lng" class="form-label">Bujur</label>
                                <input type="number" step="0.0001" class="form-control @error('lng') is-invalid @enderror" id="lng" name="lng" value="{{ old('lng', $hotel->lng ?? '') }}" placeholder="99.2730">
                                @error('lng')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="aktif" {{ old('status', $hotel->status ?? '') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status', $hotel->status ?? '') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Wajib Pajak</label>
                                <div class="hotel-toggle-box">
                                    <input type="hidden" name="wajib_pajak" value="0">
                                    <input type="checkbox" class="form-check-input @error('wajib_pajak') is-invalid @enderror" id="wajib_pajak" name="wajib_pajak" value="1" {{ old('wajib_pajak', $hotel->wajib_pajak ?? true) ? 'checked' : '' }}>
                                    <label for="wajib_pajak" class="form-check-label">Hotel terdaftar sebagai wajib pajak</label>
                                </div>
                                @error('wajib_pajak')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="foto" class="form-label">Foto Hotel</label>
                                <div class="hotel-upload-box">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                                    <div class="hotel-upload-preview" id="hotelUploadPreview">
                                        <img id="hotelPreviewImage" src="{{ isset($hotel) && $hotel->foto ? asset('storage/' . $hotel->foto) : 'https://placehold.co/800x500/edf7f6/0a6d6c?text=Preview+Hotel' }}" alt="Preview hotel">
                                    </div>
                                </div>
                                <div class="form-text">Format gambar JPG, PNG, atau WebP. Ukuran maksimal 4 MB.</div>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="hotel-form-actions">
                            <button type="submit" class="btn btn-primary hotel-submit-btn">{{ isset($hotel) ? 'Perbarui Hotel' : 'Simpan Hotel' }}</button>
                            <a href="{{ route('hotel.index') }}" class="btn btn-outline-secondary hotel-cancel-btn">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <aside class="hotel-create-info">
            <div class="info-panel">
                <div class="info-panel-icon">✓</div>
                <h3>Petunjuk Pengisian</h3>
                <ul>
                    <li>Isi nama dan alamat hotel secara lengkap.</li>
                    <li>Gunakan koordinat lintang dan bujur jika tersedia.</li>
                    <li>Status hotel harus jelas, apakah aktif atau nonaktif.</li>
                    <li>Foto hotel akan ditampilkan pada daftar dan detail.</li>
                </ul>
            </div>

            <div class="info-panel info-panel-accent">
                <span class="mini-label">Catatan</span>
                <p>Data yang terisi dengan lengkap akan mempermudah masyarakat dalam mencari dan mengecek hotel yang terdaftar.</p>
            </div>
        </aside>
    </div>
</div>

<style>
    .hotel-create-page {
        max-width: 1180px;
        margin: 0 auto 32px;
        padding: 12px 0 24px;
    }

    .hotel-create-hero {
        position: relative;
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 20px;
        min-height: 180px;
        padding: 30px 30px 22px;
        margin-bottom: 26px;
        border: 1px solid rgba(20, 90, 118, 0.08);
        border-radius: 22px;
        background: linear-gradient(110deg, rgba(16,59,93,0.98), rgba(19,103,118,0.82) 52%, rgba(8,127,120,0.82)), url('https://cdn.phototourl.com/member/2026-09-06-804fe264-96a7-4c95-b23e-2eb9a45c6418.webp') center/cover no-repeat;
        box-shadow: 0 16px 34px rgba(18,63,89,.12);
    }

    .hotel-create-hero-content {
        position: relative;
        z-index: 1;
        max-width: 680px;
        color: #fff;
    }

    .hotel-eyebrow {
        display: inline-block;
        margin-bottom: 8px;
        color: #f5d06c;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .12em;
    }

    .hotel-create-hero-content h1 {
        margin: 0 0 8px;
        color: #fff;
        font-size: clamp(30px, 4vw, 42px);
        font-weight: 800;
        line-height: 1.1;
    }

    .hotel-create-hero-content p {
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 14px;
        line-height: 1.7;
    }

    .hotel-create-hero-badge {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        min-width: 170px;
        padding: 14px 18px;
        border: 1px solid rgba(255,255,255,.25);
        border-radius: 14px;
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(4px);
        color: #fff;
    }

    .hotel-create-hero-badge span {
        font-size: 10px;
        letter-spacing: .12em;
        text-transform: uppercase;
        opacity: .8;
    }

    .hotel-create-hero-badge strong {
        margin-top: 6px;
        font-size: 20px;
        font-weight: 800;
    }

    .hotel-create-grid {
        display: grid;
        grid-template-columns: minmax(0, 2.1fr) minmax(260px, 0.9fr);
        gap: 22px;
        align-items: start;
    }

    .hotel-form-card {
        border: 0;
        border-radius: 22px;
        background: linear-gradient(180deg, #ffffff, #f6fbfa);
        border: 1px solid #dfeae7;
        box-shadow: 0 16px 32px rgba(18,63,89,.08);
    }

    .hotel-form-body {
        padding: 26px;
    }

    .form-section-heading {
        margin-bottom: 18px;
    }

    .form-section-kicker {
        display: inline-block;
        margin-bottom: 8px;
        color: #087f78;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .form-section-heading h2 {
        margin: 0;
        color: #103b5d;
        font-size: 26px;
        font-weight: 800;
        letter-spacing: -.02em;
    }

    .form-section-heading p {
        margin: 10px 0 0;
        color: #62798f;
        font-size: 14px;
        line-height: 1.7;
    }

    .hotel-form .form-label {
        margin-bottom: 8px;
        color: #123f59;
        font-size: 13px;
        font-weight: 700;
    }

    .hotel-form .form-control,
    .hotel-form .form-select {
        min-height: 48px;
        border: 1px solid #d6e7e1;
        border-radius: 12px;
        background: #fff;
        color: #173b62;
        font-size: 14px;
        box-shadow: none;
    }

    .hotel-form .form-control:focus,
    .hotel-form .form-select:focus {
        border-color: #087f78;
        box-shadow: 0 0 0 0.2rem rgba(8,127,120,.12);
    }

    .hotel-form textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .hotel-toggle-box {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 48px;
        padding: 0 14px;
        border: 1px solid #d6e7e1;
        border-radius: 12px;
        background: #fff;
    }

    .hotel-toggle-box .form-check-input {
        width: 18px;
        height: 18px;
        margin: 0;
        border-color: #087f78;
        cursor: pointer;
    }

    .hotel-toggle-box .form-check-input:checked {
        background-color: #087f78;
        border-color: #087f78;
    }

    .hotel-toggle-box .form-check-label {
        margin: 0;
        color: #173b62;
        font-size: 14px;
        font-weight: 600;
    }

    .hotel-upload-box {
        display: grid;
        gap: 14px;
        padding: 16px;
        border: 1px solid #d6e7e1;
        border-radius: 16px;
        background: linear-gradient(180deg, #ffffff, #f7fbfa);
    }

    .hotel-upload-preview {
        display: grid;
        place-items: center;
        overflow: hidden;
        min-height: 180px;
        border: 1px solid rgba(8,127,120,.15);
        border-radius: 14px;
        background: linear-gradient(135deg, rgba(8,127,120,.05), rgba(23,99,165,.06));
    }

    .hotel-upload-preview img {
        display: block;
        width: 100%;
        max-height: 250px;
        object-fit: cover;
    }

    .hotel-form .form-text {
        margin-top: 6px;
        color: #70839d;
        font-size: 12px;
    }

    .hotel-form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
        padding-top: 18px;
        border-top: 1px solid #e8efed;
    }

    .hotel-submit-btn,
    .hotel-cancel-btn {
        min-height: 46px;
        padding: 0 22px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
    }

    .hotel-submit-btn {
        border: 0;
        background: linear-gradient(135deg, #087f78, #1763a5);
        box-shadow: 0 12px 22px rgba(8,127,120,.18);
    }

    .hotel-submit-btn:hover {
        background: linear-gradient(135deg, #0a8e86, #165eab);
    }

    .hotel-cancel-btn {
        border: 1px solid #cee2de;
        color: #173b62;
        background: #fff;
    }

    .hotel-create-info {
        display: grid;
        gap: 18px;
    }

    .info-panel {
        padding: 24px 22px;
        border: 1px solid #dfeae7;
        border-radius: 20px;
        background: linear-gradient(180deg, #f9fdff 0%, #f4fbf7 100%);
        box-shadow: 0 14px 28px rgba(18,63,89,.06);
    }

    .info-panel-icon {
        display: grid;
        place-items: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: linear-gradient(135deg, #dff8f1, #f4e8ba);
        color: #0b7c76;
        font-size: 20px;
        font-weight: 800;
    }

    .info-panel h3 {
        margin: 16px 0 12px;
        color: #103b5d;
        font-size: 19px;
        font-weight: 800;
    }

    .info-panel ul {
        margin: 0;
        padding-left: 18px;
        color: #5d7385;
        font-size: 13px;
        line-height: 1.8;
    }

    .info-panel-accent {
        background: linear-gradient(135deg, #eef9ff, #fff7e7);
    }

    .mini-label {
        display: inline-block;
        color: #d49425;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .info-panel-accent p {
        margin: 14px 0 0;
        color: #49657a;
        font-size: 14px;
        line-height: 1.7;
    }

    @media (max-width: 991px) {
        .hotel-create-grid {
            grid-template-columns: 1fr;
        }

        .hotel-create-hero {
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .hotel-create-page {
            padding: 0 0 18px;
        }

        .hotel-create-hero {
            min-height: 160px;
            padding: 22px 18px 18px;
        }

        .hotel-form-body {
            padding: 18px 16px;
        }

        .hotel-form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .hotel-submit-btn,
        .hotel-cancel-btn {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hotelForm = document.getElementById('hotelForm');
        const input = document.getElementById('foto');
        const preview = document.getElementById('hotelPreviewImage');

        if (hotelForm) {
            hotelForm.addEventListener('submit', function (event) {
                const mode = hotelForm.getAttribute('data-mode');
                const message = mode === 'edit'
                    ? 'Apakah Anda yakin ingin mengubah data hotel ini?'
                    : 'Apakah Anda yakin ingin menambahkan hotel baru?';

                if (!window.confirm(message)) {
                    event.preventDefault();
                }
            });
        }

        if (input && preview) {
            input.addEventListener('change', function (event) {
                const file = event.target.files && event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }
    });
</script>
@endsection
