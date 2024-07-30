@extends('dashboard.admin.layouts.main')

@section('container')
<div class="bg-blue-100 min-h-screen pt-4">
<h3 class="font-bold ml-12 text-left mt-12 mb-5">List Pengajuan Reservasi</h3>
<div class="overflow-x-auto ml-12 mr-12">
  <table class="mt-2 w-3/4 min-w-[800px] font-bold">
    <thead class="bg-gray-400">
      <tr>
        <th class="font-semibold h-8 w-10 border border-gray-500 text-center">No.</th>
        <th class="font-semibold h-8 w-20 border border-gray-500 text-center">ID</th>
        <th class="font-semibold h-8 w-48 border border-gray-500 text-center">Timestamp</th>
        <th class="font-semibold h-8 w-48 border border-gray-500 text-center">Nama Pemain</th>
        <th class="font-semibold h-8 w-48 border border-gray-500 text-center">Jenis Lapangan</th>
        <th class="font-semibold h-8 w-48 border border-gray-500 text-center">Waktu Main</th>
        <th class="font-semibold h-8 w-48 border border-gray-500 text-center">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @php
        $counter = 1;
        $kodePesananCount = 1;
      @endphp
      @if($pesan->count() > 0)
      @foreach ($pesan as $key => $post)
      @php  
        $tanggalMain = \Carbon\Carbon::parse($post->tglmain);
        $sekarang = \Carbon\Carbon::now();
        $kodePesanan = '';
        $id_pesan = $post->id;
        if($post->jenislap == 'Lapangan Basket') {
          $kodePesanan = 'B' . sprintf("%03d", $id_pesan);
        } elseif($post->jenislap == 'Lapangan Futsal') {
          $kodePesanan = 'F' . sprintf("%03d", $id_pesan);
        }
        $kodePesananCount++;
        $jenisLapangan = ($post->jenislap == 'Lapangan Basket') ? 'Basket' : 'Futsal';

        $startFormatted = number_format($post->start, 2);
        $endFormatted = number_format($post->end, 2);
      @endphp
      <tr>
        <td class="h-8 w-10 border bg-white border-gray-500 text-center">{{ $pesan->firstItem() + $key }}</td>
        <td class="h-8 w-20 border bg-white border-gray-500 text-center">{{ $kodePesanan }}</td>
        <td class="h-8 w-48 border bg-white border-gray-500 text-center">{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</td>
        <td class="h-8 w-48 border bg-white border-gray-500 text-center">{{ $post->profile->namapemain }}</td>
        <td class="h-8 w-48 border bg-white border-gray-500 text-center">{{ $jenisLapangan }}</td>
        <td class="h-8 w-48 border bg-white border-gray-500 text-center">{{ $startFormatted }} - {{ $endFormatted }}</td>
        <td class="h-8 w-48 border bg-white border-gray-500 text-center">
          <div class="flex justify-center items-center space-x-2">
            <a href="{{ route('pesanan.detail', $post->id) }}" class="inline-flex justify-center items-center">
              <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="17" height="17" rx="4" fill="#F9D48C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2283 4.42741C11.9546 4.15374 11.5833 4 11.1962 4C10.8092 4 10.4379 4.15374 10.1642 4.42741L9.82014 4.77192L12.2288 7.18059L12.5723 6.83657C12.7079 6.70101 12.8155 6.54007 12.8889 6.36294C12.9622 6.18581 13 5.99597 13 5.80424C13 5.61252 12.9622 5.42267 12.8889 5.24555C12.8155 5.06842 12.7079 4.90748 12.5723 4.77192L12.2283 4.42741ZM11.5403 7.86864L9.1316 5.45997L4.70841 9.88365C4.61162 9.98046 4.544 10.1025 4.51328 10.2359L4.01257 12.4038C3.99391 12.4842 3.99605 12.5681 4.01879 12.6476C4.04152 12.727 4.08411 12.7993 4.14252 12.8577C4.20094 12.9161 4.27326 12.9587 4.35269 12.9815C4.43211 13.0042 4.51601 13.0063 4.59649 12.9877L6.76478 12.4874C6.89801 12.4566 7.01991 12.389 7.11659 12.2923L11.5403 7.86864Z" fill="white"/>
              </svg>
            </a>
            <form action="{{ route('pesan.destroy', $post->id) }}" method="POST" data-confirm-delete="true" class="inline-flex justify-center items-center">
              @csrf
              @method('DELETE')
              <button type="submit" class="">
                <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="17" height="17" rx="5" fill="#FF7575"/>
                  <path d="M5.2001 4.6C5.04097 4.6 4.88836 4.66321 4.77583 4.77574C4.66331 4.88826 4.6001 5.04087 4.6001 5.2V5.8C4.6001 5.95913 4.66331 6.11174 4.77583 6.22426C4.88836 6.33679 5.04097 6.4 5.2001 6.4H5.8001V11.8C5.8001 11.9591 5.86331 12.1117 5.97583 12.2243C6.08836 12.3368 6.24097 12.4 6.4001 12.4H10.6001C10.7592 12.4 10.9118 12.3368 11.0243 12.2243C11.1369 12.1117 11.2001 11.9591 11.2001 11.8V6.4H11.8001C11.9592 6.4 12.1118 6.33679 12.2243 6.22426C12.3369 6.11174 12.4001 5.95913 12.4001 5.8V5.2C12.4001 5.04087 12.3369 4.88826 12.2243 4.77574C12.1118 4.66321 11.9592 4.6 11.8001 4.6H8.3001H5.2001ZM7.2001 7.2H6.4001V11.2H7.2001V7.2ZM9.6001 7.2H10.4001V11.2H9.6001V7.2Z" fill="white"/>
                </svg>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="6" class="font-semibold h-8 w-20 border border-gray-500 text-center">Tidak ada pesanan yang ditemukan.</td>
      </tr>
      @endif
    </tbody>
  </table>
  <div class="w-3/4 mt-5 justify-end">
    {{ $pesan->links() }}
  </div>
</div>
</div>
<script>
  // function myFunction() {
  //   if(!confirm("Are you sure you want to delete this record?"))
  //   event.preventDefault();
  // }
  // const closeAlert = document.getElementById('close-alert');
  // closeAlert.addEventListener('click', () => {
  //   const alert = document.getElementById('alert');
  //   alert.style.display = 'none';
  // });
</script>

@endsection
