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
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-user"></i>
                        <h3 class="box-title">Data Anggota Keluarga - {{ $data->namakk }}</h3>
                        <div class="box-tools">
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
                            @foreach($anggota as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $value->umur }}</td>
                                <td>{{ $kec->name }}</td>
                                <td>{{ $kel->name }}</td>
                                <td class="text-center"><span class="badge bg-yellow">{{ $data->notps }}</span></td>
                            </tr>
                            @endforeach
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
