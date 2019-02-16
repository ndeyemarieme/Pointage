<?php

use App\Models\pointer;
use App\Repositories\pointerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pointerRepositoryTest extends TestCase
{
    use MakepointerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var pointerRepository
     */
    protected $pointerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pointerRepo = App::make(pointerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatepointer()
    {
        $pointer = $this->fakepointerData();
        $createdpointer = $this->pointerRepo->create($pointer);
        $createdpointer = $createdpointer->toArray();
        $this->assertArrayHasKey('id', $createdpointer);
        $this->assertNotNull($createdpointer['id'], 'Created pointer must have id specified');
        $this->assertNotNull(pointer::find($createdpointer['id']), 'pointer with given id must be in DB');
        $this->assertModelData($pointer, $createdpointer);
    }

    /**
     * @test read
     */
    public function testReadpointer()
    {
        $pointer = $this->makepointer();
        $dbpointer = $this->pointerRepo->find($pointer->id);
        $dbpointer = $dbpointer->toArray();
        $this->assertModelData($pointer->toArray(), $dbpointer);
    }

    /**
     * @test update
     */
    public function testUpdatepointer()
    {
        $pointer = $this->makepointer();
        $fakepointer = $this->fakepointerData();
        $updatedpointer = $this->pointerRepo->update($fakepointer, $pointer->id);
        $this->assertModelData($fakepointer, $updatedpointer->toArray());
        $dbpointer = $this->pointerRepo->find($pointer->id);
        $this->assertModelData($fakepointer, $dbpointer->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletepointer()
    {
        $pointer = $this->makepointer();
        $resp = $this->pointerRepo->delete($pointer->id);
        $this->assertTrue($resp);
        $this->assertNull(pointer::find($pointer->id), 'pointer should not exist in DB');
    }
}
