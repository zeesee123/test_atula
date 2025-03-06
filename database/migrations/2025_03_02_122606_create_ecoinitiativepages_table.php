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
            
            $table->string('sec1btn_text')->nullable();
            $table->string('sec1btn_url')->nullable();
            $table->string('sec1image')->nullable();

            

            //reviving ecosystems,empowering communities***********
            $table->string('sec2title')->nullable();
            $table->longText('sec2text')->nullable();
            $table->longText('sec2image')->nullable();
            $table->longText('sec2badgelogo')->nullable();
            $table->longText('sec2badgefigure')->nullable();
            $table->string('sec2badgetext')->nullable();
            $table->string('sec2btn_url')->nullable();
            $table->string('sec2btn_text')->nullable();
             //\\*******table for images ecoinitiativepagesection2

             //objectives***********
            $table->string('sec3title')->nullable();
            $table->string('sec3addtext')->nullable();
            $table->longText('sec3text')->nullable();
            //\\*******table for images ecoinitiativepagesection3

             //csr projects***********
             $table->string('sec4title')->nullable();
             $table->string('sec4addtext')->nullable();
             $table->longText('sec4text')->nullable();
             //\\*******table for images ecoinitiativepagesection4 //all images and stuff for the projects

             //csr activities***********
             $table->string('sec5title')->nullable();
            
             //\\*******table for images ecoinitiativepagesection5 //just images 

              //agroforestry and sustainability***********
            $table->string('sec6title')->nullable();
            $table->string('sec6addtext')->nullable();//no need for this column
            $table->longText('sec6text')->nullable();
            $table->string('sec6image')->nullable();
            $table->string('sec6btn_text')->nullable();
            $table->string('sec6btn_url')->nullable();

            //\\*******table for images ecoinitiativepagesection6

            
              //achievements***********
              $table->string('sec7title')->nullable();
              $table->string('sec7addtext')->nullable();
             
  
              //\\*******table for images ecoinitiativepagesection7


                //future vision***********
            $table->string('sec8title')->nullable();
            
            $table->string('sec8text')->nullable();//this ain't a long text
            $table->string('sec8addtext')->nullable();
            $table->string('sec8image')->nullable();
            $table->string('sec8btn_text')->nullable();
            $table->string('sec8btn_url')->nullable();
            
            //\\*******table for images ecoinitiativepagesection8
            
  
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
