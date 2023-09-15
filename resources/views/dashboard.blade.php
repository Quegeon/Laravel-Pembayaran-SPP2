@extends('layout.master')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $siswa_count}}</h3>

              <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/siswa" class="small-box-footer">Info Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $user_count}}</h3>

              <p>Jumlah Petugas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="/user" class="small-box-footer">Info Selengkapnya ... <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $kelas_count}}</h3>

              <p>Jumlah Kelas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="/kelas" class="small-box-footer">Info Selengkapnya ... <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                @if ($total->total === null)
                  Rp. 0
                @else
                  Rp. {{ number_format($total->total,2,',','.') }}
                @endif
              </h3>

              <p>Total Transaksi Bulan Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/pembayaran" class="small-box-footer">Info Selengkapnya ... <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
  </section>


  <section class="content">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <h3>Sample Table</h3>
              </div>
              <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>SPP</th>
                    <th>Nominal</th>
                    <th>Jumlah Bayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Keterangan</th>
                    <th>Petugas</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($history as $p)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->Siswa->nama }}</td>
                    <td>{{ $p->Siswa->Kelas->keterangan }}</td>
                    <td>{{ $p->SPP->bulan }} {{ $p->SPP->tahun }}</td>
                    <td>Rp. {{ number_format($p->SPP->nominal,2,',','.') }}</td>
                    <td>Rp. {{ number_format($p->jumlah_bayar,2,',','.') }}</td>
                    <td>{{ $p->tanggal_bayar }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ $p->User->nama }}</td>
                  @endforeach
                </tbody>
              </table>
              </div>
          </div>
      </div>
  </div>
  </section>
</div>
@endsection