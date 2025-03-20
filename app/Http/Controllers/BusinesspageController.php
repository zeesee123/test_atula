<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Businesspage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

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

            case "section3":

                $content=HomepageSection3::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('homepage/'.$cl->whatwe_doimg).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section3" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;
    
           
            case "section4":

                $content=HomepageSection4::all();
    
                $count=$content->count();

                // dd($content);
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'text'=>$cl->sec4_text,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section4" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section5":

                $content=HomepageSection5::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('homepage/'.$cl->sec5_img).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl->sec5_stitle,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section5" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section5" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section6":

                $content=HomepageSection6::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'year'=>$cl->sec6year,
                  'title'=>$cl->sec6stitle,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section6" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section6" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section7":

                $content=HomepageSection7::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('homepage/'.$cl->sec7_simg).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section7" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section7" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section8":

                $content=HomepageSection8::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'logo'=>'<img src="'.asset('homepage/'.$cl->sec8_slogo).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'content'=>$cl->sec8_scontent,
                  'link'=>$cl->sec8_slink,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section8" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section8" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section9":

                $content=HomepageSection9::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('homepage/'.$cl->sec9_simg).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'content'=>$cl->sec9_scontent,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section9" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section9" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section10":

                $content=HomepageSection10::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset('homepage/'.$cl->sec10_simg).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl->sec10_stitle,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section10" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section10" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section12":

                $content=HomepageSection12::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'content'=>$cl->sec12_scontent,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section12" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section12" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section13":

                $content=HomepageSection13::all();
    
                $count=$content->count();
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'content'=>$cl->sec13_scontent,
                  'link'=>$cl->sec13_slink,
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section13" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section13" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
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
            case "section3":
                $sectionData = HomepageSection3::find($id);
                break;
        
            case "section4":
                $sectionData = HomepageSection4::find($id);
                break;
        
            case "section5":
                $sectionData = HomepageSection5::find($id);
                break;
        
            case "section6":
                $sectionData = HomepageSection6::find($id);
                break;
        
            case "section7":
                $sectionData = HomepageSection7::find($id);
                break;
        
            case "section8":
                $sectionData = HomepageSection8::find($id);
                break;
        
            case "section9":
                $sectionData = HomepageSection9::find($id);
                break;
        
            case "section10":
                $sectionData = HomepageSection10::find($id);
                break;
        
            case "section12":
                $sectionData = HomepageSection12::find($id);
                break;
        
            case "section13":
                $sectionData = HomepageSection13::find($id);
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
                'section3' => ['whatwe_doimg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
                'section4' => ['sec4_text' => 'nullable|string'],
                'section5' => [
                    'sec5_stitle' => 'nullable|string',
                    'sec5_scontent' => 'nullable|string',
                    'sec5_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
                'section6' => [
                    'sec6year' => 'nullable|string',
                    'sec6stitle' => 'nullable|string',
                    'sec6scontent' => 'nullable|string'
                ],
                'section7' => [
                    'sec7_scontent' => 'nullable|string',
                    'sec7_simg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
                'section8' => [
                    'sec8_scontent' => 'nullable|string',
                    'sec8_slink' => 'nullable|string',
                    'sec8_slogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
                'section9' => [
                    'sec9_scontent' => 'nullable|string',
                    'sec9_simg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
                'section10' => [
                    'sec10_stitle' => 'nullable|string',
                    'sec10_scontent' => 'nullable|string',
                    'sec10_simg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
                'section12' => ['sec12_scontent' => 'nullable|string'],
                'section13' => [
                    'sec13_scontent' => 'nullable|string',
                    'sec13_slink' => 'nullable|string',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ],
            ];
    
            // Section mapping
            $sections = [
                'section3' => HomepageSection3::class,
                'section4' => HomepageSection4::class,
                'section5' => HomepageSection5::class,
                'section6' => HomepageSection6::class,
                'section7' => HomepageSection7::class,
                'section8' => HomepageSection8::class,
                'section9' => HomepageSection9::class,
                'section10' => HomepageSection10::class,
                'section12' => HomepageSection12::class,
                'section13' => HomepageSection13::class,
            ];
    
            if (!isset($sections[$sectionType])) {
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
                'section3' => 'whatwe_doimg',
                'section5' => 'sec5_img',
                'section7' => 'sec7_simg',
                'section8' => 'sec8_slogo',
                'section9' => 'sec9_simg',
                'section10' => 'sec10_simg',
                'section13' => 'image',
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
                    if (!empty($oldImage) && File::exists(public_path('homepage/' . $oldImage))) {
                        File::delete(public_path('homepage/' . $oldImage));
                    }
                }catch(Exception $e){

                    dd($e->getMessage());
                }
                
            
                // Move new image
                $image->move(public_path('homepage/'), $imageName);
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
                'section3' => HomepageSection3::class,
                'section4' => HomepageSection4::class,
                'section5' => HomepageSection5::class,
                'section6' => HomepageSection6::class,
                'section7' => HomepageSection7::class,
                'section8' => HomepageSection8::class,
                'section9' => HomepageSection9::class,
                'section10' => HomepageSection10::class,
                'section12' => HomepageSection12::class,
                'section13' => HomepageSection13::class,
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
                if (!empty($oldImage) && File::exists(public_path('homepage/' . $oldImage))) {
                    File::delete(public_path('homepage/' . $oldImage));
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
