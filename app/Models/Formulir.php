<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulir extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table="formulir";

    protected $fillable =[
        'nokk','nama','notelp','jumlah','kelurahan','kecamatan'
    ];
}
