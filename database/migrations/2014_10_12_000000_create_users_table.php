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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('uid')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->foreignId('company_id')
                    ->constrained('companies')->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->integer('role')->nullable();
            $table->datetime('dob')->nullable();
            $table->boolean('verified')->default(false);
            $table->foreignId('createdby')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
