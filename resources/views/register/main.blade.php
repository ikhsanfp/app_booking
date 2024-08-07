<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Solo Technopark | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="<https://fonts.googleapis.com/icon?family=Material+Icons>" rel="stylesheet" />
    </head>
  <body class="bg-red-500">
    <div class="container mt-0 max-w-full">
        @yield('container')
    </div>
    @include('sweetalert::alert')
</body>
</html>