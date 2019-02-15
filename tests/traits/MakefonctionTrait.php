<?php

use Faker\Factory as Faker;
use App\Models\fonction;
use App\Repositories\fonctionRepository;

trait MakefonctionTrait
{
    /**
     * Create fake instance of fonction and save it in database
     *
     * @param array $fonctionFields
     * @return fonction
     */
    public function makefonction($fonctionFields = [])
    {
        /** @var fonctionRepository $fonctionRepo */
        $fonctionRepo = App::make(fonctionRepository::class);
        $theme = $this->fakefonctionData($fonctionFields);
        return $fonctionRepo->create($theme);
    }

    /**
     * Get fake instance of fonction
     *
     * @param array $fonctionFields
     * @return fonction
     */
    public function fakefonction($fonctionFields = [])
    {
        return new fonction($this->fakefonctionData($fonctionFields));
    }

    /**
     * Get fake data of fonction
     *
     * @param array $postFields
     * @return array
     */
    public function fakefonctionData($fonctionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'libelle' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $fonctionFields);
    }
}
