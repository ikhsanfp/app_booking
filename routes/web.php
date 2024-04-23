<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PesanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
    
Route::get('/home', [HomeController::class, 'dashboard']);

Route::get('/admin', [HomeController::class, 'dashboardadmin']);

Route::get('/pesanmasuk', [PesanController::class, 'pesanmasuk']);

Route::get('/lapadmin', [LaporanController::class, 'laporanadmin']);

Route::get('/panduan', [PanduanController::class, 'panduan']);

Route::get('/laporan', [LaporanController::class, 'laporan']);

// Route::get('/pesan', [PesanController::class, 'index']);

// Route::get('/tambahpesan', [TambahPesanController::class, 'tambahpesan']);

// Route::post('/addpesan', [PesanController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/store', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'create']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');



Route::get('/tambahpesan', [PesanController::class, 'create'])->name('pesan.create');

// Route untuk menyimpan pesan lapangan baru
Route::post('/addpesan', [PesanController::class, 'store'])->name('pesan.store');

// Route untuk menampilkan daftar pesan lapangan
Route::get('/pesan', [PesanController::class, 'index'])->name('dashboard.pesan');
