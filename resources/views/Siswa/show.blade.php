@extends('layout.master')
@section('title','Halaman Ubah Data Siswa')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Ubah Data Siswa</h3>
                        </div>
                        <div class="card-body">
                            <form action="/siswa/{{ $siswa->nis }}/update" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" placeholder="Masukkan Nomor Induk Siswa">
                                    @if ($errors->first('nis'))
                                        <p class="text-danger">
                                            {{ $errors->first('nis') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" placeholder="Masukkan Nama">
                                    @if ($errors->first('nama'))
                                        <p class="text-danger">
                                            {{ $errors->first('nama') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="id_kelas">
                                        <option value="{{ $siswa->id_kelas }}">--Default: {{ $siswa->Kelas->keterangan }}--</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->keterangan }}</option>
                                        @endforeach
                                        @if ($errors->first('id_kelas'))
                                            <p class="text-danger">
                                                {{ $errors->first('id_kelas') }}
                                            </p>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" name="no_telp" class="form-control" value="{{ $siswa->no_telp }}" placeholder="Masukkan No Telp">
                                    @if ($errors->first('no_telp'))
                                        <p class="text-danger">
                                            {{ $errors->first('no_telp') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $siswa->email }}" placeholder="Masukkan Email">
                                    @if ($errors->first('email'))
                                        <p class="text-danger">
                                            {{ $errors->first('email') }}
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