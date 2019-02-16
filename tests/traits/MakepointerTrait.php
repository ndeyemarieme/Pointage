<?php

use Faker\Factory as Faker;
use App\Models\pointer;
use App\Repositories\pointerRepository;

trait MakepointerTrait
{
    /**
     * Create fake instance of pointer and save it in database
     *
     * @param array $pointerFields
     * @return pointer
     */
    public function makepointer($pointerFields = [])
    {
        /** @var pointerRepository $pointerRepo */
        $pointerRepo = App::make(pointerRepository::class);
        $theme = $this->fakepointerData($pointerFields);
        return $pointerRepo->create($theme);
    }

    /**
     * Get fake instance of pointer
     *
     * @param array $pointerFields
     * @return pointer
     */
    public function fakepointer($pointerFields = [])
    {
        return new pointer($this->fakepointerData($pointerFields));
    }

    /**
     * Get fake data of pointer
     *
     * @param array $postFields
     * @return array
     */
    public function fakepointerData($pointerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'hrdep' => $fake->word,
            'hrfin' => $fake->word,
            'latitude' => $fake->word,
            'logitude' => $fake->word,
            'employer_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pointerFields);
    }
}
