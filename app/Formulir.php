<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulir extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table="data";
//    public $timestamps=false;
    protected $fillable =[
        'nokk','namakk','anggotaid','alamat','notps','kelurahan','kecamatan','pekerjaan','notelp'
    ];
}
