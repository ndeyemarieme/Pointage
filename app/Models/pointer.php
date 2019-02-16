<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pointer
 * @package App\Models
 * @version February 15, 2019, 11:49 pm UTC
 */
class pointer extends Model
{
    use SoftDeletes;

    public $table = 'pointers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'hrdep',
        'hrfin',
        'latitude',
        'logitude',
        'employer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'hrdep' => 'string',
        'hrfin' => 'string',
        'latitude' => 'string',
        'logitude' => 'string',
        'employer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hrdep' => 'required',
        'hrfin' => 'required',
        'latitude' => 'required',
        'logitude' => 'required',
        'employer_id' => 'required'
    ];

    public function employers(){
        return $this->belongsTo('App\Models\employer','employer_id');
    }
    
}
