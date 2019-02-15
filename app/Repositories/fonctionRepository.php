<?php

namespace App\Repositories;

use App\Models\fonction;
use InfyOm\Generator\Common\BaseRepository;

class fonctionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return fonction::class;
    }
}
