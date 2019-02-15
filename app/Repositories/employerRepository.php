<?php

namespace App\Repositories;

use App\Models\employer;
use InfyOm\Generator\Common\BaseRepository;

class employerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'login',
        'pw',
        'fonction_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return employer::class;
    }
}
