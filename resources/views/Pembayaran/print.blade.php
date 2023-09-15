<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Print</title>
</head>
<body onload="window.print()">
    <br>
    <center>
        <h1>LAPORAN DATA PEMBAYARAN</h1>
        <br>
        <hr>
        <br>
        <table border="1px">
            <thead>
                <tr>
                    <th>No / ID</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>SPP</th>
                    <th>Nominal</th>
                    <th>Tahun</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Petugas</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->Siswa->nama }}</td>
                    <td>{{ $p->Siswa->Kelas->keterangan }}</td>
                    <td>{{ $p->SPP->bulan }}</td>
                    <td>Rp. {{ number_format($p->SPP->nominal,2,',','.') }}</td>
                    <td>{{ $p->SPP->tahun }}</td>
                    <td>{{ $p->tanggal_bayar }}</td>
                    <td>Rp. {{ number_format($p->jumlah_bayar,2,',','.') }}</td>
                    <td>{{ $p->User->nama }}</td>
                    <td>{{ $p->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <hr>
        <br>
        <div class="container" style="margin-left: 800px">
            <p>Bandung, .....................</p>
        </div>
        <br>
        <br>
        <p>Administrasi Sekolah</p>
    </center>
</body>
</html>