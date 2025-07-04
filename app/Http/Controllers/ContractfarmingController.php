<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractfarmingController extends Controller
{
    //
    

    public function addpage(Request $r){

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
      
      try{
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

        //section 3 logo image

        if ($r->hasFile('sec3logo')) {
            if (!empty($model->sec3logo) && File::exists(public_path('homepage/'.$model->sec3logo))) {
                File::delete(public_path('homepage/'.$model->sec3logo));
            }
            $gif = $r->file('sec3logo');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $gifName = $gif->hashName();
            $gifPath = 'homepage/'; // Set the upload directory
            $gif->move(public_path($gifPath), $gifName);
            $model->sec3logo = $gifName; // Save path in DB
            
        }

        //section 3 logo image part ends

        $imagesec3 = $r->file('whatwe_doimg');


if($imagesec3){
    foreach ($imagesec3 as $image) {
        if ($image) {
            $imageName = $image->hashName();
            $image->move(public_path('homepage/'), $imageName);
    
            $service = new HomepageSection3;
            $service->whatwe_doimg = $imageName;
            $service->save();
        }
    }
}


//making a diff sec

        $model->sec4_content = $r->input('sec4_content');
        $model->sec4_tinytitle = $r->input('sec4_tinytitle');
        $model->sec4btn_text = $r->input('sec4btn_text');
        $model->sec4btn_url = $r->input('sec4btn_url');
        
        

        $impactTexts = $r->input('sec4_text');

        if($impactTexts){

            foreach ($impactTexts as $text) {
                if (!empty($text)) {
                    $impact = new HomepageSection4();
                    $impact->sec4_text = $text;
                    $impact->save();
                }
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

        $model->sec6_addtext = $r->input('sec6_addtext');


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


  $sec8_slogo=$r->file('sec8_slogo');

  $sec8_scontent = $r->input('sec8_scontent'); 
$sec8_slink = $r->input('sec8_slink'); // Ensure this is fetched too

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

$model->sec10_title = $r->input('sec10_title');


if ($r->hasFile('sec10_simg')) {
    foreach ($r->file('sec10_simg') as $key => $image) {
        if ($image) {
            $namez = $image->hashName();
            $image->move(public_path('homepage/'), $namez);

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
    $image->move(public_path('homepage/'), $imageName);
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
