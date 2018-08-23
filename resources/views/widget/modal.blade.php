<div class = "modal fade" id = "modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus">
    <div class = "modal-dialog" role="document">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title" id="modalHapus">Hapus Data</h4>
            </div>
            <div class = "modal-body">
                <p>Apakah anda yakin ingin menghapus data ini ?</p>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-flat bg-navy pull-left" data-dismiss = "modal">Batal</button>
                {!! Form::open(['method' => 'DELETE','route' => ['data.destroy', isset($value->id) ? $value->id : 0],'style'=>'display:inline','id'=>'form-hapus']) !!}
                <button id="btn-delete" type = "submit" class = "btn btn-flat bg-red" onclick="$('#btn-delete').submit();">
                    <i class = "fa fa-trash-o"></i> Hapus
                </button>
                {!! Form::close() !!}
                {{--<button type = "button" class = "btn btn-primary">Save changes</button>--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class = "modal fade" id = "modal-add-anggota" role="dialog"
     aria-labelledby="modalAddAnggota">
    <div class = "modal-dialog" role="document">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title" id="modalAddAnggota">InputData</h4>
            </div>
            {{--{!! Form::open(['method' => 'POST','route' => 'anggota.store',--}}
             {{--'style'=>'display:inline','id'=>'form-add-anggota']) !!}--}}
            {!! Form::open(['route' => 'anggota.store','method'=>'POST','id'=>'form-add-anggota']) !!}
            @csrf
            <div class = "modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="_nokk">No Kartu Keluarga</label>
                            {{--{{ Form::select('nokk',[null => 'Semua KK'] + $listNoKK,old('nokk'),['style'=>'width:--}}
                            {{--100%;','class'=>'form-control select2','tabindex'=>'1','id'=>'nokk','autofocus','required']) }}--}}
                            {{--<select id="_nokk" name="nokk" class="form-control select2" style="width: 100%"--}}
                                    {{--autofocus>--}}
                            {{--</select>--}}
                            <input id="_nokk" type="hidden" name="nokk" class="form-control" value="" autocomplete="off"
                                   required/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nama">Nama Anggota</label>
                            <input type="text" name="nama" class="form-control" id="nama" tabindex="1" autofocus
                                   autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" name="umur" class="form-control" id="umur" tabindex="2" autofocus
                                   autocomplete="off" required/>
                        </div>
                    </div>
                </div>

            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-flat bg-navy pull-left" data-dismiss = "modal">Batal</button>
                <button id="btn-add" type = "submit" class = "btn btn-flat bg-red" onclick=" $('#btn-add').submit();"><i
                        class = "fa fa-trash-o"></i> Simpan
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class = "modal modal-info fade" id = "modal-info">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title">Info Modal</h4>
            </div>
            <div class = "modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-outline pull-left" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-outline">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class = "modal modal-warning fade" id = "modal-warning">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title">Warning Modal</h4>
            </div>
            <div class = "modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-outline pull-left" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-outline">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class = "modal modal-success fade" id = "modal-success">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title">Success Modal</h4>
            </div>
            <div class = "modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-outline pull-left" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-outline">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class = "modal modal-danger fade" id = "modal-danger">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title">Danger Modal</h4>
            </div>
            <div class = "modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-outline pull-left" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-outline">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scriptModal')
{{--    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>--}}
    <script type="text/javascript">
        {{--$(function () {--}}
            {{--$('select .select2').select2({--}}
                {{--placeholder: 'Select an option',--}}
                {{--ajax: {--}}
                    {{--url: '{!! route("anggota.getListNoKK") !!}',--}}
                    {{--processResults: function (data) {--}}
                        {{--// Tranforms the top-level key of the response object from 'items' to 'results'--}}
                        {{--console.log(data);--}}
                        {{--// return {--}}
                        {{--//     results: data.items--}}
                        {{--// };--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    </script>
@endpush