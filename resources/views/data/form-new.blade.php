{!! Form::open(['route' => 'data.store','method'=>'POST']) !!}

@csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="namaanggota1">Anggota Keluarga</label>
                <input type="text" name="anggota[nama][]" class="form-control" id="namaanggota1" tabindex="3"/>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="umur1">Umur</label>
                <input type="text" name="anggota[umur][]" class="form-control" id="umur1" tabindex="4"/>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-primary" tabindex="23">Simpan Anggota</button>
</div>

{!! Form::close() !!}