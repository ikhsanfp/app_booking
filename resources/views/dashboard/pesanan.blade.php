@extends('dashboard.layouts.main')

@section('container')
<div class="bg-blue-100 min-h-screen pt-4">
<div>
    <h3 class="font-bold ml-12 text-left mt-12 mb-5">List Pesananmu</h3>
</div>
<div>
  <a href="/tambahpesan" class="font-bold text-white bg-blue-400 rounded px-5 py-2 ml-12 hover:bg-blue-800">
    Tambah</a>
</div>
<div class="overflow-x-auto ml-12 mr-12"> <!-- Tambahkan overflow-x-auto untuk mengaktifkan scrolling horizontal jika tabel melebihi lebar layar -->
<table class="mt-6 w-3/4 table-fixed"> <!-- Tambahkan kelas table-fixed -->
  <thead class="bg-gray-400">
      <tr>
          <th class="font-semibold h-8 w-10 border border-gray-500">No.</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Kode Pesanan</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Jenis Lapangan</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Tanggal Main</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Durasi (Jam)</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Pemain</th>
      </tr>
  </thead>
  <tbody class="">
    @php
        $counter = 1;
        $kodePesananCount = 1;
    @endphp
    @if($id_user->count() > 0)
    @foreach ($id_user as $key => $post)
      @php  
          $tanggalMain = \Carbon\Carbon::parse($post->tglmain);
          $sekarang = \Carbon\Carbon::now();
          $kodePesanan = '';
          $id_pesan = $post->id;
          // Set kode pesanan berdasarkan jenis lapangan
          if($post->jenislap == 'Lapangan Basket') {
              $kodePesanan = 'B' . sprintf("%03d", $id_pesan);
          } elseif($post->jenislap == 'Lapangan Futsal') {
              $kodePesanan = 'F' . sprintf("%03d", $id_pesan);
          }
          $kodePesananCount++;
          $jenisLapangan = '';

          if($post->jenislap == 'Lapangan Basket'){
            $jenisLapangan ='Basket';
          } else if($post->jenislap == 'Lapangan Futsal'){
            $jenisLapangan ='Futsal';
          }

          $startFormatted = number_format($post->start, 2);
          $endFormatted = number_format($post->end, 2);
      @endphp
      @if($tanggalMain->isSameDay($sekarang) || $tanggalMain->isAfter($sekarang))
      <tr>
          <th class="h-8 w-10 border bg-white border-gray-500">{{ $id_user->firstItem() + $key }}</th>
          <th class="h-8 w-48 border bg-white border-gray-500">{{ $kodePesanan }}</th>
          <th class="h-8 w-48 border bg-white border-gray-500">{{ $jenisLapangan}}</th>
          <th class="h-8 w-48 border bg-white border-gray-500">{{ $post->tglmain}}</th>
          <th class="h-8 w-48 border bg-white border-gray-500">{{ $startFormatted }} - {{ $endFormatted }}</th>
          <th class="h-8 w-20 border bg-white border-gray-500">{{ $post->profile->namapemain }}</th>
      </tr>
      @endif
    @endforeach
    @else
      <tr>
        <td colspan="6" class="font-semibold h-8 w-20 border border-gray-500 text-center">Tidak ada pesanan yang ditemukan.</td>
      </tr>
    @endif
  </tbody>
</table>
</div> <!-- Penutup overflow-x-auto -->
<div class="mt-5 ml-12 max-w-5xl">
    {{ $id_user->links('pagination::tailwind') }}
</div>  
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const alertBox = document.getElementById('alert');
    const closeButton = document.getElementById('close-alert');

    if (closeButton) {
      closeButton.addEventListener('click', function () {
        alertBox.style.display = 'none';
      });
    }
  });
</script>
@endsection
