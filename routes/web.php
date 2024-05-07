<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\RegisterController;

Route::get('/coba', [HomeController::class, 'coba']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/panduan', [PanduanController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/pesanmasuk', [AdminController::class, 'pesanmasuk'])->name('pesanmasuk');
Route::get('/lapadmin', [AdminController::class, 'admlaporan']);

Route::get('/pesan', [PesanController::class, 'index']);
Route::get('/tambahpesan', [PesanController::class, 'create']);

Route::get('laporan', [LaporanController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/store', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'create']);

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth');

Route::get('/tambahpesan', [PesanController::class, 'create'])->name('pesan.create');

// Route untuk menyimpan pesan lapangan baru
Route::post('/addpesan', [PesanController::class, 'store'])->name('pesan.store');

// Route untuk menampilkan daftar pesan lapangan
Route::get('/pesan', [PesanController::class, 'index'])->name('dashboard.pesan');
Route::get('/pesan', 'PesanController@index')->name('pesan.index');

Route::get('/detail/{id}', [AdminController::class, 'show'])->name('pesanan.detail');
Route::put('/edit/pesanan/{id}', [AdminController::class, 'update'])->name('pesanan.update');

Route::get('/cetakpesanan', [PesanController::class, 'view'])->name('cetak.pesan');
// Route::get('/cetakpesanan', [PesanController::class, 'view_pdf'])->name('cetak.pesan');
Route::get('/data', [PesanController::class, 'showData'])->name('data.index');
