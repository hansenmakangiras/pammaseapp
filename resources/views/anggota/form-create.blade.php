{!! Form::open(['route' => 'anggota.create','method'=>'POST']) !!}

@csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>No KK</label>
                {{ Form::select('nokk',[null => 'Semua KK'] + $nokk,old('nokk'),['class'=>'form-control','tabindex'=>'1','id'=>'nokk','autofocus','required']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" id="nama" tabindex="2" required/>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" name="umur" class="form-control" id="umur" tabindex="3" required/>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="4">Simpan Anggota</button>
</div>

{!! Form::close() !!}