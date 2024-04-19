@extends('dashboard.layouts.main')

@section('container')
    <div>
        <h3 class="font-bold ml-12 text-left mt-16 mb-5">Pilih Tanggal Reservasi Untuk Melihat Laporan</h3>
    </div>
    <form class="ml-12 mt-2">
        <!-- Label untuk tanggal -->
        <label for="datepicker">Pilih Tanggal:</label>
        <!-- Input jenis date -->
        <input type="date" id="datepicker" name="datepicker">
        <!-- Tombol untuk submit -->
        <input type="submit" value="Tampilkan Laporan">
    </form>

@endsection