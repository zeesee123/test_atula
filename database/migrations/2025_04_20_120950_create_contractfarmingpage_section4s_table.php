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
        Schema::create('contractfarmingpage_section4s', function (Blueprint $table) {
            $table->id();
            $table->string('sec4imagel')->nullable();
$table->string('sec4titlel')->nullable();
$table->longText('sec4contentl')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractfarmingpage_section4s');
    }
};
