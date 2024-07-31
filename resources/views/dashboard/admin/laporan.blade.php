@extends('dashboard.admin.layouts.main')
@section('container')
    <div>
        <h3 class="font-bold ml-12 text-left mt-16 mb-5">Pilih Tanggal Reservasi Untuk Melihat Laporan</h3>
    </div>
    <form class="ml-12 mt-2" action="{{ route('cetak.pesananadmin') }}" method="GET">

        <!-- Input tanggal awal -->
        <label for="start_date">Tanggal Awal:</label>
        <input type="date" id="start_date" name="start_date" class="bg-gray-200" required>
        
        <!-- Input tanggal akhir -->
        <label for="end_date" class="ml-4">Tanggal Akhir:</label>
        <input type="date" id="end_date" name="end_date" class="bg-gray-200" required>

        <!-- Tombol untuk submit -->
        <input type="submit" value="Lihat Laporan" class="ml-4 bg-blue-500 text-white px-4 py-2 rounded">
    </form>
    @if (isset($alert))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $alert }}'
        });
    </script>
@endif
@endsection
