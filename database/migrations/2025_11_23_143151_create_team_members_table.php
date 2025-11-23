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
        Schema::create('team_members', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('linkedin')->nullable();
            $table->string('quote')->nullable();
            $table->string('image')->nullable();
            $table->longText('content')->nullable(); // TinyMCE content
            $table->integer('sort_order')->default(0); // optional for ordering
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
