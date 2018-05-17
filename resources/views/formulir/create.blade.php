@extends('layout.app')

@section(config("app.name"),'Page Title')

@section('content-header')
    <section class="content-header">
        <h1>
            Input Data
            <small>Formulir Pengambilan Kartu</small>
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
                        <h3 class="box-title">Data Formulir</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    {!! Form::open(['route' => 'formulir.store','method'=>'POST']) !!}
                    @include('formulir.form')
                    {!! Form::close() !!}

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-2">
                <div class="box box-solid">
                    <div class="box-body">
                        <a href="{{ route('data.index') }}" class="btn btn-primary btn-block">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
@push('scriptInputFormulir')
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