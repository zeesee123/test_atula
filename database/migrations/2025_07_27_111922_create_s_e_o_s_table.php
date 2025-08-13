<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('s_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable()->unique(); // SEO Title (Meta Title)
            $table->text('meta_description')->nullable(); // Meta Description
            $table->longText('schema_markup')->nullable(); // Structured Data (Schema Markup)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('s_e_o_s');
    }
};
