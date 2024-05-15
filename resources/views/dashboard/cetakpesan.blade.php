<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="{{ public_path('css/style.css') }}">
</head>
<header>
    <div>
        <h1> 
            <div class="date">Tanggal:{{ \Carbon\Carbon::now()->format('d/m/Y') }}</div>
            <img src="../../../public/img/logostp.png" alt="Logo" class="logo">
            SPORT CENTER AREA - SOLO TECNOPARK 
        </h1>
        <p> Jl. Ki Hajar Dewantara No.19, Jebres, Kec. Jebres Kota Surakarta, Jawa Tengah 57126</p>
        <hr>
    </div>
</header>
<body>
    <div>
        <h3>BUKTI RESERVASI LAPANGAN</h3>


        <div value="{{ $id_pemain }}">ID : {{ $id_pemain }}</div>
        <div value="{{ $pemain }}">Nama Pemain : {{ $pemain }}</div>
        <div value="{{ $nohp }}">No.HP : {{ $nohp }}</div>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Lapangan</th>
                    <th>Waktu Main</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($lapangan as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->jenislap }}</td>
                        <td>Tgl. {{ $post->tglmain }} Pukul {{ $post->start }}.00 - {{ $post->end }}.00</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<style>
    * {
    margin: 20px; /* Atur margin secara seragam sebesar 20px pada semua sisi */
    box-sizing: border-box;
    flex-wrap: wrap;
}

header {
    text-align: center;
    font-family: Arial, sans-serif;
    line-height: 1.6;
    border-bottom: 2px solid #fff; /* Menambahkan garis bawah pada header */
}

.date {
    position: absolute; /* Mengatur posisi absolut untuk tanggal */
    top: 10px; /* Menempatkan tanggal di pojok kanan atas dengan jarak 10px dari tepi atas header */
    right: 10px; /* Menempatkan tanggal di pojok kanan atas dengan jarak 10px dari tepi kanan header */
    font-size: 14px;
    color: black;
}

header h1 {
    .logo {
        width: 80px;
        display: inline-block;
        float: left;
        position: relative;
        -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        z-index: 2;
    }
    text-align: center;
    font-size: 1.5rem;
}

.hr {
    border: 5px;
    font-color: black;
}
body h3 {
    text-align: center;
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin-top: 20px; /* Atur jarak antara header dan body di sini */
    padding: 20px;
}

.table-wrapper {
    margin: 0 auto; /* Membuat margin otomatis di sekitar div, membuatnya terletak di tengah halaman */
    width: 50%; /* Atur lebar div sesuai kebutuhan Anda */
}

table {
    width: 100%;
    border-collapse: collapse; /* Menggabungkan batas tabel */
}

th,
td {
    border: 1px solid black; /* Memberikan batas pada sel-sel tabel */
    padding: 8px;
    text-align: center; /* Mengatur teks di sel-sel tabel menjadi tengah */
}

</style>
</html>
