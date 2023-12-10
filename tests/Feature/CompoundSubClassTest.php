<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompoundSubClassTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/compoundsubclass');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedCompoundsubclass(): void
    {

        $data = [
        'name'       => 'name',
        'uid'       => 'name',
        ];
        $response = $this->post('/api/v1/compoundsubclass',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetCompoundsubclassById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/compoundsubclass/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateCompoundsubclass()
    {

        $id =1;
        $data = [
            'name'       => 'name1',
            'uid'       => 'name1',
            ];
            $response = $this->put('/api/v1/compoundsubclass/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedCompoundsubclass(): void
    {
        $id =1;
        $response = $this->put('/api/v1/compoundsubclass_delete/'.$id);

        $response->assertStatus(200);
    }
}
