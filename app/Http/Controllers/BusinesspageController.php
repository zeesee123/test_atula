<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinesspageController extends Controller
{
    //
    public function add_businesspage(Request $r){

        try{

            DB::beginTransaction();

            $model = Businesspage::first() ?? new Businesspage();


            $model->sec1title = $r->sec1title;
            $model->sec1text = $r->sec1text;
            $model->sec1btn_text = $r->sec1btn_text;
            $model->sec1btn_url = $r->sec1btn_url;

      
            if ($r->hasFile('sec1image')) {
                if (!empty($model->sec1image) && File::exists(public_path('businesspage/'.$model->sec1image))) {
                    File::delete(public_path('businesspage/'.$model->sec1image));
                }
                $video = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $videoName = $video->hashName();
                $videoPath = 'businesspage/'; // Set the upload directory
                $video->move(public_path($videoPath), $videoName);
                $model->sec1image = $videoName; // Save path in DB
                
            }

            

            $model->sec2title = $r->sec2title;
            
            $model->sec2text = $r->sec2text;
            $model->sec2btn_text = $r->sec2btn_text;
            $model->sec2btn_url = $r->sec2btn_url;
            
      
      try{
        if ($r->hasFile('sec2image')) {
            if (!empty($model->sec2image) && File::exists(public_path('businesspage/'.$model->sec2image))) {
                File::delete(public_path('businesspage/'.$model->sec2image));
            }
            $gif = $r->file('sec2image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'businesspage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2image = $gifName; // Save path in DB
            
        }
     

        $model->sec3title = $r->sec3title;
        $model->sec3btn_text = $r->sec3btn_text;
        $model->sec3btn_url = $r->sec3btn_url;

        $sec3_slogo=$r->file('sec3imagel');
        $sec3_stitle=$r->input('sec3titlel');

        
        $sec3_stext = $r->input('sec3textl'); // Ensure this is fetched too

        if ($sec3_slogo) {
            foreach ($sec3_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('businesspage/'), $namez);

                    $section3 = new BusinesspageSection3();
                    $section3->sec3imagel = $namez;
                    $section3->sec3titlel = $sec3_stitle[$key]??null;
                    
                    $section3->sec3textl = $sec3_stext[$key] ?? null;
                    $section3->save();
                }
            }
        }
        

        
        //section 4 

        $model->sec4title = $r->sec4title;

        if ($r->hasFile('sec4image')) {
            if (!empty($model->sec4image) && File::exists(public_path('businesspage/'.$model->sec4image))) {
                File::delete(public_path('businesspage/'.$model->sec4image));
            }
            $gif = $r->file('sec4image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'businesspage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec4image = $gifName; // Save path in DB
            
        }

        
        $sec4_slogo=$r->file('sec4imagel');
        $sec4_stitle=$r->input('sec4titlel');

        
        $sec4_stext = $r->input('sec4textl'); // Ensure this is fetched too

        if ($sec4_slogo) {
            foreach ($sec4_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('businesspage/'), $namez);

                    $section4 = new BusinesspageSection4();
                    $section4->sec4imagel = $namez;
                    $section4->sec4titlel = $sec4_stitle[$key]??null;
                    
                    $section4->sec4textl = $sec4_stext[$key] ?? null;
                    $section4->save();
                }
            }
        }

      //section 5 projects and initiatives

      $model->sec5title = $r->sec5title;

        if ($r->hasFile('sec5image')) {
            if (!empty($model->sec5image) && File::exists(public_path('businesspage/'.$model->sec5image))) {
                File::delete(public_path('businesspage/'.$model->sec5image));
            }
            $gif = $r->file('sec5image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'businesspage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec5image = $gifName; // Save path in DB
            
        }

        $sec5_slogo=$r->file('sec5imagel');
        $sec5_stitle=$r->input('sec5titlel');

        
        $sec5_stext = $r->input('sec5textl'); // Ensure this is fetched too

        if ($sec5_slogo) {
            foreach ($sec5_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('businesspage/'), $namez);

                    $section5 = new BusinesspageSection5();
                    $section5->sec5imagel = $namez;
                    $section5->sec5titlel = $sec5_stitle[$key]??null;
                    
                    $section5->sec5textl = $sec5_stext[$key] ?? null;
                    $section5->save();
                }
            }
        }

        //section 6


        $model->sec6title = $r->sec6title;

        if ($r->hasFile('sec6image')) {
            if (!empty($model->sec6image) && File::exists(public_path('businesspage/'.$model->sec6image))) {
                File::delete(public_path('businesspage/'.$model->sec6image));
            }
            $gif = $r->file('sec6image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'businesspage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec6image = $gifName; // Save path in DB
            
        }

        $model->sec6title1 = $r->sec6title1;
        $model->sec6content1 = $r->sec6content1;

        $model->sec6title2 = $r->sec6title2;
        $model->sec6content2 = $r->sec6content2;

        $model->sec6title3 = $r->sec6title3;
        $model->sec6content3 = $r->sec6content3;

        $model->sec6title4 = $r->sec6title4;
        $model->sec6content4 = $r->sec6content4;

        
        //section 7
        $model->sec7title = $r->sec7title;
        
        $sec7_slogo=$r->file('testimage');

        $sec7_sname = $r->input('testname'); 
        $sec7_stext = $r->input('testtext'); // Ensure this is fetched too

        if ($sec7_slogo) {
            foreach ($sec7_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('testimonial/'), $namez);

                    $section7 = new Testimonial();
                    $section7->image= $namez;
                    $section7->name= $sec7_sname[$key] ?? null;
                    $section7->page='businesspage';
                    $section7->text = $sec7_stext[$key] ?? null;
                    $section7->save();
                }
            }
        }
        //section 8

        $model->sec8title = $r->sec8title;
        $model->sec8text = $r->sec8text;
        $model->sec8btn_text = $r->sec8btn_text;
        $model->sec8btn_url = $r->sec8btn_url;

  
        if ($r->hasFile('sec8image')) {
            if (!empty($model->sec8image) && File::exists(public_path('businesspage/'.$model->sec8image))) {
                File::delete(public_path('businesspage/'.$model->sec8image));
            }
            $video = $r->file('sec8image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $videoName = $video->hashName();
            $videoPath = 'businesspage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec8image = $videoName; // Save path in DB
            
        }


       
      


    

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
