<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controllerl;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mendapatkan query pencarian dari inputan form
        // $query = $request->input('q');

        // Mencari pesan berdasarkan nama jika query pencarian diberikan

        // $lapanganfutsal = Pesan::where('jenislap', 'Lapangan Futsal', '%' . $query . '%')->get();
        // dd($pesan);

        $pesan = Pesan::all();
        return view('dashboard.pesan', [
            "title" => "Pesanan",
            "active" => 'pesan',
            "pesan" => $pesan, // Melewatkan data pesan ke tampilan
            // Melewatkan query pencarian ke tampilan
            // "query" => $query 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_pemain = Auth::user()->id;
        return view('dashboard.tambahpesan', [
            "title" => "Tambah Pesanan",
            "active" => 'pesan',
            'id_pemain' => $id_pemain
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenislap' => 'required',
            'tglmain' => 'required',
            'start' => 'required',
            'end' => 'required',
            'id_pemain' => 'required',
        ]);
        // dd($validateData);
        Pesan::create($validateData);
        return redirect('/pesan');
        // return redirect()->route('dashboard.pesan')
        //     ->with('success', 'Pesan lapangan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
