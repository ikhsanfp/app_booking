@extends('dashboard.admin.layouts.main')
@section('container')
    <div>
        <h3 class="font-bold ml-12 text-left mt-16 mb-5">Pilih Tanggal Reservasi Untuk Melihat Laporan</h3>
    </div>
    <form class="ml-12 mt-2" action="{{ route('cetak.pesan') }}" method="GET">
        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->has('tanggal'))
            <div class="alert alert-danger">
                {{ $errors->first('tanggal') }}
            </div>
        @endif

        <!-- Label untuk tanggal -->
        <label for="datepicker">Pilih Tanggal :</label>
        <!-- Input jenis date -->
        <input type="date" id="datepicker" name="tanggal" class="bg-gray-200" required>
        <!-- Tombol untuk submit -->
        <input type="submit" value="Lihat Laporan" class="">
    </form>
    
@endsection