<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.meta')
</head>
<body class = "hold-transition {{ \App\Common\AppHelper::changeSkin(config('app.skin')) }} sidebar-mini">
<div class = "wrapper">

@include('layouts.partials.header')
@include('layouts.partials.sidebar')


<!-- Content Wrapper. Contains page content -->
    <div class = "content-wrapper">
        @yield('content-header')

        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    @include('layouts.partials.footer')
    {{--    @include('layouts.partials.control-sidebar')--}}
</div>
<!-- ./wrapper -->
@include('widget.modal')
@include('layouts.partials.script')
</body>
</html>
