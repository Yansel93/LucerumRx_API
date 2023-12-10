<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/employee');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedEmployee(): void
    {

        $data = [
        'userid'       => 1,
        ];
        $response = $this->post('/api/v1/employee',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetEmployeeById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/employee/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateEmployee()
    {

        $id =1;
        $data = [
            'userid'       => 1,
            ];
            $response = $this->put('/api/v1/employee/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedEmployee(): void
    {
        $id =1;
        $response = $this->put('/api/v1/employee_delete/'.$id);

        $response->assertStatus(200);
    }
}
