@extends('dashboard.admin.layouts.main')

@section('container')
    <div>
        <h3 class="font-bold ml-12 text-left mt-16 mb-5">Pilih Tanggal Reservasi Untuk Melihat Laporan</h3>
    </div>
   <div class="ml-12 mt-3 mb-4">
        <input  class="p-2 border bg-gray-300 border-zinc-400 rounded-sm w-48" type="date" id="date" name="date" />
        <a  href="{{ route('cetak.pesan') }}" target="_blank" class="font-bold text-white bg-blue-400 rounded px-5 py-2 ml-2 hover:bg-blue-800">Lihat Laporan</a>
    </div>
@endsection
