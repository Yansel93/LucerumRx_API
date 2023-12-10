<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpecieTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/specie');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedSpecie(): void
    {

        $data = [
            'name'    => "neo",
            'description'    => "description",
        ];
        $response = $this->post('/api/v1/specie',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetSpecieById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/specie/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateSpecie()
    {

        $id =1;
        $data = [
            'name'    => "neo",
            'description'    => "description",            
            ];
            $response = $this->put('/api/v1/specie/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedSpecie(): void
    {
        $id =1;
        $response = $this->put('/api/v1/specie_delete/'.$id);

        $response->assertStatus(200);
    }
}
