{!! Form::open(['route' => 'data.store','method'=>'POST']) !!}
@csrf
<div class="box-body">
    <div class="col-xs-6">
        <div class="form-group">
            <label for="nokk">No. Kartu Keluarga</label>
            <input type="text" name="nokk" class="form-control" id="nokk" tabindex="1" autofocus required/>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="namakk">Nama Kartu Keluarga</label>
            <input type="text" class="form-control" id="namakk" name="namakk" tabindex="2"/>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" tabindex="3">
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="notps">No. TPS</label>
            <input type="text" name="notps" class="form-control" id="notps" tabindex="4">
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label>Kecamatan</label>
            {{ Form::select('kecamatan',[null => 'Semua Kecamatan'] + $kecamatan,old('kecamatan'),['class'=>'form-control','tabindex'=>'5','id'=>'kecamatan']) }}
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label>Kelurahan</label>
            {{ Form::select('kelurahan',[null => 'Semua Kelurahan'],old('kelurahan'),['class'=>'form-control','tabindex'=>'6','id'=>'kelurahan']) }}
        </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            {{ Form::select('pekerjaan',[null => 'Semua Pekerjaan'] + $pekerjaan,old('pekerjaan'),['class'=>'form-control','tabindex'=>'7','id'=>'pekerjaan']) }}
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="notelp">No. Telp/HP</label>
            <input type="text" name="notelp" class="form-control" id="notelp" tabindex="8">
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="9">Simpan</button>
</div>

{!! Form::close() !!}