<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container {
            display: flex;
            flex-direction: row;
        }
        .container-left {
            flex: 1;
            text-align: left;
        }
        .container-right {
            text-align: right;
        }
    </style>
    <title>Halaman Receipt</title>
</head>
<body onload="window.print()">
    <br>
    <center>
        <h1>Receipt Pembayaran SPP</h1>
        <h2>SMK Marhas Margahayu</h2>
    </center>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="container-left">
            <h4>Nama Siswa    :</h4>
            <h4>Kelas         :</h4>
            <h4>SPP           :</h4>
            <h4>Nominal       :</h4>
            <h4>Tahun         :</h4>
            <h4>Tanggal Bayar :</h4>
            <h4>Jumlah Bayar  :</h4>
            <h4>Petugas       :</h4>
            <h4>Keterangan    :</h4>
        </div>
        <div class="container-right">
            <h4>  {{ $pembayaran->Siswa->nama }}</h4>
            <h4>  {{ $pembayaran->Siswa->Kelas->keterangan }}</h4>
            <h4>  {{ $pembayaran->SPP->bulan }}</h4>
            <h4>  Rp. {{ $pembayaran->SPP->nominal }}</h4>
            <h4>  {{ $pembayaran->SPP->tahun }}</h4>
            <h4>  {{ $pembayaran->tanggal_bayar }}</h4>
            <h4>  Rp. {{ number_format($pembayaran->jumlah_bayar) }}</h4>
            <h4>  {{ $pembayaran->User->nama }}</h4>
            <h4>  {{ $pembayaran->keterangan }}</h4>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <center>
        <p>Petugas : {{ Auth()->User()->nama }}</p>
        <p>Tanggal : <?php echo date("Y/m/d"); ?> </p>
    </center>
</body>
</html>