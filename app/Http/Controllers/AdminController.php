<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = $request;
        $lapanganbasket = Pesan::where('jenislap', 'Lapangan Basket', '%' . $query . '%')->get();
        $lapanganfutsal = Pesan::where('jenislap', 'Lapangan Futsal', '%' . $query . '%')->get();
        return view('dashboard.admin.index', [
            "title" => "Home",
            "active" => 'home',
            "pesan_basket" => $lapanganbasket,
            "pesan_futsal" => $lapanganfutsal,
        ]);
    }

    public function pesanmasuk()
    {
        $pesan = Pesan::all();
        return view('dashboard.admin.pesanmasuk', [
            "title" => 'Home',
            "active" => 'home',
            "pesan" => $pesan

        ]);
    }
    public function test()
    {

        return view('dashboard.admin.test', [
            "title" => 'test',

        ]);
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

    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'jenislap' => 'required',
            'tglmain' => 'required',
            'start' => 'required',
            'end' => 'required',
            'id_pemain' => 'required',
        ]);

        // Get post by ID
        $post = Pesan::findOrFail($id);
        // dd($request->all());
        // Update post with new data
        $post->update([
            'jenislap' => $request->jenislap,
            'tglmain' => $request->tglmain,
            'start' => $request->start,
            'end' => $request->end,
            // Include id_pemain in the update
        ]);
        // dd($post);
        // Redirect to index
        return redirect()->route('pesanmasuk')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
