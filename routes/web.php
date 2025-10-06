<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ObatShopController;
use App\Http\Controllers\Frontend\PesananController;
use App\Http\Controllers\Frontend\PesanankuController;


Route::get('/', [App\Http\Controllers\PelangganController::class, 'index'])->name('pelanggan.index');
Route::post('/', [App\Http\Controllers\PelangganController::class, 'store'])->name('pelanggan.store');

Route::get('/obatshop', [App\Http\Controllers\Frontend\ObatShopController::class, 'index'])->name('obatshop.index');
Route::get('/obatshop/{id}', [App\Http\Controllers\Frontend\ObatShopController::class, 'show'])->name('obatshop.show');

Route::get('/keranjang', [App\Http\Controllers\Frontend\KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah/{id}', [App\Http\Controllers\Frontend\KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::delete('/keranjang/hapus/{id}', [App\Http\Controllers\Frontend\KeranjangController::class, 'hapus'])->name('keranjang.hapus');

Route::get('/beli', [App\Http\Controllers\Frontend\BeliController::class, 'index'])->name('beli.index');
Route::post('/beli/store', [App\Http\Controllers\Frontend\BeliController::class, 'store'])->name('beli.store');
Route::get('/konfirmasi-pesanan', [App\Http\Controllers\Frontend\BeliController::class, 'konfirmasi'])->name('beli.konfirmasi');

Route::get('/pesananku', [App\Http\Controllers\Frontend\PesanankuController::class, 'index'])->name('pesananku.index');
Route::get('/pesananku/{id}', [App\Http\Controllers\Frontend\PesanankuController::class, 'show'])->name('pesananku.show');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/daftarpelanggan', App\Http\Controllers\DaftarPelangganController::class)->only('index','show','destroy');

    Route::resource('/obat', App\Http\Controllers\ObatController::class);

    Route::resource('/category', \App\Http\Controllers\CategoryController::class);

    Route::resource('/suppliers', \App\Http\Controllers\SuppliersController::class);

    Route::resource('/admin', App\Http\Controllers\AdminController::class);

    Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);

    Route::resource('/pesanan', App\Http\Controllers\PesananController::class);

    Route::get('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('ubah-profil');
    Route::put('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('ubah-profil.update');
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

