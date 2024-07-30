<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Solo Technopark | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
      /* Style untuk label */
      label {
        margin-right: 10px;
      }

      /* Style untuk input */
      input[type="date"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 200px;
      }

      /* Style untuk tombol */
      input[type="submit"] {
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      /* Style untuk tombol saat dihover */
      input[type="submit"]:hover {
        background-color: #0056b3;
      }

      /* Style untuk input */
      input[type="date"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 200px;
      }
      .custom-select {
        padding: 1px;
        border:1px solid #ccc;
        border-radius:5px;
        width: 200px;
      }
      .wrapper{
        border: 0px solid #ddd;
        width: 300px;
        height: 229px;
        padding: 0 0 0 0;
        overflow-y: auto;
      }

      .wrapper::-webkit-scrollbar{
        width: 3px;
        background-color: #ddd;
      }

      .wrapper::-webkit-scrollbar-thumb{
        background-color: #6e6d6d;
      }

      thead th {
      position: sticky;
      top: 0;
      z-index: 1;
      --tw-bg-opacity:1;
      background-color: rgb(156 163 175 / var(--tw-bg-opacity));
      }
/* Menghilangkan panah yang muncul pada input waktu */
input[type="time"]::-webkit-calendar-picker-indicator {
  display: none;
}

/* Menyembunyikan bagian menit */
input[type="time"] {
  width: 50px; /* Atur lebar agar hanya bagian jam yang terlihat */
}

/* Menonaktifkan interaksi pengguna pada input */
input[type="time"] {
  pointer-events: none; /* Menonaktifkan interaksi pengguna */
}
    </style>
  </head>

  <body class=""">
    @include('dashboard.layouts.navbar')

    <div class="container mt-0 max-w-full">
        @yield('container')
    </div>
        
    @include('dashboard.layouts.footer')
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  </body>
</html>
