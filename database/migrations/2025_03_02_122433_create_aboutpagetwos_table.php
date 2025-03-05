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
        Schema::create('aboutpagetwos', function (Blueprint $table) {
            $table->id();
            $table->string('sec1title')->nullable();
            $table->longText('sec1text')->nullable();
            $table->string('sec1btn_text')->nullable();
            $table->string('sec1btn_url')->nullable();
            $table->string('sec1image')->nullable();

            

            //welcome to anm agriventure***********
            $table->string('sec2title')->nullable();
            $table->longText('sec2text')->nullable();
            $table->longText('sec2addtext')->nullable();
            
            $table->string('sec2image')->nullable();

            //who we are***********
            $table->string('sec3title')->nullable();
            $table->longText('sec3text')->nullable();
            $table->string('sec3image')->nullable();
            $table->string('sec3btn_text')->nullable();
            $table->string('sec3btn_url')->nullable();

             

              //section 4 logo mission and vision stuff***********
            

            //\\*******table for images aboutpagesection4

              
            //section 5 projects***********
            

            //\\*******table for images aboutpagesection5

            
              //our impact*********
              $table->string('sec6title')->nullable();
              $table->string('sec6image')->nullable();
              
  
              //\\*******table for images aboutpagesection6

              

              //our future goals*********
              $table->string('sec7title')->nullable();
            
             //\\*******table for images aboutpagesection7

              //our core values*********
              $table->string('sec8title')->nullable();
              //\\*******table for images aboutpagesection8

              //explore our initiatives values*********
              $table->string('sec9title')->nullable();
              $table->string('sec9image')->nullable();
              //\\*******table for images aboutpagesection9

              //be a part of change*********
              $table->string('sec10title')->nullable();
              $table->string('sec10image')->nullable();
              $table->string('sec10btn_text')->nullable();
              $table->string('sec10btn_url')->nullable();


              
              
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpagetwos');
    }
};
