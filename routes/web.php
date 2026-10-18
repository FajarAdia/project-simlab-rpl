<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Rute untuk halaman Dashboard Metrik Aset
Route::get('/', [BarangController::class, 'dashboard'])->name('dashboard');

// Rute Resource untuk Operasi CRUD Barang (index, create, store, edit, update, destroy)
Route::resource('barang', BarangController::class);