<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
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
   
  @media (max-width: 768px) {
  .web-menu {
    pointer-events: none;
    opacity: 0.5; /* atau bisa juga display: none; */
  }
}

    </style>
  </head>
  <body>
    @include('dashboard.admin.layouts.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>
        
    @include('dashboard.admin.layouts.footer')
  </body>
</html>
