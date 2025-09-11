<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/', [App\Http\Controllers\PelangganController::class, 'index'])->name('pelanggan.index');
Route::post('/', [App\Http\Controllers\PelangganController::class, 'store'])->name('pelanggan.store');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);