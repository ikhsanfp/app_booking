@extends('dashboard.layouts.main')

@section('container')
<form action="/addpesan" method="POST">
  @csrf
  <div>
    <input type="hidden" name="id_pemain" id="id_pemain" value="{{ $id_pemain }}"/>
  </div>
<div>
  <h3 class="font-bold ml-12 text-left mt-10 mb-3">Tambah Pesananmu</h3>
</div>
<div>
  <h3 class="font-semibold ml-12 text-left mt-2 mb-3">Jenis Lapangan</h3>
</div>
<div class="custom-select ml-12 text-left  border border-zinc-400 rounded-sm w-46">
  <select name="jenislap" type="text" id="jenislap"  class="ml-2 text-left mt-3 mb-3">
    <option value="pilih">Pilih Lapangan</option>
    <option value="Lapangan Basket">Lapangan Basket</option>
    <option value="Lapangan Futsal">Lapangan Futsal</option>
  </select>
 </div>
<div>
  <h3 class="font-semibold ml-12 text-left mt-2 mb-3">Tanggal Main</h3>
</div>
<div class="ml-12 mt-3 mb-4">
  <input  class="p-2 border border-zinc-400 rounded-sm w-48" type="date" id="tglmain" name="tglmain" />
</div>
<div class="ml-12 mt-3">
  <h3>Start</h3>
</div>
<div class="flex custom-select ml-12 text-left  border border-zinc-400 rounded-sm w-46">
  <select name="start" type="text" id="start"  class="ml-2 text-left mt-3 mb-3">
    <option value="">Start</option>
    <option value="09.00">09.00</option>
    <option value="10.00">10.00</option>
    <option value="11.00">11.00</option>
    <option value="12.00">12.00</option>
    <option value="13.00">13.00</option>
    <option value="14.00">14.00</option>
    <option value="15.00">15.00</option>
    <option value="16.00">16.00</option>
    <option value="17.00">17.00</option>
    <option value="18.00">18.00</option>
    <option value="19.00">19.00</option>
    <option value="20.00">20.00</option>    
  </select>
  <h1 class="mx-3 mt-1">_</h1>
  <select name="end" type="text" id="end"  class="ml-2 text-left mt-3 mb-3">
    <option value="">End</option>
    <option value="10.00">10.00</option>
    <option value="11.00">11.00</option>
    <option value="12.00">12.00</option>
    <option value="13.00">13.00</option>
    <option value="14.00">14.00</option>
    <option value="15.00">15.00</option>
    <option value="16.00">16.00</option>
    <option value="17.00">17.00</option>
    <option value="18.00">18.00</option>
    <option value="19.00">19.00</option>
    <option value="20.00">20.00</option>
    <option value="21.00">21.00</option>
  </select>
 </div>

<div>
  <button class="font-bold text-white bg-green-400 rounded px-5 py-2 ml-12 hover:bg-green-800" type="submit">
    Simpan</button>
  <a href="/pesan"
    class="font-bold text-white bg-red-400 rounded px-5 py-2 ml-2 hover:bg-red-800">
    Batal</a>
</div>
</form>
@endsection