    <form action="{{ route('data.index') }}" method="GET">
        <input type="date" id="datepicker" name="datepicker">
        <button type="submit">Tampilkan</button>
    </form>

    @if(isset($data) && $data->count() > 0)
        <h3>Data Reservasi untuk Tanggal {{ $tanggal }}</h3>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tanggal Reservasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->jenislap }}</td>
                        <td>{{ $data->tglmain }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($tanggal))
        <p>Tidak ada data reservasi untuk tanggal {{ $tanggal }}</p>
    @endif

