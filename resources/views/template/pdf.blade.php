<!DOCTYPE html>

<html>

<head>

    <title>Load PDF</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">

</head>

<body>
<h2>Eksport Data Keluarga</h2>

<table class="table table-condensed">

    <thead>
    <tr>
        <th width="15%">No KK</th>
        <th width="20%">Nama Keluarga</th>
        <th>Alamat</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th width="5%">No Telp</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $value)
        <tr>
            <td>{{ $value->nokk }}</td>
            <td>{{ $value->namakk }}</td>
            <td>{{ $value->alamat }}</td>
            <td>{{ \App\Common\AppHelper::getKecamatanName($value->kecamatan) }}</td>
            <td>{{ \App\Common\AppHelper::getKelurahanName($value->kelurahan) }}</td>
            <td class="text-center">{{ $value->notelp }}</td>
        </tr>
    @endforeach
    </tbody>

</table>



</body>

</html>

