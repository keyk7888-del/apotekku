<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FormTamuController::class, 'index'])->name('form.index');


Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
