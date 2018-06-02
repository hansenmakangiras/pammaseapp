@extends('layout.app')

@section('title','Data Anggota')

@section('content-header')
    <section class="content-header">
        <h1>
            Daftar Anggota
            <small>Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Daftar</li>
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
                <div class="box box-solid">
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Data Anggota Keluarga</h3>--}}
                    {{--</div>--}}
                    {!! Form::open(['route' => 'anggota.store','method'=>'POST']) !!}
                        @include('anggota.form-create')
                    {!! Form::close() !!}

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-2">
                <div class="box box-solid">
                    <div class="box-body">
                        <a href="{{ route('anggota.index') }}" class="btn btn-default btn-block">Lihat Data</a>
                        <a href="{{ route('data.index') }}" class="btn btn-default btn-block">Lihat KK</a>
                        <a href="{{ route('data.create') }}" class="btn btn-default btn-block">Tambah KK</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
@push('scriptInput')
    <!-- Select2 -->
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $(document).ajaxStart(function () {
                Pace.restart()
            });
            //Initialize Select2 Elements
            $('.select2').select2();
        })
    </script>
@endpush