<?php /** @noinspection PhpCSValidationInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed anggotaid
 * @property mixed nama
 * @property mixed umur
 * @property int status
 */

class Anggota extends Model
{
    use SoftDeletes;

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['data'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table="anggota";
//    public $timestamps=false;
    protected $fillable =[
        'anggotaid','nama','umur'
    ];

    public function data(){
        return $this->belongsTo(Data::class,'anggotaid','anggotaid');
    }
}
