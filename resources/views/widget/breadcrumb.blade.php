<ol class = "breadcrumb">
    {{--    @dd(Route::getCurrentRoute(route(request()->route()->getName())))--}}
    @php($route = !empty(request()->route()->getName()) ? explode('.',request()->route()->getName()) : [0=>'',1=>''])
    <li><a href = "{{ route('home') }}"><i class = "fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href = "{{ route(request()->route()->getName(), isset($id) ? ['id'=>$id] : "") }}">{{ ucfirst($route[0]) }}</a></li>
    <li class = "active">{{ ucfirst($route[1]) }}</li>
</ol>