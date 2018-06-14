{!! Form::open(['route' => ['data.update',$id],'method'=>'PUT','role'=>'form']) !!}
{{--{!! Form::model([$data,$kec,$anggota,$kel,$kecamatan,$kelurahan,$id], ['method' => 'PUT','route' => ['data.update', $id]]) !!}--}}
<div class = "tab-content">
    <div class = "tab-pane active" id = "datakk">
        <div class = "row">
            <div class = "col-md-6">
                <div class = "form-group">
                    <label for = "nokk">No. Kartu Keluarga</label>
                    <input type = "text" name = "nokk" class = "form-control" id = "nokk"
                           value = "{{ $data->nokk }}" placeholder = "Masukkan Nomor Kartu Keluarga" tabindex = "1"
                           autofocus required />
                </div>
            </div>
            <div class = "col-md-6">
                <div class = "form-group">
                    <label for = "namakk">Nama Kartu Keluarga</label>
                    <input value = "{{ $data->namakk }}" type = "text" class = "form-control" id = "namakk"
                           name = "namakk"
                           placeholder = "Masukkan Nama Kepala Keluarga" tabindex = "2" />
                </div>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-6">
                <div class = "form-group">
                    <label for = "alamat">Alamat</label>
                    <input value = "{{ $data->alamat }}" type = "text" name = "alamat" class = "form-control"
                           id = "alamat"
                           placeholder = "Alamat" tabindex = "3">
                </div>
            </div>
            <div class = "col-md-6">
                <div class = "form-group">
                    <label for = "notps">No. TPS</label>
                    <input value = "{{ $data->notps }}" type = "text" name = "notps" class = "form-control" id = "notps"
                           placeholder = "No TPS" tabindex = "4">
                </div>
            </div>
        </div>
        <div class = "row">
            <div class = "col-xs-6">
                <div class = "form-group">
                    <label>Kecamatan</label>
                    {{ Form::select('kecamatan',[null => 'Semua Kecamatan'] + $kecamatan,$data->kecamatan,['class'=>'form-control','tabindex'=>'5','id'=>'kecamatan']) }}
                </div>
            </div>
            <!-- /.col-lg-6 -->
            <div class = "col-xs-6">
                <div class = "form-group">
                    <label>Kelurahan</label>
                    {{ Form::select('kelurahan',[null => 'Semua Kelurahan'] + $kelurahan,$data->kelurahan,['class'=>'form-control','tabindex'=>'6','id'=>'kelurahan']) }}
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <div class = "row">
            <div class = "col-xs-6">
                <div class = "form-group">
                    <label for = "pekerjaan">Pekerjaan</label>
                    {{ Form::select('pekerjaan',[null => 'Semua Pekerjaan'] + $pekerjaan,$data->pekerjaan,['class'=>'form-control','tabindex'=>'7','id'=>'pekerjaan']) }}
                </div>
            </div>
            <div class = "col-xs-6">
                <div class = "form-group">
                    <label for = "notelp">No. Telp/HP</label>
                    <input value = "{{ $data->notelp }}" type = "text" name = "notelp" class = "form-control"
                           id = "notelp" tabindex = "8">
                </div>
            </div>
        </div>
        <div class = "box-footer">
            <button type = "submit" class = "btn bg-aqua" tabindex = "9">SIMPAN</button>
        </div>
    </div>
{!! Form::close() !!}