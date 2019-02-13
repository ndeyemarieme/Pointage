<?php

use Faker\Factory as Faker;
use App\Models\utilisateur;
use App\Repositories\utilisateurRepository;

trait MakeutilisateurTrait
{
    /**
     * Create fake instance of utilisateur and save it in database
     *
     * @param array $utilisateurFields
     * @return utilisateur
     */
    public function makeutilisateur($utilisateurFields = [])
    {
        /** @var utilisateurRepository $utilisateurRepo */
        $utilisateurRepo = App::make(utilisateurRepository::class);
        $theme = $this->fakeutilisateurData($utilisateurFields);
        return $utilisateurRepo->create($theme);
    }

    /**
     * Get fake instance of utilisateur
     *
     * @param array $utilisateurFields
     * @return utilisateur
     */
    public function fakeutilisateur($utilisateurFields = [])
    {
        return new utilisateur($this->fakeutilisateurData($utilisateurFields));
    }

    /**
     * Get fake data of utilisateur
     *
     * @param array $postFields
     * @return array
     */
    public function fakeutilisateurData($utilisateurFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'login' => $fake->word,
            'pw' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $utilisateurFields);
    }
}
