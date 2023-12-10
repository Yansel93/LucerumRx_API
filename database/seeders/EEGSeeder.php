<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EEGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('e_e_g_s')->insert([
            'name' => 'e_e_g_s',
            'subject_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'study_id' => 1,
            'experimentalcondition_id' => 1,
            'filepath' => "text",
        ]);
    }
}
