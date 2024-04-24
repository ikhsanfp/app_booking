<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {

        return view('home', [
            "title" => "Home",
            "active" => 'home',

        ]);
    }

    public function index()
    {
        $pesan = Pesan::all();
        return view('dashboard.index', [
            "title" => "Home",
            "active" => 'home',
            "pesan" => $pesan,
        ]);
    }

    public function dashboardadmin()
    {
        return view('dashboard.admin.index', [
            "title" => "Home",
            "active" => 'home'
        ]);
    }
}
