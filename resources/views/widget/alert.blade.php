@if ($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Kesalahan !!!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('Success'))
    <div class = "alert alert-success alert-dismissible">
        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;
        </button>
        <h4><i class = "icon fa fa-check"></i> Sukses!</h4>
        {{ session('Success') }}
    </div>
@elseif(session('Error'))
    <div class = "alert alert-danger alert-dismissible">
        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;
        </button>
        <h4><i class = "icon fa fa-ban"></i> Error!</h4>
        {{ session('Error') }}
    </div>
@elseif(session('Info'))
    <div class = "alert alert-info alert-dismissible">
        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;
        </button>
        <h4><i class = "icon fa fa-info"></i> Info !!!</h4>
        {{ session('Info') }}
    </div>
@endif