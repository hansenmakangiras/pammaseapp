<?php
/**
 * Created by PhpStorm.
 * User: Hansen
 * Date: 17/05/2018
 * Time: 01.55
 */

namespace App\Common;
use App\Anggota;
use App\Data;
use App\Kecamatan;
use App\Kelurahan;

class AppHelper
{
    static function getKecamatanName($kode){
        $kecamatan = Kecamatan::where('id',$kode)->first();
        $name = $kecamatan->name;
        return $name;
    }

    static function getKelurahanName($kode){
        $kelurahan = Kelurahan::where('id_kelurahan',$kode)->first();
        $name = $kelurahan->name;
        return $name;
    }
}