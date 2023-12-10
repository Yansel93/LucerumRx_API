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
        Schema::create('subjects', function (Blueprint $table) {
                $table->id();
                $table->string('uid');
                
                $table->foreignId('study_id')
                        ->constrained('studies')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->foreignId('species_id')
                        ->constrained('species')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->foreignId('strain_id')
                        ->constrained('strains')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->integer('geneticmodtype');

                $table->foreignId('group_id')
                        ->constrained('groups')->cascadeOnUpdate()
                        ->cascadeOnDelete();
                $table->enum('sex',["male","femenine"]);
                $table->integer('age')->nullable();
                $table->enum('ageunit',["Y","M","W","D"])->default("Y");
                $table->dateTime('dob')->nullable();
                $table->float('acclimationlength')->nullable();
                $table->enum('acclimationlengthUnit',["W","D"])->default("W");
                $table->text('clinicalstatus')->nullable();
                $table->boolean('active')->default(false);
                
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
        Schema::dropIfExists('subjects');
    }
};
