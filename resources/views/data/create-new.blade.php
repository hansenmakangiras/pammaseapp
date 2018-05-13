@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Input Data
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
            <div class="col-xs-6">
                {{--@if(count($errors > 0))--}}

                {{--@endif--}}
                @if(isset($ret['err']) && $ret['err'] == 0)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Pesan!</h4>
                        {{ $ret['pesan'] }}
                    </div>
                @elseif(isset($ret['err']) && $ret['err'] == 1)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                        {{ $ret['pesan'] }}
                    </div>
                @endif
                <!-- general form elements -->
                <div class="box box-primary">

                {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">Quick Example</h3>--}}
                {{--</div>--}}
                <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route' => 'data.store','method'=>'POST']) !!}
                        @include('data.form')
                    {!! Form::close() !!}

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-6">

                <div class="box with-border">
                    <div class="box-body">
                        {{--<a href="{{ route('data.index') }}" class="btn btn-primary btn-block">Lihat Data</a>--}}
                        {{--<button class="btn btn-primary btn-block">Tambah</button>--}}
                        {!! Form::open(['route' => 'data.store','method'=>'POST']) !!}
                        @include('data.form-new')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
@push('scriptInput')
    <!-- page script -->
    <script>
        $(function () {
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