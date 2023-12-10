<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TargetClassTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/targetclass');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedTargetclass(): void
    {

        $data = [
            'name'                => 'names',
        ];
        $response = $this->post('/api/v1/targetclass',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetTargetclassById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/targetclass/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateTargetclass()
    {

        $id =1;
        $data = [
            'name'   => 'names',
            ];
            $response = $this->put('/api/v1/targetclass/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedTargetclass(): void
    {
        $id =1;
        $response = $this->put('/api/v1/targetclass_delete/'.$id);

        $response->assertStatus(200);
    }
}
