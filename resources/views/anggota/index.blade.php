@extends('layout.app')

@section('title', 'Data Anggota')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Anggota
            <small>Kartu Keluarga</small>
        </h1>
        @include('widget.breadcrumb')
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
               @include('widget.alert')
                <div class="box">
                    <div class="box-header with-border">
                        <a class="btn btn-flat bg-blue" href="{{ route('anggota.create') }}"> Daftar Anggota</a>
                        {{--<a class="btn btn-flat bg-blue" href="#" data-toggle="modal" data-nokk="'.$data->anggotaid.'"--}}
                           {{--data-url="'.route('anggota.store').'" data-target="#modal-add-anggota" onclick="pushUrlAdd()" >--}}
                            {{--<i class="fa fa-user"></i> Tambah Anggota--}}
                        {{--</a>--}}
                        <a class="btn btn-flat bg-maroon" href="{{ route('data.create') }}"> Daftar Keluarga</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Nama Anggota</th>
                                <th>Umur</th>
                                <th width="5%">Status</th>
                                <th width="20%">Aksi</th>
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
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src = "{{ asset('admin/bower_components/DataTablesBS4/datatables.js') }}"></script>
{{--    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>--}}
{{--    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>--}}
    <!-- page script -->
    <script>
        /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/

        $(function () {
            {{--$('#_nokk').select2({--}}
                {{--minimumInputLength: 3,--}}
                {{--placeholder: 'Pilih No Kartu Keluarga',--}}
                {{--allowClear: true,--}}
                {{--minimumResultsForSearch: 20,--}}
                {{--ajax: {--}}
                    {{--url: '{!! route("anggota.getListNoKK") !!}',--}}
                    {{--quietMillis: 150,--}}
                    {{--processResults: function (data, params) {--}}
                        {{--params.page = params.page || 1;--}}
                        {{--// let select2Data = $.map(data.result.data, function (obj) {--}}
                        {{--//     obj.id = obj._id.$id;--}}
                        {{--//     obj.text = obj.name;--}}
                        {{--//--}}
                        {{--//     return obj;--}}
                        {{--// });--}}
                        {{--let adata = JSON.parse(data);--}}
                        {{--let bData = $.map(adata, function (val) {--}}
                            {{--return {--}}
                                {{--"id" : val.nokk,--}}
                                {{--"text" : val.namakk--}}
                            {{--}--}}
                        {{--});--}}
                        {{--return {--}}
                            {{--results: bData,--}}
                            {{--pagination: {--}}
                                {{--more: data.more--}}
                            {{--}--}}
                        {{--};--}}
                    {{--}--}}
                {{--},--}}
                {{--escapeMarkup: function (markup) {--}}
                    {{--return markup;--}}
                {{--},--}}
                {{--templateResult: function(response){--}}
                    {{--return '<div>'+response.Name+'</div>';--}}
                {{--},--}}
                {{--templateSelection: function(response){--}}
                    {{--return response.id;--}}
                {{--},--}}
            {{--});--}}
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('anggota.getDatatable') !!}',
                deferRender: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                columns: [
                    {data: 'anggotaid', name: 'anggotaid'},
                    {data: 'nama', name: 'nama'},
                    {data: 'umur', name: 'umur'},
                    {data: 'status', name: 'status'},
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
        function pushUrlAdd() {
            $('#modal-add-anggota').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let url = button.data('url');
                let nokk = button.data('nokk');
                let modal = $(this);
                modal.find('#form-add-anggota').attr('action', url);
                modal.find('#_nokk').val(nokk);
            })
        }
    </script>
@endpush