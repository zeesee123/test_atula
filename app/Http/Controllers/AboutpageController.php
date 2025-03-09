<?php

namespace App\Http\Controllers;

use App\Models\Aboutpage;
use Illuminate\Http\Request;
use App\Models\AboutpageSection1;
use App\Models\AboutpageSection3;
use App\Models\AboutpageSection4;
use App\Models\AboutpageSection5;
use App\Models\AboutpageSection6;
use Illuminate\Support\Facades\DB;

class AboutpageController extends Controller
{
    //

    public function add_aboutpage(Request $r){
        
       
        try{

            DB::beginTransaction();

        $model = Aboutpage::first() ?? new Aboutpage();


        $model->sec1title = $r->sec1title;
        $model->sec1text = $r->sec1text;
        $model->sec1btn_text = $r->sec1btn_text;
        $model->sec1btn_url = $r->sec1btn_url;

      
            if ($r->hasFile('sec1image')) {
                if (!empty($model->sec1image) && File::exists(public_path('aboutpage/'.$model->sec1image))) {
                    File::delete(public_path('aboutpage/'.$model->sec1image));
                }
                $video = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $videoName = $video->hashName();
                $videoPath = 'aboutpage/'; // Set the upload directory
                $video->move(public_path($videoPath), $videoName);
                $model->sec1image = $videoName; // Save path in DB
                
            }

            $imagesec1 = $r->file('sec1imagel');


            if($imagesec1){
                foreach ($imagesec1 as $image) {
                    if ($image) {
                        $imageName = $image->hashName();
                        $image->move(public_path('aboutpage/'), $imageName);
                
                        $service = new AboutpageSection1;
                        $service->sec1imagel = $imageName;
                        $service->save();
                    }
                }
            }

            $model->sec2title = $r->sec2title;
            $model->sec2text = $r->sec2text;
            $model->sec2btn_text = $r->sec2btn_text;
            $model->sec2btn_url = $r->sec2btn_url;
      
      try{
        if ($r->hasFile('sec2image')) {
            if (!empty($model->sec2image) && File::exists(public_path('aboutpage/'.$model->sec2image))) {
                File::delete(public_path('aboutpage/'.$model->sec2image));
            }
            $gif = $r->file('sec2image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'aboutpage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2image = $gifName; // Save path in DB
            
        }
     

        

        $model->sec3title = $r->sec3title;
        $model->sec3text = $r->sec3text;

        $imagesec3 = $r->file('sec3imagel');


        if($imagesec3){
            foreach ($imagesec3 as $image) {
                if ($image) {
                    $imageName = $image->hashName();
                    $image->move(public_path('aboutpage/'), $imageName);
            
                    $service = new AboutpageSection3;
                    $service->sec3imagel = $imageName;
                    $service->save();
                }
            }
        }
        

        //section 3 logo image

        

 


//making a diff sec

        $model->sec4title = $r->input('sec4title');
        $model->sec4text = $r->input('sec4text');
        
        


        $sec4_slogo=$r->file('sec4imagel');

  $sec4_stitle = $r->input('sec4titlel'); 
$sec4_stext = $r->input('sec4textl'); // Ensure this is fetched too

  if ($sec4_slogo) {
    foreach ($sec4_slogo as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('aboutpage/'), $namez);

            $section4 = new AboutpageSection4();
            $section4->sec4imagel = $namez;
            $section4->sec4titlel = $sec4_stitle[$key] ?? null;
            $section4->sec4textl = $sec4_stext[$key] ?? null;
            $section4->save();
        }
    }
}

        

            $model->sec5title = $r->input('sec5title');
            $model->sec5text = $r->input('sec5text');
            $model->sec5addtext = $r->input('sec5addtext');

            

            $sec5_stitle = $r->input('sec5titlel'); 
          $sec5_stext = $r->input('sec5textl'); // Ensure this is fetched too
          
            if ($sec5_stitle) {
              foreach ($sec5_stitle as $key => $value) {
                  if ($value) {
                  
          
                      $section5 = new AboutpageSection5();
                      
                      $section5->sec5titlel = $sec5_stitle[$key] ?? null;
                      $section5->sec5textl = $sec5_stext[$key] ?? null;
                      $section5->save();
                  }
              }
          }
        

        $model->sec6title = $r->input('sec6title');


        $sec6_slogo=$r->file('sec6imagel');

        $sec6_stitle = $r->input('sec6titlel'); 
      $sec6_stext = $r->input('sec6textl'); // Ensure this is fetched too
      
        if ($sec6_slogo) {
          foreach ($sec6_slogo as $key => $image) {
              if ($image) {
                  $namez = $image->hashName();
                  $image->move(public_path('aboutpage/'), $namez);
      
                  $section6 = new AboutpageSection6();
                  $section6->sec6imagel = $namez;
                  $section6->sec6titlel = $sec6_stitle[$key] ?? null;
                  $section6->sec6textl = $sec6_stext[$key] ?? null;
                  $section6->save();
              }
          }
      }

      $model->sec7title = $r->input('sec7title');
      $model->sec7addtext = $r->input('sec7addtext');
      $model->sec7text = $r->input('sec7text');
      $model->sec7btn_text = $r->input('sec7btn_text');
      $model->sec7btn_url = $r->input('sec7btn_url');

        



   

  //what we r working on

  $model->sec8title = $r->input('sec8title');
  $model->sec8text = $r->input('sec8text');

  if ($r->hasFile('sec8image')) {
    if (!empty($model->sec8image) && File::exists(public_path('aboutpage/'.$model->sec8image))) {
        File::delete(public_path('aboutpage/'.$model->sec8image));
    }
    $video = $r->file('sec8image');
    // $videoName = time() . '_' . $video->getClientOriginalName();
    $videoName = $video->hashName();
    $videoPath = 'aboutpage/'; // Set the upload directory
    $video->move(public_path($videoPath), $videoName);
    $model->sec8image = $videoName; // Save path in DB
    
}


 

//tech driven

$model->sec91title = $r->input('sec91title');
$model->sec91text = $r->input('sec91text');
$model->sec91btn_text = $r->input('sec91btn_text');
$model->sec91btn_url = $r->input('sec91btn_url');


$model->sec92title = $r->input('sec92title');
$model->sec92text = $r->input('sec92text');
$model->sec92btn_text = $r->input('sec92btn_text');
$model->sec92btn_url = $r->input('sec92btn_url');


if ($r->hasFile('sec92image')) {
    if (!empty($model->sec92image) && File::exists(public_path('aboutpage/'.$model->sec92image))) {
        File::delete(public_path('aboutpage/'.$model->sec92image));
    }
    $video = $r->file('sec92image');
    // $videoName = time() . '_' . $video->getClientOriginalName();
    $videoName = $video->hashName();
    $videoPath = 'aboutpage/'; // Set the upload directory
    $video->move(public_path($videoPath), $videoName);
    $model->sec92image = $videoName; // Save path in DB
    
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
