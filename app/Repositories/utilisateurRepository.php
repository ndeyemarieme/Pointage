<?php

namespace App\Repositories;

use App\Models\utilisateur;
use InfyOm\Generator\Common\BaseRepository;

class utilisateurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'login',
        'pw'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return utilisateur::class;
    }
}
