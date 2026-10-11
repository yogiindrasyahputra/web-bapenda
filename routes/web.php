<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Services\CityNewsService;
use Illuminate\Support\Facades\Route;

Route::get('/', function (CityNewsService $cityNewsService) {
    return view('welcome', [
        'cityNews' => $cityNewsService->latest(3),
    ]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showUserRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'registerUser']);
    Route::get('/register/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
    Route::post('/register/admin', [RegisterController::class, 'registerAdmin'])->name('register.admin.store');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::get('/hotel/{hotel}/bagikan', [HotelController::class, 'share'])->name('hotel.share');
Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
Route::get('/profil', [HotelController::class, 'profile'])->name('profile');
Route::get('/profil/instansi', [HotelController::class, 'profile'])->name('profile.institution');
Route::get('/profil/organisasi', [HotelController::class, 'organization'])->name('profile.organization');

Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi.index');
Route::get('/faq', [HotelController::class, 'faq'])->name('faq.index');
Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
Route::get('/tracking', [PetaController::class, 'index'])->name('tracking.index');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan.index');
Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/pengaturan-akun', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/pengaturan-akun/profil', [AccountController::class, 'updateProfile'])->name('account.profile.update');
    Route::put('/pengaturan-akun/kata-sandi', [AccountController::class, 'updatePassword'])->name('account.password.update');

    Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::post('/peraturan', [PeraturanController::class, 'store'])->name('peraturan.store');

    Route::middleware('admin')->group(function () {
        Route::resource('hotel', HotelController::class)->except(['index', 'show']);
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
        Route::get('/tracking', [PetaController::class, 'index'])->name('tracking.index');
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan.index');
        Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
        Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::post('/peraturan', [PeraturanController::class, 'store'])->name('peraturan.store');
    });
});

Route::get('/hotel/{hotel}', [HotelController::class, 'show'])->name('hotel.show');
