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
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->nullable()
                    ->constrained('study_types')->cascadeOnUpdate()
                    ->cascadeOnDelete();

            $table->integer('version')->default(0);
            $table->enum('state',["Design completed","Data entered","Requested","Verified"
                                ,"Analysis in progress","Analysis Completed"]);
            $table->boolean('locked')->default(false);

            $table->foreignId('locked_by')->nullable()
                    ->constrained('users')->cascadeOnUpdate()
                    ->cascadeOnDelete();

            $table->timestamp('locked_moment')->nullable();
            $table->string('name')->unique()->nullable();
            $table->boolean('channeltype')->nullable();
            $table->boolean('valid')->default(true);
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
        Schema::dropIfExists('studies');
    }
};
