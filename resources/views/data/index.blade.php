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
                        <h2 class = "box-title">Kartu Keluarga</h2>
                        <div class = "box-tools">
                            <a class = "btn btn-flat bg-blue" href = "{{ route('data.create') }}"> Daftar Keluarga</a>
                            <a class = "btn btn-flat bg-maroon" href = "{{ route('anggota.create') }}"> Daftar
                                                                                                        Anggota</a>
                        </div>
                    </div>
                    <br />
                    <!-- /.box-header -->
                    <div class = "box-body">
                        <table id = "datatable" valign="middle" class = "table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Nama Keluarga</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                {{--<th width="5%">Anggota</th>--}}
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{ $value->nokk }}</td>
                                    <td>{{ $value->namakk }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ \App\Common\AppHelper::getKecamatanName($value->kecamatan) }}</td>
                                    <td>{{ \App\Common\AppHelper::getKelurahanName($value->kelurahan) }}</td>
                                    {{--<td class="text-center">{{ $value->anggota->count() }}</td>--}}
                                    <td>
                                        {{--<a class="btn btn-xs btn-primary" href="{{ route('data.show',['id'=>$value->id]) }}"><i class="fa fa-eye"></i> View</a>--}}
                                        <a class = "btn btn-xs bg-blue"
                                           href = "{{ route('data.edit',['id'=>$value->id]) }}"><i
                                                class = "fa fa-edit"></i> Edit</a>

                                        {!! Form::open(['method' => 'DELETE','route' => ['data.destroy', $value->id],'style'=>'display:inline']) !!}
                                        <button type = "submit" class = "btn btn-xs bg-red"
                                                href = "{{ route('data.destroy',['id'=>$value->id]) }}"><i
                                                class = "fa fa-trash-o"></i> Hapus
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class = "row">
                            <div class = "col-sm-4">
                                <div class = "pagination" aria-live = "polite">
                                    Menampilkan 1 sampai {{ $data->count() }} dari {{ $count }} data
                                </div>
                            </div>
                            <div class = "col-sm-8">
                                <div class = "pull-right" id = "datatable_paginate">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
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
    {{--    <script src="{{ asset('admin/bower_components/DataTablesBS4/datatables.js') }}"></script>--}}

    <script>
        $(function () {
            $('#datatable').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
            });
        });
    </script>
@endpush