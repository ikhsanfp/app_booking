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

// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home",
//         "active" => 'home'
//     ]);
// });

// Route::get('/home', function () {
//     return view('dashboard.index', [
//         "title" => "Home",
//         "active" => 'home'
//     ]);
// });
Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'index']);


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/pesanmasuk', [AdminController::class, 'pesanmasuk'])->name('pesanmasuk');
Route::get('/lapadmin', [AdminController::class, 'admlaporan']);


Route::get('/panduan', [PanduanController::class, 'panduan']);

Route::get('/pesan', [PesanController::class, 'index']);
Route::get('/tambahpesan', [PesanController::class, 'create']);

Route::get('/laporan', [LaporanController::class, 'laporanuser']);

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


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/store', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');



Route::get('/tambahpesan', [PesanController::class, 'create'])->name('pesan.create');
Route::get('/cetakpesanan', [PesanController::class, 'cetak'])->name('cetak.pesan');


// Route untuk menyimpan pesan lapangan baru
Route::post('/addpesan', [PesanController::class, 'store'])->name('pesan.store');

// Route untuk menampilkan daftar pesan lapangan
Route::get('/pesan', [PesanController::class, 'index'])->name('dashboard.pesan');
Route::get('/pesan', 'PesanController@index')->name('pesan.index');

Route::get('/detail/{id}', [AdminController::class, 'show'])->name('pesanan.detail');
Route::put('/edit/pesanan/{id}', [AdminController::class, 'update'])->name('pesanan.update');
