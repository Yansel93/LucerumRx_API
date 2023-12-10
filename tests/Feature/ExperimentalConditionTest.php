<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExperimentalConditionTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/experimental');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedExperimental(): void
    {

        $data = [
        'dosageid'    => 1,
        'studyid'     => 1,
        'timepointid' => 1,
        'groupid'     => 1,
        ];
        $response = $this->post('/api/v1/experimental',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetExperimentalById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/experimental/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateExperimental()
    {

        $id =1;
        $data = [
            'dosageid'    => 1,
            'studyid'     => 1,
            'timepointid' => 1,
            'groupid'     => 1,
            ];
            $response = $this->put('/api/v1/experimental/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedExperimental(): void
    {
        $id =1;
        $response = $this->put('/api/v1/experimental_delete/'.$id);

        $response->assertStatus(200);
    }
}
