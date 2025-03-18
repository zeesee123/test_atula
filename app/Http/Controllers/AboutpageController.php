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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

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


    public function loadtable($section){

        

        $data=[];
        $c=1;
        $content=null;
        $error=false;

        switch($section){

            case "section1":

                $content=AboutpageSection1::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('aboutpage/'.$cl->sec1imagel).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section1" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section1" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;
    
           
            case "section3":

                $content=AboutpageSection3::all();
    
                $count=$content->count();

                // dd($content);
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('aboutpage/'.$cl->sec3imagel).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section3" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section4":

                $content=AboutpageSection4::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('aboutpage/'.$cl->sec4imagel).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl->sec4titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section4" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section5":

                $content=AboutpageSection5::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl->sec5titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section5" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section5" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section6":

                $content=AboutpageSection6::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('aboutpage/'.$cl->sec6imagel).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl->sec6titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section6" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section6" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            

            default:
            dd('wrong about move');
            break;
        }
        
        return response()->json(['draw'=>1,'recordsTotal'=>$count,'recordsFiltered'=>$count,'data'=>$data]);


    }


    public function get_resource($section,$id){

        $sectionData=null;
        switch ($section) {
            case "section1":
                $sectionData = AboutpageSection1::find($id);
                break;
        
            case "section3":
                $sectionData = AboutpageSection3::find($id);
                break;
        
            case "section4":
                $sectionData = AboutpageSection4::find($id);
                break;
        
            case "section5":
                $sectionData = AboutpageSection5::find($id);
                break;
        
            case "section6":
                $sectionData = AboutpageSection6::find($id);
                break;
        
            
            default:
                $sectionData = null;
                break;
        }
 
        return response()->json(['status'=>'success','sectionData'=>$sectionData]);
    }

    public function update_resource($sectionType,Request $request){

        
        try{

            

            $validatedRequest = $request->validate([
                'id' => 'required|integer|min:1', // Ensures ID is valid
            ]);
    
            $id = $validatedRequest['id']; // Extract validated ID

            $validationRules = [
                'section1' => ['sec1_imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
                'section3' => ['sec3_imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
                'section4' => [
                    'sec4titlel' => 'nullable|string',
                    'sec4textl' => 'nullable|string',
                    'sec4imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
                'section5' => [
                    'sec5titlel' => 'nullable|string',
                    'sec6stextl' => 'nullable|string',
                ],
                'section6' => [
                    'sec6titlel' => 'nullable|string',
                    'sec6textl' => 'nullable|string',
                    'sec6imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
               
            ];
    
            // Section mapping
            $sections = [
                'section1' => AboutpageSection1::class,
                'section3' => AboutpageSection3::class,
                'section4' => AboutpageSection4::class,
                'section5' => AboutpageSection5::class,
                'section6' => AboutpageSection6::class,
            ];
    
            if (!isset($sections[$sectionType])) {
                dump($sectionType);
                return response()->json(['error' => 'Invalid section'], 400);
            }
    
            // Validate only the fields related to the requested section
            $validatedData = $request->validate($validationRules[$sectionType] ?? []);
    
            // Get model
            $section = $sections[$sectionType]::find($id);

            // dump($section);
    
            if (!$section) {
                return response()->json(['error' => 'Section not found'], 404);
            }
    
            // Image fields for different sections
            $imageFields = [
                'section1' => 'sec1imagel',
                'section3' => 'sec3imagel',
                'section4' => 'sec4imagel',
                'section6' => 'sec6imagel',
                
            ];
    
            // dd($imageFields, $sectionType, $imageFields[$sectionType] ?? 'not set', $request->all());
            // Handle image upload

            // dump(empty($imageFields[$sectionType]));
            // dump($request->hasFile('image'));
            if (!empty($imageFields[$sectionType]) && $request->hasFile('image')) {

                // dd('randi');
                // dd('hehe');
                $image = $request->file('image');
                $imageName = $image->hashName(); // Use time-based naming
            
                // Delete old image if it exists
                $oldImage = $section->{$imageFields[$sectionType]};

                // dump($oldImage);
                try{
                    if (!empty($oldImage) && File::exists(public_path('aboutpage/' . $oldImage))) {
                        File::delete(public_path('aboutpage/' . $oldImage));
                    }
                }catch(Exception $e){

                    dd($e->getMessage());
                }
                
            
                // Move new image
                $image->move(public_path('aboutpage/'), $imageName);
                $section->{$imageFields[$sectionType]} = $imageName;
            }
    
            // Update other fields dynamically
            foreach ($validatedData as $field => $value) {
                if ($field !== ($imageFields[$sectionType] ?? null)) {
                    $section->$field = $value;
                }
            }
    
            // Save updated section
            $section->save();
    
                   
            return response()->json(['message' => 'Item updated successfully', 'status'=>'success'], 200);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return response()->json(['message' => 'Something went wrong', 'status'=>'error'], 500);
        }
        

        
    }


    public function delete_resource($sectionType,Request $request){

         
        try{

            

            $validatedRequest = $request->validate([
                'id' => 'required|integer|min:1', // Ensures ID is valid
            ]);
        
            $id = $validatedRequest['id']; // Extract validated ID
        
            // Section mapping
            $sections = [
                'section1' => AboutpageSection1::class,
                'section3' => AboutpageSection3::class,
                'section4' => AboutpageSection4::class,
                'section5' => AboutpageSection5::class,
                'section6' => AboutpageSection6::class,
            ];
        
            if (!isset($sections[$sectionType])) {
                return response()->json(['error' => 'Invalid section'], 400);
            }
        
            // Get model
            $section = $sections[$sectionType]::find($id);
        
            if (!$section) {
                return response()->json(['error' => 'Section not found'], 404);
            }
        
            // Image fields for different sections
            $imageFields = [
                'section1' => 'sec1imagel',
                'section3' => 'sec3imagel',
                'section4' => 'sec4imagel',
                'section6' => 'sec6imagel',
                
            ];
        
            // Check if this section has an associated image field
            if (!empty($imageFields[$sectionType])) {
                $imageField = $imageFields[$sectionType];
                $oldImage = $section->$imageField;
        
                // Delete old image if it exists
                if (!empty($oldImage) && File::exists(public_path('aboutpage/' . $oldImage))) {
                    File::delete(public_path('aboutpage/' . $oldImage));
                }
            }
        
            // Delete the section record from the database
            $section->delete();
        
            return response()->json(['message' => 'Item deleted successfully', 'status' => 'success'], 200);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return response()->json(['message' => 'Something went wrong', 'status'=>'error'], 500);
        }
    }
}
