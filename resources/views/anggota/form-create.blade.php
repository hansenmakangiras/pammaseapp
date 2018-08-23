{{--{!! Form::open(['route' => 'anggota.create','method'=>'POST']) !!}--}}

<div class="box-body">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Pilih No. Kartu Keluarga Yang akan digunakan</label>
                {{ Form::select('nokk',[null => 'Semua KK'] + $nokk,old('nokk'),['style'=>'width: 100%;','class'=>'form-control select2','tabindex'=>'1','id'=>'nokk','autofocus','required']) }}
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
    <button type="submit" class="btn btn-flat bg-aqua" tabindex="4">Simpan</button>
</div>

{{--{!! Form::close() !!}--}}