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
        Schema::create('contractfarmingpage_section7s', function (Blueprint $table) {
            $table->id();
            $table->string('sec7imagel')->nullable();
$table->string('sec7titlel')->nullable();
$table->longText('sec7contentl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractfarmingpage_section7s');
    }
};
