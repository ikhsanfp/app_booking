@extends('dashboard.admin.layouts.main')
@section('container')
<div class="bg-blue-100 min-h-screen pt-4">
    <div>
        <h3 class="font-bold ml-12 text-left mt-12 mb-5">Pilih Tanggal Reservasi Untuk Melihat Laporan</h3>
    </div>
    <form class="ml-12 mt-2" action="{{ route('cetak.pesananadmin') }}" method="GET">
        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->has('tanggal'))
            <div class="alert alert-danger">
                {{ $errors->first('tanggal') }}
            </div>
        @endif
        
        <!-- Input jenis date -->
        <input type="date" id="datepicker" name="tanggal" class="bg-gray-200" required>
        <!-- Tombol untuk submit -->
        <input type="submit" value="Lihat Laporan" class="">
    </form>
</div>
    @if (isset($alert))
    <script>
        alert('{{ $alert }}');
    </script>

@endif
    
@endsection