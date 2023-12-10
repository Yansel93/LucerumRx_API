<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AnalysisRequest;
use App\Models\DoseRoute;
use App\Models\StudyType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call([
                CompanySeeder::class,
                UserSeeder::class,
                SpecieSeeder::class,
                StudyTypeSeeder::class,
                EmployeeSeeder::class,
                StudySeeder::class,
                TimePointSeeder::class,
                StrainSeeder::class,
                GroupSeeder::class,
                SubjectSeeder::class,
                TargetClassSeeder::class,
                TargetSeeder::class,
                CompoundClassSeeder::class,
                CompoundSubclassSeeder::class,
                EffectonSleepSeeder::class,
                CompoundSeeder::class,
                DoseRouteSeeder::class,
                DosageSeeder::class,
                ExperimentalConditionSeeder::class,
                EEGSeeder::class,
                GeneticallyModifiedTypeSeeder::class,
                ResultFilesSeeder::class,
                SubjectAnalysisSeeder::class,
                AnalysisRequestSeeder::class
            ]);
    }
}
