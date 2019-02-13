<?php

use App\Models\utilisateur;
use App\Repositories\utilisateurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class utilisateurRepositoryTest extends TestCase
{
    use MakeutilisateurTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var utilisateurRepository
     */
    protected $utilisateurRepo;

    public function setUp()
    {
        parent::setUp();
        $this->utilisateurRepo = App::make(utilisateurRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateutilisateur()
    {
        $utilisateur = $this->fakeutilisateurData();
        $createdutilisateur = $this->utilisateurRepo->create($utilisateur);
        $createdutilisateur = $createdutilisateur->toArray();
        $this->assertArrayHasKey('id', $createdutilisateur);
        $this->assertNotNull($createdutilisateur['id'], 'Created utilisateur must have id specified');
        $this->assertNotNull(utilisateur::find($createdutilisateur['id']), 'utilisateur with given id must be in DB');
        $this->assertModelData($utilisateur, $createdutilisateur);
    }

    /**
     * @test read
     */
    public function testReadutilisateur()
    {
        $utilisateur = $this->makeutilisateur();
        $dbutilisateur = $this->utilisateurRepo->find($utilisateur->id);
        $dbutilisateur = $dbutilisateur->toArray();
        $this->assertModelData($utilisateur->toArray(), $dbutilisateur);
    }

    /**
     * @test update
     */
    public function testUpdateutilisateur()
    {
        $utilisateur = $this->makeutilisateur();
        $fakeutilisateur = $this->fakeutilisateurData();
        $updatedutilisateur = $this->utilisateurRepo->update($fakeutilisateur, $utilisateur->id);
        $this->assertModelData($fakeutilisateur, $updatedutilisateur->toArray());
        $dbutilisateur = $this->utilisateurRepo->find($utilisateur->id);
        $this->assertModelData($fakeutilisateur, $dbutilisateur->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteutilisateur()
    {
        $utilisateur = $this->makeutilisateur();
        $resp = $this->utilisateurRepo->delete($utilisateur->id);
        $this->assertTrue($resp);
        $this->assertNull(utilisateur::find($utilisateur->id), 'utilisateur should not exist in DB');
    }
}
