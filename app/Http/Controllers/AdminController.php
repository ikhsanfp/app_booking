<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use PDF;
use DateTime;
class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = $request;
        $lapanganbasket = Pesan::where('jenislap', 'Lapangan Basket', '%' . $query . '%')->get();
        $lapanganfutsal = Pesan::where('jenislap', 'Lapangan Futsal', '%' . $query . '%')->get();
        return view('dashboard.admin.index', [
            "title" => "Home",
            "active" => 'admin',
            "pesan_basket" => $lapanganbasket,
            "pesan_futsal" => $lapanganfutsal,
        ]);
    }

    public function pesanmasuk()
    {
        $pesan = Pesan::paginate(6);
        $title = 'Pesan Masuk';
        $active = 'pesanmasuk';
        $judul = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($judul, $text);

        return view('dashboard.admin.pesanmasuk',compact('pesan','title','active'));
    //     return view('dashboard.admin.pesanmasuk', [
    //         "title" => 'Pesan Masuk',
    //         "active" => 'pesanmasuk',
    //         "pesan" => $pesan

    //     ]);
    }

    public function admlaporan()
    {
        return view('dashboard.admin.laporan', [
            "title" => "Laporan",
            "active" => 'laporan'
        ]);
    }

    public function show(string $id)
    {
        //get post by ID
        $post = Pesan::findOrFail($id);

        //render view with post
        return view('dashboard.admin.editpesanan', [
            "title" => "Edit",
            "active" => 'laporan',
            "post" => $post, // Mengirimkan data post ke view

        ]);
    }

    public function edit(Pesan $pesan)
    {
        $validatedData = request()->validate([
            'status' => 'required|in:Terkirim,Proses,Revisi,Diterima',
        ]);

        $pesan->update([
            'status' => $validatedData['status'],
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
    public function update(Request $request, $id)
{
    // Validasi data input
    $validatedData = $request->validate([
        'jenislap' => 'required',
        'tglmain' => 'required|date|after_or_equal:' . date('Y-m-d'),
        'start' => 'required|integer|min:0|max:24',
        'end' => 'required|integer|min:0|max:24|gte:start',
        'id_pemain' => 'required',
    ], [
        'tglmain.date' => 'Format tanggal tidak valid',
        'tglmain.after_or_equal' => 'Tidak bisa memesan di tanggal atau bulan yang sudah terlewat',
        'end.gte' => 'Tolong Perhatikan Waktu start dan end nya',
    ]);

    // Validasi waktu yang tidak bentrok dengan pesanan yang sudah ada
    $existingOrders = Pesan::where('tglmain', $validatedData['tglmain'])
                           ->where('jenislap', $validatedData['jenislap'])
                           ->where('id', '!=', $id)
                           ->get();
    foreach ($existingOrders as $order) {
        if (($validatedData['start'] >= $order->start && $validatedData['start'] < $order->end) ||
            ($validatedData['end'] > $order->start && $validatedData['end'] <= $order->end) ||
            ($validatedData['start'] <= $order->start && $validatedData['end'] >= $order->end)) {
            return response()->json(['errors' => ['Lapangan sudah dipesan pada rentang waktu yang sama.']], 422);
        }
    }

    // Mendapatkan pesanan berdasarkan ID
    $pesan = Pesan::findOrFail($id);

    // Mengupdate pesanan dengan data baru
    $pesan->update($validatedData);

    return response()->json(['success' => 'Data Berhasil Diubah!']);
}
//     public function update(Request $request, $id): RedirectResponse
// {
//     // Cek apakah ada field yang belum diisi
//     if (empty($request->jenislap) || empty($request->tglmain) || empty($request->start) || empty($request->end) || empty($request->id_pemain)) {
//         return redirect()->route('detail', ['id' => $id])
//                          ->withErrors(['error' => 'Mohon lengkapi semua data sebelum menyimpan pesanan.'])
//                          ->withInput();
//     }

//     // Mendapatkan waktu saat ini
//     $waktuSaatIni = new DateTime();
//     $tanggalSaatIni = $waktuSaatIni->format('Y-m-d');
//     $jamSaatIni = (int)$waktuSaatIni->format('H');
//     $menitSaatIni = (int)$waktuSaatIni->format('i');

//     // Validasi data input
//     $validatedData = $request->validate([
//         'jenislap' => 'required',
//         'tglmain' => 'required|date|after_or_equal:' . $tanggalSaatIni,
//         'start' => 'required|integer|min:0|max:24',
//         'end' => 'required|integer|min:0|max:24|gte:start',
//         'id_pemain' => 'required',
//     ], [
//         'tglmain.date' => 'Format tanggal tidak valid',
//         'tglmain.after_or_equal' => 'Tidak bisa memesan di tanggal atau bulan yang sudah terlewat',
//         'end.gte' => 'Tolong Perhatikan Waktu start dan end nya',
//     ]);

//     // Memeriksa apakah waktu mulai dan selesai tidak melewati waktu saat ini untuk hari ini
//     if ($validatedData['tglmain'] == $tanggalSaatIni) {
//         if ($validatedData['start'] <= $jamSaatIni && $menitSaatIni > 0) {
//             return redirect()->route('detail', ['id' => $id])
//                              ->withErrors(['error' => 'Tidak bisa memesan pada jam ini.'])
//                              ->withInput();
//         }
//     }

//     // Cek waktu jika end lebih kecil atau sama dengan start
//     if ($validatedData['end'] <= $validatedData['start']) {
//         return redirect()->route('detail', ['id' => $id])
//                          ->withErrors(['error' => 'Tolong Perhatikan Waktu start dan end nya'])
//                          ->withInput();
//     }

//     // Validasi waktu yang tidak bentrok dengan pesanan yang sudah ada
//     $existingOrders = Pesan::where('tglmain', $validatedData['tglmain'])
//                            ->where('jenislap', $validatedData['jenislap'])
//                            ->where('id', '!=', $id) // Tambahkan kondisi untuk mengabaikan pesanan yang sedang diupdate
//                            ->get();
//     foreach ($existingOrders as $order) {
//         if (($validatedData['start'] >= $order->start && $validatedData['start'] < $order->end) ||
//             ($validatedData['end'] > $order->start && $validatedData['end'] <= $order->end) ||
//             ($validatedData['start'] <= $order->start && $validatedData['end'] >= $order->end)) {
//             return redirect()->route('detail', ['id' => $id])
//                              ->withErrors(['error' => 'Lapangan sudah dipesan pada rentang waktu yang sama.'])
//                              ->withInput();
//         }
//     }

//     // Mendapatkan pesanan berdasarkan ID
//     $pesan = Pesan::findOrFail($id);

//     // Mengupdate pesanan dengan data baru
//     $pesan->update([
//         'jenislap' => $request->jenislap,
//         'tglmain' => $request->tglmain,
//         'start' => $request->start,
//         'end' => $request->end,
//         'id_pemain' => $request->id_pemain,
//     ]);

//     // Redirect ke index
//     return redirect()->route('pesanmasuk')->with(['success' => 'Data Berhasil Diubah!']);
// }

    // public function update(Request $request, $id): RedirectResponse
    // {
    //     // Validate form
    //     $this->validate($request, [
    //         'jenislap' => 'required',
    //         'tglmain' => 'required',
    //         'start' => 'required',
    //         'end' => 'required',
    //         'id_pemain' => 'required',
    //     ]);

    //     // Get post by ID
    //     $post = Pesan::findOrFail($id);
    //     // dd($request->all());
    //     // Update post with new data
    //     $post->update([
    //         'jenislap' => $request->jenislap,
    //         'tglmain' => $request->tglmain,
    //         'start' => $request->start,
    //         'end' => $request->end,
    //         // Include id_pemain in the update
    //     ]);
    //     // dd($post);
    //     // Redirect to index
    //     return redirect()->route('pesanmasuk')->with(['success' => 'Data Berhasil Diubah!']);
    // }
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id); // Mengambil data item berdasarkan ID
        $pesan->delete(); // Menghapus item
        // alert()->success('Terhapus!','Pesanan berhasil dihapus!!!');
        // return back();
        return redirect()->route('pesanmasuk')->with('success', 'Pesanan berhasil dihapus!!!');
    }

    public function createUser()
    {

        $user = User::paginate(6);
        $pesan = Pesan::paginate(6);
        return view('dashboard.admin.createUser', [
            "title" => 'Pesan Masuk',
            "active" => 'createuser',
            "pesan" => $pesan,
            "user" => $user

        ]);
    }
    public function rename(Request $request, $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'is_admin' => 'required',
        ]);

        // Get post by ID
        $post = User::findOrFail($id);
        // dd($request->all());
        // Update post with new data
        $post->update([
            'is_admin' => $request->is_admin,
            // Include id_pemain in the update
        ]);
        // dd($post);
        // Redirect to index
        return redirect()->route('create.user')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function laporan(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $lapangan = Pesan::query();
    
        // Jika tanggal telah dipilih, tambahkan filter berdasarkan tanggal
        if ($tanggal) {
            $lapangan->whereDate('tglmain', $tanggal);
        }
    
        // Ambil data pesan yang telah difilter
        $lapangan = $lapangan->get();
    
        //Periksa apakah data ditemukan
        if ($lapangan->isEmpty()) {
            // Kirim pesan ke view jika data tidak ditemukan
            return view('dashboard.admin.laporan', [
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
        $pdf  = PDF::loadview('dashboard.admin.cetakPesanan', [
            "title" => "Cetak Pesanan",
            "lapangan" => $lapangan,
            "pemain" => $pemain,
            "nohp" => $nohp,
        ])->setpaper('a4', 'landscape');
        return $pdf->stream('Laporan_Data_Pesanan' . time() . '.pdf');
    }

}
