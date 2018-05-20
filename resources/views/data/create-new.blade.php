@extends('layout.app')

@section('title','Input Kartu Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Keluarga
            <small>Input data keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create</li>
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
                <div class="box box-primary">
                {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">Quick Example</h3>--}}
                {{--</div>--}}
                <!-- /.box-header -->
                    @include('data.form')
                </div>
            </div>
            <div class="col-xs-2">
                <div class="box box-solid">
                    <div class="box-body">
                        <a href="{{ route('data.index') }}" class="btn btn-default btn-block">Lihat Data</a>
                        <a href="{{ route('anggota.index') }}" class="btn btn-default btn-block">Lihat Anggota</a>
                        <a href="{{ route('anggota.create') }}" class="btn btn-default btn-block">Tambah Anggota</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@push('scriptInput')
    <!-- page script -->
    <script>
        $(function () {
            $(document).ajaxStart(function () {
                Pace.restart()
            });
            let kelurahan = $("#kelurahan");
            $('#kecamatan').on('change', function () {
                kelurahan.empty();
                kelurahan.append('<option value="">Kelurahan</option>');
                $.ajax({
                    type: 'GET',
                    url: '/data/kelurahan/' + $(this).val(),
                    success: function (data) {
                        msg = $.parseJSON(data);
                        $.each(msg, function (i, v) {
                            $('#kelurahan').append('<option value="' + v.id_kelurahan + '">' + v.name + '</option>');
                        });
                    }
                });
            });
        })
    </script>
@endpush