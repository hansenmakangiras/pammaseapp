@extends('layout.app')

@section('title', 'Data Kartu Keluarga')

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
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                        {{ session('pesan') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header with-border">
                        <a class="btn btn-primary" href="{{ route('data.create') }}"> Daftar Keluarga</a>
                        <a class="btn btn-primary" href="{{ route('anggota.create') }}"> Daftar Anggota</a>
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
                                <th width="5%">Anggota</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                {{--@dd($value->anggota->count())--}}
                                <tr>
                                    <td><a href="{{ route('data.show',['id'=>$value->id]) }}">{{ $value->nokk }}</a></td>
                                    <td>{{ $value->namakk }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ \App\Common\AppHelper::getKecamatanName($value->kecamatan) }}</td>
                                    <td>{{ \App\Common\AppHelper::getKelurahanName($value->kelurahan) }}</td>
                                    <td class="text-center">{{ $value->anggota->count() }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('data.show',['id'=>$value->id]) }}"><i class="fa fa-eye"></i> View</a>
                                        <a class="btn btn-xs btn-warning" href="{{ route('data.edit',['id'=>$value->id]) }}"><i class="fa fa-edit"></i> Edit</a>

                                        {!! Form::open(['method' => 'DELETE','route' => ['data.destroy', $value->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-xs btn-danger" href="{{ route('data.destroy',['id'=>$value->id]) }}"><i class="fa fa-trash-o"></i> Hapus</button>
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="pagination" aria-live="polite">
                                    Menampilkan 1 sampai {{ $data->count() }} dari {{ $count }} data
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="pull-right" id="datatable_paginate">
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
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            // let dt = $('#example1').DataTable();
            $('#datatable').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
            });
            // Array to track the ids of the details displayed rows
            // let detailRows = [];
            //
            // $('#datatable tbody').on( 'click', 'tr td.details-control', function () {
            //     let tr = $(this).closest('tr');
            //     let row = dt.row( tr );
            //     let idx = $.inArray( tr.attr('id'), detailRows );
            //
            //     if ( row.child.isShown() ) {
            //         tr.removeClass( 'details' );
            //         row.child.hide();
            //
            //         // Remove from the 'open' array
            //         detailRows.splice( idx, 1 );
            //     }
            //     else {
            //         tr.addClass( 'details' );
            //         row.child( format( row.data() ) ).show();
            //
            //         // Add to the 'open' array
            //         if ( idx === -1 ) {
            //             detailRows.push( tr.attr('id') );
            //         }
            //     }
            // } );

            // On each draw, loop over the `detailRows` array and show any child rows
            // dt.on( 'draw', function () {
            //     $.each( detailRows, function ( i, id ) {
            //         $('#'+id+' td.details-control').trigger( 'click' );
            //     } );
            // } );
        });
    </script>
@endpush