<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StrainTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/strain');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedStrain(): void
    {

        $data = [
            'name'    => "neo",
        ];
        $response = $this->post('/api/v1/strain',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetStrainById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/strain/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateStrain()
    {

        $id =1;
        $data = [
            'name'    => "neo",
            ];
            $response = $this->put('/api/v1/strain/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedStrain(): void
    {
        $id =1;
        $response = $this->put('/api/v1/strain_delete/'.$id);

        $response->assertStatus(200);
    }
}
