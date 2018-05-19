@extends('layout.app')

@section('title', 'Lihat Data Anggota')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lihat Data
            <small>No KK : {{ $id }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('anggota.index') }}"><i class="fa fa-user"></i> Anggota</a></li>
            <li class="active">Lihat</li>
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
                        <h3 class="box-title">Data Anggota Keluarga - {{ $id }}</h3>
                        <div class="box-tools">
                            <a class="btn btn-sm btn-danger" href="{{ route('anggota.index') }}"> Kembali</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>No KK</th>
                                <th>Nama</th>
                                <th>Umur</th>
                            </tr>
                            @foreach($data as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->anggotaid }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->umur }}</td>
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
