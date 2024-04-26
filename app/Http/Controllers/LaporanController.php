<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanuser()
    {
        return view('dashboard.laporan', [
            "title" => "Laporan",
            "active" => 'laporan'
        ]);
    }
}
