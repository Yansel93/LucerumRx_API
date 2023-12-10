<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            'uid' => "uid",
            'study_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'species_id' => 1,
            'strain_id' => 1,
            'geneticmodtype' => 1,
            'group_id' => 1,
            'sex' => 'male'
        ]);
    }
}
