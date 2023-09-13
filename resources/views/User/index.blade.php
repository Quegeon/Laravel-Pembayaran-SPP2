@extends('layout.master')
@section('title','Halaman Kelola Data Petugas')
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
                            <h3>Halaman Kelola Data Petugas</h3>
                            <a href="/user/create" id="example" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->nama }}</td>
                                        <td>{{ $u->username }}</td>
                                        <td>{{ $u->level }}</td>
                                        <td>
                                            <a href="/user/{{ $u->id }}/show" class="btn btn-warning">Edit</a>
                                            <a href="/user/{{ $u->id }}/show/pwd" class="btn btn-warning">Ubah Pasword</a>
                                            <a href="/user/{{ $u->id }}/destroy" class="btn btn-danger" onclick="return confirm('Konfirmasi Penghapusan Data?')">Hapus</a>
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