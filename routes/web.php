<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/home', function () {
    return view('dashboard.index', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin', function () {
    return view('dashboard.admin.index', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/pesanmasuk', function () {
    return view('dashboard.admin.pesanmasuk', [
        "title" => "Pesan Masuk",
        "active" => 'pesan'
    ]);
});

Route::get('/lapadmin', function () {
    return view('dashboard.admin.laporan', [
        "title" => "Laporan",
        "active" => 'laporan'
    ]);
});

Route::get('/panduan', function () {
    return view('dashboard.panduan', [
        "title" => "Panduan",
        "active" => 'panduan'
    ]);
});

Route::get('/pesan', [PesanController::class, 'index']);
Route::get('/tambahpesan', [PesanController::class, 'create']);

Route::get('/laporan', function () {
    return view('dashboard.laporan', [
        "title" => "Laporan",
        "active" => 'laporan'
    ]);
});

Route::get('/login', function () {
    return view('login.index', [
        "title" => "Login"
    ]);
});

Route::get('/register', function () {
    return view('register.index', [
        "title" => "Register"
    ]);
});

// Route::get('/pesan', [PesanController::class, 'index']);

// Route::get('/tambahpesan', [TambahPesanController::class, 'tambahpesan']);

// Route::post('/addpesan', [PesanController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/store', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');



Route::get('/tambahpesan', [PesanController::class, 'create'])->name('pesan.create');

// Route untuk menyimpan pesan lapangan baru
Route::post('/addpesan', [PesanController::class, 'store'])->name('pesan.store');

// Route untuk menampilkan daftar pesan lapangan
Route::get('/pesan', [PesanController::class, 'index'])->name('dashboard.pesan');
