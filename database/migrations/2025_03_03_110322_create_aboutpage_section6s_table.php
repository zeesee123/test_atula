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
        Schema::create('aboutpage_section6s', function (Blueprint $table) {
            $table->id();
            $table->string('sec6titlel')->nullable();
            $table->string('sec6imagel')->nullable();
            $table->longText('sec6textl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpage_section6s');
    }
};
