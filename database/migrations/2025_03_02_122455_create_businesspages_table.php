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
        Schema::create('businesspages', function (Blueprint $table) {
            $table->id();
            $table->string('sec1title')->nullable();
            $table->longText('sec1text')->nullable();
            $table->string('sec1btn_text')->nullable();
            $table->string('sec1btn_url')->nullable();
            $table->string('sec1image')->nullable();

            

            //who we are***********
            $table->string('sec2title')->nullable();
            $table->longText('sec2text')->nullable();
            $table->string('sec2btn_text')->nullable();
            $table->string('sec2btn_url')->nullable();
            $table->string('sec2image')->nullable();

            //our services***********
            $table->string('sec3title')->nullable();
            $table->string('sec3btn_text')->nullable();
            $table->string('sec3btn_url')->nullable();
            

             //\\*******table for images businesspagesection3

             //our services***********
            $table->string('sec4title')->nullable();
            $table->string('sec4image')->nullable();
            
            

             //\\*******table for images businesspagesection4

              //projects and initiatives*********
              $table->string('sec5title')->nullable();
              $table->string('sec5image')->nullable();
              //\\*******table for images businesspagesection5

              //making a difference on the ground*********
              $table->string('sec6title')->nullable();
              $table->string('sec6image')->nullable();
              $table->string('sec6title1')->nullable();
              $table->longText('sec6content1')->nullable();
              $table->string('sec6title2')->nullable();
              $table->longText('sec6content2')->nullable();
              $table->string('sec6title3')->nullable();
              $table->longText('sec6content3')->nullable();
              $table->string('sec6title4')->nullable();
              $table->longText('sec6content4')->nullable();

              //Real voices, real impact Stories from farmers, employees, and partners.*********
              $table->string('sec7title')->nullable();
              
              //\\*******table for images businesspagesection7

              //join us in making a difference***********
            $table->string('sec8title')->nullable();
            $table->longText('sec8text')->nullable();
            $table->string('sec8btn_text')->nullable();
            $table->string('sec8btn_url')->nullable();
            $table->string('sec8image')->nullable();
              
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesspages');
    }
};
