<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class employerApiTest extends TestCase
{
    use MakeemployerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateemployer()
    {
        $employer = $this->fakeemployerData();
        $this->json('POST', '/api/v1/employers', $employer);

        $this->assertApiResponse($employer);
    }

    /**
     * @test
     */
    public function testReademployer()
    {
        $employer = $this->makeemployer();
        $this->json('GET', '/api/v1/employers/'.$employer->id);

        $this->assertApiResponse($employer->toArray());
    }

    /**
     * @test
     */
    public function testUpdateemployer()
    {
        $employer = $this->makeemployer();
        $editedemployer = $this->fakeemployerData();

        $this->json('PUT', '/api/v1/employers/'.$employer->id, $editedemployer);

        $this->assertApiResponse($editedemployer);
    }

    /**
     * @test
     */
    public function testDeleteemployer()
    {
        $employer = $this->makeemployer();
        $this->json('DELETE', '/api/v1/employers/'.$employer->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/employers/'.$employer->id);

        $this->assertResponseStatus(404);
    }
}
