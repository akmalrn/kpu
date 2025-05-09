<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/gateAdmin', [App\Http\Controllers\Backend\AuthController::class, 'halamanLogin'])->name('halamanLoginAdmin');
Route::post('/gateAdmin', [App\Http\Controllers\Backend\AuthController::class, 'login'])->name('loginAdmin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboardAdmin', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('dashboard.admin');
    Route::resource('/dashboardAdmin/siswa', App\Http\Controllers\Backend\SiswaController::class);
    Route::resource('/dashboardAdmin/kategori', App\Http\Controllers\Backend\KategoriIndikatorController::class);
    Route::resource('/dashboardAdmin/indikator', App\Http\Controllers\Backend\IndikatorController::class);
    Route::resource('/dashboardAdmin/prestasi', App\Http\Controllers\Backend\PrestasiController::class);
    Route::get('/get-poin/{id}', [App\Http\Controllers\Backend\IndikatorController::class, 'getPoin']);
    Route::get('/get-indikator/{id_kategori}', [App\Http\Controllers\Backend\IndikatorController::class, 'getIndikatorByKategori']);

});


