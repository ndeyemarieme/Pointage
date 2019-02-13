<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class utilisateur
 * @package App\Models
 * @version February 13, 2019, 12:30 am UTC
 */
class utilisateur extends Model
{
    use SoftDeletes;

    public $table = 'utilisateurs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'login',
        'pw'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'login' => 'string',
        'pw' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'login' => 'required',
        'pw' => 'required'
    ];

    
}
