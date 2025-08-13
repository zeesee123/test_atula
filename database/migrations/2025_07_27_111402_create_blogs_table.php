<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_image')->nullable(); // Featured image
            $table->string('title')->unique(); // Blog title (unique)
            $table->date('date')->nullable(); // Publish date
            $table->boolean('publish')->default(false); // Publish status
            $table->longText('content'); // Blog content
            $table->string('slug')->unique(); // SEO-friendly URL

            // SEO fields
            $table->string('meta_title')->nullable()->unique(); // SEO Title (Meta Title)
            $table->text('meta_description')->nullable(); // Meta Description
            $table->longText('schema_markup')->nullable(); // Structured Data (Schema Markup)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
