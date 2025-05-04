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
        Schema::create('contractfarmingpages', function (Blueprint $table) {
            $table->id();
            //Contract Farming for Fodder Contract Farming for Fodder A Partnership Rooted in Sustainability**********
            $table->string('sec1title')->nullable();
            
            $table->string('sec1text')->nullable();

            $table->string('sec1image')->nullable();
            

            

            //Why Choose Contract Farming?***********
            $table->string('sec2title')->nullable();
            $table->longText('sec2addtext')->nullable();
            $table->string('sec2image')->nullable();
            
            
             //\\*******table for images ecoinitiativepagesection2

             //Our Mission & Vision***********
            $table->string('sec3title')->nullable();
            $table->longText('sec3text')->nullable();
            
            $table->longText('sec3endtext')->nullable();
            //\\*******table for images ecoinitiativepagesection3

             //Fodder Crops in Our Contract Farming Program***********
             $table->string('sec4title')->nullable();
             $table->longText('sec4text')->nullable();
             
             //\\*******table for images ecoinitiativepagesection4 //all images and stuff for the projects

             //How It Works?***********
             $table->string('sec5title')->nullable();
            
             //\\*******table for images ecoinitiativepagesection5 //just images 

              //Sustainability & Environmental Impact***********
            $table->string('sec6title')->nullable();
            // $table->string('sec6addtext')->nullable();//no need for this column
            $table->longText('sec6text')->nullable();
          

            //\\*******table for images ecoinitiativepagesection6

            
              //Economic Impact & Community Development***********
              $table->string('sec7title')->nullable();
              $table->string('sec7addtext')->nullable();
             
  
              //\\*******table for images ecoinitiativepagesection7


                //Join the Movement-Register Today***********
                $table->string('sec8title')->nullable();
                $table->longText('sec8text')->nullable();
                
                // Text 1
                $table->string('sec8imgc1')->nullable(); // assuming this is the image input
                $table->string('sec8titlec1')->nullable();
                $table->longText('sec8contentc1')->nullable();
                
                // Text 2
                $table->string('sec8imgc2')->nullable();
                $table->string('sec8titlec2')->nullable();
                $table->longText('sec8contentc2')->nullable();
                
                // Text 3
                $table->string('sec8imgc3')->nullable();
                $table->string('sec8titlec3')->nullable();
                $table->longText('sec8contentc3')->nullable();
                
                // Text 4
                $table->string('sec8imgc4')->nullable();
                $table->string('sec8titlec4')->nullable();
                $table->longText('sec8contentc4')->nullable();
                
                // Join us in the green revolution**********
                $table->string('sec9title')->nullable();
                $table->longText('sec9text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractfarmingpages');
    }
};
