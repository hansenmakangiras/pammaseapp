{!! Form::open(['route' => 'anggota.create','method'=>'POST']) !!}

@csrf
<div class="box-body">
    {{--<div class="row">--}}
        {{--<div class="col-xs-6">--}}
            {{--<div class="form-group">--}}
                {{--<label>No KK : {{ $data->anggotaid }}</label>--}}
                {{--<input value="{{ $data->anggotaid }}" type="text" name="nokk" class="form-control" id="nama" disabled/>--}}
{{--                {{ Form::select('nokk',[null => 'Semua KK'] + $nokk, $data->anggotaid,['class'=>'form-control','tabindex'=>'1','id'=>'nokk']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6">--}}
            {{--<div class="form-group">--}}
                {{--<label>Nama Kepala Keluarga : {{ $nokk[$data->anggotaid] }}</label>--}}
{{--                <input value="{{ $nokk[$data->anggotaid] }}" type="text" name="nokk" class="form-control" id="nama" disabled/>--}}
                {{--                {{ Form::select('nokk',[null => 'Semua KK'] + $nokk, $data->anggotaid,['class'=>'form-control','tabindex'=>'1','id'=>'nokk']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="nama">Nama Anggota</label>
                <input value="{{ $data->nama }}" type="text" name="nama" class="form-control" id="nama" tabindex="2"/>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="umur">Umur</label>
                <input value="{{ $data->umur }}" type="text" name="umur" class="form-control" id="umur" tabindex="3"/>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="4">Update Anggota</button>
</div>

{!! Form::close() !!}