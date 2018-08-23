<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = "kp_kelurahan";
    public $timestamps = false;

    public function data(){
        return $this->hasMany(Data::class,'kelurahan','id_kelurahan');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id','id');
    }

    public static function getkel($id){
        $getkel = Kelurahan::where('id_kelurahan', $id)->where('status', 1)->get();
        if($getkel->isEmpty()){
            $kel = '';
        }else{
            $kel = $getkel[0]->name;
        }

        return $kel;
    }

    public static function getkelbypst($nokk){
        $getkk = Keluarga::where('no_kk', $nokk)->where('status', 1)->get();
        if($getkk->isEmpty()){
            $kec = '';
        }else{
            $getkec = Kelurahan::where('id_kelurahan', $getkk[0]->kelurahan)->where('status', 1)->get();
            if($getkec->isEmpty()){
                $kec = '';
            }else{
                $kec = $getkec[0]->name;
            }
        }

        return $kec;
    }
}
