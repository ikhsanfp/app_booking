@extends('dashboard.layouts.main')
@section('container')
<div class="bg-blue-100 min-h-screen pt-4">
    <div>
        <h3 class="font-bold ml-4 sm:ml-12 text-left mt-8 sm:mt-12 mb-5">Pilih Tanggal Reservasi Untuk Melihat Laporan</h3>
    </div>
    <form class="ml-4 sm:ml-12 mt-2 flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4" action="{{ route('cetak.pesanan') }}" method="GET">
        
        <!-- Input jenis date -->
        <input type="date" id="datepicker" name="tanggal" class="bg-gray-200 border-zinc-400 p-2 rounded" required>
        <!-- Tombol untuk submit -->
        <input type="submit" value="Lihat Laporan" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-800 cursor-pointer">
    </form>
    @if (isset($alert))
    <script>
        alert('{{ $alert }}');
    </script>
</div>
@endif

@endsection
 