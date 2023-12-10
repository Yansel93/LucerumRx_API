<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosages')->insert([
            'name' => 'compound',
            'study_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'route_id' => 1,
            'compound_id' => 1,
            'level' => "text",
        ]);
    }
}
