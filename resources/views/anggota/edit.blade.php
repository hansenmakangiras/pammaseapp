@extends('layouts.app')

@section('title', 'Edit Anggota Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ubah Data Anggota
            <small>Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('anggota.index') }}"><i class="fa fa-user"></i> Anggota</a></li>
            <li class="active">Ubah</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                @include('flash::message')

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Anggota dengan No.KK : <strong>[{{ $data->anggotaid }} - {{ $nokk[$data->anggotaid] }}]</strong></h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    {!! Form::model([$data,$nokk,$id], ['method' => 'PUT','route' => ['anggota.update', $id]]) !!}
                        @include('anggota.form-edit')
                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>

            <!-- /.col -->
            <div class="col-xs-2">
                <div class="box with-border">
                    <div class="box-body">
                        <a href="{{ route('anggota.index') }}" class="btn btn-primary btn-block">Lihat Data</a>
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
            $('#kecamatan').on('change', function () {
                // $('#kelurahan').empty();
                // $('#kelurahan').append('<option value="">Kelurahan</option>');
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
