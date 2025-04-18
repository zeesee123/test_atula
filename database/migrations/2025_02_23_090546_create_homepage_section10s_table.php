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
        Schema::create('homepage_section10s', function (Blueprint $table) {
            $table->id();
            $table->string('sec10_stitle')->nullable();
            $table->string('sec10_simg')->nullable();
            $table->longText('sec10_scontent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_section10s');
    }
};
