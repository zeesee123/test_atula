<?php

namespace App\Http\Controllers;
use App\Models\Papaya;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PapayaController extends Controller
{
    

    public function addpage(Request $r){

        //dd($r);
        $model = Papaya::first() ?? new Papaya;

        $model->sec1title = $r->sec1title;
        $model->sec1text = $r->sec1text;
        // $model->sec1image = $r->sec1image;


        if ($r->hasFile('sec1image')) {
                if (!empty($model->sec1image) && File::exists(public_path('images/'.$model->sec1image))) {
                    File::delete(public_path('images/'.$model->sec1image));
                }
                $file = $r->file('sec1image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $fileName = $file->hashName();
                $filePath = 'images/'; // Set the upload directory
                $file->move(public_path($filePath), $fileName);
                $model->sec1image = $fileName; // Save path in DB
                
            }

            //banner image sections
            //section 3,section 6,section 8,section 11,section 12
    
        $model->sec2title = $r->sec2title;
        $model->sec2addtext = $r->sec2addtext;

        //section 2 images

        $sec2if1=$r->file('sec2imagel');
        $sec2if2=$r->input('sec2titlel');
        $sec2if3=$r->input('sec2pointsl');

        
        $sec2js=[];

        // if($sec2if1 && isValid($sec2if1)){}

        if($sec2if1){
            foreach($sec2if1 as $key=>$value){

                if($value && $value->isValid() && !empty($sec2if2[$key])){
    
                   $name=$value->hashName();
                   $img=$value;
                   $path='images/';
                   $img->move(public_path($path),$name);
    
                   $sec2js[]=['id'=>$key,'image'=>$name,'title'=>$sec2if2[$key],'points'=>$sec2if3[$key]];
                
                }else{
    
                    return back()->with('error','you missed a field value in Section 2 images ');
                }
            }
        }
        

        $existingSec2 = $model->sec2imagez ?? [];
        $combinedSec2 = array_merge($existingSec2, $sec2js);
        $model->sec2imagez=$combinedSec2;
    
        $model->sec3title = $r->sec3title;
        $model->sec3text = $r->sec3text;
        $model->sec3addtext = $r->sec3addtext;
        $model->sec3points = $r->sec3points;


        if ($r->hasFile('sec3image')) {
                if (!empty($model->sec3image) && File::exists(public_path('images/'.$model->sec3image))) {
                    File::delete(public_path('images/'.$model->sec3image));
                }
                $file = $r->file('sec3image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $fileName = $file->hashName();
                $filePath = 'images/'; // Set the upload directory
                $file->move(public_path($filePath), $fileName);
                $model->sec3image = $fileName; // Save path in DB
                
            }
    
        $model->sec4title = $r->sec4title;

        //section 4 images

    

        $sec4if1=$r->file('sec4imagel');
        $sec4if2=$r->input('sec4titlel');
        $sec4if3=$r->input('sec4pointsl');

        $sec4js=[];

        if($sec4if1){

            foreach($sec4if1 as $key=>$value){

                if($value && $value->isValid() && !empty($sec4if2[$key]) && !empty($sec4if3[$key])){
    
                   $name=$value->hashName();
                   $img=$value;
                   $path='images/';
                   $img->move(public_path($path),$name);
    
                   $sec4js[]=['id'=>$key,'image'=>$name,'title'=>$sec4if2[$key],'points'=>$sec4if3[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 4 images ');
                }
            }
        }
       

        $existingSec4 = $model->sec4imagez ?? [];
        $combinedSec4 = array_merge($existingSec4, $sec4js);
        $model->sec4imagez=$combinedSec4;
    
        $model->sec5title = $r->sec5title;



        //sec 5 images


        $sec5if1=$r->input('sec5textl');
        

        $sec5js=[];

        if (is_array($sec5if1) && count(array_filter($sec5if1))){

            foreach($sec5if1 as $key=>$value){

                if(!empty($value)){
    
                   $sec5js[]=['id'=>$key,'content'=>$sec5if1[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 5 images ');
                }
            }
        }

        $existingSec5 = $model->sec5imagez ?? [];
        $combinedSec5 = array_merge($existingSec5, $sec5js);
        $model->sec5imagez=$combinedSec5;


        $model->sec6title = $r->sec6title;
       
        

        if ($r->hasFile('sec6image')) {
                if (!empty($model->sec6image) && File::exists(public_path('images/'.$model->sec6image))) {
                    File::delete(public_path('images/'.$model->sec6image));
                }
                $file = $r->file('sec6image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $fileName = $file->hashName();
                $filePath = 'images/'; // Set the upload directory
                $file->move(public_path($filePath), $fileName);
                $model->sec6image = $fileName; // Save path in DB
                
            }
 
        //  //sec 6 images

      

        $sec6if1=$r->input('sec6titlel');
        $sec6if2=$r->input('sec6pointsl');
     

        $sec6js=[];

        if($sec6if1){

            foreach($sec6if1 as $key=>$value){

                if(!empty($value) && !empty($sec6if2[$key])){
    
                   $sec6js[]=['id'=>$key,'title'=>$value,'points'=>$sec6if2[$key]];
    
                }else{
    
                    return back()->with('error','you missed few fields in section 6');
                }
            }
        }
        

    

        $existingSec6 = $model->sec6imagez ?? [];
        $combinedSec6 = array_merge($existingSec6, $sec6js);
        $model->sec6imagez=$combinedSec6;

    
        $model->sec7title = $r->sec7title;


        //section 7 images

        $sec7if1=$r->file('sec7imagel');
        $sec7if2=$r->input('sec7titlel');
        $sec7if3=$r->input('sec7pointsl');

        $sec7js=[];

        if($sec7if1){

            foreach($sec7if1 as $key=>$value){

                if($value && $value->isValid() && !empty($sec7if2[$key]) && !empty($sec7if3[$key])){
    
                   $name=$value->hashName();
                   $img=$value;
                   $path='images/';
                   $img->move(public_path($path),$name);
    
                   $sec7js[]=['id'=>$key,'image'=>$name,'title'=>$sec7if2[$key],'points'=>$sec7if3[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 7 images ');
                }
            }
    
        }
        
        $existingSec7 = $model->sec7imagez ?? [];
        $combinedSec7 = array_merge($existingSec7, $sec7js);
        $model->sec7imagez=$combinedSec7;

    
        $model->sec8title = $r->sec8title;
        //$model->sec8image = $r->sec8image;

        if ($r->hasFile('sec8image')) {
                if (!empty($model->sec8image) && File::exists(public_path('images/'.$model->sec8image))) {
                    File::delete(public_path('images/'.$model->sec8image));
                }
                $file = $r->file('sec8image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $fileName = $file->hashName();
                $filePath = 'images/'; // Set the upload directory
                $file->move(public_path($filePath), $fileName);
                $model->sec8image = $fileName; // Save path in DB
                
            }
    
        $model->sec9title = $r->sec9title;

         //section 9 images

        $sec9if1=$r->file('sec9imagel');
        $sec9if2=$r->input('sec9titlel');
        $sec9if3=$r->input('sec9pointsl');

        $sec9js=[];

        if($sec9if1){

            foreach($sec9if1 as $key=>$value){

                if($value && $value->isValid() && !empty($sec9if2[$key]) && !empty($sec9if3[$key])){
    
                   $name=$value->hashName();
                   $img=$value;
                   $path='images/';
                   $img->move(public_path($path),$name);
    
                   $sec9js[]=['id'=>$key,'image'=>$name,'title'=>$sec9if2[$key],'points'=>$sec9if3[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 9 images ');
                }
            }
    
        }
        
        $existingSec9 = $model->sec9imagez ?? [];
        $combinedSec9 = array_merge($existingSec9, $sec9js);
        $model->sec9imagez=$combinedSec9;

    
        $model->sec10title = $r->sec10title;
        $model->sec10content = $r->sec10content;
        $model->sec10addtext = $r->sec10addtext;
        

         //section 10 images

        $sec10if1=$r->file('sec10imagel');
        $sec10if2=$r->input('sec10titlel');
        $sec10if3=$r->input('sec10pointsl');

        $sec10js=[];

        if($sec10if1){

            foreach($sec10if1 as $key=>$value){

                if($value && $value->isValid() && !empty($sec10if2[$key]) && !empty($sec10if3[$key])){
    
                   $name=$value->hashName();
                   $img=$value;
                   $path='images/';
                   $img->move(public_path($path),$name);
    
                   $sec10js[]=['id'=>$key,'image'=>$name,'title'=>$sec10if2[$key],'points'=>$sec10if3[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 10 images ');
                }
            }
    
        }
        
        $existingSec10 = $model->sec10imagez ?? [];
        $combinedSec10 = array_merge($existingSec10, $sec10js);
        $model->sec10imagez=$combinedSec10;

    
        $model->sec11title = $r->sec11title;
        //$model->sec11image = $r->sec11image;

        if ($r->hasFile('sec11image')) {
                if (!empty($model->sec11image) && File::exists(public_path('images/'.$model->sec11image))) {
                    File::delete(public_path('images/'.$model->sec11image));
                }
                $file = $r->file('sec11image');
                // $videoName = time() . '_' . $video->getClientOriginalName();
                $fileName = $file->hashName();
                $filePath = 'images/'; // Set the upload directory
                $file->move(public_path($filePath), $fileName);
                $model->sec11image = $fileName; // Save path in DB
                
            }

        $model->sec11text = $r->sec11text;
    
        $model->sec12title = $r->sec12title;
       
        $model->sec12text = $r->sec12text;

        if ($r->hasFile('sec12image')) {
            if (!empty($model->sec12image) && File::exists(public_path('images/'.$model->sec12image))) {
                File::delete(public_path('images/'.$model->sec12image));
            }
            $file = $r->file('sec12image');
            // $videoName = time() . '_' . $video->getClientOriginalName();
            $fileName = $file->hashName();
            $filePath = 'images/'; // Set the upload directory
            $file->move(public_path($filePath), $fileName);
            $model->sec12image = $fileName; // Save path in DB
            
        }

        


        $model->save();
    
        return back()->with('success', 'Papaya section updated successfully!');



    }

//     public function addpage(Request $r) {
//   $sec5if1 = $r->input('sec5textl');

// $sec5js = [];

// if ($sec5if1) {
//     foreach ($sec5if1 as $key => $value) {
//         if (!empty($value)) {
//             $sec5js[] = ['id' => $key, 'content' => $value];
//         } else {
//             return back()->with('error', 'Missing content in Section 5');
//         }
//     }
// }

// $model = Papaya::first() ?? new Papaya;
// $model->sec5imagez = $sec5js;
// $model->save();

// dd('SAVED FINAL:', $model->fresh()->sec5imagez);

// }



    public function loadtable($section){

        

        $data=[];
        $c=1;
        $content=null;
        $error=false;

        switch($section){

            case "section2":

                $content=Papaya::first()->sec2imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  
                  'title'=>$cl['title'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section2" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;
    
           
            case "section4":

                $content=Papaya::first()->sec4imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                $count=count($content);
                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'image'=>'<img src="'.asset_env('images/'.$cl['image']).'" style="width: 100px; height: auto; object-fit: contain;">',
                  'title'=>$cl['title'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section4" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section5":

                   $content=Papaya::first()->sec5imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'text'=>$cl['content'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section2" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;


            case "section6":

                $content=Papaya::first()->sec6imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl['title'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section2" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }
            break;

            case "section7":

                $content=Papaya::first()->sec7imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl['title'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section2" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }
            break;

            case "section9":

                $content=Papaya::first()->sec9imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl['title'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section2" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;
    
    
            }

            break;

            case "section10":

                $content=Papaya::first()->sec10imagez;
    
                

                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
    
            
            foreach($content as $cl){
    
              $serv_ind=[
                  'id'=>$c++,
                  'title'=>$cl['title'],
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.($cl['id']??'').'" data-type="section2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section2" class="btn btn-danger mx-1 eradicator" data-id="'.($cl['id']??'').'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
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
            case "section2":
                
                $items=Papaya::first()->sec2imagez;
                if (is_array($items)) {
                    foreach ($items as $entry) {
                        if (isset($entry['id']) && $entry['id'] == $id) {
                            $sectionData=$entry;
                            break;
                        }
                    }
                }
                
                break;
        
            case "section4":
                $items=Papaya::first()->sec4imagez;
                if (is_array($items)) {
                    foreach ($items as $entry) {
                        if (isset($entry['id']) && $entry['id'] == $id) {
                            $sectionData=$entry;
                            break;
                        }
                    }
                }
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

public function update_resource($sectionType, Request $request)
{
    try {

        // dd($request);
        // Validate ID
        $validatedRequest = $request->validate([
            'id' => 'required|integer|min:0',
        ]);

        $id = $validatedRequest['i d'];

        // Validation rules for each section
        $validationRules = [
            'section2' => ['image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 'title' => 'nullable|string', 'points' => 'nullable|string'],
            'section4' => ['image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 'title' => 'nullable|string', 'points' => 'nullable|string'],
            'section5' => ['sec5_stitle' => 'nullable|string', 'sec5_scontent' => 'nullable|string', 'sec5_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            'section6' => ['sec6year' => 'nullable|string', 'sec6stitle' => 'nullable|string', 'sec6scontent' => 'nullable|string'],
            'section7' => ['sec7_scontent' => 'nullable|string', 'sec7_simg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            // 'section8' => ['sec8_scontent' => 'nullable|string', 'sec8_slink' => 'nullable|string', 'sec8_slogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            // 'section9' => ['sec9_scontent' => 'nullable|string', 'sec9_simg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            // 'section10' => ['sec10_stitle' => 'nullable|string', 'sec10_scontent' => 'nullable|string', 'sec10_simg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            // 'section12' => ['sec12_scontent' => 'nullable|string'],
            // 'section13' => ['sec13_scontent' => 'nullable|string', 'sec13_slink' => 'nullable|string', 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
        ];

        // Image fields for each section
        $imageFields = [
            'section2' => 'image',
            'section4' => 'image',
            
        ];

        $validatedData = $request->validate($validationRules[$sectionType] ?? []);

        // Get Papaya model
        $papaya = Papaya::first();

        if (!$papaya) {
            return response()->json(['error' => 'Papaya entry not found'], 404);
        }

        // JSON fields in DB
        $jsonFieldMap = [
            'section2' => 'sec2imagez',
            'section4' => 'sec4imagez',
            'section5' => 'sec5imagez',
            'section6' => 'sec6imagez',
            'section7' => 'sec7imagez',
        ];

        $jsonField = $jsonFieldMap[$sectionType] ?? null;

        if (!$jsonField) {
            return response()->json(['error' => 'Invalid section type'], 400);
        }

        $data = $papaya->$jsonField ?? [];

        // Find item by ID
        $updated = false;
        foreach ($data as &$item) {
        
            
            if ((int) $item['id'] === (int)$id) {

                // dump('item before update');
                // dump($item);
                // dd($item);
                // Handle image
                $imageField = $imageFields[$sectionType] ?? null;
                if ($imageField && $request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = $image->hashName();

                    // Delete old image
                    if (!empty($item[$imageField]) && File::exists(public_path('images/' . $item[$imageField]))) {
                        File::delete(public_path('images/' . $item[$imageField]));
                    }

                    $image->move(public_path('images/'), $imageName);
                    $item[$imageField] = $imageName;
                }

                // Update other fields
                foreach ($validatedData as $key => $value) {
                    
                    if ($key !== 'image') {
                        
                        $item[$key] = $value;
                    }
                }

                // dump('item after update');
                // dump($item);

                $updated = true;
                break;
            }
        }

        if (!$updated) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        // Save updated array
        $papaya->$jsonField = $data;
        // dump('this is the value that i updated just now');
        // dump($papaya->$jsonField);
        $papaya->save();

        return response()->json(['message' => 'Item updated successfully', 'status' => 'success'], 200);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
