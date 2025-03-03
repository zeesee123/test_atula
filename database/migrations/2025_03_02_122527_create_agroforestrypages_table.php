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
        Schema::create('agroforestrypages', function (Blueprint $table) {
  
            $table->id();
            $table->string('sec1title')->nullable();
            $table->longText('sec1text')->nullable();
            $table->string('sec1btn_text')->nullable();
            $table->string('sec1btn_url')->nullable();
            $table->string('sec1image')->nullable();

            

            //about agroforestry***********
            $table->string('sec2title')->nullable();
            $table->string('sec2_addtext')->nullable();
            $table->longText('sec2text')->nullable();
            $table->string('sec2image')->nullable();

            //our milestones***********
            $table->string('sec3title')->nullable();
            
             //\\*******table for images agroforestrypagesection3

              //trees are original skyscrapers that sustain life on earth***********
            $table->string('sec4image')->nullable();
            $table->longText('sec4quote')->nullable();

            //about agroforestry***********
            $table->string('sec5title')->nullable();
            $table->string('sec5_addtext')->nullable();
            

            //\\*******table for images agroforestrypagesection5

            
              //section 6 drought image 2 sections*********
              $table->string('sec6image')->nullable();

              //section 7 badges*********
              
              //\\*******table for images agroforestrypagesection7

              //section 8 is doubtful need to ask about it review partners farmers will add in the testimonials with name of the page*******

              //key crops and plantations**********
              $table->string('sec9title')->nullable();

              //\\*******table for images aboutpagesection9 need to ask for this this will have 2 tables one for category and then it's subimages 

              //ornamental plants************
              $table->string('sec10title')->nullable();
              $table->longText('sec10_text')->nullable();
              $table->string('sec10btn_text')->nullable();
              $table->string('sec10btn_url')->nullable();
              $table->string('sec10_image1')->nullable();
              $table->string('sec10_image2')->nullable();

              //next section muleithi,bamboo,neem*************
              //\\*******table for images aboutpagesection11 

              //HYV *********************

              $table->string('sec12title')->nullable();
              $table->string('sec12btn_text')->nullable();
              $table->string('sec12btn_url')->nullable();
             //\\*******table for images aboutpagesection12

             //Community and environment impact *********************
             $table->string('sec13title')->nullable();
             $table->string('sec13addtext')->nullable();
             //\\*******table for images aboutpagesection13

              //banner image part  *********************
             $table->string('sec14img')->nullable();
             //\\*******table for images aboutpagesection14


             //partner with us to transform agriculture and build a greener tomorrow*************
             $table->string('sec15title')->nullable();
             $table->string('sec15image')->nullable();
             $table->string('sec15btn_text')->nullable();
             $table->string('sec15btn_url')->nullable();
  
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agroforestrypages');
    }
};
