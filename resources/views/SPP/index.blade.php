@extends('layout.master')
@section('title','Halaman Kelola Data SPP')
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
                            <h3>Halaman Kelola Data SPP</h3>
                            <a href="/spp/create" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spp as $s)
                                        <tr>
                                            <td>{{ $s->id }}</td>
                                            <td>{{ $s->bulan }}</td>
                                            <td>{{ $s->tahun }}</td>
                                            <td>Rp. {{ number_format($s->nominal,2,',','.') }}</td>
                                            <td>
                                                <a href="/spp/{{ $s->id }}/show" class="btn btn-warning">Ubah</a>
                                                <a href="/spp/{{ $s->id }}/destroy" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus Data')">Hapus</a>    
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