<?php

namespace App\Repositories;

use App\Models\pointer;
use InfyOm\Generator\Common\BaseRepository;

class pointerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hrdep',
        'hrfin',
        'latitude',
        'logitude',
        'employer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pointer::class;
    }
}
