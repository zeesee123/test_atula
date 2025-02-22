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
            $table->string('sec1_title');
            $table->longText('sec1_content');
            $table->string('sec1btn_text');
            $table->string('sec1btn_url');


            $table->string('sec2gif');


            $table->string('sec3title');
            $table->string('sec3btn_text');
            $table->string('sec3btn_url');

            $table->string('sec4_title');
            $table->longText('sec4_content');
            $table->string('sec4_tinytitle');

            //adding in the boxes for homepage need to make a new table for this
            $table->string('sec4btn_text');
            $table->string('sec4btn_url');
            // $table->string('sec3title');
            // $table->string('sec3btn_text');
            // $table->string('sec3btn_url');

            $table->string('sec5_title');

            //need to add in the cards for this 
            $table->string('sec6_title');
            $table->string('sec6_image');

            //need to add in the leaves for the section 6
            $table->string('sec7_title');
            //need to add in the cards for section 7 with the view project

            
            //technology driven agriculture*************
            $table->string('sec8title');
            $table->longText('sec8content');
            $table->string('sec8btn_text');
            $table->string('sec8btn_url');

            $table->string('sec8_featurestext');

            //images and text go in here

            //need to make a new page for the team members
            // pic,name,post

            //our purpose and values***************

            // button text and image along with the text
            
            $table->string('sec9_title');
            $table->longText('sec9_content');
            $table->string('sec9_image');

            //badges for the other section

            //be a part of the change**************
            $table->string('sec10_title');
            $table->longText('sec10_content');
            
            //adding in the real cards for this 


            $table->string('sec11_title');
            $table->string('sec11_content');
            // $table->string('sec3btn_url');


            $table->longText('map_code');
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
