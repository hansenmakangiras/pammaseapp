@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datakk" data-toggle="tab">Data Kartu Keluarga</a></li>
                    <li><a href="#dataanggota" data-toggle="tab">Data Anggota Keluarga</a></li>
                    {{--<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>--}}
                    {{--<li class="pull-right dropdown">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                            {{--Aksi <span class="caret"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('data.index') }}">Lihat Data</a></li>--}}
                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>--}}
                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>--}}
                            {{--<li role="presentation" class="divider"></li>--}}
                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="pull-right"><a role="menuitem" href="#" class="btn btn-link"><i class="fa fa-save"></i></a></li>--}}
                    <li class="pull-right"><a role="menuitem" tabindex="-1" href="{{ route('data.index') }}" class="text-primary"><i class="fa fa-eye"></i> Lihat Data</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="datakk">
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
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" tabindex="23">Submit</button>
                        </div>
                    </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="dataanggota">
                        <div class="row">
                            <div class="col-xs-12">
                                @foreach($anggota as $value)
                                    <div class="row">
                                        <div class="col-xs-9">
                                            <div class="form-group">
                                                <label for="namaanggota1">Anggota Keluarga 1</label>
                                                <input value="{{$value->nama}}" type="text" name="anggota[]" class="form-control" id="namaanggota1"
                                                       placeholder="Nama Anggota Keluarga" tabindex="3"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label for="umur1">Umur</label>
                                                <input value="{{$value->umur}}"type="text" name="anggota[]" class="form-control" id="umur1"
                                                       placeholder="Umur" tabindex="4"/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" tabindex="23">Update</button>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->

            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</div>