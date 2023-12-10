<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectAnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subject_analyses')->insert([
            'study_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'studyversion' => 1,
            'subject_id' => 1,
            'filepath' => 'subject',
        ]);
    }
}
