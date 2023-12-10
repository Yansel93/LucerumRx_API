<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EEGTest extends TestCase
{
    /**
     * @test
     */
    public function GetAll(): void
    {

        $response = $this->get('/api/v1/eeg');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function CreatedEEg(): void
    {

        $data = [
        'name'                      => 'name',
        'subject_id'                => 1,
        'study_id'                  => 1,
        'experimentalcondition_id'  => 1,
        'filepath'                  => "as",
        ];
        $response = $this->post('/api/v1/eeg',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function GetEEGById(): void
    {
        $id = 1;
        $response = $this->get('/api/v1/eeg/'.$id);

        $response->assertStatus(200);
    }

    
    /**
     * @test
     */
    public function UpdateEGG()
    {

        $id =1;
        $data = [
            'name'                      => 'name',
            'subject_id'                => 1,
            'study_id'                  => 1,
            'experimentalcondition_id'  => 1,
            'filepath'                  => "as",
            ];
            $response = $this->put('/api/v1/eeg/'.$id,$data);
    
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function DeletedEGG(): void
    {
        $id =1;
        $response = $this->put('/api/v1/eeg_delete/'.$id);

        $response->assertStatus(200);
    }
}
