@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Anggota
            <small>Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Anggota</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                        {{ session('pesan') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header with-border">
                        <a class="btn btn-primary" href="{{ route('anggota.create') }}"> Tambah Anggota</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Nama Anggota</th>
                                <th>Umur</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                {{--@dd($value->anggota->count())--}}
                                <tr>
                                    <td><a href="{{ route('data.show',['id'=>$value->anggotaid]) }}">{{ $value->anggotaid }}</a></td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->umur }}</td>
                                    <td class="text-center">{{ $value->status }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('anggota.show',['id'=>$value->id]) }}"><i class="fa fa-eye"></i> View</a>
                                        <a class="btn btn-xs btn-warning" href="{{ route('anggota.edit',['id'=>$value->anggotaid]) }}"><i class="fa fa-edit"></i> Edit</a>

                                        {!! Form::open(['method' => 'DELETE','route' => ['anggota.destroy', $value->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-xs btn-danger" href="{{ route('anggota.destroy',['id'=>$value->id]) }}"><i class="fa fa-trash-o"></i> Hapus</button>
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
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
            // let dt = $('#example1').DataTable();
            $('#datatable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
            });

        });
    </script>
@endpush