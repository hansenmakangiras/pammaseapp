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
            <input type="text" name="alamat" class="form-control" id="alamat" tabindex="17">
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="notps">No. TPS</label>
            <input type="text" name="notps" class="form-control" id="notps" tabindex="18">
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label>Kecamatan</label>
            {{--{{ Form::select('kecamatan',$kecamatan,null,['class'=>'form-control','tabindex'=>'21','id'=>'kecamatan']) }}--}}
            <select id="kecamatan" name="kecamatan" class="form-control" tabindex="20">
                <option value="">Semua Kecamatan</option>
                @foreach($kecamatan as $kec)
                    <option value="{{$kec->id}}" {{ ((empty($_GET['kec'])) ? '' : (($_GET['kec'] == $kec->id) ? 'selected' : '' )) }}>{{$kec->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label>Kelurahan</label>
            <select id="kelurahan" name="kelurahan" class="form-control" tabindex="20">
                <option value="">Semua Kelurahan</option>
                @foreach($kelurahan as $kel)
                    <option value="{{$kel->id_kelurahan}}" {{ ((empty($_GET['kel'])) ? '' : (($_GET['kel'] == $kel->id_kelurahan) ? 'selected' : '' )) }}>{{$kel->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" tabindex="21">
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="notelp">No. Telp/HP</label>
            <input type="text" name="notelp" class="form-control" id="notelp" tabindex="22">
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="23">Simpan KK</button>
</div>

{!! Form::close() !!}