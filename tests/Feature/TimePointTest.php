<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TimePointTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/timepoint');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedTimepoint(): void
    {

        $data = [
            'name'          => 'name11',
            'studyid'     => 1,
            'ownercompany' => 1,
        ];
        $response = $this->post('/api/v1/timepoint',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetTimepointById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/timepoint/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateTimepoint()
    {

        $id =1;
        $data = [
            'name'          => 'name11',
            'studyid'     => 1,
            'ownercompany' => 1,
            ];
            $response = $this->put('/api/v1/timepoint/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedTimepoint(): void
    {
        $id =1;
        $response = $this->put('/api/v1/timepoint_delete/'.$id);

        $response->assertStatus(200);
    }
}
