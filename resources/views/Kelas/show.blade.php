@extends('layout.master')
@section('title','Halaman Ubah Data Kelas')
@section('content')
<div class="container-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Ubah Data Kelas</h3>
                        </div>
                        <div class="card-body">
                            <form action="/kelas/{{ $kelas->id }}/update" method="post">
                                <div class="form-group">
                                    <label></label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="">
                                    @if ($errors->first('keterangan'))
                                        <p class="text-danger">
                                            {{ $errors->first('keterangan') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="">
                                    @if ($errors->first('kompetensi_keahlian'))
                                        <p class="text-danger">
                                            {{ $errors->first('kompetensi_keahlian') }}
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