@csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="nokk">No. Kartu Keluarga</label>
                <input type="text" name="nokk" class="form-control" id="nokk" tabindex="1" autofocus required/>
            </div>
        </div>
        <div class="col-xs-9">
            <div class="form-group">
                <label for="namakk">Nama Kartu Keluarga</label>
                <input type="text" class="form-control" id="namakk" name="namakk" tabindex="2"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 1</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="3"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="4"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota2">Anggota Keluarga 2</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota2" tabindex="5"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur2">Umur 2</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur2" tabindex="6"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 3</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="7"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 3</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="8"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 4</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="9"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 4</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="10"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 5</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="11"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 5</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="12"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 6</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="13"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 6</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="14"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label for="namaanggota1">Anggota Keluarga 7</label>
                        <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="15"/>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="umur1">Umur 7</label>
                        <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="16"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" tabindex="17">
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="notps">No. TPS</label>
                <input type="text" name="notps" class="form-control" id="notps" tabindex="18">
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
                        <option value="{{$kec->id}}" {{ ((empty($_GET['kec'])) ? '' : (($_GET['kec'] == $kec->id) ? 'selected' : '' )) }}>{{$kec->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.col-lg-6 -->
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
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" tabindex="21">
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="notelp">No. Telp/HP</label>
                <input type="text" name="notelp" class="form-control" id="notelp" tabindex="22">
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="23">Submit</button>
</div>