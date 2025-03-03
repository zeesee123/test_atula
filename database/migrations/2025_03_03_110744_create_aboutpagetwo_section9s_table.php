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
        Schema::create('aboutpagetwo_section9s', function (Blueprint $table) {
            $table->id();
            $table->string('sec9imagel')->nullable();
            $table->string('sec9titlel')->nullable();
            $table->longText('sec9textl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpagetwo_section9s');
    }
};
