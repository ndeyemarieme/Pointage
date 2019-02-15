<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class fonctionApiTest extends TestCase
{
    use MakefonctionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatefonction()
    {
        $fonction = $this->fakefonctionData();
        $this->json('POST', '/api/v1/fonctions', $fonction);

        $this->assertApiResponse($fonction);
    }

    /**
     * @test
     */
    public function testReadfonction()
    {
        $fonction = $this->makefonction();
        $this->json('GET', '/api/v1/fonctions/'.$fonction->id);

        $this->assertApiResponse($fonction->toArray());
    }

    /**
     * @test
     */
    public function testUpdatefonction()
    {
        $fonction = $this->makefonction();
        $editedfonction = $this->fakefonctionData();

        $this->json('PUT', '/api/v1/fonctions/'.$fonction->id, $editedfonction);

        $this->assertApiResponse($editedfonction);
    }

    /**
     * @test
     */
    public function testDeletefonction()
    {
        $fonction = $this->makefonction();
        $this->json('DELETE', '/api/v1/fonctions/'.$fonction->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/fonctions/'.$fonction->id);

        $this->assertResponseStatus(404);
    }
}
