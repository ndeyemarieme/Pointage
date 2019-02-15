<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class fonction
 * @package App\Models
 * @version February 15, 2019, 9:22 am UTC
 */
class fonction extends Model
{
    use SoftDeletes;

    public $table = 'fonctions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required'
    ];

    public function employers(){
        return $this->hasMay('App\Models\employer');
    }
    
}
