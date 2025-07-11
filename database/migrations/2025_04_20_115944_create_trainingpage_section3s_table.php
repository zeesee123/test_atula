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
        Schema::create('trainingpage_section3s', function (Blueprint $table) {
            $table->id();
            $table->string('sec3imagel')->nullable();
            $table->string('sec3titlel')->nullable();
            $table->longText('sec3textl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainingpage_section3s');
    }
};
