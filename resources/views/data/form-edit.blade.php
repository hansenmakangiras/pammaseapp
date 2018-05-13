@csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="nokk">No. Kartu Keluarga</label>
                <input type="text" name="nokk" class="form-control" id="nokk"
                 value="{{ $data->nokk }}" placeholder="Masukkan Nomor Kartu Keluarga" tabindex="1" autofocus required/>
            </div>
        </div>
        <div class="col-xs-9">
            <div class="form-group">
                <label for="namakk">Nama Kartu Keluarga</label>
                <input value="{{ $data->namakk }}" type="text" class="form-control" id="namakk" name="namakk"
                       placeholder="Masukkan Nama Kepala Keluarga" tabindex="2"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 1</label>
                        <input value="{{$data->anggota[0]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"
                               placeholder="Nama Anggota Keluarga" tabindex="3"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur</label>
                        <input value="{{$data->anggota[0]['umur']}}"type="text" name="anggota[umur][]" class="form-control" id="umur1"
                               placeholder="Umur" tabindex="4"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota2">Anggota Keluarga 2</label>
                        <input value="{{$data->anggota[1]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota2"
                               placeholder="Nama Anggota Keluarga 2" tabindex="5"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur2">Umur 2</label>
                        <input value="{{$data->anggota[1]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur2"
                               placeholder="Umur" tabindex="6"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 3</label>
                        <input value="{{$data->anggota[2]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"
                               placeholder="Nama Anggota Keluarga" tabindex="7"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 3</label>
                        <input value="{{$data->anggota[2]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"
                               placeholder="Umur" tabindex="8"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 4</label>
                        <input value="{{$data->anggota[3]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"
                               placeholder="Nama Anggota Keluarga" tabindex="9"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 4</label>
                        <input value="{{$data->anggota[3]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"
                               placeholder="Umur" tabindex="10"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 5</label>
                        <input value="{{$data->anggota[4]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"
                               placeholder="Nama Anggota Keluarga" tabindex="11"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 5</label>
                        <input value="{{$data->anggota[4]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"
                               placeholder="Umur" tabindex="12"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 6</label>
                        <input value="{{$data->anggota[5]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"
                               placeholder="Nama Anggota Keluarga" tabindex="13"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 6</label>
                        <input value="{{$data->anggota[5]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"
                               placeholder="Umur" tabindex="14"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 7</label>
                        <input value="{{$data->anggota[6]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"
                               placeholder="Nama Anggota Keluarga" tabindex="15"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 7</label>
                        <input value="{{$data->anggota[6]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"
                               placeholder="Umur" tabindex="16"/>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input value="{{ $data->pekerjaan }}" type="text" name="pekerjaan" class="form-control" id="pekerjaan"
                       placeholder="Pekerjaan" tabindex="21">
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="notelp">No. Telp/HP</label>
                <input value="{{ $data->notelp }}" type="text" name="notelp" class="form-control" id="notelp"
                       placeholder="No. Telp/HP" tabindex="22">
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="23">Submit</button>
</div>