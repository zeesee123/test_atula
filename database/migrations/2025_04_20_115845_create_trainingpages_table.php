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
        Schema::create('trainingpages', function (Blueprint $table) {
            $table->id();
            

            //Nurturing Knowledge,Cultivating Success************
            $table->string('sec1title')->nullable();
            
            $table->string('sec1text')->nullable();
            
            $table->string('sec1image')->nullable();

            

            //Introduction to Training & Development***********
            $table->string('sec2title')->nullable();
            $table->longText('sec2text')->nullable();
            $table->longText('sec2addtext')->nullable();
            $table->longText('sec2image')->nullable();
            $table->longText('sec2endtext')->nullable();
            
             //\\*******table for images ecoinitiativepagesection2

             //Our Training Programs***********
            $table->string('sec3title')->nullable();
            $table->string('sec3addtext')->nullable();
            $table->longText('sec3text')->nullable(); 
            $table->longText('sec3endtext')->nullable();
            //\\*******table for images ecoinitiativepagesection3

             //Why Choose Us?***********
             $table->string('sec4title')->nullable();
             
             //\\*******table for images ecoinitiativepagesection4 //all images and stuff for the projects

             //Success Stories***********
             $table->string('sec5title')->nullable();
            
             //\\*******table for images ecoinitiativepagesection5 //just images 

              //Certification & Recognition***********
            $table->string('sec6title')->nullable();
            $table->longText('sec6addtext')->nullable();//no need for this column
            $table->longText('sec6image')->nullable();
            $table->string('sec6btn_text')->nullable();
            $table->string('sec6btn_url')->nullable();

            //\\*******table for images ecoinitiativepagesection6

            
              //faqs***********
            //   $table->string('sec7title')->nullable();
            //   $table->string('sec7addtext')->nullable();
             
  
              //\\*******table for images ecoinitiativepagesection7


                //Join the Movement-Register Today***********
                $table->string('sec8title')->nullable();
                $table->longText('sec8text')->nullable();
                $table->longText('sec8addtext')->nullable();
                $table->string('sec8btn_text')->nullable();
                $table->longText('sec8btn_url')->nullable(); // Even though it's a single string, using longText to be safe
                $table->longText('sec8endtext')->nullable();
            
            //\\*******table for images ecoinitiativepagesection8
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainingpages');
    }
};
