<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EffectionSleepTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/effectionsleep');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedEffectionsleep(): void
    {

        $data = [
        'name'                      => 'name',
        ];
        $response = $this->post('/api/v1/effectionsleep',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetEffectionsleepById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/effectionsleep/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateEffectionsleep()
    {

        $id =1;
        $data = [
            'name'                      => 'name',
            ];
            $response = $this->put('/api/v1/effectionsleep/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedEffectionsleep(): void
    {
        $id =1;
        $response = $this->put('/api/v1/effectionsleep_delete/'.$id);

        $response->assertStatus(200);
    }
}
