<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class utilisateurApiTest extends TestCase
{
    use MakeutilisateurTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateutilisateur()
    {
        $utilisateur = $this->fakeutilisateurData();
        $this->json('POST', '/api/v1/utilisateurs', $utilisateur);

        $this->assertApiResponse($utilisateur);
    }

    /**
     * @test
     */
    public function testReadutilisateur()
    {
        $utilisateur = $this->makeutilisateur();
        $this->json('GET', '/api/v1/utilisateurs/'.$utilisateur->id);

        $this->assertApiResponse($utilisateur->toArray());
    }

    /**
     * @test
     */
    public function testUpdateutilisateur()
    {
        $utilisateur = $this->makeutilisateur();
        $editedutilisateur = $this->fakeutilisateurData();

        $this->json('PUT', '/api/v1/utilisateurs/'.$utilisateur->id, $editedutilisateur);

        $this->assertApiResponse($editedutilisateur);
    }

    /**
     * @test
     */
    public function testDeleteutilisateur()
    {
        $utilisateur = $this->makeutilisateur();
        $this->json('DELETE', '/api/v1/utilisateurs/'.$utilisateur->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/utilisateurs/'.$utilisateur->id);

        $this->assertResponseStatus(404);
    }
}
