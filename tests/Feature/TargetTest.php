<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TargetTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/target');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedTarget(): void
    {

        $data = [
            'name'          => 'name11',
            'accession'     => "sdsd",
            'targetclassid' => 1,
            'swissprotid'   => 'swissprotid',
            'organism'      => 'organism',
            'gene'          => 'gene',
        ];
        $response = $this->post('/api/v1/target',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetTargetById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/target/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateTarget()
    {

        $id =1;
        $data = [
            'name'          => 'name11',
            'accession'     => "sdsd",
            'targetclassid' => 1,
            'swissprotid'   => 'swissprotids',
            'organism'      => 'organism',
            'gene'          => 'gene',
            ];
            $response = $this->put('/api/v1/target/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedTarget(): void
    {
        $id =1;
        $response = $this->put('/api/v1/target_delete/'.$id);

        $response->assertStatus(200);
    }
}
