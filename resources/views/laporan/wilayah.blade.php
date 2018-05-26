@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan
            <small>Data Kartu Keluarga</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Laporan</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $countkk }}<sup style="font-size: 20px">KK</sup></h3>

                        <p>Jumlah KK</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $countall }}<sup style="font-size: 20px">Org</sup></h3>

                        <p>Jumlah Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>30.000<sup style="font-size: 20px">Lbr</sup></h3>

                        <p>Total Formulir</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countformulir }}<sup style="font-size: 20px">Lbr</sup></h3>

                        <p>Formulir Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'laporan.index','method'=>'GET','id'=>'form-kecamatan']) !!}
                {{--@csrf--}}
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            {!! Form::select('kecamatan',[null => 'Semua Kecamatan'] + $listKec,null,['class'=>'form-control','tabindex'=>'5','id'=>'kecamatan']) !!}
                        </div>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Kelurahan</label>
                            {!! Form::select('kelurahan',[null => 'Semua Kelurahan'] + $listKel,null,['class'=>'form-control','tabindex'=>'6','id'=>'kelurahan']) !!}
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Per Kecamatan Atau Kelurahan</h3>

                        <div id="btn-table" class="box-tools">
                            {{--<a href="{{ route('laporan.exportpdf') }}" class="btn btn-default">Export PDF</a>--}}
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            {{--<canvas id="barChart" style="height:250px"></canvas>--}}
                            <table id="datatable" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>No KK</th>
                                    <th>Nama Keluarga</th>
                                    <th>Alamat</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th width="5%">Anggota</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $value)
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

                                            {!! Form::open(['method' => 'DELETE','route' => ['data.destroy', $value->anggotaid],'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-xs btn-danger" href="{{ route('data.destroy',['id'=>$value->id]) }}"><i class="fa fa-trash-o"></i> Hapus</button>
                                            {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
@endsection

@push('scriptWilayah')
    <script src="{{ asset('admin/plugins/chartjs/Chart.bundle.min.js') }}" charset=utf-8></script>
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            $(document).ajaxStart(function () {
                Pace.restart()
            });

            let table = $('#datatable').DataTable({
                // 'serverSide': true,
                // 'ajax':{
                //     url:'',
                //     type:'post',
                // },
                dom: 'Bfrtip',
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                // columnDefs: [
                //     {
                //         targets: -1,
                //         visible:false
                //     }
                // ],
                buttons: [
                    // 'copyHtml5'
                    {extend:'copy',className:'btn-sm'},
                    {extend:'excel',className:'btn-sm',text:'Eksport Excel'},
                    {extend:'pdf',className:'btn-sm',text:'Eksport PDF'},
                    {extend:'print',className:'btn-sm',text:'Cetak'},
                    // {extend:'columnsToggle',className:'btn-sm'},
                    {extend:'colvisGroup',text:'Hide Aksi',show:[1,2,3,4,5],hide:[6],className:'btn-sm'},
                    {extend:'colvisGroup',text:'Show All',show:':hidden',className:'btn-sm'},
                ]
            });

            table.buttons().container()
                .appendTo( $('#btn-table:eq(0)'));

            let kelurahan = $("#kelurahan");
            let kecamatan = $("#kecamatan");

            kecamatan.on('change', function () {
                kelurahan.empty();
                kelurahan.append('<option value="">Semua Kelurahan</option>');
                $('#form-kecamatan').submit();
                $.ajax({
                    type: 'GET',
                    url: '/json/kelurahan/' + $(this).val(),
                    success: function (data) {
                        msg = $.parseJSON(data);
                        $.each(msg, function (i, v) {
                            kelurahan.append('<option value="' + v.id_kelurahan + '">' + v.name + '</option>');
                        });
                    }
                });
            });

            kelurahan.on('change', function () {
                $('#form-kecamatan').submit();
            });
        })
    </script>

@endpush