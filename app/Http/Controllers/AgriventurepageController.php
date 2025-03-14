<?php

namespace App\Http\Controllers;

use App\Models\Aboutpagetwo;
use Illuminate\Http\Request;

class AgriventurepageController extends Controller
{
    //
    public function add_agriventure(Request $r){
        
       
        try{

            DB::beginTransaction();

        $model = Aboutpagetwo::first() ?? new Aboutpagetwo();


        $model->sec1title = $r->sec1title;
        $model->sec1text = $r->sec1text;
        $model->sec1btn_text = $r->sec1btn_text;
        $model->sec1btn_url = $r->sec1btn_url;

      
            if ($r->hasFile('sec1image')) {
                if (!empty($model->sec1image) && File::exists(public_path('agriventurepage/'.$model->sec1image))) {
                    File::delete(public_path('agriventurepage/'.$model->sec1image));
                }
                $video = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $videoName = $video->hashName();
                $videoPath = 'agriventurepage/'; // Set the upload directory
                $video->move(public_path($videoPath), $videoName);
                $model->sec1image = $videoName; // Save path in DB
                
            }

            

            $model->sec2title = $r->sec2title;
            $model->sec2addtext = $r->sec2addtext;
            $model->sec2text = $r->sec2text;
            
      
      try{
        if ($r->hasFile('sec2image')) {
            if (!empty($model->sec2image) && File::exists(public_path('agriventurepage/'.$model->sec2image))) {
                File::delete(public_path('agriventurepage/'.$model->sec2image));
            }
            $gif = $r->file('sec2image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'agriventurepage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2image = $gifName; // Save path in DB
            
        }
     

        $model->sec3title = $r->sec3title;
        $model->sec3text = $r->sec3text;
        $model->sec3btn_text = $r->sec3btn_text;
        $model->sec3btn_url = $r->sec3btn_url;

        if ($r->hasFile('sec3image')) {
            if (!empty($model->sec3image) && File::exists(public_path('agriventurepage/'.$model->sec3image))) {
                File::delete(public_path('agriventurepage/'.$model->sec3image));
            }
            $video = $r->file('sec3image');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec3image = $videoName; // Save path in DB
            
        }

        //section 4 

        
        $sec4_slogo=$r->file('sec4imagel');

        $sec4_stitle = $r->input('sec4titlel'); 
        $sec4_stext = $r->input('sec4textl'); // Ensure this is fetched too

        if ($sec4_slogo) {
            foreach ($sec4_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('agriventurepage/'), $namez);

                    $section4 = new AboutpagetwoSection4();
                    $section4->sec4imagel = $namez;
                    $section4->sec4titlel = $sec4_stitle[$key] ?? null;
                    $section4->sec4textl = $sec4_stext[$key] ?? null;
                    $section4->save();
                }
            }
        }

         //section 5

        
         $sec5_slogo1=$r->file('sec5img1l');
         $sec5_slogo2=$r->file('sec5img2l');

         $sec5_stitle = $r->input('sec5titlel'); 
         $sec5_stext = $r->input('sec5textl'); // Ensure this is fetched too

         $sec5_ach = $r->input('sec5achieve'); 
         $sec5_tec = $r->input('sec5tech'); // Ensure this is fetched too
 
         if ($sec5_slogo1) {
             foreach ($sec5_slogo1 as $key => $image) {
                 if ($image) {
                     $namez = $image->hashName();
                     $image->move(public_path('agriventurepage/'), $namez);

                     $image2=$sec5_slogo2[$key];
                     $namez2 = $image2->hashName();
                     $image2->move(public_path('agriventurepage/'), $namez2);
 
                     $section5 = new AboutpagetwoSection5();
                     $section5->sec5img1l = $namez;
                     $section5->sec5img2l = $namez2;
                     $section5->sec5achieve = $sec5_ach[$key] ?? null;
                     $section5->sec5titlel = $sec5_stitle[$key] ?? null;
                     $section5->sec5tech = $sec5_tec[$key] ?? null;
                     $section5->sec5textl = $sec5_stext[$key] ?? null;
                     $section5->save();
                 }
             }
         }
        


        
        

        //section 6

        $model->sec6title = $r->sec6title;
        

        if ($r->hasFile('sec6image')) {
            if (!empty($model->sec6image) && File::exists(public_path('agriventurepage/'.$model->sec6image))) {
                File::delete(public_path('agriventurepage/'.$model->sec6image));
            }
            $video = $r->file('sec6image');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec6image = $videoName; // Save path in DB
            
        }

        // images array

        

        $sec6_stitle = $r->input('sec6titlel'); 
        $sec6_stext = $r->input('sec6textl'); // Ensure this is fetched too

        if ($sec6_slogo) {
            foreach ($sec4_slogo as $key => $image) {
                if ($image) {
                    

                    $section6 = new AboutpagetwoSection6();
                    
                    $section6->sec6titlel = $sec6_stitle[$key] ?? null;
                    $section6->sec6textl = $sec6_stext[$key] ?? null;
                    $section6->save();
                }
            }
        }

        //section 7

        $model->sec7title=$r->sec7title;

        $sec7_syear= $r->input('sec7yearl'); 
        $sec7_stitle = $r->input('sec7titlel'); 
        $sec7_stext = $r->input('sec7textl'); // Ensure this is fetched too

        if ($sec7_slogo) {
            foreach ($sec7_slogo as $key => $image) {
                if ($image) {
                    

                    $section7 = new AboutpagetwoSection7();
                    
                    $section7->sec7yearl = $sec7_syear[$key] ?? null;
                    $section7->sec7titlel = $sec7_stitle[$key] ?? null;
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
                    $image->move(public_path('agriventurepage/'), $namez);

                    $section8 = new AboutpagetwoSection8();
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
            if (!empty($model->sec9image) && File::exists(public_path('agriventurepage/'.$model->sec9image))) {
                File::delete(public_path('agriventurepage/'.$model->sec9image));
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
                    $image->move(public_path('agriventurepage/'), $namez);
                    

                    $section9 = new AboutpagetwoSection9();
                    
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
