<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResultFilesTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/resultfiles');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedResultfiles(): void
    {

        $data = [
            'studyid'    => 1,
            'filePath'    => "filePath",
        ];
        $response = $this->post('/api/v1/resultfiles',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetResultfilesById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/resultfiles/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateResultfiles()
    {

        $id =1;
        $data = [
            'studyid'    => 1,
            'filePath'    => "filePath",            
            ];
            $response = $this->put('/api/v1/resultfiles/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedResultfiles(): void
    {
        $id =1;
        $response = $this->put('/api/v1/resultfiles_delete/'.$id);

        $response->assertStatus(200);
    }
}
