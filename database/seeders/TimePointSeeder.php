<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimePointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('time_points')->insert([
            'name' => 'time_points',
            'createdby' => 1,
            'ownercompany' => 1,
            'study_id' => 1
        ]);
    }
}
