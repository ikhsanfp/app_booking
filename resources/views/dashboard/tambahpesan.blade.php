@extends('dashboard.layouts.main')

@section('container')
<form action="/addpesan" method="POST" onsubmit="return validateForm()">
  @csrf
  <input type="hidden" name="id_pemain" id="id_pemain" value="{{ $id_pemain }}"/>
  <div class="ml-12 mt-10">
    <h3 class="font-bold text-left mb-3">Tambah Pesananmu</h3>
  </div>
  <div class="ml-12 mt-2">
    <h3 class="font-semibold text-left mb-3">Jenis Lapangan</h3>
    <div class="custom-select border border-zinc-400 rounded-sm w-46">
      <select name="jenislap" id="jenislap" class="ml-2 mt-3 mb-3">
        <option value="">Pilih Lapangan</option>
        <option value="Lapangan Basket">Lapangan Basket</option>
        <option value="Lapangan Futsal">Lapangan Futsal</option>
      </select>
    </div>
  </div>
  <div class="ml-12 mt-2">
    <h3 class="font-semibold text-left mb-3">Tanggal Main</h3>
    <input class="p-2 border border-zinc-400 rounded-sm w-48" type="date" id="tglmain" name="tglmain" />
  </div>
  <div class="ml-12 mt-2">
    <h3 class="font-semibold text-left mb-3">Start</h3>
    <div class="flex custom-select border border-zinc-400 rounded-sm w-46">
      <select name="start" id="start" class="ml-2 mt-3 mb-3">
        <option value="">Start</option>
        @for ($i = 9; $i <= 20; $i++)
          <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}.00</option>
        @endfor
      </select>
      <h1 class="mx-3 mt-1">_</h1>
      <select name="end" id="end" class="ml-2 mt-3 mb-3">
        <option value="">End</option>
        @for ($i = 10; $i <= 21; $i++)
          <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}.00</option>
        @endfor
      </select>
    </div>
  </div>

  <div class="ml-12 mt-3">
    <a href="/pesan" class="font-bold text-white bg-red-400 rounded px-5 py-2  hover:bg-red-800">Batal</a>
    <button class="font-bold text-white bg-green-400 rounded px-5 py-2 hover:bg-green-800" type="submit">Simpan</button>
  </div>
</form>
{{-- <script>
   document.addEventListener("DOMContentLoaded", function() {
    var inputTime = document.getElementById("jam");
    inputTime.stepUp(); // Menggeser satu langkah untuk menghilangkan menit
  });
  function validateForm() {
    var jenislap = document.getElementById("jenislap").value;
    var tglmain = document.getElementById("tglmain").value;
    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;
    var waktuSaatIni = new Date();
    var jamSaatIni = waktuSaatIni.getHours();
    var existingOrders = {!! json_encode($existingOrders) !!}; // Memuat data pesanan yang sudah ada

    // Validasi apakah semua input telah diisi
    if (jenislap === "" || tglmain === "" || start === "" || end === "") {
      alert("Mohon lengkapi semua input sebelum mengirimkan pesanan.");
      return false;
    }

    // Validasi untuk memastikan bahwa waktu mulai dan selesai tidak melewati waktu saat ini
    if (tglmain == "{{ date('Y-m-d') }}" && (start <= jamSaatIni || end <= jamSaatIni)) {
      alert("Tidak bisa memesan pada jam ini.");
      return false;
    }

    // Validasi untuk memastikan waktu mulai lebih awal dari waktu selesai
    if (end <= start) {
      alert("Waktu main yang anda masukkan salah.");
      return false;
    }

    // Validasi untuk memastikan tanggal main setelah hari ini
    if (tglmain < "{{ date('Y-m-d') }}") {
      alert("Tanggal main harus setelah hari ini.");
      return false;
    }

    for (var i = 0; i < existingOrders.length; i++) {
      var order = existingOrders[i];
      if (tglmain === order.tglmain && jenislap === order.jenislap) {
        if ((start >= order.start && start < order.end) || (end > order.start && end <= order.end) || (start <= order.start && end >= order.end)) {
          alert("Lapangan sudah dipesan pada rentang waktu yang sama.");
          return false;
        }
      }
    }
    return true;

  }
</script> --}}

@endsection