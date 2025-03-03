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
        Schema::create('aboutpagetwo_section8s', function (Blueprint $table) {
            $table->id();
            $table->string('sec8imagel')->nullable();
            $table->string('sec8titlel')->nullable();
            $table->longText('sec8textl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpagetwo_section8s');
    }
};
