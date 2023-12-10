<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneticallyModifiedTypeTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/genetically');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedGenetically(): void
    {

        $data = [
        'name'    => "nombres",
        ];
        $response = $this->post('/api/v1/genetically',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetGeneticallyById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/genetically/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateGenetically()
    {

        $id =1;
        $data = [
            'name'    => "nombres",
            ];
            $response = $this->put('/api/v1/genetically/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedExperimental(): void
    {
        $id =1;
        $response = $this->put('/api/v1/genetically_delete/'.$id);

        $response->assertStatus(200);
    }
}
