@csrf
<div class="box-body">
    <div class="form-group">
        <label for="nokk">No. Kartu Keluarga</label>
        <input type="text" name="nokk" class="form-control" id="nokk"
               value="{{ $data->nokk }}" placeholder="Masukkan Nomor Kartu Keluarga" tabindex="1" autofocus required/>
    </div>
    <div class="form-group">
        <label for="namakk">Nama Kartu Keluarga</label>
        <input value="{{ $data->namakk }}" type="text" class="form-control" id="namakk" name="namakk"
               placeholder="Masukkan Nama Kepala Keluarga" tabindex="2"/>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $data->alamat }}" type="text" name="alamat" class="form-control" id="alamat"
                       placeholder="Alamat" tabindex="17">
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="notps">No. TPS</label>
                <input value="{{ $data->notps }}" type="text" name="notps" class="form-control" id="notps"
                       placeholder="No TPS" tabindex="18">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Kecamatan</label>
                {{--{{ Form::select('kecamatan',$kecamatan,null,['class'=>'form-control','tabindex'=>'21','id'=>'kecamatan']) }}--}}
                <select id="kecamatan" name="kecamatan" class="form-control" tabindex="20">
                    <option value="">Semua Kecamatan</option>
                    @foreach($kecamatan as $kec)
                        <option value="{{$kec->id}}" {{ ((empty($data->kecamatan)) ? '' : (($data->kecamatan == $kec->id) ? 'selected' : '' )) }}>{{$kec->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-xs-6">
            <div class="form-group">
                <label>Kelurahan</label>
{{--                {{dd($kelurahan)}}--}}
                <select id="kelurahan" name="kelurahan" class="form-control" tabindex="20">
                    <option value="">Semua Kelurahan</option>
                    @foreach($kel as $k)
                        <option value="{{$k->id_kelurahan}}" {{ ((empty($data->kelurahan)) ? '' : (($data->kelurahan == $k->id_kelurahan) ? 'selected' : '' )) }}>{{$k->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <div class="form-group">
        <label for="pekerjaan">Pekerjaan</label>
        <input value="{{ $data->pekerjaan }}" type="text" name="pekerjaan" class="form-control" id="pekerjaan"
               placeholder="Pekerjaan" tabindex="21">
    </div>
    <div class="form-group">
        <label for="notelp">No. Telp/HP</label>
        <input value="{{ $data->notelp }}" type="text" name="notelp" class="form-control" id="notelp"
               placeholder="No. Telp/HP" tabindex="22">
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="23">Update</button>
</div>