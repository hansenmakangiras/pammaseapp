<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table="data_real";
//    public $timestamps=false;
    protected $fillable =[
        'nokk','namakk','alamat','notps','kelurahan','kecamatan','pekerjaan','notelp'
    ];

    public function anggota(){
        return $this->hasMany(Anggota::class,'anggotaid','anggotaid');
    }

    public function kecamatan(){
        return $this->hasOne(Kecamatan::class,'id','id');
    }

    public function kelurahan(){
        return $this->hasOne(Kelurahan::class,'id_kelurahan','id_kelurahan');
    }
}
