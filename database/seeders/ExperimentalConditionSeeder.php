<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperimentalConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experimental_conditions')->insert([
            'dosage_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'study_id' => 1,
            'timepoint_id' => 1,
            'group_id' => 1

        ]);
    }
}
