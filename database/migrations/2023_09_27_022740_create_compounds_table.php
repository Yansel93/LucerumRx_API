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
        Schema::create('compounds', function (Blueprint $table) {
                $table->id();
                $table->string('uid');
                $table->foreignId('effectonsleep_id')->nullable()
                        ->constrained('effecton_sleeps')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->foreignId('compoundclass_id')->nullable()
                        ->constrained('compound_classes')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->foreignId('compoundsubclass_id')->nullable()
                        ->constrained('compound_subclasses')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->foreignId('target_id')->nullable()
                        ->constrained('targets')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->text('targetselectivity')->nullable();
                $table->string('name')->unique();
                $table->string('synonyms')->nullable();
                $table->string('tradenames')->nullable();
                $table->string('chemicalstructure')->nullable();
                $table->string('casregistrynumber')->nullable();
                $table->string('indication')->nullable();
                $table->string('description')->nullable();
                $table->string('bioactivity')->nullable();
                $table->boolean('abusepotential')->default(false);

                $table->foreignId('createdby')->nullable()
                        ->constrained('studies')->cascadeOnUpdate()
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
        Schema::dropIfExists('compounds');
    }
};
