<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioindexController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MenuindexController;

Route::get('/', [AnuncioindexController::class, 'index'])->name('index');
Route::resource('menuclient', MenuindexController::class);
Route::resource('pedido', PedidoController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('anuncio', AnuncioController::class);
    Route::resource('menu', MenuController::class);
});
