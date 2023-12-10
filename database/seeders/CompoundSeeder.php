<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compounds')->insert([
            'name' => 'compound',
            'uid' => 'compounduid',
            'createdby' => 1,
            'ownercompany' => 1,
            'effectonsleep_id' => 1,
            'compoundclass_id' => 1,
            'compoundsubclass_id' => 1,
            'target_id' => 1,
            'targetselectivity' => 'text'
        ]);
    }
}
