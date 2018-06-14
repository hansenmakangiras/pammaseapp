@extends('layout.app')

@section('title', 'Edit Data Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Data
            <small>Kartu Keluarga</small>
        </h1>
        @include('widget.breadcrumb')
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
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
                        <a href="{{ route('data.index') }}" class="btn btn-flat btn-sm bg-maroon">Lihat Keluarga</a>
                        <a href="{{ route('anggota.create') }}" class="btn btn-flat btn-sm bg-orange">Daftar Anggota</a>
                        <a href="{{ route('anggota.index') }}" class="btn btn-flat btn-sm bg-light-blue">Lihat Anggota</a>
                        {{--<h3 class="box-title">Data Kartu Keluarga</h3>--}}
                        {{--<div class="box-tools">--}}

                        {{--</div>--}}
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('data.form')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
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