<?php

namespace App\Http\Controllers;

use App\Models\Aboutpage;
use Illuminate\Http\Request;
use App\Models\AboutpageSection5;

class AboutpageController extends Controller
{
    //

    public function add_aboutpage(Request $r){
        
       
        try{

            // DB::beginTransaction();

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
                
                        $service = new HomepageSection3;
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
            
                    $service = new HomepageSection3;
                    $service->sec3imagel = $imageName;
                    $service->save();
                }
            }
        }
        

        //section 3 logo image

        

        //section 3 logo image part ends

        $imagesec3 = $r->file('whatwe_doimg');


if($imagesec3){
    foreach ($imagesec3 as $image) {
        if ($image) {
            $imageName = $image->hashName();
            $image->move(public_path('aboutpage/'), $imageName);
    
            $service = new HomepageSection3;
            $service->whatwe_doimg = $imageName;
            $service->save();
        }
    }
}


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
        

        $model->sec5_title = $r->input('sec5_title');

        if ($r->hasFile('sec5_img')) {
            foreach ($r->file('sec5_img') as $key => $image) {
                if ($image->isValid()) {
                    $imageName = $image->hashName();
                    $image->move(public_path('aboutpage/'), $imageName);
    
                    $sec5 = new HomepageSection5();
                    $sec5->sec5_img = $imageName;
                    $sec5->sec5_stitle = $r->input('sec5_stitle')[$key] ?? null;
                    $sec5->sec5_scontent = $r->input('sec5_scontent')[$key] ?? null;
                    $sec5->save();
                }
            }
        }

        //our journey

        $model->sec6_title = $r->input('sec6_title');

        $model->sec6_addtext = $r->input('sec6_addtext');


    // Handle Image Upload
    if ($r->hasFile('sec6_image')) {
        // Delete old image if exists
        if (!empty($model->sec6_image) && File::exists(public_path('aboutpage/' . $model->sec6_image))) {
            File::delete(public_path('aboutpage/' . $model->sec6_image));
        }

        // Save new image
        $image = $r->file('sec6_image');
        $imageName = $image->hashName();
        $image->move(public_path('homepage'), $imageName);
        $model->sec6_image = $imageName;
    }


    $years = $r->input('sec6year');
    $titles = $r->input('sec6stitle');
    $contents = $r->input('sec6scontent');

    if($years){

        foreach ($years as $key => $year) {
            if (!empty($year) || !empty($titles[$key]) || !empty($contents[$key])) {
                $entry = new HomepageSection6();
                $entry->sec6year = $year ?? null;
                $entry->sec6stitle = $titles[$key] ?? null;
                $entry->sec6scontent = $contents[$key] ?? null;
                $entry->save();
            }
        }
    }
    


    //our purpose n vision
    $model->sec7_title = $r->input('sec7_title');
    $model->sec7_content = $r->input('sec7_content');

    $model->sec7btn_text = $r->input('sec7btn_text');
$model->sec7btn_url = $r->input('sec7btn_url');

    $sec7_simg = $r->file('sec7_simg');
$sec7_scontent = $r->input('sec7_scontent');

if ($sec7_simg) {
    foreach ($sec7_simg as $key => $image) {
        if ($image) {
            $namez=$image->hashName();
            $imagePath = $image->move(public_path('aboutpage/'), $namez);
            $section7 = new HomepageSection7();
            $section7->sec7_simg = $namez;
            $section7->sec7_scontent = $sec7_scontent[$key] ?? null;
            $section7->save();
        }
    }
}

  //what we r working on

  $model->sec8_title = $r->input('sec8_title');


  $sec8_slogo=$r->input('sec8_slogo');

  if ($sec8_slogo) {
    foreach ($sec8_slogo as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('aboutpage/'), $namez);

            $section8 = new HomepageSection8();
            $section8->sec8_slogo = $namez;
            $section8->sec8_scontent = $sec8_scontent[$key] ?? null;
            $section8->sec8_slink = $sec8_slink[$key] ?? null;
            $section8->save();
        }
    }
}

//tech driven

$model->sec9title = $r->input('sec9title');
$model->sec9content = $r->input('sec9content');
$model->sec9btn_text = $r->input('sec9btn_text');
$model->sec9btn_url = $r->input('sec9btn_url');
$model->sec9_featurestext = $r->input('sec9_featurestext');

if ($r->hasFile('sec9_simg')) {
    foreach ($r->file('sec9_simg') as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('aboutpage/'), $namez);

            $techImg = new HomepageSection9();
            $techImg->sec9_simg = $namez;
            $techImg->sec9_scontent = $r->input('sec9_scontent')[$key] ?? null;
            $techImg->save();
        }
    }
}


//our purpose and values

$model->sec10_title = $r->input('sec10_title');


if ($r->hasFile('sec10_simg')) {
    foreach ($r->file('sec10_simg') as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('aboutpage/'), $namez);

            $section10 = new HomepageSection10();
            $section10->sec10_stitle = $r->input('sec10_stitle')[$key] ?? null;
            $section10->sec10_simg = $namez;
            $section10->sec10_scontent = $r->input('sec10_scontent')[$key] ?? null;
            $section10->save();
        }
    }
}

//empowering communities

$model->sec11_title = $r->input('sec11_title');
$model->sec11_content = $r->input('sec11_content');

if ($r->hasFile('sec11_image')) {
    $image = $r->file('sec11_image');
    $imageName = $image->hashName();
    $image->move(public_path('aboutpage/'), $imageName);
    $model->sec11_image = $imageName;
}

//badges part
if ($r->has('sec12_scontent')) {
    foreach ($r->input('sec12_scontent') as $key => $content) {
        $section12 = new HomepageSection12();
        $section12->sec12_scontent = $content;
        $section12->save();
    }
}

//be part of change

$model->sec13_title = $r->sec13_title;
$model->sec13_content = $r->sec13_content;


if ($r->has('sec13_scontent')) {
    foreach ($r->sec13_scontent as $key => $content) {
        if (!empty($content)) { // Ensure the content isn't empty
            $section13 = new HomepageSection13();
            $section13->sec13_scontent = $content;
            $section13->sec13_slink = $r->sec13_slink[$key] ?? null;
            $section13->save();
        }
    }
}

$model->sec14_title = $r->sec14_title ?? null;
$model->sec14_content = $r->sec14_content ?? null;
$model->save();

// Save Google Map link

$model->map_code = $r->map_code ?? null;










        $model->save();

    }catch(Exception $e){

        return $e->getMessage();
        Log::info($e->getMessage());
      }

        // DB::commit();

        return back()->with('success','message added');

        }catch(Exception $e){
            // DB::rollback();
            return back()->with('failure',$e->getMessage());}
    }
}
