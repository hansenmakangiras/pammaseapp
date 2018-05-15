@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data
            <small>Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a class="btn btn-primary" href="{{ route('data.create') }}"> Tambah</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                            <tr>
                                <td>{{ $value->nokk }}</td>
                                <td>{{ $value->namakk }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->kecamatan }}</td>
                                <td>{{ $value->kelurahan }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('data.show',['id'=>$value->id]) }}"><i class="fa fa-binoculars"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('data.edit',['id'=>$value->id]) }}"><i class="fa fa-edit"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE','route' => ['data.destroy', $value->id],'style'=>'display:inline']) !!}
                                    <button type="submit" class="btn btn-xs btn-danger" href="{{ route('data.destroy',['id'=>$value->id]) }}"><i class="fa fa-trash-o"></i> Hapus</button>
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                            {{--<tfoot>--}}
                            {{--<tr>--}}
                                {{--<th>Rendering engine</th>--}}
                                {{--<th>Browser</th>--}}
                                {{--<th>Platform(s)</th>--}}
                                {{--<th>Engine version</th>--}}
                                {{--<th>CSS grade</th>--}}
                            {{--</tr>--}}
                            {{--</tfoot>--}}
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
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            // $('#example1').DataTable();
            $('#datatable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
@endpush