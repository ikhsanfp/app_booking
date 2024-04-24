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
          <th class="font-semibold h-8 w-48 border border-gray-500">Jenis Lapangan</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Tanggal Main</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Durasi (Jam)</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Pemain</th>
      </tr>
  </thead>
  <tbody class="">
    @foreach ($pesan as $post)
      <tr>
          <th class="h-8 w-20 border border-gray-500">{{ $post->id }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->jenislap }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->tglmain }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ Carbon\Carbon::parse($post->time)->format('H:i') }} - {{ Carbon\Carbon::parse($post->times)->format('H:i') }}</th>
          <th class="h-8 w-20 border border-gray-500">{{ $post->profile->namapemain }}</th>
          
        </tr>
      @endforeach
  </tbody>
</table>
@endsection