<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompoundSubclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compound_subclasses')->insert([
            'name' => 'compound',
            'uid' => 'compounduid',
            'createdby' => 1,
            'ownercompany' => 1
        ]);
    }
}
