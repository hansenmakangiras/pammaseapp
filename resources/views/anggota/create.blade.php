@extends('layout.app')

@section('title','Data Anggota')

@section('content-header')
    <section class="content-header">
        <h1>
            Daftar Anggota
            <small>Kartu Keluarga</small>
        </h1>
        @include('widget.breadcrumb')
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                @include('widget.alert')
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Anggota Keluarga</h3>
                        <div class="box-tools">
                            <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-flat bg-blue">Kembali</a>
                            <a href="{{ route('data.index') }}" class="btn btn-sm btn-flat bg-red">Lihat Keluarga</a>
                            <a href="{{ route('data.create') }}" class="btn btn-sm btn-flat bg-green">Daftar
                                                                                                      Keluarga</a>
                        </div>
                    </div>
                    {!! Form::open(['route' => 'anggota.store','method'=>'POST']) !!}
                        @include('anggota.form-create')
                    {!! Form::close() !!}

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
@push('scriptInputAnggota')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $(document).ajaxStart(function () {
                Pace.restart()
            });
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endpush