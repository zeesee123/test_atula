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
        Schema::create('homepages', function (Blueprint $table) {
           
            $table->id();
            $table->string('sec1_vid')->nullable();
            // $table->longText('sec1_content');
            // $table->string('sec1btn_text');
            // $table->string('sec1btn_url');


            //quill text******************
            $table->string('sec2gif')->nullable();


            //what we do section*********************
            $table->string('sec3logo')->nullable();
            $table->string('sec3title')->nullable();
            $table->longText('sec3content')->nullable();
            $table->string('sec3btn_text')->nullable();
            $table->string('sec3btn_url')->nullable();

            //\\*******table for images homepagesection3

            //making a difference at a time*****************
            $table->string('sec4_title')->nullable();
            $table->longText('sec4_content')->nullable();
            $table->string('sec4_tinytitle')->nullable();//impact highlights
            $table->string('sec4btn_text')->nullable();
            $table->string('sec4btn_url')->nullable();

             //\\*******table for images homepagesection4

            
            //our business section****************
            $table->string('sec5_title')->nullable();

            //\\*******table for images homepagesection5

            //our journey leaves section********************
            $table->string('sec6_title')->nullable();
            $table->string('sec6_image')->nullable();

            //\\*******table for images homepagesection6

            //our purpose and vision section******************
            $table->string('sec7_title')->nullable();
            $table->longText('sec7_content')->nullable();
            $table->string('sec7btn_text')->nullable();
            $table->string('sec7btn_url')->nullable();

             //\\*******table for images homepagesection7
            

            //what we're working on section*************
            $table->string('sec8_title')->nullable();

            //\\*******table for images homepagesection8
         
            
            //technology driven agriculture*************
            $table->string('sec9title')->nullable();
            $table->longText('sec9content')->nullable();
            $table->string('sec9btn_text')->nullable();
            $table->string('sec9btn_url')->nullable();

            $table->string('sec9_featurestext')->nullable();//Features: text

            //\\*******table for images homepagesection9

             //our purpose and values section***********
             $table->string('sec10_title')->nullable();

             //\\*******table for images homepagesection10
            

         

            
            //empowering communities and the planet*************
            $table->string('sec11_title')->nullable();
            $table->longText('sec11_content')->nullable();
            $table->string('sec11_image')->nullable();

            //badges for the other section separate table for it
            // ***********this would have been sec12
            //\\*******table for images homepagesection12

            //be a part of the change**************
            $table->string('sec13_title')->nullable();
            $table->longText('sec13_content')->nullable();

            //\\*******table for images homepagesection13
            
            //adding in the real cards for this 

            //get in touch section**************
            $table->string('sec14_title')->nullable();
            $table->longText('sec14_content')->nullable();

            


            //code for the map part******************
            $table->longText('map_code')->nullable();
            //need to add in a list of images for section 3
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
