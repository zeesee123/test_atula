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
        Schema::create('agroforestrypage_section12s', function (Blueprint $table) {
            $table->id();
            $table->string('sec12titlel')->nullable();
            $table->string('sec12imagel')->nullable();
            $table->string('sec12linkl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agroforestrypage_section12s');
    }
};
