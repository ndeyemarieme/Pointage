<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pointerApiTest extends TestCase
{
    use MakepointerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatepointer()
    {
        $pointer = $this->fakepointerData();
        $this->json('POST', '/api/v1/pointers', $pointer);

        $this->assertApiResponse($pointer);
    }

    /**
     * @test
     */
    public function testReadpointer()
    {
        $pointer = $this->makepointer();
        $this->json('GET', '/api/v1/pointers/'.$pointer->id);

        $this->assertApiResponse($pointer->toArray());
    }

    /**
     * @test
     */
    public function testUpdatepointer()
    {
        $pointer = $this->makepointer();
        $editedpointer = $this->fakepointerData();

        $this->json('PUT', '/api/v1/pointers/'.$pointer->id, $editedpointer);

        $this->assertApiResponse($editedpointer);
    }

    /**
     * @test
     */
    public function testDeletepointer()
    {
        $pointer = $this->makepointer();
        $this->json('DELETE', '/api/v1/pointers/'.$pointer->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pointers/'.$pointer->id);

        $this->assertResponseStatus(404);
    }
}
