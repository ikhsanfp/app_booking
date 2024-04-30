<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $query = $request;
        $id = Auth::user()->id;
        $id_user = Pesan::where('id', $id, '%' . $query . '%')->get();
        // dd($id_user);
        $pesan = Pesan::all();
        return view('dashboard.pesan', [
            "title" => "Pesanan",
            "active" => 'pesan',
            "pesan" => $pesan,
            "id_user" => $id_user

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

    public function view(Request $request)
    {
        // Ambil pesan berdasarkan ID
        $query = $request;
        $id = Auth::user()->id;
        $id_pesan = Pesan::where('id', $id, '%' . $query . '%')->get();

        return view('dashboard.cetakpesan', [
            "title" => "Cetak Pesanan",
            "id_pesan" => $id_pesan
        ]);
    }

    public function view_pdf(Request $request)
    {
        $query = $request;
        $id = Auth::user()->id;
        $id_pesan = Pesan::where('id', $id, '%' . $query . '%')->get();
        // Load HTML content
        // $id_pesan = Pesan::where('id', $pesan->id)->orWhere('id', 'LIKE', '%' . $query . '%')->orderBy('id')->get();
        $pdf  = PDF::loadview('dashboard.cetakpesan', [
            "title" => "Cetak Pesanan",
            "active" => "laporan",
            "id_pesan" => $id_pesan,
            // "id_pesan" => $id_pesan
        ])->setpaper('a4', 'landscape');
        return $pdf->stream('Laporan_Data_Pesanan.pdf');
    }
}
