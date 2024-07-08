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
    // public function store(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'jenislap' => 're   quired',
    //         'tglmain' => 'required',
    //         'start' => 'required',
    //         'end' => 'required',
    //         'id_pemain' => 'required',
    //     ]);
    //     // dd($validateData);
    //     Pesan::create($validateData);
    //     return redirect('/pesan')->with('success', 'Pesan lapangan berhasil dibuat.');
    //     // return redirect()->route('dashboard.pesan')
    //     //     ->with('success', 'Pesan lapangan berhasil dibuat.');
    // }
    public function store(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'jenislap' => 'required',
        'tglmain' => 'required|date|after:today',
        'start' => 'required|date_format:H:i',
        'end' => 'required|date_format:H:i|after:start',
        'id_pemain' => 'required',
    ]);

    // Mendapatkan waktu saat ini
    $waktuSaatIni = new DateTime();
    $jamSaatIni = $waktuSaatIni->format('H:i');

    // Memeriksa apakah waktu mulai dan selesai tidak melewati waktu saat ini untuk hari ini
    if ($validatedData['tglmain'] == date('Y-m-d') && ($validatedData['start'] <= $jamSaatIni || $validatedData['end'] <= $jamSaatIni)) {
        return redirect('/pesan/create')
            ->withErrors(['error' => 'Tidak bisa memesan pada jam ini.'])
            ->withInput();
    }

    // Memeriksa apakah waktu mulai lebih awal dari waktu selesai
    if ($validatedData['end'] <= $validatedData['start']) {
        return redirect('/pesan/create')
            ->withErrors(['error' => 'Waktu main yang anda masukkan salah.'])
            ->withInput();
    }

    // Memeriksa apakah ada pesanan yang bentrok
    $existingOrders = Pesan::where('jenislap', $validatedData['jenislap'])
        ->where('tglmain', $validatedData['tglmain'])
        ->where(function($query) use ($validatedData) {
            $query->whereBetween('start', [$validatedData['start'], $validatedData['end']])
                ->orWhereBetween('end', [$validatedData['start'], $validatedData['end']])
                ->orWhere(function($query) use ($validatedData) {
                    $query->where('start', '<=', $validatedData['start'])
                          ->where('end', '>=', $validatedData['end']);
                });
        })
        ->exists();

    if ($existingOrders) {
        return redirect('/pesan/create')
            ->withErrors(['error' => 'Lapangan sudah dipesan pada rentang waktu yang sama.'])
            ->withInput();
    }

    // Simpan data pesanan
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
