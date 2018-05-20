@extends('layout.app')

@section('title', 'Edit Data Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Data
            <small>Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Input</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Kesalahan !!!</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('Success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                        {{ session('Success') }}
                    </div>
                @elseif(session('Error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ session('Error') }}
                    </div>
                @endif
            <!-- general form elements -->
                <div class="box box-solid">

                    <div class="box-header with-border">
                        <h3 class="box-title">Data Kartu Keluarga</h3>
                    </div>
                <!-- /.box-header -->
                    <!-- form start -->
                    {{--@include('data.form-edit')--}}
                    @include('data.form-tab')

                </div>
                <!-- /.box -->
            </div>
            {{--<div class="col-xs-5">--}}
                {{--@if(Session::get('err') && Session::get('err') == 0)--}}
                    {{--<div class="alert alert-success alert-dismissible">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--<h4><i class="icon fa fa-check"></i> Success!</h4>--}}
                        {{--{{ Session::get('pesan') }}--}}
                    {{--</div>--}}
                {{--@elseif(Session::get('err') && Session::get('err') == 1)--}}
                    {{--<div class="alert alert-danger alert-dismissible">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--<h4><i class="icon fa fa-ban"></i> Error!</h4>--}}
                        {{--{{ Session::get('pesan') }}--}}
                    {{--</div>--}}
                {{--@elseif(Session::get('err') && Session::get('err')==2)--}}
                    {{--<div class="alert alert-info alert-dismissible">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--<h4><i class="icon fa fa-info"></i> Info!</h4>--}}
                        {{--{{ Session::get('pesan') }}--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<div class="box box-solid">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Data Anggota Keluarga</h3>--}}
                    {{--</div>--}}
                    {{--{!! Form::model([$data,$kec,$anggota,$kel,$kecamatan,$kelurahan,$id], ['method' => 'PATCH','route' => ['data.update', $data->id]]) !!}--}}
                    {{--@include('data.form-anggota')--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}

            {{--</div>--}}
            <!-- /.col -->
            <div class="col-xs-2">
                <div class="box with-border">
                    <div class="box-body">
                        <a href="{{ route('data.index') }}" class="btn btn-primary btn-block">Lihat Keluarga</a>
                        <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-block">Daftar Anggota</a>
                        <a href="{{ route('anggota.index') }}" class="btn btn-primary btn-block">Lihat Anggota</a>
                        {{--<button class="btn btn-primary btn-block">Tambah</button>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
@push('scriptEdit')
    <!-- page script -->
    <script>
        $(function () {
            $(document).ajaxStart(function () {
                Pace.restart()
            });
            let kelurahan = $('#kelurahan');
            $('#kecamatan').on('change', function () {
                kelurahan.empty();
                kelurahan.append('<option value="">Semua Kelurahan</option>');
                $.ajax({
                    type: 'GET',
                    url: '/data/kelurahan/' + $(this).val(),
                    success: function (data) {
                        msg = $.parseJSON(data);
                        $.each(msg, function (i, v) {
                            kelurahan.append('<option value="' + v.id_kelurahan + '">' + v.name + '</option>');
                        });
                    }
                });
            });
        })
    </script>
@endpush