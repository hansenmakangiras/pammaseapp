@csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-12">
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
            {{--<div class="row">--}}
            {{--<div class="col-xs-9">--}}
            {{--<div class="form-group">--}}
            {{--<label for="namaanggota1">Anggota Keluarga 3</label>--}}
            {{--<input value="{{$data->anggota[2]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"--}}
            {{--placeholder="Nama Anggota Keluarga" tabindex="7"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<div class="form-group">--}}
            {{--<label for="umur1">Umur 3</label>--}}
            {{--<input value="{{$data->anggota[2]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"--}}
            {{--placeholder="Umur" tabindex="8"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="col-xs-9">--}}
            {{--<div class="form-group">--}}
            {{--<label for="namaanggota1">Anggota Keluarga 4</label>--}}
            {{--<input value="{{$data->anggota[3]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"--}}
            {{--placeholder="Nama Anggota Keluarga" tabindex="9"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<div class="form-group">--}}
            {{--<label for="umur1">Umur 4</label>--}}
            {{--<input value="{{$data->anggota[3]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"--}}
            {{--placeholder="Umur" tabindex="10"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="col-xs-6">
            {{--<div class="row">--}}
            {{--<div class="col-xs-9">--}}
            {{--<div class="form-group">--}}
            {{--<label for="namaanggota1">Anggota Keluarga 5</label>--}}
            {{--<input value="{{$data->anggota[4]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"--}}
            {{--placeholder="Nama Anggota Keluarga" tabindex="11"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<div class="form-group">--}}
            {{--<label for="umur1">Umur 5</label>--}}
            {{--<input value="{{$data->anggota[4]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"--}}
            {{--placeholder="Umur" tabindex="12"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="col-xs-9">--}}
            {{--<div class="form-group">--}}
            {{--<label for="namaanggota1">Anggota Keluarga 6</label>--}}
            {{--<input value="{{$data->anggota[5]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"--}}
            {{--placeholder="Nama Anggota Keluarga" tabindex="13"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<div class="form-group">--}}
            {{--<label for="umur1">Umur 6</label>--}}
            {{--<input value="{{$data->anggota[5]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"--}}
            {{--placeholder="Umur" tabindex="14"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="col-xs-9">--}}
            {{--<div class="form-group">--}}
            {{--<label for="namaanggota1">Anggota Keluarga 7</label>--}}
            {{--<input value="{{$data->anggota[6]['nama']}}" type="text" name="anggota[nama][]" class="form-control" id="namaanggota1"--}}
            {{--placeholder="Nama Anggota Keluarga" tabindex="15"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<div class="form-group">--}}
            {{--<label for="umur1">Umur 7</label>--}}
            {{--<input value="{{$data->anggota[6]['umur']}}" type="text" name="anggota[umur][]" class="form-control" id="umur1"--}}
            {{--placeholder="Umur" tabindex="16"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
