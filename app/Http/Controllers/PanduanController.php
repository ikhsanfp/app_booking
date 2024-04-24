<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function panduan()
    {
        return view('dashboard.panduan', [
            "title" => "Panduan",
            "active" => 'panduan'
        ]);
    }
}
