<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;

class JsonController extends Controller
{
    public function getJsonKelurahan($idkec)
    {
        $kelurahan = Kelurahan::where('kecamatan_id', $idkec)->where('status', 1)->get();

        return json_encode($kelurahan);
    }

    public function getJsonKecamatan()
    {
        return json_encode(AppHelper::getListKecamatan());
    }

}
