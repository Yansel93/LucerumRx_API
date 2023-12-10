<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectonSleepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('effecton_sleeps')->insert([
            'name' => 'effecton_sleeps',
            'createdby' => 1,
        ]);
    }
}
