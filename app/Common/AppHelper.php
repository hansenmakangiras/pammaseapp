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
    static function getListKecamatan()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status', 1)->get();

        return $kecamatan;
    }

    static function getListKelurahan($kode)
    {
        $data = Kelurahan::where('kecamatan_id', $kode)->where('status', 1)->get();

        return $data;
    }

    static function getJsonKelurahan($idkec)
    {
        $kelurahan = Kelurahan::where('kecamatan_id', $idkec)->where('status', 1)->get();
        return json_encode($kelurahan);
    }

    static function getJsonKecamatan()
    {
        return json_encode(AppHelper::getListKecamatan());
    }
    static function getAllKelurahan()
    {
        if (empty($_GET['kec'])) {
            if (empty($_GET['kel'])) {
                $kelurahan = Kelurahan::where('kecamatan_id', 'xdx')->get();
            } else {
                $getkel = Kelurahan::where('id_kelurahan', $_GET['kel'])->where('status', 1)->first();
                $kelurahan = Kelurahan::where('kecamatan_id', $getkel['kecamatan_id'])->where('status', 1)->get();
            }
        } else {
            if (empty($_GET['kel'])) {
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            } else {
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            }
        }

        return $kelurahan;
    }
    static function getKelurahan($kode)
    {
        if(isset($kode)){
            $kelurahan = Kelurahan::where('kecamatan_id', $kode)->where('status', 1)->get()->toArray();
//            $kelurahan = DB::table('kelurahan')
//                ->where('kecamatan_id','=',$kode)
//                ->first()->toArray();
        }

        return $kelurahan;
    }
}