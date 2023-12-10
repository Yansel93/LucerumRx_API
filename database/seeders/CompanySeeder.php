<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'companyname' => "primera",
                'uid' => "primera",
                'countryoforigin' => "itaili",
                'registeringcode' => "201",
                'createdby' => 1
            ],[
                'companyname' => "segundo",
                'uid' => "segundo",
                'countryoforigin' => "france",
                'registeringcode' => "202",
                'createdby' => 2
            ]
    ]);
    }
}
