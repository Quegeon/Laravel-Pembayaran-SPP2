@extends('layout.master')
@section('title','Halaman Edit Data Petugas')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Edit Data Petugas</h3>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{ $user->id }}/update" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="{{ $user->nama }}" value="{{ $user->nama }}">
                                    @if ($errors->any())
                                        <p class="text-danger">
                                            {{ $errors->first('nama') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="{{ $user->username }}" value="{{ $user->username }}">
                                    @if ($errors->any())
                                        <p class="text-danger">
                                            {{ $errors->first('username') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="{{ $user->level }}">--Default : {{ $user->level }}--</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @if ($errors->any())
                                        <p class="text-danger">
                                            {{ $errors->first('level') }}
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