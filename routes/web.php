<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PesanController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES - Halaman yang dapat diakses oleh semua pengunjung
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PublicController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [PublicController::class, 'kirimPesan'])->name('kontak.kirim');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES - Login & Logout Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES - Dilindungi middleware 'auth'
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil CMS
    // PERUBAHAN: 'create' dan 'store' dihapus dari except() agar rute aktif
    Route::resource('profil', ProfilController::class)->except(['show', 'destroy']);

    // Berita CMS
    Route::resource('berita', BeritaController::class);

    // Galeri CMS
    Route::resource('galeri', GaleriController::class)->except(['show']);

    // Pesan Kontak (Read & Delete only)
    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/pesan/{id}', [PesanController::class, 'show'])->name('pesan.show');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
});
