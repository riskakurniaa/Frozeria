<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BantuanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/barang/create',      [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang',            [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/{id}',        [BarangController::class, 'show'])->name('barang.show');
Route::get('/barang/{id}/edit',   [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}',        [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}',     [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('/kategori',           [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create',    [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori',          [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}',      [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}',   [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/bantuan',            [BantuanController::class, 'index'])->name('bantuan');
