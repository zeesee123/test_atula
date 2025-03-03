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
        Schema::create('aboutpagetwo_section5s', function (Blueprint $table) {
            $table->id();
            $table->string('sec5titlel')->nullable();
            $table->longText('sec5textl')->nullable();
            

            $table->longText('sec5achieve')->nullable();
            $table->longText('sec5tech')->nullable();
            
            $table->string('sec5img1l')->nullable();
            $table->string('sec5img2l')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpagetwo_section5s');
    }
};
