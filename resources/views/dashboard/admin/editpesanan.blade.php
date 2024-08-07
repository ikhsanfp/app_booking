@extends('dashboard.admin.layouts.main')
@section('container')
<div class="bg-blue-100 min-h-screen pt-4">
<form action="{{ route('pesanan.update', $post->id) }}" method="POST" onsubmit="return validateForm()">
  @csrf
  @method('put')
  <input type="hidden" name="id_pemain" id="id_pemain" value="{{ $post->id_pemain }}"/>
  <div class="ml-12 mt-10">
      <h3 class="font-bold text-left mb-3">Tambah Pesananmu</h3>
  </div>
  <div class="ml-12 mt-2">
      <h3 class="font-semibold text-left mb-3">Jenis Lapangan</h3>
      <div class="custom-select border border-zinc-400 rounded-sm w-46 bg-white">
          <select name="jenislap" id="jenislap" class="ml-2 mt-3 mb-3">
              <option value="">Pilih Lapangan</option>
              <option value="Lapangan Basket" {{ $post->jenislap == 'Lapangan Basket' ? 'selected' : '' }}>Lapangan Basket</option>
              <option value="Lapangan Futsal" {{ $post->jenislap == 'Lapangan Futsal' ? 'selected' : '' }}>Lapangan Futsal</option>
          </select>
      </div>
  </div>
  <div class="ml-12 mt-2">
      <h3 class="font-semibold text-left mb-3">Tanggal Main</h3>
      <input class="p-2 border border-zinc-400 rounded-sm w-48" type="date" id="tglmain" name="tglmain" value="{{ $post->tglmain }}" />
  </div>
  <div class="ml-12 mt-2">
      <h3 class="font-semibold text-left mb-3">Start</h3>
      <div class="flex custom-select border border-zinc-400 rounded-sm w-46 bg-white">
          <select name="start" id="start" class="ml-2 mt-3 mb-3">
              <option value="">Start</option>
              @for ($i = 9; $i <= 20; $i++)
                  <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $post->start == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                      {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}.00
                  </option>
              @endfor
          </select>
          <h1 class="mx-3 mt-1">_</h1>
          <select name="end" id="end" class="ml-2 mt-3 mb-3">
              <option value="">End</option>
              @for ($i = 10; $i <= 21; $i++)
                  <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $post->end == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                      {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}.00
                  </option>
              @endfor
          </select>
      </div>
  </div>
  <div class="ml-12 mt-3">
      <a href="/pesanmasuk" class="font-bold text-white bg-red-400 rounded px-5 py-2 hover:bg-red-800">Batal</a>
      <button class="font-bold text-white bg-green-400 rounded px-5 py-2 hover:bg-green-800" type="submit">Simpan</button>
  </div>
</form>
<div id="errorMessages" class="ml-12 mt-4"></div>
</div>
<script>
    $(document).ready(function() {
        $('#updateForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Handle success response
                    alert('Data Berhasil Diubah!');
                    window.location.href = '/pesanmasuk';
                },
                error: function(xhr) {
                    // Handle error response
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += '<p class="text-red-600">' + value[0] + '</p>';
                    });
                    $('#errorMessages').html(errorMessages);
                }
            });
        });
    });
</script>
@endsection