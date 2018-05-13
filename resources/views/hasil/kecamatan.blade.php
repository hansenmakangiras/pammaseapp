@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Hasil
            <small>Data-data grafik</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hasil</li>
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
                        <h3>{{ $countkk }}<sup style="font-size: 20px">Org</sup></h3>

                        <p>Jumlah Kartu Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $countall }}<sup style="font-size: 20px">Org</sup></h3>

                        <p>Jumlah Keseluruhan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>6500<sup style="font-size: 20px">Lbr</sup></h3>

                        <p>Total Formulir</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Formulir Belum Tercetak</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        {{--<h3 class="box-title">Line Chart</h3>--}}

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-body -->
                <!-- /.box -->
                <!-- Custom tabs (Charts with tabs)-->
            {{--<div class="nav-tabs-custom">--}}
            {{--<!-- Tabs within a box -->--}}
            {{--<ul class="nav nav-tabs pull-right">--}}
            {{--<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>--}}
            {{--<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>--}}
            {{--<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>--}}
            {{--</ul>--}}
            {{--<div class="tab-content no-padding">--}}
            {{--<!-- Morris chart - Sales -->--}}
            {{--<div class="chart tab-pane active" id="revenue-chart"--}}
            {{--style="position: relative; height: 300px;"></div>--}}
            {{--<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <!-- /.nav-tabs-custom -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection

@push('scriptDashboard')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" charset=utf-8></script>
    <script src="{{ asset('admin/dist/js/pages/custom-dashboard.js') }}"></script>
    {!! $chart->script() !!}
@endpush