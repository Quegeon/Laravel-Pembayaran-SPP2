@extends('layout.master')
@section('title','Halaman Kelola Data Pembayaran')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('status'))
                        <div class="alert alert-{{ session('status.type') }}">
                            {{ session('status.title') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Kelola Data Pembayaran</h3>
                            <a href="/pembayaran/create" class="btn btn-primary">Tambah Data</a>
                            <a href="/pembayaran/print" class="btn btn-secondary">Cetak</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Siswa</th>
                                        <th>Kelas</th>
                                        <th>SPP</th>
                                        <th>Nominal</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Keterangan</th>
                                        <th>Petugas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->Siswa->nama }}</td>
                                            <td>{{ $p->Siswa->Kelas->keterangan }}</td>
                                            <td>{{ $p->SPP->bulan }} {{ $p->SPP->tahun }}</td>
                                            <td>Rp. {{ number_format($p->SPP->nominal,2,',','.') }}</td>
                                            <td>Rp. {{ number_format($p->jumlah_bayar,2,',','.') }}</td>
                                            <td>{{ $p->tanggal_bayar }}</td>
                                            <td>{{ $p->keterangan }}</td>
                                            <td>{{ $p->User->nama }}</td>
                                            <td>
                                                <a href="/pembayaran/{{ $p->id }}/show" class="btn btn-warning">Ubah</a>
                                                <a href="/pembayaran/{{ $p->id }}/destroy" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus Data')">Hapus</a>
                                                <a href="/pembayaran/{{ $p->id }}/receipt" class="btn btn-success">Struk</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection