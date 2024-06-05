<!DOCTYPE html>
<html>
<head>
    <title>Data Lapangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Lapangan</h1>
    <p>Nama Pemain: {{ $pemain }}</p>
    <p>No HP: {{ $nohp }}</p>
    
    <!-- Contoh menampilkan gambar -->
    <div class="center">
        <img src="{{ public_path('img/logostp.png') }}" alt="Logo" width="100">
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lapangan</th>
                <th>Tanggal Main</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lapangan as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama_lapangan }}</td>
                    <td>{{ $data->tglmain }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
