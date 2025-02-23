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
        Schema::create('homepage_section6s', function (Blueprint $table) {
            $table->id();
            $table->string('sec6year')->nullable();
            $table->string('sec6stitle')->nullable();
            $table->longText('sec6scontent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_section6s');
    }
};
