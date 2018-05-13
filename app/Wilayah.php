<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table='wilayah';
    public $timestamps = false;

    public function getKecamatan($kode){
        return Wilayah::where('kode','=',$kode)->orderBy('kecamatan','asc')->get();
    }

    public function getKelurahan($kel){
        return Wilayah::where('kelurahan','=',$kel)->orderBy()->get();
    }
}
