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
                        <form action="/user/{{ $user->id }}/change-password" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Masukkan Password Baru">
                                @if ($errors->first('new_password'))
                                    <p class="text-danger">
                                        * {{ $errors->first('new_password') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Masukkan Kembali Password Baru">
                                @if ($errors->first('confirm_password'))
                                    <p class="text-danger">
                                        * {{ $errors->first('confirm_password') }}
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