<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenislap' => 'required|string|max:155',
            'tglmain' => 'required',
            'jam' => 'required',
            'durasi' => 'required'
        ]);

        $pesan = Pesan::create([
            'jenislap' => $request->jenislap,
            'tglmain' => $request->tglmain,
            'jam' => $request->jam,
            'durasi' => $request->durasi,
            
        ]);

        if ($pesan) {
            return redirect()
                ->route('pesan')
                ->with([
                    'success' => 'Pesanan berhasil ditambah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    
    public function showPesan()
    {
    $pesan = Pesan::all(); // Mengambil semua pesan dari model Pesan
    return view('dashboard.pesan', compact('pesan')); // Mengirim variabel $pesan ke view
    }
    
}
