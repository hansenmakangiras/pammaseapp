<?php

namespace App;

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

    protected $table="data";
//    public $timestamps=false;
    protected $fillable =[
        'nokk','namakk','anggotaid','alamat','notps','kelurahan','kecamatan','pekerjaan','notelp'
    ];

    public function anggota(){
        return $this->hasMany(Anggota::class,'anggotaid','anggotaid');
    }
    
    public function kecamatan(){
        return $this->hasOne(Kecamatan::class,'id');
    }

    public function kelurahan(){
        return $this->hasOne(Kelurahan::class,'id_kelurahan');
    }
}
