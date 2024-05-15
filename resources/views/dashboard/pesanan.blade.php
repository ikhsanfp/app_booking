@extends('dashboard.layouts.main')
@section('container')

<div>
    <h3 class="font-bold ml-12 text-left mt-16 mb-5">List Pesananmu</h3>
</div>
<div>
  <a href="/tambahpesan" class="font-bold text-white bg-blue-400 rounded px-5 py-2 ml-12 hover:bg-blue-800">
    Tambah</a>
</div>
<table class="mt-6 ml-12">
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
      @endphp
      @if($tanggalMain->isSameDay($sekarang) || $tanggalMain->isAfter($sekarang))
      <tr>
          <th class="h-8 w-20 border border-gray-500">{{ $id_user->firstItem() + $key }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $kodePesanan }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $jenisLapangan}}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->tglmain}}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->start }}.00 - {{ $post->end }}.00</th>
          <th class="h-8 w-20 border border-gray-500">{{ $post->profile->namapemain }}</th>
      </tr>
      @endif
    @endforeach
  </tbody>
</table>
    <div class="mt-5 ml-12 mr-64">
        {{ $id_user->links('pagination::tailwind') }}
    </div>  
@endsection
