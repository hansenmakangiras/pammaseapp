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
                    <div class = "box-header with-border">
                        <h3 class = "box-title">Kartu Keluarga</h3>
                        <div class = "pull-right box-tools">
                            <a class = "btn btn-flat bg-maroon" href = "{{ route('data.create') }}"> Daftar Keluarga</a>
                            <a class = "btn btn-flat bg-orange" href = "{{ route('anggota.create') }}"> Daftar
                                                                                                        Anggota</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class = "box-body">
                        <table id = "datatable" class = "table table-bordered table-hover">
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
                                {{--@dd($value->anggota->count())--}}
                                <tr>
                                    <td width = "15%">{{ $value->nokk }}</td>
                                    <td width = "20%">{{ $value->namakk }}</td>
                                    <td width = "20%">{{ $value->alamat }}</td>
                                    <td width = "13%">{{ \App\Common\AppHelper::getKecamatanName($value->kecamatan) }}</td>
                                    <td width = "13%">{{ \App\Common\AppHelper::getKelurahanName($value->kelurahan) }}</td>
                                    {{--                                    <td class="text-center">{{ $value->anggota->count() }}</td>--}}
                                    <td width = "18%">
                                        <div class = "btn-group-xs btn-group">
                                            {{--<a class="btn btn-xs btn-primary" href="{{ route('data.show',['id'=>$value->id]) }}"><i class="fa fa-eye"></i> View</a>--}}
                                            <a class = "btn btn-xs btn-success"
                                               href = "{{ route('data.edit',['id'=>$value->id]) }}"><i
                                                    class = "fa fa-edit"></i> Edit</a>

                                            {!! Form::open(['method' => 'DELETE','route' => ['data.destroy', $value->id],'style'=>'display:inline']) !!}
                                            <button type = "submit" class = "btn btn-xs btn-info"
                                                    href = "{{ route('data.destroy',['id'=>$value->id]) }}"><i
                                                    class = "fa fa-trash-o"></i> Hapus
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
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
                'autoWidth': false,
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