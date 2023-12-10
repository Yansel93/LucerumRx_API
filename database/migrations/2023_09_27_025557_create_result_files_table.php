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
        Schema::create('result_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->nullable()
                    ->constrained('studies')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->integer('studyversion');
            $table->string('filepath');
            $table->foreignId('createdby')->nullable()
                    ->constrained('users')->cascadeOnUpdate()
                    ->cascadeOnDelete();        
            $table->foreignId('ownercompany')->nullable()
                    ->constrained('companies')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->foreignId('lastupdatedby')->nullable();
            $table->boolean('is_deleted')->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_files');
    }
};
