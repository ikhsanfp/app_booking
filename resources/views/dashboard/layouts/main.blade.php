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

  <body>
    @include('dashboard.layouts.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>
        
    @include('dashboard.layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  </body>
</html>
