<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DosageTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/dosage');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedDosage(): void
    {

        $data = [
        'name'       => 'hombre',
        'study_id'     => 1,
        'route_id'     => 1,
        'compound_id'  => 1,
        'level'       => 1,
        ];
        $response = $this->post('/api/v1/dosage',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetDosageById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/dosage/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateDosage()
    {

        $id =1;
        $data = [
            'name'       => 'names',
            'study_id'     => 1,
            'route_id'     => 1,
            'compound_id'  => 1,
            'level'       => 1,
            ];
            $response = $this->put('/api/v1/dosage/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedDosage(): void
    {
        $id =1;
        $response = $this->put('/api/v1/dosage_delete/'.$id);

        $response->assertStatus(200);
    }
}
