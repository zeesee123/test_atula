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
       
     

        $model->sec3title = $r->sec3title;

        $sec3_slogo=$r->file('sec3imagel');

        
        $sec3_stext = $r->input('sec3textl'); // Ensure this is fetched too

        if ($sec3_slogo) {
            foreach ($sec3_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('ecoinitiativepage/'), $namez);

                    $section3 = new EcoinitiativepageSection3();
                    $section3->sec3imagel = $namez;
                    
                    $section3->sec3textl = $sec3_stext[$key] ?? null;
                    $section3->save();
                }
            }
        }
        

        
        //section 4 

        $model->sec4quote=$r->sec4quote;

        if ($r->hasFile('sec4image')) {
            if (!empty($model->sec4image) && File::exists(public_path('ecoinitiativepage/'.$model->sec4image))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec4image));
            }
            $video = $r->file('sec4image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $videoName = $video->hashName();
            $videoPath = 'ecoinitiativepage/'; // Set the upload directory
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
                     $image->move(public_path('ecoinitiativepage/'), $namez);

                     
 
                     $section5 = new EcoinitiativepageSection5();
                     $section5->sec5imagel = $namez;
         
         
                     $section5->sec5titlel = $sec5_stitle[$key] ?? null;
         
                     $section5->sec5textl = $sec5_stext[$key] ?? null;
                     $section5->save();
                 }
             }
         }
        


        
        

        //section 6

        
        

        if ($r->hasFile('sec6image')) {
            if (!empty($model->sec6image) && File::exists(public_path('ecoinitiativepage/'.$model->sec6image))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec6image));
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
                     $image->move(public_path('ecoinitiativepage/'), $namez);

                     
 
                     $section7 = new EcoinitiativepageSection7();
                     $section7->sec7imagel = $namez;
         
         
                     
         
                     $section7->sec7textl = $sec7_stext[$key] ?? null;
                     $section7->save();
                 }
             }
         }

      
        //section 8

        $model->sec8title=$r->sec8title;



        
        $sec8_slogo=$r->file('testimage');

        $sec8_sname = $r->input('testname'); 
        $sec8_stext = $r->input('testtext'); // Ensure this is fetched too

        if ($sec8_slogo) {
            foreach ($sec8_slogo as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('testimonial/'), $namez);

                    $section8 = new Testimonial();
                    $section8->image= $namez;
                    $section8->name= $sec8_sname[$key] ?? null;
                    $section->page='ecoinitiative';
                    $section8->text = $sec8_stext[$key] ?? null;
                    $section8->save();
                }
            }
        }

        //section 9

        $model->sec9title = $r->sec9title;
        

        //section 10

        $model->sec10title = $r->sec10title;
        $model->sec10_text = $r->sec10_text;
        $model->sec10btn_text = $r->sec10btn_text;
        $model->sec10btn_url = $r->sec10btn_url;

        if ($r->hasFile('sec10_image1')) {
            if (!empty($model->sec10_image1) && File::exists(public_path('ecoinitiativepage/'.$model->sec10_image1))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec10_image1));
            }
            $video = $r->file('sec10_image1');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec10_image1 = $videoName; // Save path in DB
            
        }

        if ($r->hasFile('sec10_image2')) {
            if (!empty($model->sec10_image2) && File::exists(public_path('ecoinitiativepage/'.$model->sec10_image2))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec10_image2));
            }
            $video = $r->file('sec10_image2');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec10_image2 = $videoName; // Save path in DB
            
        }

        //section 11

        $sec11_slogo1=$r->file('sec11imagel');
         

        $sec11_stitle = $r->input('sec11titlel'); 
        $sec11_stext = $r->input('sec11linkl'); // Ensure this is fetched too

        

        if ($sec11_slogo1) {
            foreach ($sec11_slogo1 as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('ecoinitiativepage/'), $namez);

                    

                    $section11 = new EcoinitiativepageSection11();
                    $section11->sec11imagel = $namez;
        
        
                    $section11->sec11titlel = $sec11_stitle[$key] ?? null;
        
                    $section11->sec11linkl = $sec11_stext[$key] ?? null;
                    $section11->save();
                }
            }
        }

        //section 12

        $model->sec12title = $r->sec12title;
        $model->sec12btn_text = $r->sec12btn_text;
        $model->sec12btn_url = $r->sec12btn_url;

        $sec12_slogo1=$r->file('sec12imagel');
         

        $sec12_stitle = $r->input('sec12titlel'); 
        $sec12_slink = $r->input('sec12linkl'); // Ensure this is fetched too

        

        if ($sec12_slogo1) {
            foreach ($sec12_slogo1 as $key => $image) {
                if ($image) {
                    $namez = $image->hashName();
                    $image->move(public_path('ecoinitiativepage/'), $namez);

                    

                    $section12 = new EcoinitiativepageSection12();
                    $section12->sec12imagel = $namez;
        
        
                    $section12->sec12titlel = $sec12_stitle[$key] ?? null;
        
                    $section12->sec12linkl = $sec12_slink[$key] ?? null;
                    $section12->save();
                }
            }
        }

        //section 13

        $model->sec13title = $r->sec13title;
        $model->sec13addtext = $r->sec13addtext;


         


        $sec13_stext = $r->input('sec 13textl'); // Ensure this is fetched too

        

        if ($sec13_stext) {
            foreach ($sec13_stext as $key => $image) {
                if ($image) {
                    

                    

                    $section13 = new EcoinitiativepageSection13();
                    
        
                    $section12->sec13textl = $sec13_stext[$key] ?? null;
                    $section12->save();
                }
            }
        }


        //section 14

        if ($r->hasFile('sec14image')) {
            if (!empty($model->sec14image) && File::exists(public_path('ecoinitiativepage/'.$model->sec14image))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec14image));
            }
            $video = $r->file('sec14image');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec14image = $videoName; // Save path in DB
            
        }
        //section 15

        $model->sec15title = $r->sec15title;
        
        $model->sec15btn_text = $r->sec15btn_text;
        $model->sec15btn_url = $r->sec15btn_url;

        if ($r->hasFile('sec15image')) {
            if (!empty($model->sec15image) && File::exists(public_path('ecoinitiativepage/'.$model->sec15image))) {
                File::delete(public_path('ecoinitiativepage/'.$model->sec15image));
            }
            $video = $r->file('sec15image');
            // $videoName = timerepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec15image= $videoName; // Save path in DB
            
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
