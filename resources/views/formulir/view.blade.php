@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lihat Formulir
            <small>No KK: {{ $data->nokk }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('formulir.index') }}"><i class="fa fa-dashboard"></i> Formulir</a></li>
            <li class="active">View</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Formulir : {{ $data->nokk }}</h3>
                        <div class="box-tools">
                            <a class="btn btn-default btn-sm bg-aqua-active" href="{{ route('formulir.index') }}">Kembali</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> No KK</strong>

                            <p class="text-muted">
                                {{ $data->nokk }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-user margin-r-5"></i> Nama Pengambil</strong>

                            <p class="text-muted">{{ $data->nama }}</p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Informasi</strong>

                            <p>
                                <span class="label label-danger">Jumlah : {{ $data->jumlah }}</span>
                                <span class="label label-success">Kecamatan : {{ \App\Common\AppHelper::getKelurahanName($data->kelurahan) }}</span>
                                <span class="label label-info">Desa/Kelurahan : {{ \App\Common\AppHelper::getKecamatanName($data->kecamatan) }}</span>
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            {{--<div class="col-md-8">--}}
                {{--<div class="box box-solid">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<i class="fa fa-user"></i>--}}
                        {{--<h3 class="box-title">Data Formulir - {{ $id }}</h3>--}}
                        {{--<div class="box-tools">--}}
                            {{--<a class="btn btn-sm btn-danger" href="{{ route('formulir.index') }}"> Kembali</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.box-header -->--}}
                    {{--<div class="box-body no-padding">--}}
                        {{--<table class="table">--}}
                            {{--<tr>--}}
                                {{--<th style="width: 10px">#</th>--}}
                                {{--<th>No KK</th>--}}
                                {{--<th>Nama Pengambil</th>--}}
                                {{--<th>No Telp</th>--}}
                                {{--<th>Jumlah</th>--}}
                                {{--<th>Kelurahan</th>--}}
                                {{--<th>Kecamatan</th>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>{{ $data->nokk}}</td>--}}
                                {{--<td>{{ $data->nama}}</td>--}}
                                {{--<td>{{ $data->notelp }}</td>--}}
                                {{--<td class="text-center"><span class="label label-danger">{{ $data->jumlah }}</span></td>--}}
                                {{--<td>{{ \App\Common\AppHelper::getKelurahanName($data->kelurahan) }}</td>--}}
                                {{--<td>{{ \App\Common\AppHelper::getKecamatanName($data->kecamatan) }}</td>--}}

                            {{--</tr>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    {{--<!-- /.box-body -->--}}
                {{--</div>--}}
                {{--<!-- /.box -->--}}
            {{--</div>--}}
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection

@push('scriptInput')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#datatable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
@endpush