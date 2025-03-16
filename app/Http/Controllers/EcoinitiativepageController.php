<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcoinitiativepageController extends Controller
{
    //
    public function add_ecoinitiative(Request $r){

        try{

            DB::beginTransaction();

            $model = Ecoinitiativepage::first() ?? new Ecoinitiativepage();


            $model->sec1title = $r->sec1title;
            
            $model->sec1btn_text = $r->sec1btn_text;
            $model->sec1btn_url = $r->sec1btn_url;

      
            if ($r->hasFile('sec1image')) {
                if (!empty($model->sec1image) && File::exists(public_path('ecoinitiativepage/'.$model->sec1image))) {
                    File::delete(public_path('ecoinitiative/'.$model->sec1image));
                }
                $video = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $videoName = $video->hashName();
                $videoPath = 'ecoinitiative/'; // Set the upload directory
                $video->move(public_path($videoPath), $videoName);
                $model->sec1image = $videoName; // Save path in DB
                
            }

            

            $model->sec2title = $r->sec2title;
            
            $model->sec2text = $r->sec2text;
            
      
      try{
        if ($r->hasFile('sec2image')) {
            if (!empty($model->sec2image) && File::exists(public_path('ecoinitiativepage/'.$model->sec2image))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec2image));
            }
            $gif = $r->file('sec2image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'ecoinitiativepage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2image = $gifName; // Save path in DB
            
        }

        

        

        
        $sec2_stitle = $r->input('sec2titlel'); // Ensure this is fetched too
        
        $sec2_stext = $r->input('sec2textl'); // Ensure this is fetched too

        if ($sec2_stitle) {
            foreach ($sec2_stitle as $key => $value) {
                if ($image) {
                    

                    $section2 = new EcoinitiativepageSection2();
                    
                    $section2->sec2titlel = $value ?? null;
                    $section2->sec2textl = $sec2_stext[$key] ?? null;
                    $section2->save();
                }
            }
        }


        $model->sec2btn_text = $r->sec2btn_text;
        $model->sec2btn_url = $r->sec2btn_url;


        $model->sec2badgetext = $r->sec2badgetext;
        $model->sec2badgefigure = $r->sec2badgefigure;

        if ($r->hasFile('sec2badgelogo')) {
            if (!empty($model->sec2badgelogo) && File::exists(public_path('ecoinitiativepage/'.$model->sec2badgelogo))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec2image));
            }
            $gif = $r->file('sec2badgelogo');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'ecoinitiativepage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2badgelogo = $gifName; // Save path in DB
            
        }

        //section 3 

        $model->sec3title = $r->sec3title;
        $model->sec3addtext = $r->sec3addtext;
            
        $model->sec3text = $r->sec3text;

        $sec3_slogo=$r->file('sec3imagel');
        $sec3_stitle=$r->input('sec3titlel');

        
        $sec3_stext = $r->input('sec3textl'); // Ensure this is fetched too

        if ($sec3_slogo) {
            foreach ($sec3_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('Ecoinitiativepage/'), $namez);

                    $section3 = new EcoinitiativepageSection3();
                    $section3->sec3imagel = $namez;
                    $section3->sec3titlel = $sec3_stitle[$key]??null;
                    
                    $section3->sec3textl = $sec3_stext[$key] ?? null;
                    $section3->save();
                }
            }
        }

        //section 4

        $model->sec4title = $r->sec4title;
        $model->sec4addtext = $r->sec4addtext;
            
        $model->sec4text = $r->sec4text;

        $sec4_slogo=$r->file('sec3imagel');
        $sec4_stitle=$r->input('sec3titlel');

        
        $sec4_stext = $r->input('sec4contentl'); // Ensure this is fetched too

        if ($sec4_slogo) {
            foreach ($sec4_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('Ecoinitiativepage/'), $namez);

                    $section3 = new EcoinitiativepageSection4();
                    $section3->sec4imagel = $namez;
                    $section3->sec4titlel = $sec4_stitle[$key]??null;
                    
                    $section3->sec4contentl = $sec4_stext[$key] ?? null;
                    $section3->save();
                }
            }
        }

        //section 5

        $model->sec5title = $r->sec5title;

        $sec5_slogo=$r->file('sec5imagel');
        

        if ($sec5_slogo) {
            foreach ($sec5_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('Ecoinitiativepage/'), $namez);

                    $section5 = new EcoinitiativepageSection5();
                    $section5->sec5imagel = $namez;
                    
                    $section5->save();
                }
            }
        }

        
       
     //section 6

     $model->sec6title=$r->sec6title;
     $model->sec6text=$r->sec6text;

     $sec6_slogo=$r->file('sec6imagel');
        $sec6_stitle=$r->input('sec3titlel');

        
        $sec6_stext = $r->input('sec4contentl'); // Ensure this is fetched too

        if ($sec6_slogo) {
            foreach ($sec6_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('Ecoinitiativepage/'), $namez);

                    $section3 = new EcoinitiativepageSection6();
                    $section3->sec6imagel = $namez;
                    $section3->sec6titlel = $sec6_stitle[$key]??null;
                    
                    $section3->sec6contentl = $sec6_stext[$key] ?? null;
                    $section3->save();
                }
            }
        }

        $model->sec6btn_text = $r->sec6btn_text;
        $model->sec6btn_url = $r->sec6btn_url;

        if ($r->hasFile('sec6image')) {
            if (!empty($model->sec6image) && File::exists(public_path('ecoinitiativepage/'.$model->sec6image))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec6image));
            }
            $gif = $r->file('sec6image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'ecoinitiativepage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2badgelogo = $gifName; // Save path in DB
            
        }

     //section 7

     $model->sec7title=$r->sec7title;
     $model->sec7addtext=$r->sec7addtext;

     $sec7_slogo=$r->file('sec7imagel');
        $sec7_stitle=$r->input('sec7titlel');

        
        $sec7_stext = $r->input('sec7contentl'); // Ensure this is fetched too

        if ($sec7_slogo) {
            foreach ($sec7_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('Ecoinitiativepage/'), $namez);

                    $section7 = new EcoinitiativepageSection6();
                    $section7->sec7imagel = $namez;
                    $section7->sec7titlel = $sec7_stitle[$key]??null;
                    
                    $section7->sec7contentl = $sec7_stext[$key] ?? null;
                    $section7->save();
                }
            }
        }
     //section 8

     $model->sec8title=$r->sec8title;
     $model->sec8text=$r->sec8text;
     $model->sec8addtexttitle=$r->sec8addtext;
     $model->sec8btn_text = $r->sec8btn_text;
        $model->sec8btn_url = $r->sec8btn_url;

      

        

        
        $sec8_stext = $r->input('sec8contentl'); // Ensure this is fetched too

        if ($sec8_stext) {
            foreach ($sec8_stext as $key => $value) {
                if ($image) {
                    

                    $section8 = new EcoinitiativepageSection8();
                    
                    
                    $section8->sec8contentl = $sec8_stext[$key] ?? null;
                    $section8->save();
                }
            }
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
