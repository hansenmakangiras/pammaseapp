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
                <button id="btn-delete" type = "submit" class = "btn btn-flat bg-red"
                        href = "{{ route('data.destroy',['id'=>isset($value->id) ? $value->id : 0]) }}"><i
                        class = "fa fa-trash-o" onclick="submitForm()"></i> Hapus
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
<div class = "modal modal-primary fade" id = "modal-primary">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span></button>
                <h4 class = "modal-title">Primary Modal</h4>
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
    <script type="text/javascript">
        function submitForm()
        {
            $('#btn-delete').submit();
        }
    </script>
@endpush