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
        Schema::create('file_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->constrained('studies')
                    ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('file');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_tests');
    }
};
