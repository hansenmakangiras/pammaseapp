@extends('layout.app')

@section('title', 'Data Kartu Keluarga')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class = "content-header">
        <h1>
            {{ config('app.name') }}
            <small>Kartu Keluarga</small>
        </h1>
        @include('widget.breadcrumb')
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class = "content">
        <div class = "row">
            <div class = "col-xs-12">
                @include('widget.alert')
                <div class = "box">
                    <div class = "box-header">
                        <a class = "btn btn-flat bg-blue" href = "{{ route('data.create') }}"> Daftar Keluarga</a>
                        <a class = "btn btn-flat bg-maroon" href = "{{ route('anggota.create') }}"> Daftar
                                                                                                    Anggota</a>
                    </div>
                    <!-- /.box-header -->
                    <div class = "box-body">
                        <table id = "datatable" valign = "middle" class = "table table-bordered table-hover">
                            <thead>
                            <tr>
                                {{--<th>No.</th>--}}
                                <th>No KK</th>
                                <th>Nama Keluarga</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Pekerjaan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection

@push('scriptInput')
    <!-- DataTables -->
    <script src = "{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src = "{{ asset('admin/bower_components/DataTablesBS4/datatables.js') }}"></script>
    {{--<script src = "{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>--}}

    <script>
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url('/datatable') !!}',
                deferRender: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                columns: [
                    {data: 'nokk', name: 'nokk'},
                    {data: 'namakk', name: 'namakk'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'kecamatan', name: 'kecamatan'},
                    {data: 'kelurahan', name: 'kelurahan'},
                    {data: 'pekerjaan', name: 'pekerjaan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            });
        });

        function pushUrlDelete() {
            $('#modal-hapus').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let url = button.data('url');
                let modal = $(this);
                modal.find('#form-hapus').attr('action', url);
            })
        }
    </script>
@endpush