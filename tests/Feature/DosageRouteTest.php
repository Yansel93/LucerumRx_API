<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DosageRouteTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/dosageroute');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedDosageroute(): void
    {

        $data = [
        'name'       => 'name'
        ];
        $response = $this->post('/api/v1/dosageroute',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetDosagerouteById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/dosageroute/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateDosageroute()
    {

        $id =1;
        $data = [
            'name'       => 'name1'
            ];
            $response = $this->put('/api/v1/dosageroute/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedDosageroute(): void
    {
        $id =1;
        $response = $this->put('/api/v1/dosageroute_delete/'.$id);

        $response->assertStatus(200);
    }
}
