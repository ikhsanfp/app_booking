<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Image;
use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan', [
            "title" => "Laporan",
            "active" => 'laporan'
        ]);
    }
    public function filterData(Request $request)
    {

        $tanggal = $request->input('tanggal');
        $id_pemain = Auth::user()->id;
        $lapangan = Pesan::where('id_pemain', $id_pemain);

        // Jika tanggal telah dipilih, tambahkan filter berdasarkan tanggal
        if ($tanggal) {
            $lapangan->whereDate('tglmain', $tanggal);
        }

        // Ambil data pesan yang telah difilter
        $lapangan = $lapangan->get();

        //Periksa apakah data ditemukan
        if ($lapangan->isEmpty()) {
            // Kirim pesan ke view jika data tidak ditemukan
            return view('dashboard.laporan', [
                'title' => 'Filter Data',
                'alert' => 'Data tidak ditemukan',
                'active'=> 'laporan'
                // Tambahkan data lain yang mungkin diperlukan oleh view
            ]);
        }

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
        return $pdf->stream('Laporan_Data_Pesanan' . time() . 'pdf');
    }
}
