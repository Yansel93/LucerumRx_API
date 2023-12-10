<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/subject');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedSubject(): void
    {

        $data = [
            'studyid'               => 1,
            'speciesid'             => 1,
            'strainid'              => 1,
            'geneticmodtype'        => 1,
            'groupid'               => 1,
            'sex'                   => 'male' ,
            'age'                   => 21,
            'ageunit'               => 'Y',
            'acclimationlengthUnit' => 'W' ,
            'active'                => false,
        ];
        $response = $this->post('/api/v1/subject',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetSubjectanalysisById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/subject/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateSubjectanalysis()
    {

        $id =1;
        $data = [
            'studyid'               => 1,
            'speciesid'             => 1,
            'strainid'              => 1,
            'geneticmodtype'        => 1,
            'groupid'               => 1,
            'sex'                   => 'male' ,
            'age'                   => 21,
            'ageunit'               => 'Y',
            'acclimationlengthUnit' => 'W' ,
            'active'                => false,
            ];
            $response = $this->put('/api/v1/subject/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedSubjectanalysis(): void
    {
        $id =1;
        $response = $this->put('/api/v1/subject_delete/'.$id);

        $response->assertStatus(200);
    }
}
