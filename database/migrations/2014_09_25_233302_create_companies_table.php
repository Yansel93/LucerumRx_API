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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('companyname')->unique();
            $table->string('uid')->nullable()->unique();
            $table->string('countryoforigin');
            $table->string('address')->nullable()->unique();
            $table->string('registeringcode')->unique();
            $table->timestamp('codecreationdate')->nullable();
            $table->timestamp('expirydate')->nullable();
            $table->integer('createdby')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
