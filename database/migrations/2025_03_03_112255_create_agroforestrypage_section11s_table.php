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
        Schema::create('agroforestrypage_section11s', function (Blueprint $table) {
            $table->id();
            $table->string('sec11titlel')->nullable();
            $table->string('sec11imagel')->nullable();
            $table->string('sec11linkl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agroforestrypage_section11s');
    }
};
