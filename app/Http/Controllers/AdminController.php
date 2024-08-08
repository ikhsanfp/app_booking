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
    if ($request->start === $request->end) {
        return redirect()->back()->withErrors(['start' => 'Jam yang dimasukan salah'])->withInput();
    }
    // Validasi waktu yang tidak bentrok dengan pesanan yang sudah ada
    $existingOrders = Pesan::where('tglmain', $validatedData['tglmain'])
                           ->where('jenislap', $validatedData['jenislap'])
                           ->where('id', '!=', $id)
                           ->get();
    foreach ($existingOrders as $order) {
        if (($validatedData['start'] >= $order->start && $validatedData['start'] < $order->end) ||
            ($validatedData['end'] > $order->start && $validatedData['end'] <= $order->end) ||
            ($validatedData['start'] <= $order->start && $validatedData['end'] >= $order->end)) {
            return redirect()->json(['errors' => ['Lapangan sudah dipesan pada rentang waktu yang sama.']], 422);
        }
    }

    // Mendapatkan pesanan berdasarkan ID
    $pesan = Pesan::findOrFail($id);

    // Mengupdate pesanan dengan data baru
    $pesan->update($validatedData);

//    return redirect()->route('pesanmasuk')->with(['success' => 'Data Berhasil Diubah!']);
return redirect()->route('pesanmasuk')->with(['success' => 'Data Berhasil Diubah!']);
}

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
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $lapangan = Pesan::query();

    // Jika tanggal telah dipilih, tambahkan filter berdasarkan tanggal
    if ($start_date && $end_date) {
        $lapangan->whereBetween('tglmain', [$start_date, $end_date]);
    }

    // Ambil data pesan yang telah difilter
    $lapangan = $lapangan->get();

    // Periksa apakah data ditemukan
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
