<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

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
        // $request->validate([
        //     'tanggal' => 'required|date',
        // ]);

        // $tanggal = $request->tanggal;

        // $data = Pesan::whereDate('tanggal', $tanggal)->get();

        // if ($data->isEmpty()) {
        //     return redirect()->back()->with('error', 'Data tidak ditemukan untuk tanggal yang dipilih.');
        // }

        // // Jika ada data yang ditemukan, lanjutkan untuk menampilkan data
        // return view('dashboard.laporan', compact('data'));

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
}
