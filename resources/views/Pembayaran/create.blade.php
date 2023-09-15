@extends('layout.master')
@section('title','Halaman Tambah Data Pembayaran')
@section('content')
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Tambah Data Pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <form action="/pembayaran/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Siswa</label>
                                    <select name="nis" class="form-control">
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->nis }}">NIS: {{ $s->nis }} | Nama: {{ $s->nama }} | Kelas: {{ $s->Kelas->keterangan }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->first('nis'))
                                        <p class="text-danger">
                                            * {{ $errors->first('nis') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>SPP</label>
                                    <select name="id_spp" class="form-control">
                                        @foreach ($spp as $s)
                                            <option value="{{ $s->id }}">SPP: {{ $s->bulan }} {{ $s->tahun }} | Nominal: {{ $s->nominal }}</option>                                            
                                        @endforeach
                                    </select>
                                    @if ($errors->first('id_spp'))
                                        <p class="text-danger">
                                            * {{ $errors->first('id_spp') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Bayar</label>
                                    <input type="text" name="jumlah_bayar" class="form-control" placeholder="Masukkan Jumlah Bayar">
                                    @if ($errors->first('jumlah_bayar'))
                                        <p class="text-danger">
                                            * {{ $errors->first('jumlah_bayar') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan Transaksi">
                                    @if ($errors->first('keterangan'))
                                        <p class="text-danger">
                                            * {{ $errors->first('keterangan') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Petugas</label>
                                    <select name="id_petugas" class="form-control">
                                        @foreach ($user as $u)
                                            <option value="{{ $u->id }}">{{ $u->nama }}</option>                                            
                                        @endforeach
                                    </select>
                                    @if ($errors->first('id_petugas'))
                                        <p class="text-danger">
                                            * {{ $errors->first('id_petugas') }}
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