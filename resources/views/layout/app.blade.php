<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layout.partials.meta')
</head>
<body class="fixed hold-transition {{ config('app.skin') }} sidebar-mini">
<div class="wrapper">

    @include('layout.partials.header')
    @include('layout.partials.sidebar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content-header')

        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    @include('layout.partials.footer')
{{--    @include('layout.partials.control-sidebar')--}}
</div>
<!-- ./wrapper -->
@include('widget.modal')
@include('Layout.partials.script')
</body>
</html>
