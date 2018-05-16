<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table="anggota";
    public $timestamps=false;
    protected $fillable =[
        'anggotaid','nama','umur'
    ];

    public function data(){
        return $this->belongsTo(Data::class,'anggotaid','anggotaid');
    }
}
