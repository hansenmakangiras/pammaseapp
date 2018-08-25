@extends('layouts.app')

@section('title','Input Kartu Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class = "content-header">
        <h1>
            Data Keluarga
            <small>Daftar data keluarga</small>
        </h1>
        @include('widget.breadcrumb')
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class = "content">
        <div class = "row">
            <div class = "col-xs-12">
                @include('flash::message')
            <!-- general form elements -->
                <div class = "box box-solid">
                    <div class = "box-header with-border">
                        <a href = "{{ route('data.index') }}" class = "btn btn-flat btn-sm bg-blue" tabindex = "10">Lihat Keluarga</a>
                        <a href = "{{ route('anggota.index') }}" class = "btn btn-flat btn-sm bg-green" tabindex = "11">Lihat Anggota</a>
                        <a href = "{{ route('anggota.create') }}" class = "btn btn-flat btn-sm bg-red" tabindex = "12">Daftar Anggota</a>
                    </div>
                    <!-- /.box-header -->
                    @include('data.form')
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
