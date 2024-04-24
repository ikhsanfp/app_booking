<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanadmin()
    {
        return view('dashboard.admin.laporan', [
            "title" => "Laporan",
            "active" => 'laporan'
        ]);
    }
}
