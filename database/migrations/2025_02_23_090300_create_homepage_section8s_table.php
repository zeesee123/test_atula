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
        Schema::create('homepage_section8s', function (Blueprint $table) {
            $table->id();
            $table->string('sec8_slogo')->nullable();
            $table->longText('sec8_scontent')->nullable();
            $table->string('sec8_slink')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_section8s');
    }
};
