<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Solo Technopark | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    
      <div class="ml-11">
          <h1>Cetak Laporan Pesanan</h1>
    <br>
    <table>
    <thead>
        <tr class="bg-slate-400 border mx-5">
            <th class="h-8 w-10 border border-gray-500">No</th>
            <th class="h-8 w-40 border border-gray-500">Jenis Lapangan</th>
            <th class="h-8 w-40 border border-gray-500">Waktu Main</th>
        </tr>
    </thead>
    <tbody>
        @foreach($id_pesan as $post)
        <tr>
            <th class="h-8 w-10 border border-gray-500">{{ $post->id }}</th>
            <th class="h-8 w-40 border border-gray-500">{{ $post->jenislap }}</th>
            <th class="h-8 w-40 border border-gray-500">{{ $post->start }} - {{ $post->end }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</div>


