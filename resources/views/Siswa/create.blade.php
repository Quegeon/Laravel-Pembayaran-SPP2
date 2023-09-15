@extends('layout.master')
@section('title','Halaman Tambah Data Siswa')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Tambah Data Siswa</h3>
                        </div>
                        <div class="card-body">
                            <form action="/siswa/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" name="nis" class="form-control" placeholder="Masukkan Nomor Induk Siswa">
                                    @if ($errors->first('nis'))
                                        <p class="text-danger">
                                            * {{ $errors->first('nis') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">
                                    @if ($errors->first('nama'))
                                        <p class="text-danger">
                                            * {{ $errors->first('nama') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="id_kelas" class="form-control">
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->keterangan }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->first('id_kelas'))
                                        <p class="text-danger">
                                            * {{ $errors->first('id_kelas') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" name="no_telp" class="form-control" placeholder="Masukkan No Telp">
                                    @if ($errors->first('no_telp'))
                                        <p class="text-danger">
                                            * {{ $errors->first('no_telp') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
                                    @if ($errors->first('email'))
                                        <p class="text-danger">
                                            * {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="submit" class="btn btn-secondary">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection