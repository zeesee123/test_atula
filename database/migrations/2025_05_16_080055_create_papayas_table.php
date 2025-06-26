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
        Schema::create('papayas', function (Blueprint $table) {
            
            
            $table->id();
            $table->string('sec1title')->nullable();
            $table->longText('sec1text')->nullable();
            $table->string('sec1image')->nullable();
            
            //top papaya varieties for commercial cultivation
            $table->string('sec2title')->nullable();
            $table->longText('sec2addtext')->nullable();

            //varieties for papaya
            $table->json('sec2imagez')->nullable();//this will take in the image and the parameter inside of it

            //Ideal Soil & Climate for Papaya Farming
            $table->string('sec3title')->nullable();
            $table->longText('sec3text')->nullable();
            $table->longText('sec3addtext')->nullable();//soil selection
            $table->longText('sec3points')->nullable();
            $table->string('sec3image')->nullable();


            //sowing and nursery management
            $table->string('sec4title')->nullable();

            //boxes with image title content green ones
            $table->json('sec4imagez')->nullable();


            //papaya planting and spacing guidelines
            $table->string('sec5title')->nullable();

            //other set of boxes
            $table->json('sec5imagez')->nullable();

            //Smart Irrigation Strategies for Maximum Yield
            $table->string('sec6title')->nullable();
            $table->string('sec6image')->nullable();
            
            //points with title and points
            $table->json('sec6imagez')->nullable();

            //market demand and supply
            $table->string('sec7title')->nullable();
            $table->json('sec7imagez')->nullable();

            //aftercare and maintainence
            $table->string('sec8title')->nullable();
            $table->string('sec8image')->nullable();

            // these are the points
             $table->json('sec8text')->nullable(); //these points need to be modified

            //pest and disease management
            $table->string('sec9title')->nullable();

            $table->json('sec9imagez')->nullable();//diseases image part

            //Papain Extraction – A Profitable By-Product
            $table->string('sec10title')->nullable();
            $table->string('sec10content')->nullable();
            $table->longText('sec10addtext')->nullable();//extraction process

            $table->json('sec10imagez')->nullable();//boxes with view picture link

            //seed technology for high germination
            $table->string('sec11title')->nullable();
            $table->string('sec11image')->nullable();
            $table->longText('sec11text')->nullable();//these are the points just below the image

            //why choose atulye krishi vana for papaya farming?

            $table->string('sec12title')->nullable();
            $table->string('sec12image')->nullable();
            $table->longText('sec12text')->nullable();


            //use standard faq table with pagename;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papayas');
    }
};
