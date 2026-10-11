@extends('layouts.app')

@section('title', 'Pengaturan Akun | PAJAK DAERAH')

@section('content')
<style>
    .account-settings {
        --account-teal: #0a7d7a;
        --account-teal-deep: #0d4f57;
        --account-mint: #e6f6ef;
        --account-amber: #b47724;
        --account-amber-soft: #fff5df;
    }
    .account-settings .account-heading {
        position: relative;
        overflow: hidden;
        padding: 1.5rem 1.75rem;
        border-radius: 18px;
        color: #fff;
        background: linear-gradient(135deg, var(--account-teal-deep), var(--account-teal));
        box-shadow: 0 16px 30px rgba(13, 79, 87, .16);
    }
    .account-settings .account-heading::after {
        position: absolute;
        width: 170px;
        height: 170px;
        right: -55px;
        top: -72px;
        border: 1px solid rgba(255, 255, 255, .22);
        border-radius: 50%;
        box-shadow: 0 0 0 22px rgba(255, 255, 255, .05), 0 0 0 46px rgba(255, 255, 255, .04);
        content: '';
    }
    .account-settings .account-heading .text-muted { color: rgba(255, 255, 255, .74) !important; }
    .account-settings .account-heading .btn { position: relative; z-index: 1; }
    .account-settings .account-card {
        overflow: hidden;
        border: 1px solid rgba(13, 79, 87, .08) !important;
        border-radius: 16px;
    }
    .account-settings .account-card.profile-card { border-top: 4px solid var(--account-teal) !important; }
    .account-settings .account-card.security-card { border-top: 4px solid #e1a642 !important; }
    .account-settings .account-card h2 { color: var(--account-teal-deep); }
    .account-settings .security-card h2 { color: #8d5d18; }
    .account-settings .account-avatar { background: linear-gradient(135deg, #0a7d7a, #4db39e) !important; }
    .account-settings .security-card .form-control:focus { border-color: #e1a642; box-shadow: 0 0 0 .25rem rgba(225, 166, 66, .18); }
    .account-settings .profile-card .form-control:focus { border-color: var(--account-teal); box-shadow: 0 0 0 .25rem rgba(10, 125, 122, .16); }
    .account-settings .profile-card .btn-primary { background-color: var(--account-teal); border-color: var(--account-teal); }
    .account-settings .security-card .btn-primary { background-color: #b47724; border-color: #b47724; }
    .account-settings .password-wrap { position: relative; }
    .account-settings .toggle-password {
        position: absolute;
        top: 50%;
        right: 16px;
        display: grid;
        place-items: center;
        width: 32px;
        height: 32px;
        padding: 0;
        border: 0;
        background: transparent;
        color: #8d5d18;
        cursor: pointer;
        transform: translateY(-50%);
    }
    .account-settings .toggle-password svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2; }
    .account-settings .toggle-password .eye-open { display: none; }
    .account-settings .toggle-password.is-visible .eye-closed { display: none; }
    .account-settings .toggle-password.is-visible .eye-open { display: block; }
    .account-settings .toggle-password:hover,
    .account-settings .toggle-password:focus-visible { color: #b47724; outline: none; }
    .account-settings .password-wrap .form-control { padding-right: 60px; }
</style>
<div class="container py-4">
    <div class="account-settings">
    <div class="account-heading d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="text-uppercase small fw-bold mb-1">Akun saya</p>
            <h1 class="h3 mb-1">Pengaturan Akun</h1>
            <p class="text-muted mb-0">Kelola informasi profil dan keamanan akun Anda.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-light">Kembali ke Dashboard</a>
    </div>

    @if (session('profile_status'))
        <div class="alert alert-success" role="alert">{{ session('profile_status') }}</div>
    @endif

    @if (session('password_status'))
        <div class="alert alert-success" role="alert">{{ session('password_status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Periksa kembali data yang diisi.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card account-card profile-card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h5 mb-1">Informasi Profil</h2>
                    <p class="text-muted small mb-4">Kelola foto, nama, dan email yang digunakan saat Anda masuk ke sistem.</p>

                    <form id="profileForm" action="{{ route('account.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex align-items-center gap-3 mb-4">
                            @if ($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto profil {{ $user->name }}" width="72" height="72" class="rounded-circle object-fit-cover">
                            @else
                                <div class="account-avatar rounded-circle text-white d-flex align-items-center justify-content-center fw-bold" style="width: 72px; height: 72px; font-size: 1.5rem;">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                            @endif
                            <div class="flex-grow-1">
                                <label for="profile_photo" class="form-label mb-1">Foto profil</label>
                                <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                                <div class="form-text">JPG, PNG, atau WEBP, maksimal 2 MB.</div>
                                @error('profile_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card account-card security-card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h5 mb-1">Keamanan</h2>
                    <p class="text-muted small mb-4">Gunakan kata sandi yang berbeda dari akun lain.</p>

                    <form id="passwordForm" action="{{ route('account.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Kata sandi saat ini</label>
                            <div class="password-wrap">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                <button type="button" class="toggle-password" data-target="current_password" aria-label="Lihat password">
                                    <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                    <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata sandi baru</label>
                            <div class="password-wrap">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" required>
                                <button type="button" class="toggle-password" data-target="password" aria-label="Lihat password">
                                    <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                    <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi kata sandi baru</label>
                            <div class="password-wrap">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" minlength="8" required>
                                <button type="button" class="toggle-password" data-target="password_confirmation" aria-label="Lihat password">
                                    <svg class="eye-closed" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.2A10.7 10.7 0 0 1 12 4c5 0 8.7 4 10 8a13.5 13.5 0 0 1-3.1 5.1M6.6 6.6C4.8 7.8 3.5 9.7 2 12c1.3 4 5 8 10 8 1.1 0 2.1-.2 3-.5"/></svg>
                                    <svg class="eye-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui Kata Sandi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    const profileForm = document.getElementById('profileForm');
    const passwordForm = document.getElementById('passwordForm');

    if (profileForm) {
        profileForm.addEventListener('submit', function (event) {
            const confirmed = window.confirm('Apakah Anda yakin ingin menyimpan perubahan profil akun?');

            if (!confirmed) {
                event.preventDefault();
            }
        });
    }

    if (passwordForm) {
        passwordForm.addEventListener('submit', function (event) {
            const confirmed = window.confirm('Apakah Anda yakin ingin mengubah kata sandi akun?');

            if (!confirmed) {
                event.preventDefault();
            }
        });
    }

    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const target = document.getElementById(this.dataset.target);
            const isPassword = target.type === 'password';
            target.type = isPassword ? 'text' : 'password';
            this.classList.toggle('is-visible', isPassword);
            this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Lihat password');
        });
    });
</script>
@endsection
