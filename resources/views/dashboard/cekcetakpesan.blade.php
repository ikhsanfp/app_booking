<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <header>
           
      
            <div style="position: absolute; margin-left: 56rem" class="">Tanggal:{{ \Carbon\Carbon::now()->format('d/m/Y') }}</div>
       
            <div>
                <img src="logostp.png" alt="Logo" class="logo" style="position:absolute; margin-top: 30px;">
            </div>
            <div style="text-align: center; margin-bottom: 2rem ">
                  <h1 style="margin-bottom: -1rem">SPORT CENTER AREA - SOLO TECNOPARK</h1> 
                  <p> Jl. Ki Hajar Dewantara No.19, Jebres, Kec. Jebres Kota Surakarta, Jawa Tengah 57126</p>
            </div>
                       
              <hr>
        
      </header>
    <div>
        <h3 style="text-align: center;">BUKTI RESERVASI LAPANGAN</h3>
        <div>
        <table style="margin-bottom: 2rem">
            <tr>
                <td style="height: 2rem; width: 10rem">ID</td>
                <td style="" value="{{ $id_pemain }}">: {{ $id_pemain }}</td>
            </tr>
            <tr>
                <td style="height: 2rem">Nama Pemain</td>
                <td value="{{ $pemain }}">: {{ $pemain }}</td>
            </tr>
            <tr>
                <td style="height: 2rem">No. HP</td>
                <td value="{{ $nohp }}">: {{ $nohp }}</td>
            </tr>
        </table >
        </div>
        <div style="">
                <table style="width: 100%; border: 0px; justify-content: center;">
            <thead style="">
                <tr >
                    <th style=" height: 2rem; width: 3rem; border-width: 1px; border-color: grey; background-color: #cecece">No</th>
                    <th style="width: 100%; border: 0px; border-style:solid; border-color: grey; background-color: #cecece">Jenis Lapangan</th>
                    <th style="width: 100%; border: 0px; border-style:solid; border-color: grey; background-color: #cecece">Waktu Main</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($lapangan as $index => $post)
                    <tr>
                        <td style="height: 2rem; text-align: center; width: 100%; border: 0px; border-style:solid; border-color: rgb(211, 211, 211); background-color: #dfdfdf">{{ $index + 1 }}</td>
                        <td style="text-align: center; width: 100%; border: 0px; border-style:solid; border-color: rgb(211, 211, 211); background-color: #dfdfdf">{{ $post->jenislap }}</td>
                        <td style="text-align: center; width: 100%; border: 0px; border-style:solid; border-color: rgb(211, 211, 211); background-color: #dfdfdf">Tgl. {{ $post->tglmain }} Pukul {{ $post->start }}.00 - {{ $post->end }}.00</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>
