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
        Schema::create('testpages', function (Blueprint $table) {
            $table->id();
            $table->string('field1')->nullable();
            $table->string('field2')->nullable();
            $table->string('field3')->nullable();
            $table->string('field4')->nullable();
            $table->json('section1')->nullable();
            $table->json('section2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testpages');
    }
};
