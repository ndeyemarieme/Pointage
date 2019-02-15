<?php

use App\Models\employer;
use App\Repositories\employerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class employerRepositoryTest extends TestCase
{
    use MakeemployerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var employerRepository
     */
    protected $employerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->employerRepo = App::make(employerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateemployer()
    {
        $employer = $this->fakeemployerData();
        $createdemployer = $this->employerRepo->create($employer);
        $createdemployer = $createdemployer->toArray();
        $this->assertArrayHasKey('id', $createdemployer);
        $this->assertNotNull($createdemployer['id'], 'Created employer must have id specified');
        $this->assertNotNull(employer::find($createdemployer['id']), 'employer with given id must be in DB');
        $this->assertModelData($employer, $createdemployer);
    }

    /**
     * @test read
     */
    public function testReademployer()
    {
        $employer = $this->makeemployer();
        $dbemployer = $this->employerRepo->find($employer->id);
        $dbemployer = $dbemployer->toArray();
        $this->assertModelData($employer->toArray(), $dbemployer);
    }

    /**
     * @test update
     */
    public function testUpdateemployer()
    {
        $employer = $this->makeemployer();
        $fakeemployer = $this->fakeemployerData();
        $updatedemployer = $this->employerRepo->update($fakeemployer, $employer->id);
        $this->assertModelData($fakeemployer, $updatedemployer->toArray());
        $dbemployer = $this->employerRepo->find($employer->id);
        $this->assertModelData($fakeemployer, $dbemployer->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteemployer()
    {
        $employer = $this->makeemployer();
        $resp = $this->employerRepo->delete($employer->id);
        $this->assertTrue($resp);
        $this->assertNull(employer::find($employer->id), 'employer should not exist in DB');
    }
}
