@extends('layout.master')
@section('title','Halaman Tambah Data Kelas')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Tambah Data Kelas</h3>
                        </div>
                        <div class="card-body">
                            <form action="/kelas/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Nama dan Tingkat Kelas">
                                    @if ($errors->first('keterangan'))
                                        <p class="text-danger">
                                            * {{ $errors->first('keterangan') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Kompetensi Keahlian</label>
                                    <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Masukkan Kompetensi Keahlian">
                                    @if ($errors->first('kompetensi_keahlian'))
                                        <p class="text-danger">
                                            * {{ $errors->first('kompetensi_keahlian') }}
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