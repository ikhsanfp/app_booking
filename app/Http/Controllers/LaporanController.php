<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan', [
            "title" => "Laporan",
            "active" => 'laporan'
        ]);
    }

    public function laporanadmin()
    {
        $laporan = Pesan::all();
        return view('dashboard.admin.laporan', [
            "title" => "Laporan",
            "active" => 'laporan',
            "laporan" => $laporan
        ]);
    }
}
