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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('profile');                 // Job title / profile
            $table->string('positions')->nullable();  // Number of positions (2-3)
            $table->string('experience')->nullable(); // e.g., 5+ Years
            $table->longText('location')->nullable(); // Location (longText for flexibility)
            $table->longText('eligibility')->nullable(); // Educational requirements
            $table->longText('summary')->nullable();  // Job summary
            $table->longText('requirements')->nullable(); // Job requirements / responsibilities
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
