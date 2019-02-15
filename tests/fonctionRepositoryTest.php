<?php

use App\Models\fonction;
use App\Repositories\fonctionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class fonctionRepositoryTest extends TestCase
{
    use MakefonctionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var fonctionRepository
     */
    protected $fonctionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fonctionRepo = App::make(fonctionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatefonction()
    {
        $fonction = $this->fakefonctionData();
        $createdfonction = $this->fonctionRepo->create($fonction);
        $createdfonction = $createdfonction->toArray();
        $this->assertArrayHasKey('id', $createdfonction);
        $this->assertNotNull($createdfonction['id'], 'Created fonction must have id specified');
        $this->assertNotNull(fonction::find($createdfonction['id']), 'fonction with given id must be in DB');
        $this->assertModelData($fonction, $createdfonction);
    }

    /**
     * @test read
     */
    public function testReadfonction()
    {
        $fonction = $this->makefonction();
        $dbfonction = $this->fonctionRepo->find($fonction->id);
        $dbfonction = $dbfonction->toArray();
        $this->assertModelData($fonction->toArray(), $dbfonction);
    }

    /**
     * @test update
     */
    public function testUpdatefonction()
    {
        $fonction = $this->makefonction();
        $fakefonction = $this->fakefonctionData();
        $updatedfonction = $this->fonctionRepo->update($fakefonction, $fonction->id);
        $this->assertModelData($fakefonction, $updatedfonction->toArray());
        $dbfonction = $this->fonctionRepo->find($fonction->id);
        $this->assertModelData($fakefonction, $dbfonction->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletefonction()
    {
        $fonction = $this->makefonction();
        $resp = $this->fonctionRepo->delete($fonction->id);
        $this->assertTrue($resp);
        $this->assertNull(fonction::find($fonction->id), 'fonction should not exist in DB');
    }
}
