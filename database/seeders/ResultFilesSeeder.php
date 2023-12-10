<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('result_files')->insert([
            'study_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'studyversion' => 1,
            'filepath' => '/tmp/',
        ]);
    }
}
