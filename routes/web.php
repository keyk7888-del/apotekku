<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\ObatShopController;
use App\Http\Controllers\Frontend\KeranjangController;
use App\Http\Controllers\Frontend\BeliController;
use App\Http\Controllers\Frontend\PesanankuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarPelangganController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfilController;


Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::post('/', [PelangganController::class, 'store'])->name('pelanggan.store');

// Obat shop
Route::get('/obatshop', [ObatShopController::class, 'index'])->name('obatshop.index');
Route::get('/obatshop/{id}', [ObatShopController::class, 'show'])->name('obatshop.show');

// Keranjang
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

// Pembelian
Route::get('/beli', [BeliController::class, 'index'])->name('beli.index');
Route::post('/beli/store', [BeliController::class, 'store'])->name('beli.store');
Route::get('/konfirmasi-pesanan', [BeliController::class, 'konfirmasi'])->name('beli.konfirmasi');

// Pesananku
Route::get('/pesananku', [PesanankuController::class, 'index'])->name('pesananku.index');
Route::get('/pesananku/{id}', [PesanankuController::class, 'show'])->name('pesananku.show');


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

// route logout agar tombol logout bisa dipanggil
Route::post('/logout', function () {Auth::logout();request()->session()->invalidate();request()->session()->regenerateToken();return redirect('/login');})->name('logout');


Route::middleware(['auth'])->group(function () {
    // Dashboard utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Data
    Route::resource('/daftarpelanggan', DaftarPelangganController::class)->only(['index', 'show', 'destroy']);
    Route::resource('/obat', ObatController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/suppliers', SuppliersController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/pesanan', PesananController::class);

    // Profil
    Route::get('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('ubah-profil');
    Route::put('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('ubah-profil.update');
});
