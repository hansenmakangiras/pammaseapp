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
use App\Models\Pekerjaan;
use DB;

class AppHelper
{
    static function getKecamatanName($kode){
        $kecamatan = Kecamatan::where('id',$kode)->first();
        $name = $kecamatan->name;
        return $name;
    }

    static function changeSkin($skin){
        $skin = (isset($skin) ? $skin : config('app.skin'));
        return $skin;
    }

    static function getListPekerjaan(){
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id')->toArray();
        return $pekerjaan;
    }

    static function getPekerjaanName($id){
        $pekerjaan = Pekerjaan::find($id);
        return $pekerjaan->pekerjaan;
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

    static function getAktif($kode){
        $kode = (int)($kode);
        return (isset($kode) && $kode == 1) ? "Aktif" : "Non Aktif";
    }

    static function getSelectKecamatan(){
        return Kecamatan::where('kota_id', '7313')
            ->where('status', 1)
            ->pluck('name','id')
            ->toArray();
    }
    static function getCountKecamatan($param){
        if(empty($param)){
            return 0;
        }
        return Data::where('status',1)
            ->where('kecamatan',$param)
            ->count();
    }
    static function getCountKelurahan($kec,$kel){
        return Data::where('status',1)
            ->where('kecamatan', $kec)
            ->where('kelurahan',$kel)
            ->count();

    }

    static function getSelectKelurahan($kec){
        $kec = !empty($kec) ? $kec : '';
        return Kelurahan::where('kecamatan_id', $kec)
            ->where('status', 1)
            ->pluck('name','id_kelurahan')
            ->toArray();
    }

    static function getListKecamatan()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')
            ->with(['data','kelurahan'])
            ->where('status', 1)
            ->get();
//        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status', 1)->pluck()->toArray();

        return $kecamatan;
    }

    static function getKecamatanArray($select)
    {
        if(is_array($select)){
            $kecamatan = Kecamatan::select(['name','id'])
                ->with('data','kelurahan')
                ->where('kota_id', '7313')
                ->where('status', 1)
                ->get()->toArray();
            return $kecamatan;
            //dd($kecamatan);
        }
       return [];

    }

    static function getListKelurahan($kode)
    {
        $data = Kelurahan::where('kecamatan_id', $kode)
            ->with(['data','kecamatan'])
            ->where('status', 1)
            ->get();

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
        $kode = !empty($kode) ? $kode : '';
        $kelurahan = Kelurahan::where('kecamatan_id', $kode)
            ->where('status', 1)
            ->get()->toArray();
        return $kelurahan;
    }
}