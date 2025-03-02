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

            //\\*******table for images agroforestrypagesection1

            //about agroforestry***********
            $table->string('sec2title')->nullable();
            $table->string('sec2_addtext')->nullable();
            $table->longText('sec2text')->nullable();
            $table->string('sec2image')->nullable();

            //our milestones***********
            $table->string('sec3title')->nullable();
            
             //\\*******table for images aboutagroforestrypagesection3

              //trees are original skyscrapers that sustain life on earth***********
            $table->string('sec4image')->nullable();
            $table->longText('sec4quote')->nullable();

            //about agroforestry***********
            $table->string('sec5title')->nullable();
            $table->string('sec5_addtext')->nullable();
            

            //\\*******table for images aboutpagesection5

            
              //section 6 drought image 2 sections*********
              $table->string('sec6image')->nullable();

              //section 7 badges*********
              $table->string('sec6image')->nullable();
              //\\*******table for images aboutpagesection7

              //section 8 is doubtful need to ask about it review partners farmers *******

              //key crops and plantations**********
              $table->string('sec9title')->nullable();

              //\\*******table for images aboutpagesection9 need to aks for this 
              
  
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
        Schema::dropIfExists('agroforestrypages');
    }
};
