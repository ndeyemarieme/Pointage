<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class employer
 * @package App\Models
 * @version February 15, 2019, 9:32 am UTC
 */
class employer extends Model
{
    use SoftDeletes;

    public $table = 'employers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'login',
        'pw',
        'fonction_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'login' => 'string',
        'pw' => 'string',
        'fonction_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'login' => 'required',
        'pw' => 'required',
        'fonction_id' => 'required'
       ];

    public function fonctions(){
        return $this->belongsTo('App\Models\fonction','fonction_id');
    }
    
    public function pointer(){
        return $this->hasMay('App\Models\pointer');
    }
}
