<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function cek()
    {
        if (auth()->user()->is_admin === 1) {
            return redirect('/admin');
        } else {
            return redirect('/home');
        }
    }
    public function coba()
    {
        return view('navbar', [
            "title" => "Navbar",
            "action" => 'home',
        ]);
    }

    public function index(Request $request)
    {
        $query = $request;
        $lapanganbasket = Pesan::where('jenislap', 'Lapangan Basket', '%' . $query . '%')->get();
        $lapanganfutsal = Pesan::where('jenislap', 'Lapangan Futsal', '%' . $query . '%')->get();
        return view('dashboard.index', [
            "title" => "Home",
            "active" => 'home',
            "pesan_basket" => $lapanganbasket,
            "pesan_futsal" => $lapanganfutsal,
        ]);
    }

    public function home()
    {
        return view('home', [
            "title" => "Home",
            "active" => 'home',
        ]);
    }

    public function dashboardadmin()
    {
        return view('dashboard.admin.index', [
            "title" => "Home",
            "active" => 'home'
        ]);
    }
    public function ikhsan()
    {
        return view('ikhsan');
    }
}
