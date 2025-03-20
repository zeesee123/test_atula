<?php

namespace App\Http\Controllers;

use App\Models\Aboutpagetwo;
use App\Models\AboutpagetwoSection4;
use App\Models\AboutpagetwoSection5;
use App\Models\AboutpagetwoSection6;
use App\Models\AboutpagetwoSection7;
use App\Models\AboutpagetwoSection8;
use App\Models\AboutpagetwoSection9;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

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
                if (!empty($model->sec1image) && File::exists(public_path('agriventure/'.$model->sec1image))) {
                    File::delete(public_path('agriventure/'.$model->sec1image));
                }
                $video = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $videoName = $video->hashName();
                $videoPath = 'agriventure/'; // Set the upload directory
                $video->move(public_path($videoPath), $videoName);
                $model->sec1image = $videoName; // Save path in DB
                
            }

            

            $model->sec2title = $r->sec2title;
            $model->sec2addtext = $r->sec2addtext;
            $model->sec2text = $r->sec2text;
            
      
      try{
        if ($r->hasFile('sec2image')) {
            if (!empty($model->sec2image) && File::exists(public_path('agriventure/'.$model->sec2image))) {
                File::delete(public_path('agriventure/'.$model->sec2image));
            }
            $gif = $r->file('sec2image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'agriventure/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec2image = $gifName; // Save path in DB
            
        }
     

        $model->sec3title = $r->sec3title;
        $model->sec3text = $r->sec3text;
        $model->sec3btn_text = $r->sec3btn_text;
        $model->sec3btn_url = $r->sec3btn_url;

        if ($r->hasFile('sec3image')) {
            if (!empty($model->sec3image) && File::exists(public_path('agriventure/'.$model->sec3image))) {
                File::delete(public_path('agriventure/'.$model->sec3image));
            }
            $video = $r->file('sec3image');
            $videoName = $video->hashName();
            $videoPath = 'agriventure/'; // Set the upload directory
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
                    $image->move(public_path('agriventure/'), $namez);

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
                     $image->move(public_path('agriventure/'), $namez);

                     $image2=$sec5_slogo2[$key];
                     $namez2 = $image2->hashName();
                     $image2->move(public_path('agriventure/'), $namez2);
 
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
            if (!empty($model->sec6image) && File::exists(public_path('agriventure/'.$model->sec6image))) {
                File::delete(public_path('agriventure/'.$model->sec6image));
            }
            $video = $r->file('sec6image');
            
            $videoName = $video->hashName();
            $videoPath = 'agriventure/'; // Set the upload directory
            $video->move(public_path($videoPath), $videoName);
            $model->sec6image = $videoName; // Save path in DB
            
        }

        // images array

        

        $sec6_stitle = $r->input('sec6titlel'); 
        $sec6_stext = $r->input('sec6textl'); // Ensure this is fetched too

        if ($sec6_stitle) {
            foreach ($sec6_stitle as $key => $image) {
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

        if ($sec7_syear) {
            foreach ($sec7_syear as $key => $value) {
                if ($image) {
                    

                    $section7 = new AboutpagetwoSection7();
                    
                    $section7->sec7yearl = $value ?? null;
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
                    $image->move(public_path('agriventure/'), $namez);

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
            if (!empty($model->sec9image) && File::exists(public_path('agriventure/'.$model->sec9image))) {
                File::delete(public_path('agriventure/'.$model->sec9image));
            }
            $video = $r->file('sec9image');
            
            $videoName = $video->hashName();
            $videoPath = 'agriventure/'; // Set the upload directory
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
                    $image->move(public_path('agriventure/'), $namez);
                    

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

        return back()->with('success','Section has been added/updated successfully!');

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

            case "section4":

                $content=AboutpagetwoSection4::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('agriventure/'.$cl->sec4imagel).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl->sec4titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section4" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;
    
           
            case "section5":

                $content=AboutpagetwoSection5::all();
    
                $count=$content->count();

                // dd($content);
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('agriventure/'.$cl->sec5img1l).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl->sec5titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section5" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section5" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section6":

                $content=AboutpagetwoSection6::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl->sec6titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section6" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section6" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section7":

                $content=AboutpagetwoSection7::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl->sec7titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section7" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section7" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section8":

                $content=AboutpagetwoSection8::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl->sec8titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section8" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section8" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section9":

                $content=AboutpagetwoSection9::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl->sec9titlel,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section9" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section9" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

          

            default:
            dd('wrong move');
            break;
        }
        
        return response()->json(['draw'=>1,'recordsTotal'=>$count,'recordsFiltered'=>$count,'data'=>$data]);


    }


    public function get_resource($section,$id){

        $sectionData=null;
        switch ($section) {
            case "section4":
                $sectionData = AboutpagetwoSection4::find($id);
                break;
        
            case "section5":
                $sectionData = AboutpagetwoSection5::find($id);
                break;
        
            case "section6":
                $sectionData = AboutpagetwoSection6::find($id);
                break;
        
            case "section7":
                $sectionData = AboutpagetwoSection7::find($id);
                break;
        
            case "section8":
                $sectionData = AboutpagetwoSection8::find($id);
                break;
        
            case "section9":
                $sectionData = AboutpagetwoSection9::find($id);
                break;
        
        
            default:
                $sectionData = null;
                break;
        }
 
        return response()->json(['status'=>'success','sectionData'=>$sectionData]);
    }

    public function update_resource($sectionType, Request $request)
{
    
    try {
        // Validate ID
        $validatedRequest = $request->validate([
            'id' => 'required|integer|min:1',
        ]);
        $id = $validatedRequest['id'];

        // Validation rules
        $validationRules = [
            'section4' => ['sec4titlel' => 'nullable|string', 'sec4textl' => 'nullable|string', 'sec4imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            'section5' => ['sec5titlel' => 'nullable|string', 'sec5textl' => 'nullable|string', 'sec5achieve' => 'nullable|string', 'sec5tech' => 'nullable|string', 'sec5img1l' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 'sec5img2l' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            'section6' => ['sec6titlel' => 'nullable|string', 'sec6textl' => 'nullable|string'],
            'section7' => ['sec7yearl' => 'nullable|string', 'sec7titlel' => 'nullable|string', 'sec7textl' => 'nullable|string'],
            'section8' => ['sec8titlel' => 'nullable|string', 'sec8textl' => 'nullable|string', 'sec8imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            'section9' => ['sec9titlel' => 'nullable|string', 'sec9textl' => 'nullable|string', 'sec9imagel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
        ];

        // Section mapping
        $sections = [
            'section4' => AboutpagetwoSection4::class,
            'section5' => AboutpagetwoSection5::class,
            'section6' => AboutpagetwoSection6::class,
            'section7' => AboutpagetwoSection7::class,
            'section8' => AboutpagetwoSection8::class,
            'section9' => AboutpagetwoSection9::class,
        ];

        if (!isset($sections[$sectionType])) {
            return response()->json(['error' => 'Invalid section'], 400);
        }

        // Validate only the relevant section fields
        $validatedData = $request->validate($validationRules[$sectionType] ?? []);

        // Find section model
        $section = $sections[$sectionType]::find($id);
        if (!$section) {
            return response()->json(['error' => 'Section not found'], 404);
        }

        // Image fields mapping
        $imageFieldMapping = [
            'section4' => ['image' => 'sec4imagel'],
            'section5' => ['image' => 'sec5img1l', 'image2' => 'sec5img2l'], // Section 5 has two images
            'section6' => ['image' => 'sec6imagel'],
            'section7' => ['image' => 'sec7imagel'],
            'section8' => ['image' => 'sec8imagel'],
            'section9' => ['image' => 'sec9imagel'],
        ];

        // Handle image upload
        // Check and process image uploads
        foreach ($imageFieldMapping[$sectionType] ?? [] as $requestField => $dbField) {
            if ($request->hasFile($requestField)) {
                $image = $request->file($requestField);
                $imageName = $image->hashName(); // Laravel's hashName() ensures unique naming
        
                // Delete old image if it exists
                $oldImage = $section->$dbField;
                if (!empty($oldImage) && File::exists(public_path('agriventure/' . $oldImage))) {
                    File::delete(public_path('agriventure/' . $oldImage));
                }
        
                // Move new image
                $image->move(public_path('agriventure/'), $imageName);
                $section->$dbField = $imageName;
            }
        }

        // Update other fields
        foreach ($validatedData as $field => $value) {
            if (!in_array($field, $imageFields[$sectionType] ?? [])) {
                $section->$field = $value;
            }
        }

        // Save the updated section
        $section->save();

        return response()->json(['message' => 'Item updated successfully', 'status' => 'success'], 200);
    } catch (Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['message' => 'Something went wrong', 'status' => 'error'], 500);
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
                'section3' => AboutpagetwoSection3::class,
                'section4' => AboutpagetwoSection4::class,
                'section5' => AboutpagetwoSection5::class,
                'section6' => AboutpagetwoSection6::class,
                'section7' => AboutpagetwoSection7::class,
                'section8' => AboutpagetwoSection8::class,
                'section9' => AboutpagetwoSection9::class,
                'section10' => AboutpagetwoSection10::class,
                'section12' => AboutpagetwoSection12::class,
                'section13' => AboutpagetwoSection13::class,
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
                'section3' => 'whatwe_doimg',
                'section5' => 'sec5_img',
                'section7' => 'sec7_simg',
                'section8' => 'sec8_slogo',
                'section9' => 'sec9_simg',
                'section10' => 'sec10_simg',
                'section13' => 'image',
            ];
        
            // Check if this section has an associated image field
            if (!empty($imageFields[$sectionType])) {
                $imageField = $imageFields[$sectionType];
                $oldImage = $section->$imageField;
        
                // Delete old image if it exists
                if (!empty($oldImage) && File::exists(public_path('agriventure/' . $oldImage))) {
                    File::delete(public_path('agriventure/' . $oldImage));
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
