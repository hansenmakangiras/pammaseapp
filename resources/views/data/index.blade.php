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
                @if (session('pesan'))
                    <div class = "alert alert-success alert-dismissible">
                        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;
                        </button>
                        <h4><i class = "icon fa fa-check"></i> Sukses!</h4>
                        {{ session('pesan') }}
                    </div>
                @endif
                <div class = "box">
                    <div class = "box-header">
                        <a class = "btn btn-flat bg-blue" href = "{{ route('data.create') }}"> Daftar Keluarga</a>
                        <a class = "btn btn-flat bg-maroon" href = "{{ route('anggota.create') }}"> Daftar
                                                                                                    Anggota</a>
                    </div>
                    <!-- /.box-header -->
                    <div class = "box-body">
                        <table id = "datatable" valign="middle" class = "table table-bordered table-hover">
                            <thead>
                            <tr>
                                {{--<th>No.</th>--}}
                                <th>No KK</th>
                                <th>Nama Keluarga</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Pekerjaan</th>
                                {{--<th width="5%">Anggota</th>--}}
                                <th>Aksi</th>
                                {{--<th></th>--}}
                                {{--<th></th>--}}
                            </tr>
                            </thead>
                            {{--<tbody>--}}
                            {{--@php ($i = !empty($_GET['page']) ? (($_GET['page'] - 1) * $data->perPage()) + 1 : 1)--}}
                            {{--@foreach($data as $value)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$i++}}</td>--}}
                                    {{--<td>{{ $value->nokk }}</td>--}}
                                    {{--<td>{{ $value->namakk }}</td>--}}
                                    {{--<td>{{ $value->alamat }}</td>--}}
                                    {{--<td>{{ \App\Common\AppHelper::getKecamatanName($value->kecamatan) }} / {{ \App\Common\AppHelper::getKelurahanName($value->kelurahan) }}</td>--}}
                                    {{--<td class="text-center"><span--}}
                                            {{--class="label label-warning">{{ $value->anggota->count() }} Org</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<a class = "btn btn-xs bg-blue"--}}
                                           {{--href = "{{ route('data.edit',['id'=>$value->id]) }}"><i--}}
                                                {{--class = "fa fa-edit"></i> Ubah</a>--}}

                                        {{--{!! Form::open(['method' => 'DELETE','route' => ['data.destroy', $value->id],'style'=>'display:inline']) !!}--}}
                                        {{--<button type = "submit" class = "btn btn-xs bg-red"--}}
                                                {{--href = "{{ route('data.destroy',['id'=>$value->id]) }}"><i--}}
                                                {{--class = "fa fa-trash-o"></i> Hapus--}}
                                        {{--</button>--}}
                                        {{--{!! Form::close() !!}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        </table>
                        {{--<div class = "row">--}}
                            {{--<div class = "col-sm-4">--}}
                                {{--<div class = "pagination" aria-live = "polite">--}}
                                    {{--Menampilkan 1 sampai {{ $data->count() }} dari {{ $count }} data--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class = "col-sm-8">--}}
                                {{--<div class = "pull-right" id = "datatable_paginate">--}}
                                    {{--{{ $data->links() }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
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
    <script src = "{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    {{--<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.17/datatables.js"></script>--}}
{{--    <script src="{{ asset('admin/bower_components/DataTablesBS4/datatables.js') }}"></script>--}}

    <script>
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax : '{!! url('/datatable') !!}',
                deferRender:true,
                paging : true,
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
            $('#modal-hapus').on('show.bs.modal',function (event) {
                let button = $(event.relatedTarget);
                let url = button.data('url');
                let modal = $(this);
                modal.find('#form-hapus').attr('action',url);
            })
        }
    </script>
@endpush