<?php
/**
 * Created by PhpStorm.
 * User: Hansen
 * Date: 17/05/2018
 * Time: 01.55
 */

namespace App\Common;
use App\Models\Data;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

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
    static function getTrashedData(){
        return Data::onlyTrashed()->get();
    }
    static function getTrashedAnggota(){
        return Anggota::onlyTrashed()->get();
    }
}