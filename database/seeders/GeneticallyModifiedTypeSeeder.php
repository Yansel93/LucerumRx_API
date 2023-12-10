<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneticallyModifiedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genetically_modified_types')->insert([
            'name' => 'genetically_modified_types',
            'createdby' => 1,
            'ownercompany' => 1,
        ]);
    }
}
