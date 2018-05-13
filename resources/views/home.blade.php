@extends('layout.app')

@section('title', 'Page Title')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
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
                        <h3>20.000<sup style="font-size: 20px">Lbr</sup></h3>

                        <p>Jumlah Formulir</p>
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
                        <h3>53<sup style="font-size: 20px">Lbr</sup></h3>

                        <p>Formulir Tercetak</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Data Per Kecamatan</h3>

                        {{--<div class="box-tools pull-right">--}}
                            {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                            {{--</button>--}}
                            {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                        {{--</div>--}}
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            {{--<canvas id="lineChart" style="height:250px"></canvas>--}}
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
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" charset=utf-8></script>--}}
    <script src="{{ asset('admin/plugins/chartjs/Chart.bundle.min.js') }}" charset=utf-8></script>
{{--    <script src="{{ asset('admin/bower_components/chart.js/Chart.js') }}"></script>--}}
{{--    <script src="{{ asset('admin/dist/js/pages/custom-dashboard.js') }}"></script>--}}
    {!! $chart->script() !!}
    {{--<script>--}}
    {{--$(function () {--}}
        {{--let areaChartData = {--}}
            {{--labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],--}}
            {{--datasets: [--}}
                {{--{--}}
                    {{--label               : 'Electronics',--}}
                    {{--fillColor           : 'rgba(210, 214, 222, 1)',--}}
                    {{--strokeColor         : 'rgba(210, 214, 222, 1)',--}}
                    {{--pointColor          : 'rgba(210, 214, 222, 1)',--}}
                    {{--pointStrokeColor    : '#c1c7d1',--}}
                    {{--pointHighlightFill  : '#fff',--}}
                    {{--pointHighlightStroke: 'rgba(220,220,220,1)',--}}
                    {{--data                : [65, 59, 80, 81, 56, 55, 40]--}}
                {{--},--}}
                {{--{--}}
                    {{--label               : 'Digital Goods',--}}
                    {{--fillColor           : 'rgba(60,141,188,0.9)',--}}
                    {{--strokeColor         : 'rgba(60,141,188,0.8)',--}}
                    {{--pointColor          : '#3b8bba',--}}
                    {{--pointStrokeColor    : 'rgba(60,141,188,1)',--}}
                    {{--pointHighlightFill  : '#fff',--}}
                    {{--pointHighlightStroke: 'rgba(60,141,188,1)',--}}
                    {{--data                : [28, 48, 40, 19, 86, 27, 90]--}}
                {{--}--}}
            {{--]--}}
        {{--};--}}

        {{--let areaChartOptions = {--}}
            {{--//Boolean - If we should show the scale at all--}}
            {{--showScale               : true,--}}
            {{--//Boolean - Whether grid lines are shown across the chart--}}
            {{--scaleShowGridLines      : false,--}}
            {{--//String - Colour of the grid lines--}}
            {{--scaleGridLineColor      : 'rgba(0,0,0,.05)',--}}
            {{--//Number - Width of the grid lines--}}
            {{--scaleGridLineWidth      : 1,--}}
            {{--//Boolean - Whether to show horizontal lines (except X axis)--}}
            {{--scaleShowHorizontalLines: true,--}}
            {{--//Boolean - Whether to show vertical lines (except Y axis)--}}
            {{--scaleShowVerticalLines  : true,--}}
            {{--//Boolean - Whether the line is curved between points--}}
            {{--bezierCurve             : true,--}}
            {{--//Number - Tension of the bezier curve between points--}}
            {{--bezierCurveTension      : 0.3,--}}
            {{--//Boolean - Whether to show a dot for each point--}}
            {{--pointDot                : false,--}}
            {{--//Number - Radius of each point dot in pixels--}}
            {{--pointDotRadius          : 4,--}}
            {{--//Number - Pixel width of point dot stroke--}}
            {{--pointDotStrokeWidth     : 1,--}}
            {{--//Number - amount extra to add to the radius to cater for hit detection outside the drawn point--}}
            {{--pointHitDetectionRadius : 20,--}}
            {{--//Boolean - Whether to show a stroke for datasets--}}
            {{--datasetStroke           : true,--}}
            {{--//Number - Pixel width of dataset stroke--}}
            {{--datasetStrokeWidth      : 2,--}}
            {{--//Boolean - Whether to fill the dataset with a color--}}
            {{--datasetFill             : true,--}}
            {{--//String - A legend template--}}
            {{--legendTemplate          : '<ul class="<\%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<\%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><\%=datasets[i].label%><%}%></li><%}%></ul>',--}}
      {{--//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container--}}
      {{--maintainAspectRatio     : true,--}}
      {{--//Boolean - whether to make the chart responsive to window resizing--}}
      {{--responsive              : true--}}
    {{--};--}}

    {{--//Create the line chart--}}
    {{--areaChart.Line(areaChartData, areaChartOptions);--}}

    {{--//---------------}}
    {{--//- LINE CHART ---}}
    {{--//----------------}}
    {{--let lineChartCanvas          = $('#lineChart').get(0).getContext('2d');--}}
    {{--let lineChart                = new Chart(lineChartCanvas);--}}
    {{--let lineChartOptions         = areaChartOptions;--}}
    {{--lineChartOptions.datasetFill = false;--}}
    {{--lineChart.Line(areaChartData, lineChartOptions);--}}
    {{--})--}}
    {{--</script>--}}
@endpush