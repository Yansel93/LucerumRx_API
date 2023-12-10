<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('studies')->insert([
            'type_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'state' => 'Data entered',
            'locked_by' => 1,
        ]);
    }
}
