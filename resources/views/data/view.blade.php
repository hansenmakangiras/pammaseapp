@extends('layout.app')

@section('title', 'Lihat Data Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lihat Data
            <small>No KK : {{ $data->nokk }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('admin/dist/img/avatar5.png') }}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $data->namakk }}</h3>

                        <p class="text-muted text-center">{{ \App\Common\AppHelper::getPekerjaanName($data->pekerjaan) }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Anggota Keluarga</b> <a class="pull-right">{{ $data->anggota()->count() }} Org</a>
                            </li>
                            <li class="list-group-item">
                                <b>Kecamatan</b> <a class="pull-right">{{ \App\Common\AppHelper::getKecamatanName($data->kecamatan) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Kelurahan</b> <a class="pull-right">{{ \App\Common\AppHelper::getKelurahanName($data->kelurahan) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No TPS</b> <a class="pull-right">{{ $data->notps }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No Telp</b> <a class="pull-right">{{ $data->notelp }}</a>
                            </li>
                        </ul>
                        <a href="{{ route('data.create') }}" class="btn btn-primary btn-block"><b>Tambah Keluarga</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-user"></i>
                        <h3 class="box-title">Data Anggota Keluarga - {{ $data->namakk }}</h3>
                        <div class="box-tools">
                            <a class="btn btn-sm btn-danger" href="{{ route('anggota.create') }}"> Tambah Anggota</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('data.index') }}"> Kembali</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Umur</th>
                                <th>Kecamatan</th>
                                <th >Kelurahan</th>
                                <th style="width: 60px">No TPS</th>
                            </tr>
                            @php ($i = 1)
                            @if($anggota->isEmpty())
                                <tr>
                                    <td colspan='6' style="text-align: center">Tidak ditemukan anggota keluarga</td>
                                </tr>
                            @else
                            @foreach($anggota as $value)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $value->umur }}</td>
                                <td>{{ $kec->name }}</td>
                                <td>{{ $kel->name }}</td>
                                <td class="text-center"><span class="badge bg-yellow">{{ $data->notps }}</span></td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
