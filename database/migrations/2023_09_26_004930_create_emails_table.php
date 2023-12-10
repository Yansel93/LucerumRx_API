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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained('users')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->string('email')->unique();
            $table->string('verificationcode')->unique();
            $table->boolean('verified')->default(false);
            $table->timestamp('codecreationdate')->nullable();
            $table->timestamp('expirydate')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->boolean('confirmed')->nullable()->default(false);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
