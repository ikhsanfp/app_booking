@extends('dashboard.admin.layouts.main')
@section('container')
<div class="ml-12">
  
<h3 class="font-bold ml-12 text-left mt-12 mb-5">List Akun</h3>
<div class="overflow-x-auto ml-12 mr-12">
<table class="min-w-[800px]">
  <thead class="bg-gray-400">
      <tr>
          <th class="font-semibold h-8 w-10 border border-gray-500">No.</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Timestamp</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Nama Pemain</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Opsi</th>
          <th class="font-semibold h-8 w-48 border border-gray-500">Keterangan</th>
      </tr>
  </thead>
  <tbody>

    @foreach ( $user as $post)
    @if (auth()->user()->id != $post->id) {{-- Mengecek apakah ID pengguna yang sedang login tidak sama dengan ID pengguna dalam daftar --}}
    @php
        $cekUser = '';
        if ($post->is_admin == '0') {
            $cekUser = 'User';
        } else if($post->is_admin == '1'){
            $cekUser = 'Admin';
        }
    @endphp
      <tr>
          <th class="h-8 w-10 border border-gray-500">{{ $post->id}}</th>
          <th class="h-8 w-48 border border-gray-500">{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</th>
          <th class="h-8 w-48 border border-gray-500">{{ $post->namapemain }}</th>
          <th class="h-8 w-48 border border-gray-500 flex justify-center items-center">               
            @if ($post->is_admin == '0')
            <form class="mr-3" action="{{ route('rename.user', $post->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div>
                  <input type="text" id="is_admin" name="is_admin" value="1" hidden>
              </div>  
              <div>
                  <!-- Contoh tombol dengan nilai -->
                  <button type="submit" name="status" value="active"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.07125 0.318828C8.00156 0.2195 7.90877 0.138602 7.80087 0.0831005C7.69297 0.0275994 7.5732 -0.000840665 7.45187 0.000229579C7.33054 0.00129982 7.21128 0.0318482 7.10438 0.0892441C6.99748 0.14664 6.90613 0.229163 6.8382 0.329704L0.173942 10.1396C0.0967996 10.2528 0.0521427 10.3849 0.0448212 10.5217C0.0374997 10.6584 0.0677945 10.7946 0.132415 10.9153C0.197035 11.036 0.293507 11.1368 0.411353 11.2065C0.529198 11.2763 0.663908 11.3124 0.800847 11.311L14.3014 11.1919C14.438 11.1901 14.5715 11.1512 14.6877 11.0792C14.8038 11.0072 14.8981 10.9049 14.9604 10.7833C15.0228 10.6617 15.0508 10.5254 15.0415 10.3891C15.0321 10.2528 14.9858 10.1216 14.9075 10.0097L8.07125 0.318828Z" fill="#334155"/>
                    </svg></button>
              </div>
            </form>
            @else
            <form class="mr-3"action="{{ route('rename.user', $post->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div>
                  <input type="text" id="is_admin" name="is_admin" value="1" hidden>
              </div>  
              <div>
                  <!-- Contoh tombol dengan nilai -->
                  <button type="submit" name="status" value="active" disabled><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.07125 0.318828C8.00156 0.2195 7.90877 0.138602 7.80087 0.0831005C7.69297 0.0275994 7.5732 -0.000840665 7.45187 0.000229579C7.33054 0.00129982 7.21128 0.0318482 7.10438 0.0892441C6.99748 0.14664 6.90613 0.229163 6.8382 0.329704L0.173942 10.1396C0.0967996 10.2528 0.0521427 10.3849 0.0448212 10.5217C0.0374997 10.6584 0.0677945 10.7946 0.132415 10.9153C0.197035 11.036 0.293507 11.1368 0.411353 11.2065C0.529198 11.2763 0.663908 11.3124 0.800847 11.311L14.3014 11.1919C14.438 11.1901 14.5715 11.1512 14.6877 11.0792C14.8038 11.0072 14.8981 10.9049 14.9604 10.7833C15.0228 10.6617 15.0508 10.5254 15.0415 10.3891C15.0321 10.2528 14.9858 10.1216 14.9075 10.0097L8.07125 0.318828Z" fill="#5E5E5E"/>
                    </svg></button>
              </div>
            </form>
            @endif    
            @if ($post->is_admin == '0') 
            <form action="{{ route('rename.user', $post->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div>
                  <input type="text" id="is_admin" name="is_admin" value="0" hidden>
              </div>  
              <div>
                  <!-- Contoh tombol dengan nilai -->
                  <button type="submit" name="status" value="active" disabled><svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.88244 10.9276C6.95125 11.0275 7.04332 11.1093 7.15072 11.1657C7.25813 11.2222 7.37765 11.2517 7.49898 11.2517C7.62032 11.2517 7.73984 11.2222 7.84724 11.1657C7.95465 11.1093 8.04672 11.0275 8.11553 10.9276L14.8661 1.17684C14.9442 1.06438 14.99 0.932647 14.9985 0.795967C15.0071 0.659287 14.978 0.522883 14.9144 0.401577C14.8509 0.28027 14.7553 0.1787 14.6381 0.107902C14.5208 0.0371039 14.3865 -0.000214775 14.2495 9.29813e-07H0.748455C0.611827 0.000565281 0.477937 0.0383639 0.361185 0.109332C0.244433 0.180299 0.149235 0.281751 0.0858294 0.402777C0.0224239 0.523803 -0.0067904 0.659824 0.0013282 0.796212C0.0094468 0.932599 0.0545912 1.06419 0.131906 1.17684L6.88244 10.9276Z" fill="#5E5E5E"/>
                    </svg></button>
              </div>
            </form>  
            @else  
            <form action="{{ route('rename.user', $post->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div>
                  <input type="text" id="is_admin" name="is_admin" value="0" hidden>
              </div>  
              <div>
                  <!-- Contoh tombol dengan nilai -->
                  <button type="submit" name="status" value="active"><svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.88244 10.9276C6.95125 11.0275 7.04332 11.1093 7.15072 11.1657C7.25813 11.2222 7.37765 11.2517 7.49898 11.2517C7.62032 11.2517 7.73984 11.2222 7.84724 11.1657C7.95465 11.1093 8.04672 11.0275 8.11553 10.9276L14.8661 1.17684C14.9442 1.06438 14.99 0.932647 14.9985 0.795967C15.0071 0.659287 14.978 0.522883 14.9144 0.401577C14.8509 0.28027 14.7553 0.1787 14.6381 0.107902C14.5208 0.0371039 14.3865 -0.000214775 14.2495 9.29813e-07H0.748455C0.611827 0.000565281 0.477937 0.0383639 0.361185 0.109332C0.244433 0.180299 0.149235 0.281751 0.0858294 0.402777C0.0224239 0.523803 -0.0067904 0.659824 0.0013282 0.796212C0.0094468 0.932599 0.0545912 1.06419 0.131906 1.17684L6.88244 10.9276Z" fill="#5E5E5E"/>
                    </svg></button>
              </div>
            </form> 
            @endif 
          </th>
          <th class="h-8 w-48 border border-gray-500">{{ $cekUser }}</th>
      </tr>
      {{-- @endif --}}
      @endif
      @endforeach
  </tbody>
</table>
</div>
<div class="w-7/12 mt-5 ml-12 mr-40">
  {{ $pesan->links('pagination::tailwind') }}
  </div>        
  
  <script>
    function myFunction() {
      if(!confirm("Are you sure you want to delete this record?"))
      event.preventDefault();
    }
    const closeAlert = document.getElementById('close-alert');
    closeAlert.addEventListener('click', () => {
      const alert = document.getElementById('alert');
      alert.style.display = 'none';
    });
  </script>
  
@endsection