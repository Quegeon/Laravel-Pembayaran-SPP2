@extends('layout.master')
@section('title','Halaman Ubah Password')
@section('content')
<div class="content-wrapper">
    <br>
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
                        <h3>Form Ubah Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="/user/{{ $user->id }}/show/chpwd" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="npwd" class="form-control" placeholder="Masukkan Password Baru">
                                @if ($errors->first('npwd'))
                                    <p class="text-danger">
                                        * {{ $errors->first('npwd') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="cpwd" class="form-control" placeholder="Masukkan Kembali Password Baru">
                                @if ($errors->first('cpwd'))
                                    <p class="text-danger">
                                        * {{ $errors->first('cpwd') }}
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
</div>    
@endsection