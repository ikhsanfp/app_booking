@extends('login.main')

@section('container')
<div class="flex mt-0 ">
  <div class="hidden md:block w-full md:w-1/2">
    <img src="./img/login.png" alt="Beautiful Image" class="object-cover w-full h-full">
</div>
 
  <div class="w-full md:w-1/2 bg-biru p-8 mx-auto">
    @if(session()->has('success'))
    <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
      {{ session('success') }}
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="p-3 rounded bg-red-500 text-green-100 mb-4">
      {{ session('loginError') }}
    </div>
    @endif

    <h1 class="text-4xl text-white font-bold mb-8 mt-32">Login</h1>
      <form action="/login/store" method="post">
        @csrf
          <div class="mb-4">
              <label class="block text-md text-white">Email</label>
              <input type="text" name="email" class="@error('email') is-invalid @enderror w-full border border-gray-300 px-4 py-2 rounded-lg" id="email" placeholder="" autofocus required >
              @error('email')
                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                  {{ $message }}
                </div>
                @enderror
            </div>
          <div class="mb-2">
              <label class="block text-md text-white">Password</label>
              <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror w-full border border-gray-300 px-4 py-2 rounded-lg" placeholder="" required>
              
          </div>
          <div class="mb-6">
            <p class="text-sm mt-2 text-white">Belum memiliki akun? Silahkan daftar<a href="/register" class="underline underline-offset-2 text-blue-700"> disini</a></p>
          </div>
          <button class="bg-blue-900 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600" type="submit">Login</button>
        </form>
  </div>
  
</div>
  
@endsection