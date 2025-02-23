<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Homepage;
use Illuminate\Http\Request;
use App\Models\HomepageSection3;
use App\Models\HomepageSection4;
use App\Models\HomepageSection5;
use App\Models\HomepageSection6;
use App\Models\HomepageSection7;
use App\Models\HomepageSection8;
use App\Models\HomepageSection9;
use App\Models\HomepageSection10;
use App\Models\HomepageSection12;
use App\Models\HomepageSection13;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomepageController extends Controller
{
    //

    public function add_homepage(Request $r){

        // dd($r);


        try{

            DB::beginTransaction();

        $model = Homepage::first() ?? new Homepage();

        if ($r->hasFile('sec1_vid')) {
            if (!empty($model->sec1_vid) && File::exists(public_path('homepage/'.$model->sec1_vid))) {
                File::delete(public_path('homepage/'.$model->sec1_vid));
            }
            $video = $r->file('sec1_vid');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $videoName = $video->hashName();
            $videoPath = 'homepage/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec1_vid = $videoName; // Save path in DB
            
        }

        if ($r->hasFile('sec2gif')) {
            if (!empty($model->sec2gif) && File::exists(public_path('homepage/'.$model->sec2gif))) {
                File::delete(public_path('homepage/'.$model->sec2gif));
            }
            $gif = $r->file('sec2gif');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'homepage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2gif = $gifName; // Save path in DB
            
        }

        $model->sec3title = $r->sec3title;
        $model->sec3content = $r->sec3content;
        $model->sec3btn_text = $r->sec3btn_text;
        $model->sec3btn_url = $r->sec3btn_url;

        $imagesec3 = $r->file('whatwe_doimg');

foreach ($imagesec3 as $image) {
    if ($image) {
        $imageName = $image->hashName();
        $image->move(public_path('homepage/'), $imageName);

        $service = new HomepageSection3;
        $service->whatwe_doimg = $imageName;
        $service->save();
    }
}

//making a diff sec

        $model->sec4_content = $r->input('sec4_content');
        $model->sec4_tinytitle = $r->input('sec4_tinytitle');
        $model->sec4btn_text = $r->input('sec4btn_text');
        $model->sec4btn_url = $r->input('sec4btn_url');
        
        

        $impactTexts = $r->input('sec4_text');

        foreach ($impactTexts as $text) {
            if (!empty($text)) {
                $impact = new HomepageSection4();
                $impact->sec4_text = $text;
                $impact->save();
            }
        }

        $model->sec5_title = $r->input('sec5_title');

        if ($r->hasFile('sec5_img')) {
            foreach ($r->file('sec5_img') as $key => $image) {
                if ($image->isValid()) {
                    $imageName = $image->hashName();
                    $image->move(public_path('homepage/'), $imageName);
    
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

    // Handle Image Upload
    if ($r->hasFile('sec6_image')) {
        // Delete old image if exists
        if (!empty($model->sec6_image) && File::exists(public_path('homepage/' . $model->sec6_image))) {
            File::delete(public_path('homepage/' . $model->sec6_image));
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

    foreach ($years as $key => $year) {
        if (!empty($year) || !empty($titles[$key]) || !empty($contents[$key])) {
            $entry = new HomepageSection6();
            $entry->sec6year = $year ?? null;
            $entry->sec6stitle = $titles[$key] ?? null;
            $entry->sec6scontent = $contents[$key] ?? null;
            $entry->save();
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
            $imagePath = $image->move(public_path('homepage/'), $namez);
            $section7 = new HomepageSection7();
            $section7->sec7_simg = $namez;
            $section7->sec7_scontent = $sec7_scontent[$key] ?? null;
            $section7->save();
        }
    }
}

  //what we r working on

  $model->sec8_title = $r->input('sec8_title');


  if ($sec8_slogo) {
    foreach ($sec8_slogo as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('homepage/'), $namez);

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
            $image->move(public_path('homepage/'), $namez);

            $techImg = new HomepageSection9();
            $techImg->sec9_simg = $namez;
            $techImg->sec9_scontent = $r->input('sec9_scontent')[$key] ?? null;
            $techImg->save();
        }
    }
}


//our purpose and values

$model->sec10title = $r->input('sec10title');


if ($request->hasFile('sec10_simg')) {
    foreach ($request->file('sec10_simg') as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('homepage/'), $namez);

            $section10 = new HomepageSection10();
            $section10->sec10_stitle = $request->input('sec10_stitle')[$key] ?? null;
            $section10->sec10_simg = $namez;
            $section10->sec10_scontent = $request->input('sec10_scontent')[$key] ?? null;
            $section10->save();
        }
    }
}

//empowering communities

$model->sec11_title = $request->input('sec11_title');
$model->sec11_content = $request->input('sec11_content');

if ($request->hasFile('sec11_image')) {
    $image = $request->file('sec11_image');
    $imageName = $image->hashName();
    $image->move(public_path('homepage/'), $imageName);
    $model->sec11_image = $imageName;
}

//badges part
if ($request->has('sec12_scontent')) {
    foreach ($request->input('sec12_scontent') as $key => $content) {
        $section12 = new HomepageSection12();
        $section12->sec12_scontent = $content;
        $section12->save();
    }
}

//be part of change

$model->sec13_title = $request->sec13_title;
$model->sec13_content = $request->sec13_content;


if ($request->has('sec13_scontent')) {
    foreach ($request->sec13_scontent as $key => $content) {
        if (!empty($content)) { // Ensure the content isn't empty
            $section13 = new HomepageSection13();
            $section13->sec13_scontent = $content;
            $section13->sec13_slink = $request->sec13_slink[$key] ?? null;
            $section13->save();
        }
    }
}

$model->sec14_title = $request->sec14_title ?? null;
$model->sec14_content = $request->sec14_content ?? null;
$model->save();

// Save Google Map link

$model->map_code = $request->map_code ?? null;










        $model->save();

        return back()->with('success','message added');

        }catch(Exception $e){
            DB::rollback();
            return back()->with('failure',$e->getMessage());}
        


    }
}
