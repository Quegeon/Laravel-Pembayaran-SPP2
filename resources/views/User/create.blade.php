@extends('layout.master')
@section('title','Halaman Tambah Data Petugas')
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
                            <h3>Form Tambah Data Petugas</h3>
                        </div>
                        <div class="card-body">
                            <form action="/user/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Petugas">
                                    @if ($errors->first('nama'))
                                        <p class="text-danger">
                                            * {{ $errors->first('nama') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                                    @if ($errors->first('username'))
                                        <p class="text-danger">
                                            * {{ $errors->first('username') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                    @if ($errors->first('password'))
                                        <p class="text-danger">
                                            * {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection