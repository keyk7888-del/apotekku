<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\PelangganController::class, 'index'])->name('pelanggan.index');
Route::post('/', [App\Http\Controllers\PelangganController::class, 'store'])->name('pelanggan.store');


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/daftarpelanggan', App\Http\Controllers\DaftarPelangganController::class)->only('index','show','destroy');

    Route::resource('/obat', App\Http\Controllers\ObatController::class);

    Route::resource('/category', \App\http\Controllers\CategoryController::class);

    Route::resource('/suppliers', \App\http\Controllers\SuppliersController::class);

    Route::resource('/admin', App\Http\Controllers\AdminController::class);

    Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);

    Route::get('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('ubah-profil.update');
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);