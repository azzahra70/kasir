<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Nama route 'dashboard' sesuai default Breeze
    Route::resource('/suplier', SuplierController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('stok', StokController::class);
    Route::resource('transaksi',  TransaksiController::class);
    Route::get('/transaksi/{id}/invoice', [TransaksiController::class, 'invoice'])->name('transaksi.invoice');
    
});

require __DIR__.'/auth.php';
