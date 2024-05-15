@extends('dashboard.admin.layouts.main')

@section('container')
<div>
  @if(session()->has('success'))
    <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
      {{ session('success') }}
    </div>
    @endif
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
  <tbody>
    @php
        $counter = 1;
        $kodePesananCount = 1;
    @endphp
    @foreach ( $pesan as $key => $post)
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
      {{-- @if($tanggalMain->isSameDay($sekarang) || $tanggalMain->isAfter($sekarang)) --}}
      <tr>
          <th class="h-8 w-10 border border-gray-500">{{ $pesan->firstItem() + $key }}</th>
          <th class="h-8 w-20 border border-gray-500">{{ $kodePesanan }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->profile->namapemain }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $jenisLapangan }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->start }}.00 - {{ $post->end }}.00</th>
          <th class="h-8 w-48 border border-gray-500 flex justify-center">
            <a href="{{ route('pesanan.detail', $post->id) }}" class="mx-2">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="15" height="15" rx="4" fill="#F9D48C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2283 3.42741C10.9546 3.15374 10.5833 3 10.1962 3C9.80916 3 9.43792 3.15374 9.16417 3.42741L8.82014 3.77192L11.2288 6.18059L11.5723 5.83657C11.7079 5.70101 11.8155 5.54007 11.8889 5.36294C11.9622 5.18581 12 4.99597 12 4.80424C12 4.61252 11.9622 4.42267 11.8889 4.24555C11.8155 4.06842 11.7079 3.90748 11.5723 3.77192L11.2283 3.42741ZM10.5403 6.86864L8.1316 4.45997L3.70841 8.88365C3.61162 8.98046 3.544 9.10254 3.51328 9.23595L3.01257 11.4038C2.99391 11.4842 2.99605 11.5681 3.01879 11.6476C3.04152 11.727 3.08411 11.7993 3.14252 11.8577C3.20094 11.9161 3.27326 11.9587 3.35269 11.9815C3.43211 12.0042 3.51601 12.0063 3.59649 11.9877L5.76478 11.4874C5.89801 11.4566 6.01991 11.389 6.11659 11.2923L10.5403 6.86864Z" fill="white"/>
                </svg>
            </a>
            <form action="{{ route('pesan.destroy', $post->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="mt-2">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="15" height="15" rx="5" fill="#FF7575"/>
                    <path d="M4.2001 3.6C4.04097 3.6 3.88836 3.66321 3.77583 3.77574C3.66331 3.88826 3.6001 4.04087 3.6001 4.2V4.8C3.6001 4.95913 3.66331 5.11174 3.77583 5.22426C3.88836 5.33679 4.04097 5.4 4.2001 5.4H4.5001V10.8C4.5001 11.1183 4.62653 11.4235 4.85157 11.6485C5.07661 11.8736 5.38184 12 5.7001 12H9.3001C9.61836 12 9.92358 11.8736 10.1486 11.6485C10.3737 11.4235 10.5001 11.1183 10.5001 10.8V5.4H10.8001C10.9592 5.4 11.1118 5.33679 11.2244 5.22426C11.3369 5.11174 11.4001 4.95913 11.4001 4.8V4.2C11.4001 4.04087 11.3369 3.88826 11.2244 3.77574C11.1118 3.66321 10.9592 3.6 10.8001 3.6H8.7001C8.7001 3.44087 8.63688 3.28826 8.52436 3.17574C8.41184 3.06321 8.25923 3 8.1001 3H6.9001C6.74097 3 6.58836 3.06321 6.47583 3.17574C6.36331 3.28826 6.3001 3.44087 6.3001 3.6H4.2001ZM6.0001 6C6.07966 6 6.15597 6.03161 6.21223 6.08787C6.26849 6.14413 6.3001 6.22044 6.3001 6.3V10.5C6.3001 10.5796 6.26849 10.6559 6.21223 10.7121C6.15597 10.7684 6.07966 10.8 6.0001 10.8C5.92053 10.8 5.84423 10.7684 5.78797 10.7121C5.7317 10.6559 5.7001 10.5796 5.7001 10.5V6.3C5.7001 6.22044 5.7317 6.14413 5.78797 6.08787C5.84423 6.03161 5.92053 6 6.0001 6ZM7.5001 6C7.57966 6 7.65597 6.03161 7.71223 6.08787C7.76849 6.14413 7.8001 6.22044 7.8001 6.3V10.5C7.8001 10.5796 7.76849 10.6559 7.71223 10.7121C7.65597 10.7684 7.57966 10.8 7.5001 10.8C7.42053 10.8 7.34423 10.7684 7.28797 10.7121C7.2317 10.6559 7.2001 10.5796 7.2001 10.5V6.3C7.2001 6.22044 7.2317 6.14413 7.28797 6.08787C7.34423 6.03161 7.42053 6 7.5001 6ZM9.3001 6.3V10.5C9.3001 10.5796 9.26849 10.6559 9.21223 10.7121C9.15597 10.7684 9.07966 10.8 9.0001 10.8C8.92053 10.8 8.84423 10.7684 8.78797 10.7121C8.7317 10.6559 8.7001 10.5796 8.7001 10.5V6.3C8.7001 6.22044 8.7317 6.14413 8.78797 6.08787C8.84423 6.03161 8.92053 6 9.0001 6C9.07966 6 9.15597 6.03161 9.21223 6.08787C9.26849 6.14413 9.3001 6.22044 9.3001 6.3Z" fill="white"/>
                </svg>  
              </button>
            </form>
          </th>
      </tr>
      {{-- @endif --}}
      @endforeach
  </tbody>
</table>
<div class="mt-5 ml-12 mr-40">
  {{ $pesan->links('pagination::tailwind') }}
  </div>
@endsection