@extends('layout.master')
@section('title','Halaman Kelola Data Kelas')
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
                            <h3>Halaman Kelola Data Kelas</h3>
                            <a href="/kelas/create" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped" id='example'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Keterangan</th>
                                        <th>Kompetensi Keahlian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $k)
                                        <tr>
                                            <td>{{ $k->id }}</td>
                                            <td>{{ $k->keterangan }}</td>
                                            <td>{{ $k->kompetensi_keahlian }}</td>
                                            <td>
                                                <a href="/kelas/{{ $k->id }}/show" class="btn btn-warning">Ubah</a>
                                                <a href="/kelas/{{ $k->id }}/destroy" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus Data')">Hapus</a>    
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