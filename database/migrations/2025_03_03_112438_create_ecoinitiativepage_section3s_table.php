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
        Schema::create('ecoinitiativepage_section3s', function (Blueprint $table) {
            $table->id();
            $table->string('sec3titlel')->nullable();
            $table->string('sec3imagel')->nullable();
            $table->string('sec3contentl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoinitiativepage_section3s');
    }
};
