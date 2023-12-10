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
        Schema::create('experimental_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosage_id')->nullable()
                    ->constrained('dosages')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('study_id')->nullable()
                    ->constrained('studies')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('timepoint_id')->nullable()
                    ->constrained('time_points')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('group_id')->nullable()
                    ->constrained('groups')->cascadeOnUpdate()
                    ->cascadeOnDelete();
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
        Schema::dropIfExists('experimental_conditions');
    }
};
