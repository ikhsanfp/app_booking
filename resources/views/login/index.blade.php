@extends('login.main')

@section('container')
<div class="flex mt-0 w-full ">
  <div class="hidden md:block w-full md:w-1/2">
    <img src="./img/login.png" alt="Beautiful Image" class="object-cover w-full h-full">
</div>
 
  <div class="w-full md:w-1/2 bg-biru p-8 mx-auto">
    @if(session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" id="alert">
      <strong class="font-bold">Success!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="close-alert">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <title>Close</title>
          <path fill-rule="evenodd" d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 00-.708.708L9.293 10l-3.64 3.64a.5.5 0 10.708.708L10 10.707l3.64 3.64a.5.5 0 00.708-.708L10.707 10l3.64-3.64a.5.5 0 000-.708z" clip-rule="evenodd"/>
        </svg>
      </span>
    </div>
    
  @endif

    @if(session()->has('loginError'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" id="alert">
      <strong class="font-bold">Login Gagal!</strong>
      <span class="block sm:inline">{{ session('loginError') }}</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="close-alert">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <title>Close</title>
              <path fill-rule="evenodd" d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 00-.708.708L9.293 10l-3.64 3.64a.5.5 0 10.708.708L10 10.707l3.64 3.64a.5.5 0 00.708-.708L10.707 10l3.64-3.64a.5.5 0 000-.708z" clip-rule="evenodd"/>
          </svg>
      </span>
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
              <div class="relative group">
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror w-full border border-gray-300 px-4 py-2 rounded-lg" placeholder="" required>
                <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500" onclick="togglePasswordVisibility()">
                  <img id="eyeIcon" src="./img/eye.svg" alt="Show Password" class="h-5 w-5">
                </button>
              </div>
          </div>

          <div class="mb-6">
            <p class="text-sm mt-2 text-white">Belum memiliki akun? Silahkan daftar<a href="/register" class="underline underline-offset-2 text-blue-700"> disini</a></p>
          </div>
          <button class="bg-blue-900 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600" type="submit">Login</button>
        </form>
  </div>
  
</div>
  
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const alertBox = document.getElementById('alert');
    const closeButton = document.getElementById('close-alert');

    if (closeButton) {
      closeButton.addEventListener('click', function () {
        alertBox.style.display = 'none';
      });
    }
  });

  function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.src = './img/eye-slash.svg'; // Change to 'eye-slash' icon when showing password
        } else {
            passwordInput.type = 'password';
            eyeIcon.src = './img/eye.svg'; // Change back to 'eye' icon when hiding password
        }
    }
</script>
@endsection