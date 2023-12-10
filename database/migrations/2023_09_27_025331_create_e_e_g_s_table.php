<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('e_e_g_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subject_id')->nullable()
                    ->constrained('subjects')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('study_id')->nullable()
                    ->constrained('studies')->cascadeOnUpdate()
                    ->cascadeOnDelete();                
            $table->foreignId('experimentalcondition_id')->nullable()
                    ->constrained('experimental_conditions')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->string('filepath');            
            $table->foreignId('createdby')->nullable()
                    ->constrained('users')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('ownercompany')->nullable()
                    ->constrained('companies')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('lastupdatedby')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_e_g_s');
    }
};
