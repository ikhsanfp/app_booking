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

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/home', function () {
    return view('dashboard.index',[
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/admin', function () {
    return view('dashboard.admin.index',[
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/pesanmasuk', function () {
    return view('dashboard.admin.pesanmasuk',[
        "title" => "Pesan Masuk",
        "active" => 'pesan'
    ]);
});

Route::get('/lapadmin', function () {
    return view('dashboard.admin.laporan',[
        "title" => "Laporan",
        "active" => 'laporan'
    ]);
});

Route::get('/panduan', function () {
    return view('dashboard.panduan',[
        "title" => "Panduan",
        "active" => 'panduan'
    ]);
});

Route::get('/pesan', function () {
    return view('dashboard.pesan',[
        "title" => "Pesanan",
        "active" => 'pesan'
    ]);
});

Route::get('/laporan', function () {
    return view('dashboard.laporan',[
        "title" => "Laporan",
        "active" => 'laporan'
    ]);
});

Route::get('/tambahpesan', function () {
    return view('dashboard.tambahpesan',[
        "title" => "Tambah Pesanan",
        "active" => 'pesan'
    ]);
});
Route::get('/login', function () {
    return view('login.index',[
        "title" => "Login"
    ]);
});

Route::get('/register', function () {
    return view('register.index',[
        "title" => "Register"
    ]);
});

Route::post('/addpesan', [PesanController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/store', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'create']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

