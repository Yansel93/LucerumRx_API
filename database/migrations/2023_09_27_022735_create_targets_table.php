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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();            
            $table->foreignId('targetclass_id')->nullable()
                    ->constrained('target_classes')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->string('accession')->nullable();
            $table->string('swissprotid')->unique();
            $table->string('organism')->nullable();
            $table->string('gene')->nullable();
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
        Schema::dropIfExists('targets');
    }
};
