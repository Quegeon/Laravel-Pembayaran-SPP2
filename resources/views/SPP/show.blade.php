@extends('layout.master')
@section('title','Halaman Ubah Data SPP')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Ubah Data SPP</h3>
                        </div>
                        <div class="card-body">
                            <form action="/spp/{{ $spp->id }}/update" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <input type="text" name="bulan" class="form-control" value="{{ $spp->bulan }}" placeholder="Masukkan Bulan SPP">
                                    @if ($errors->first('bulan'))
                                        <p class="text-danger">
                                            * {{ $errors->first('bulan') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $spp->tahun }}" placeholder="Masukkan Tahun SPP">
                                    @if ($errors->first('tahun'))
                                        <p class="text-danger">
                                            * {{ $errors->first('tahun') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" class="form-control" value="{{ $spp->nominal }}" placeholder="Masukkan Nominal SPP">
                                    @if ($errors->first('nominal'))
                                        <p class="text-danger">
                                            * {{ $errors->first('nominal') }}
                                        </p>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </form>
                            @csrf
                        </div>    
                    </div>    
                </div>    
            </div>    
        </div>    
    </section>    
</div>    
@endsection