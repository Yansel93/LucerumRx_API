<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompoundClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('compound_classes')->insert([
            'name' => 'compound',
            'uid' => 'compounduid',
            'createdby' => 1,
            'ownercompany' => 1
        ]);
        
    }
}
