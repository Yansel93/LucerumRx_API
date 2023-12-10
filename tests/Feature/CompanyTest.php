<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/company');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedCompany(): void
    {

        $data = [
        'companyname'       => 'name',
        'countryoforigin'   => 'countryoforigin',
        'address'           => 'address',
        'registeringcode'   => 'registeringcode',
        ];
        $response = $this->post('/api/v1/company',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetCompanyById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/company/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateCompany()
    {

        $id =1;
        $data = [
            'companyname'       => 'name1',
            'countryoforigin'   => 'countryoforigin1',
            'address'           => 'address1',
            'registeringcode'   => 'registeringcode1',
            ];
            $response = $this->put('/api/v1/company/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedCompany(): void
    {
        $id =1;
        $response = $this->put('/api/v1/company_delete/'.$id);

        $response->assertStatus(200);
    }
}
