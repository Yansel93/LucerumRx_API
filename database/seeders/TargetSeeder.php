<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('targets')->insert([
            'name' => 'target',
            'targetclass_id' => 1,
            'createdby' => 1,
            'ownercompany' => 1,
            'swissprotid' => 'asdf'
        ]);
    }
}
