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
use DateTime;

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
    // Cek apakah ada field yang belum diisi
    if (empty($request->jenislap) || empty($request->tglmain) || empty($request->start) || empty($request->end) || empty($request->id_pemain)) {
        return back()->withErrors(['error' => 'Mohon lengkapi semua data sebelum menyimpan pesanan.'])->withInput();
    }

    // Mendapatkan waktu saat ini
    $waktuSaatIni = new DateTime();
    $tanggalSaatIni = $waktuSaatIni->format('Y-m-d');
    $jamSaatIni = (int)$waktuSaatIni->format('H');
    $menitSaatIni = (int)$waktuSaatIni->format('i');

    // Validasi data input
    $validatedData = $request->validate([
        'jenislap' => 'required',
        'tglmain' => 'required|date|after_or_equal:' . $tanggalSaatIni,
        'start' => 'required|integer|min:0|max:24',
        'end' => 'required|integer|min:0|max:24|gte:start',
        'id_pemain' => 'required',
    ], [
        'tglmain.date' => 'Format tanggal tidak valid',
        'tglmain.after_or_equal' => 'Tidak bisa memesan di tanggal atau bulan yang sudah terlewat',
        'end.gte' => 'Tolong Perhatikan Waktu start dan end nya',
    ]);

    // Memeriksa apakah waktu mulai dan selesai tidak melewati waktu saat ini untuk hari ini
    if ($validatedData['tglmain'] == $tanggalSaatIni) {
        if ($validatedData['start'] <= $jamSaatIni && $menitSaatIni >0) {
            return redirect()->route('tambahpesan')
                             ->withErrors(['error' => 'Tidak bisa memesan pada jam ini.'])
                             ->withInput();
        }
    }

    // Cek waktu jika end lebih kecil atau sama dengan start
    if ($validatedData['end'] <= $validatedData['start']) {
        return redirect()->route('tambahpesan')
                         ->withErrors(['error' => 'Tolong Perhatikan Waktu start dan end nya'])
                         ->withInput();
    }

    // Validasi waktu yang tidak bentrok dengan pesanan yang sudah ada
    $existingOrders = Pesan::where('tglmain', $validatedData['tglmain'])
                           ->where('jenislap', $validatedData['jenislap'])
                           ->get();
    foreach ($existingOrders as $order) {
        if (($validatedData['start'] >= $order->start && $validatedData['start'] < $order->end) ||
            ($validatedData['end'] > $order->start && $validatedData['end'] <= $order->end) ||
            ($validatedData['start'] <= $order->start && $validatedData['end'] >= $order->end)) {
            return redirect()->route('tambahpesan')
                             ->withErrors(['error' => 'Lapangan sudah dipesan pada rentang waktu yang sama.'])
                             ->withInput();
        }
    }

    // Menyimpan pesanan
    Pesan::create($validatedData);

    return redirect('/pesan')->with('success', 'Pesan lapangan berhasil dibuat.');
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
        $image = Image::all();

        $pdf  = PDF::loadview('dashboard.cekcetakpesan', [
            "title" => "Cetak Pesanan",
            "active" => 'pesan',
            "id_pesan" => $id_pesan,
            "id_pemain" => $id_pemain,
            "pemain" => $pemain,
            "nohp" => $nohp,
            "data" => $data,
            "image" => $image
            // "id_pesan" => $id_pesan
        ])->setpaper('a4', 'landscape');
        return $pdf->stream('Laporan_Data_Pesanan.pdf');
    }
}
