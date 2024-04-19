@extends('dashboard.admin.layouts.main')

@section('container')
<div>
    <h3 class="font-bold ml-12 text-left mt-16 mb-5">List Pengajuan Reservasi</h3>
</div>
<table class="mt-6 ml-12">
  <thead class="bg-gray-400">
      <tr>
          <th class="font-semibold h-8 w-10 border border-gray-500">No.</th>
          <th class="font-semibold h-8 w-20 border border-gray-500">ID</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Timestamp</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Nama Pemain</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Jenis Lapangan</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Waktu Main</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Opsi</th>
      </tr>
  </thead>
  <tbody class="">
    
      <tr>
          <th class="h-8 w-10 border border-gray-500"></th>
          <th class="h-8 w-20 border border-gray-500"></th>
          <th class="h-8 w-48 border border-gray-500"></th>
          <th class="h-8 w-48 border border-gray-500"></th>
          <th class="h-8 w-48 border border-gray-500"></th>
          <th class="h-8 w-48 border border-gray-500"></th>
          <th class="h-8 w-48 border border-gray-500">
            
            <a href="#" class="badge bg-warning"><span class="text-lg fab fa-github" data-feather="edit"></span></a>
                <form action="" method="post" class="d-inline">
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
          </th>
      </tr>
    
  </tbody>
</table>
@endsection