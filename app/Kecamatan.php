<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = "km_kecamatan";
    public $timestamps=false;

    public static function getkec($id){
        $getkec = Kecamatan::where('id', $id)->where('status', 1)->get();
        if($getkec->isEmpty()){
            $kec = '';
        }else{
            $kec = $getkec[0]->name;
        }

        return $kec;
    }

    public static function getkecbypst($nokk){
        $getkk = Data::where('nokk', $nokk)->where('status', 1)->get();
        if($getkk->isEmpty()){
            $kec = '';
        }else{
            $getkec = Kecamatan::where('id', $getkk[0]->kecamatan)->where('status', 1)->get();
            if($getkec->isEmpty()){
                $kec = '';
            }else{
                $kec = $getkec[0]->name;
            }
        }

        return $kec;
    }
}
