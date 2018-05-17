@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Formulir
            <small>Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Formulir</li>
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
                        <a class="btn btn-primary" href="{{ route('formulir.create') }}"> Tambah</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dt-formulir" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Nama Pengambil</th>
                                <th>No Telp</th>
                                <th>Jumlah</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($formulir as $value)
                            <tr>
                                <td>{{ $value->nokk}}</td>
                                <td>{{ $value->nama}}</td>
                                <td>{{ $value->notelp }}</td>
                                <td>{{ $value->jumlah}}</td>
                                <td>{{ \App\Common\AppHelper::getKelurahanName($value->kelurahan) }}</td>
                                <td>{{ \App\Common\AppHelper::getKecamatanName($value->kecamatan) }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('formulir.show',['id'=>$value->id]) }}"><i class="fa fa-binoculars"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('formulir.edit',['id'=>$value->id]) }}"><i class="fa fa-edit"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE','route' => ['formulir.destroy', $value->id],'style'=>'display:inline']) !!}
                                    <button type="submit" class="btn btn-xs btn-danger" href="{{ route('formulir.destroy',['id'=>$value->id]) }}"><i class="fa fa-trash-o"></i> Hapus</button>
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
            $('#dt-formulir').DataTable({
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