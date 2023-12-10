<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/group');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedGroup(): void
    {

        $data = [
            'name'    => "nombres",
            'timepoints'    => "timepoints",
        ];
        $response = $this->post('/api/v1/group',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetGroupById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/group/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateGroup()
    {

        $id =1;
        $data = [
            'name'    => "nombres",
            'timepoints'    => "timepoints",
            
            ];
            $response = $this->put('/api/v1/group/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedGroup(): void
    {
        $id =1;
        $response = $this->put('/api/v1/group_delete/'.$id);

        $response->assertStatus(200);
    }
}
