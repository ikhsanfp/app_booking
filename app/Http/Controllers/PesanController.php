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
        $id_pemain = Auth::user()->id;
        $id_user = Pesan::where('id_pemain', $id_pemain, '%' . $query . '%')->paginate(6);
        // $pesan = Pesan::all();
        // dd($id_user);
        return view('dashboard.pesanan', [
            "title" => "Pesanan",
            "active" => 'pesan',
            // "pesan" => $pesan,
            "id_user" => $id_user

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        // Pastikan tidak ada pesanan yang bertabrakan dengan waktu yang diinputkan
        $pesananBertabrakan = Pesan::where('tglmain', $request->tglmain)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start', [$start, $end])
                    ->orWhereBetween('end', [$start, $end]);
            })
            ->exists();

        if ($pesananBertabrakan) {
            return redirect()->back()->with('error', 'Tidak dapat menambahkan pesanan karena waktu sudah terpakai.');
        }

        $existingOrders = Pesan::all(); // Mendapatkan semua pesanan dari database

        // Simpan pesanan jika tidak ada pesanan yang bertabrakan
        $id_pemain = Auth::user()->id;
        return view('dashboard.tambahpesan', [
            "title" => "Tambah Pesanan",
            "active" => 'pesan',
            'id_pemain' => $id_pemain,
            'existingOrders' => $existingOrders
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

    public function view(Request $request)
    {
        // Ambil tanggal dari input form (jika tersedia)
        $tanggal = $request->input('tanggal');

        // Ambil data pesan berdasarkan ID pemain dan filter tanggal jika ada
        $id_pemain = Auth::user()->id;
        $lapangan = Pesan::where('id_pemain', $id_pemain);

        // Jika tanggal telah dipilih, tambahkan filter berdasarkan tanggal
        if ($tanggal) {
            $lapangan->whereDate('tglmain', $tanggal);
        }

        // Ambil data pesan yang telah difilter
        $lapangan = $lapangan->get();

        // Ambil data pemain
        $post = Auth::user();
        $pemain = $post->namapemain;
        $nohp = $post->nohp;

        // Kembalikan view dengan data yang diperlukan
        $pdf  = PDF::loadview('dashboard.cetakpesan', [
            "title" => "Cetak Pesanan",
            "lapangan" => $lapangan,
            "id_pemain" => $id_pemain,
            "pemain" => $pemain,
            "nohp" => $nohp,
        ])->setpaper('a4', 'landscape');
        return $pdf->stream('Laporan_Data_Pesanan.pdf');
    }


    // public function view(Request $request)
    // {

    //     // Ambil pesan berdasarkan ID
    //     $query = $request;
    //     $post = Auth::user();
    //     $id_pemain = Auth::user()->id;
    //     $id_pesan = Pesan::where('id_pemain', $id_pemain, '%' . $query . '%')->get();
    //     $pemain = $post->namapemain;
    //     $nohp = $post->nohp;

    //     return view('dashboard.cetakpesan', [
    //         "title" => "Cetak Pesanan",
    //         "id_pesan" => $id_pesan,
    //         "id_pemain" => $id_pemain,
    //         "pemain" => $pemain,
    //         "nohp" => $nohp,
    //     ]);
    // }

    public function view_pdf(Request $request)
    {
        $query = $request;
        $post = Auth::user();
        $id_pemain = Auth::user()->id;
        $id_pesan = Pesan::where('id_pemain', $id_pemain, '%' . $query . '%')->get();
        $pemain = $post->namapemain;
        $nohp = $post->nohp;
        $tanggal = $request->input('datepicker');

        // Ambil data berdasarkan tanggal yang dipilih
        $data = Pesan::whereDate('tglmain', $tanggal)->get();

        $pdf  = PDF::loadview('dashboard.cekcetakpesan', [
            "title" => "Cetak Pesanan",
            "active" => 'pesan',
            "id_pesan" => $id_pesan,
            "id_pemain" => $id_pemain,
            "pemain" => $pemain,
            "nohp" => $nohp,
            "data" => $data,
            // "id_pesan" => $id_pesan
        ])->setpaper('a4', 'landscape');
        return $pdf->stream('Laporan_Data_Pesanan.pdf');
    }
}
