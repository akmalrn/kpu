<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/gateAdmin', [App\Http\Controllers\Backend\AuthController::class, 'halamanLogin'])->name('halamanLoginAdmin');
Route::post('/gateAdmin', [App\Http\Controllers\Backend\AuthController::class, 'login'])->name('loginAdmin');

Route::get('/dashboardAdmin', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('dashboardAdmin');