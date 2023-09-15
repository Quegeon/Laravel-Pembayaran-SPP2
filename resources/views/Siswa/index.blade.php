@extends('layout.master')
@section('title','Halaman Kelola Data Siswa')
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
                            <h3>Halaman Kelola Data Siswa</h3>
                            <a href="/siswa/create" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>No Telp</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->Kelas->keterangan }}</td>
                                        <td>{{ $s->no_telp }}</td>
                                        <td>{{ $s->email }}</td>
                                        <td>
                                            <a href="/siswa/{{ $s->nis }}/show" class="btn btn-warning">Edit</a>
                                            <a href="/siswa/{{ $s->nis }}/destroy" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus Data')">Hapus</a>
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