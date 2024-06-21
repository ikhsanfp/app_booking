<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\RegisterController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/store', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register/store', [RegisterController::class, 'create']);
});

Route::middleware(['auth', 'checkrole:1,0'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/redirect', [HomeController::class, 'cek']);
});

Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/pesanmasuk', [AdminController::class, 'pesanmasuk'])->name('pesanmasuk');
    Route::get('/lapadmin', [AdminController::class, 'admlaporan']);
});

Route::middleware(['auth', 'checkrole:0'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});

Route::get('/coba', [HomeController::class, 'coba']);
Route::get('/', [HomeController::class, 'home']);
// Route::get('/home', [HomeController::class, 'index']);
Route::get('/panduan', [PanduanController::class, 'index']);

// Route::get('/admin', [AdminController::class, 'index']);


Route::get('/pesan', [PesanController::class, 'index']);
Route::get('/tambahpesan', [PesanController::class, 'create']);

Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth');

Route::get('/tambahpesan', [PesanController::class, 'create'])->name('pesan.create');

// Route untuk menyimpan pesan lapangan baru
Route::post('/addpesan', [PesanController::class, 'store'])->name('pesan.store');

// Route untuk menampilkan daftar pesan lapangan
Route::get('/pesan', [PesanController::class, 'index'])->name('dashboard.pesan');
Route::get('/pesan', 'PesanController@index')->name('pesan.index');

Route::get('/detail/{id}', [AdminController::class, 'show'])->name('pesanan.detail');
Route::put('/edit/pesanan/{id}', [AdminController::class, 'update'])->name('pesanan.update');

Route::get('/cetakpesan', [LaporanController::class, 'filterData'])->name('cetak.pesanan');
Route::get('/cetakpesanadmin', [AdminController::class, 'laporan'])->name('cetak.pesananadmin');
// Route::get('/cetakpesanan', [PesanController::class, 'view_pdf'])->name('cetak.pesan');
Route::get('/data', [PesanController::class, 'showData'])->name('data.index');

Route::delete('/pesan/{id}', 'AdminController@destroy')->name('pesan.destroy');
Route::get('/createuser', [AdminController::class, 'createUser'])->name('create.user');

Route::put('/createuser/{id}', [AdminController::class, 'rename'])->name('rename.user');
Route::get('/upload', [ImageController::class, 'index'])->name('index');

Route::post('/upload/store', [ImageController::class, 'upload'])->name('images.upload');
Route::get('/copyright',[HomeController::class, 'copyright'])->name('copyright'); 