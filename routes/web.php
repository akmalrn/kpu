<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

Route::get('/gateAdmin', [App\Http\Controllers\Backend\AuthController::class, 'halamanLogin'])->name('halaman.login.admin');
Route::post('/gateAdmin', [App\Http\Controllers\Backend\AuthController::class, 'login'])->name('login.admin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-admin', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('dashboard.admin');
    Route::resource('/dashboard-admin/siswa', App\Http\Controllers\Backend\SiswaController::class);
    Route::resource('/dashboard-admin/kategori', App\Http\Controllers\Backend\KategoriIndikatorController::class);
    Route::resource('/dashboard-admin/indikator', App\Http\Controllers\Backend\IndikatorController::class);
    Route::resource('/dashboard-admin/prestasi', App\Http\Controllers\Backend\PrestasiController::class);
    Route::get('/get-indikator/{id_kategori}', [App\Http\Controllers\Backend\IndikatorController::class, 'getIndikatorByKategori']);
    Route::get('/get-poin/{id}', [App\Http\Controllers\Backend\IndikatorController::class, 'getPoin']);
});

Route::get('/', [App\Http\Controllers\Frontend\AuthController::class, 'halamanLogin'])->name('halaman.login');
Route::post('/login-siswa', [App\Http\Controllers\Frontend\AuthController::class, 'login'])->name('login.siswa');

Route::middleware('auth:siswa')->group(function () {
    Route::get('/dashboard-siswa', [App\Http\Controllers\Frontend\SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    Route::get('/dashboardAdmin', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('dashboard.admin');
    Route::resource('/dashboardAdmin/siswa', App\Http\Controllers\Backend\SiswaController::class);

});


