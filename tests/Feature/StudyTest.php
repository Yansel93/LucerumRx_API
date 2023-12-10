<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudyTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/study');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedStudy(): void
    {

        $data = [
            'typeid'        => 1,
            'name'          => "neo",
            'channeltype'   => "neo",
            'valid'         => true,
        ];
        $response = $this->post('/api/v1/study',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetStudyById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/study/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateStudy()
    {

        $id =1;
        $data = [
            'typeid'        => 1,
            'name'          => "neo",
            'channeltype'   => "neo",
            'valid'         => true,
            ];
            $response = $this->put('/api/v1/study/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedStudy(): void
    {
        $id =1;
        $response = $this->put('/api/v1/study_delete/'.$id);

        $response->assertStatus(200);
    }
}
