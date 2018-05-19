<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alexander Pierce</p>--}}
                {{--<!-- Status -->--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
              {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
              {{--</button>--}}
            {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-id-card"></i> <span>Kartu Pammase</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('data.index') }}"><i class="fa fa-circle-o"></i> <span>Data KK</span></a></li>
                    <li><a href="{{ route('formulir.index') }}"><i class="fa fa-circle-o"></i> <span>Data Formulir</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-pie-chart"></i> <span>Laporan</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('laporan.index') }}"><i class="fa fa-circle-o"></i>Wilayah</a></li>
                    {{--<li><a href="{{ route('hasil.create') }}"><i class="fa fa-circle-o"></i>Kelurahan</a></li>--}}
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>