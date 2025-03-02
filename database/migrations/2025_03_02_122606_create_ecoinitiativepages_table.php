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
        Schema::create('ecoinitiativepages', function (Blueprint $table) {
            $table->id();
            $table->string('sec1title')->nullable();
            $table->longText('sec1text')->nullable();
            $table->string('sec1btn_text')->nullable();
            $table->string('sec1btn_url')->nullable();
            $table->string('sec1image')->nullable();

            //\\*******table for images aboutpagesection1

            //cultivating sustainable future***********
            $table->string('sec2title')->nullable();
            $table->longText('sec2text')->nullable();
            $table->string('sec2btn_text')->nullable();
            $table->string('sec2btn_url')->nullable();
            $table->string('sec2image')->nullable();

            //our guiding light***********
            $table->string('sec3title')->nullable();
            $table->longText('sec3text')->nullable();
            $table->string('sec3image')->nullable();

             //\\*******table for images aboutpagesection3

              //our mission:growing sustainability together***********
            $table->string('sec4title')->nullable();
            $table->longText('sec4text')->nullable();

            //\\*******table for images aboutpagesection4

            
              //journey from barren lands to lush forests*********
              $table->string('sec5title')->nullable();
              $table->longText('sec5text')->nullable();
              $table->string('sec5addtext')->nullable();
  
              //\\*******table for images aboutpagesection5

              //roots of our mission*********
              $table->string('sec6title')->nullable();
            
             //\\*******table for images aboutpagesection6

              //our visionaries*********
              $table->string('sec7title')->nullable();
              
              $table->string('sec7addtext')->nullable();//green force
              $table->longText('sec7text')->nullable();
              $table->string('sec7btn_text')->nullable();
              $table->string('sec7btn_url')->nullable();

             //\\*******table for images aboutpagesection7(this is the table for the team part)

             //let's go green together***********
            $table->string('sec8title')->nullable();
            $table->longText('sec8text')->nullable();
            $table->string('sec8image')->nullable();

             //collaborate with us (last sec)***********
             $table->string('sec91title')->nullable();
             $table->longText('sec91text')->nullable();
             
             $table->string('sec91btn_text')->nullable();
              $table->string('sec91btn_url')->nullable();

             //support our cause (last sec)***********
             $table->string('sec92title')->nullable();
             $table->longText('sec92text')->nullable();
             $table->string('sec92image')->nullable();
             $table->string('sec92btn_text')->nullable();
              $table->string('sec92btn_url')->nullable();
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoinitiativepages');
    }
};
