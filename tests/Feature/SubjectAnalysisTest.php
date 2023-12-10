<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectAnalysisTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/subjectanalysis');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedSubjectanalysis(): void
    {

        $data = [
            'studyid'     => 1,
            'studyversion'=> "neo",
            'subjectid'   => 1,
            'invalid'     => true,
            'filepath'    => 'filepath' ,
        ];
        $response = $this->post('/api/v1/subjectanalysis',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetSubjectanalysisById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/subjectanalysis/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateSubjectanalysis()
    {

        $id =1;
        $data = [
            'studyid'     => 1,
            'studyversion'=> "neo",
            'subjectid'   => 1,
            'invalid'     => true,
            'filepath'    => 'filepath' ,
            ];
            $response = $this->put('/api/v1/subjectanalysis/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedSubjectanalysis(): void
    {
        $id =1;
        $response = $this->put('/api/v1/subjectanalysis_delete/'.$id);

        $response->assertStatus(200);
    }
}
