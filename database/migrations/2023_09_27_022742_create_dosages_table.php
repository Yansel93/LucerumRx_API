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
        Schema::create('dosages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('study_id')->nullable()
                    ->constrained('studies')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('route_id')->nullable()
                    ->constrained('dose_routes')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('compound_id')->nullable()
                    ->constrained('compounds')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->string('level');            
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
        Schema::dropIfExists('dosages');
    }
};
