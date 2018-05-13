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
                            <canvas id="barChart" style="height:250px"></canvas>
{{--                            {!! $chart->container() !!}--}}
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
{{--    <script src="{{ asset('admin/plugins/chartjs/Chart.bundle.min.js') }}" charset=utf-8></script>--}}
    <script src="{{ asset('admin/bower_components/chart.js/Chart.js') }}"></script>
{{--    <script src="{{ asset('admin/dist/js/pages/custom-dashboard.js') }}"></script>--}}
    {{--{!! $chart->script() !!}--}}
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            //var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            //var areaChart       = new Chart(areaChartCanvas)
            let msgdata;
            $.ajax({
                type:'GET',
                url:'/getJsonKecamatan',
                success: function (data) {
                    let msgdata = $.parseJSON(data);
                    console.log(msgdata);
                    let dataChart = {
                        labels: msgdata.kecamatan,
                        datasets:[{
                            label               : 'Electronics',
                            fillColor           : 'rgba(210, 214, 222, 1)',
                            strokeColor         : 'rgba(210, 214, 222, 1)',
                            pointColor          : 'rgba(210, 214, 222, 1)',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data                : msgdata.dataset
                        }]
                    };

                    let barChartCanvas                   = $('#barChart').get(0).getContext('2d');
                    let barChart                         = new Chart(barChartCanvas);
                    let barChartData                     = dataChart;
                    barChartData.datasets[0].fillColor   = '#00a65a';
                    barChartData.datasets[0].strokeColor = '#00a65a';
                    barChartData.datasets[0].pointColor  = '#00a65a';
                    let barChartOptions                  = {
                        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                        scaleBeginAtZero        : true,
                        //Boolean - Whether grid lines are shown across the chart
                        scaleShowGridLines      : false,
                        //String - Colour of the grid lines
                        scaleGridLineColor      : 'rgba(0,0,0,.05)',
                        //Number - Width of the grid lines
                        scaleGridLineWidth      : 1,
                        //Boolean - Whether to show horizontal lines (except X axis)
                        scaleShowHorizontalLines: true,
                        //Boolean - Whether to show vertical lines (except Y axis)
                        scaleShowVerticalLines  : true,
                        //Boolean - If there is a stroke on each bar
                        barShowStroke           : true,
                        //Number - Pixel width of the bar stroke
                        barStrokeWidth          : 3,
                        //Number - Spacing between each of the X value sets
                        barValueSpacing         : 5,
                        //Number - Spacing between data sets within X values
                        barDatasetSpacing       : 1,
                        //String - A legend template
                         legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                              //Boolean - whether to make the chart responsive
                              responsive              : true,
                              maintainAspectRatio     : true
                            }

                            barChartOptions.datasetFill = false
                            barChart.Bar(barChartData, barChartOptions)
                }
            });

  })
    </script>
@endpush