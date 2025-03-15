<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgroforestrypageController extends Controller
{
    //
    public function add_agroforestry(){

        try{

            DB::beginTransaction();

            $model = Agroforestrypage::first() ?? new Agroforestry();


            $model->sec1title = $r->sec1title;
            $model->sec1text = $r->sec1text;
            $model->sec1btn_text = $r->sec1btn_text;
            $model->sec1btn_url = $r->sec1btn_url;

      
            if ($r->hasFile('sec1image')) {
                if (!empty($model->sec1image) && File::exists(public_path('agroforestrypage/'.$model->sec1image))) {
                    File::delete(public_path('agroforestrypage/'.$model->sec1image));
                }
                $video = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $videoName = $video->hashName();
                $videoPath = 'agroforestrypage/'; // Set the upload directory
                $video->move(public_path($videoPath), $videoName);
                $model->sec1image = $videoName; // Save path in DB
                
            }

            

            $model->sec2title = $r->sec2title;
            $model->sec2addtext = $r->sec2addtext;
            $model->sec2text = $r->sec2text;
            
      
      try{
        if ($r->hasFile('sec2image')) {
            if (!empty($model->sec2image) && File::exists(public_path('agroforestrypage/'.$model->sec2image))) {
                File::delete(public_path('agroforestrypage/'.$model->sec2image));
            }
            $gif = $r->file('sec2image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'agroforestrypage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2image = $gifName; // Save path in DB
            
        }
     

        $model->sec3title = $r->sec3title;

        $sec3_slogo=$r->file('sec3imagel');

        
        $sec3_stext = $r->input('sec3textl'); // Ensure this is fetched too

        if ($sec3_slogo) {
            foreach ($sec3_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('agroforestrypage/'), $namez);

                    $section3 = new AgroforestrypageSection3();
                    $section3->sec3imagel = $namez;
                    
                    $section3->sec3textl = $sec3_stext[$key] ?? null;
                    $section3->save();
                }
            }
        }
        

        
        //section 4 

        $model->sec4quote=$r->sec4quote;

        if ($r->hasFile('sec4image')) {
            if (!empty($model->sec4image) && File::exists(public_path('agroforestrypage/'.$model->sec4image))) {
                File::delete(public_path('agroforestrypage/'.$model->sec4image));
            }
            $video = $r->file('sec4image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $videoName = $video->hashName();
            $videoPath = 'agroforestrypage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec1image = $videoName; // Save path in DB
            
        }




         //section 5

         $model->sec5title = $r->sec5title;
         $model->sec5_addtext = $r->sec5_addtext;
            
         $sec5_slogo1=$r->file('sec5imagel');
         

         $sec5_stitle = $r->input('sec5titlel'); 
         $sec5_stext = $r->input('sec5textl'); // Ensure this is fetched too

         
 
         if ($sec5_slogo1) {
             foreach ($sec5_slogo1 as $key => $image) {
                 if ($image) {
                     $namez = $image->hashName();
                     $image->move(public_path('agroforestrypage/'), $namez);

                     
 
                     $section5 = new AgroforestrypageSection5();
                     $section5->sec5imagel = $namez;
         
         
                     $section5->sec5titlel = $sec5_stitle[$key] ?? null;
         
                     $section5->sec5textl = $sec5_stext[$key] ?? null;
                     $section5->save();
                 }
             }
         }
        


        
        

        //section 6

        
        

        if ($r->hasFile('sec6image')) {
            if (!empty($model->sec6image) && File::exists(public_path('agroforestrypage/'.$model->sec6image))) {
                File::delete(public_path('agroforestrypage/'.$model->sec6image));
            }
            $video = $r->file('sec6image');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec6image = $videoName; // Save path in DB
            
        }

        

        //section 7

        $sec7_slogo=$r->file('sec7imagel');
         
         $sec7_stext = $r->input('sec7textl'); // Ensure this is fetched too

         
 
         if ($sec7_slogo) {
             foreach ($sec7_slogo as $key => $image) {
                 if ($image) {
                     $namez = $image->hashName();
                     $image->move(public_path('agroforestrypage/'), $namez);

                     
 
                     $section7 = new AgroforestrypageSection7();
                     $section7->sec7imagel = $namez;
         
         
                     
         
                     $section7->sec7textl = $sec7_stext[$key] ?? null;
                     $section7->save();
                 }
             }
         }

      
        //section 8

        

        
        $sec8_slogo=$r->file('sec8imagel');

        $sec8_stitle = $r->input('sec8titlel'); 
        $sec8_stext = $r->input('sec8textl'); // Ensure this is fetched too

        if ($sec8_slogo) {
            foreach ($sec8_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('agroforestrypage/'), $namez);

                    $section8 = new AgroforestrypageSection8();
                    $section8->sec8imagel = $namez;
                    $section8->sec8titlel = $sec8_stitle[$key] ?? null;
                    $section8->sec8textl = $sec8_stext[$key] ?? null;
                    $section8->save();
                }
            }
        }

        //section 9

        $model->sec9title = $r->sec9title;
        

        if ($r->hasFile('sec9image')) {
            if (!empty($model->sec9image) && File::exists(public_path('agroforestrypage/'.$model->sec9image))) {
                File::delete(public_path('agroforestrypage/'.$model->sec9image));
            }
            $video = $r->file('sec9image');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec6image = $videoName; // Save path in DB
            
        }

        // images array

        
        $sec9_slogo=$r->file('sec9imagel');
        $sec9_stitle = $r->input('sec9titlel'); 
        $sec9_stext = $r->input('sec9textl'); // Ensure this is fetched too

        if ($sec9_slogo) {
            foreach ($sec9_slogo as $key => $image) {
                if ($image) {

                    $namez = $image->hashName();
                    $image->move(public_path('agroforestrypage/'), $namez);
                    

                    $section9 = new AgroforestrypageSection9();
                    
                    $section9->sec9titlel = $sec9_stitle[$key] ?? null;
                    $section9->sec9imagel=$namez;
                    $section9->sec9textl = $sec9_stext[$key] ?? null;
                    $section9->save();
                }
            }
        }


        $model->sec10title = $r->sec10title;
        $model->sec10text = $r->sec10text;
        $model->sec10btn_text = $r->sec10btn_text;
        $model->sec10btn_url = $r->sec10btn_url;


    

        $model->save();

    }catch(Exception $e){

        return $e->getMessage();
        Log::info($e->getMessage());
      }

        DB::commit();

        return back()->with('success','message added');

        }catch(Exception $e){
            DB::rollback();
            return back()->with('failure',$e->getMessage());}
    }

}
