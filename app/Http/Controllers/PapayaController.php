<?php

namespace App\Http\Controllers;
use App\Models\Papaya;

use Illuminate\Http\Request;

class PapayaController extends Controller
{
    //

    public function addpage(Request $r){

        // dd($r);
        $model = Papaya::first() ?? new Papaya;

        $model->sec1title = $r->sec1title;
        $model->sec1text = $r->sec1text;
        $model->sec1image = $r->sec1image;
    
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

        $sec5if1=$r->file('sec5textl');
        

        $sec5js=[];

        if($sec5if1){

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
        $model->sec6image = $r->sec6image;
 
         //sec 6 images

        $sec6if1=$r->file('sec6titlel');
        $sec6if2=$r->file('sec6pointsl');
        
        

        $sec6js=[];

        if($sec6if1){

            foreach($sec6if1 as $key=>$value){

                if(!empty($value) && !empty($sec6if2[$key])){
    
                   $sec6js[]=['id'=>$key,'title'=>$value,'points'=>$sec6if2[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 6 images ');
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
    
                   $sec7js[]=['id'=>$key,'id'=>$key,'image'=>$name,'title'=>$sec7if2[$key],'points'=>$sec7if3[$key]];
    
                }else{
    
                    return back()->with('error','you missed a field value in Section 7 images ');
                }
            }
    
        }
        
        $existingSec7 = $model->sec7imagez ?? [];
        $combinedSec7 = array_merge($existingSec7, $sec7js);
        $model->sec7imagez=$combinedSec7;

    
        $model->sec8title = $r->sec8title;
        $model->sec8image = $r->sec8image;
    
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
        $model->sec11image = $r->sec11image;
        $model->sec11text = $r->sec11text;
    
        $model->sec12title = $r->sec12title;
        $model->sec12image = $r->sec12image;
        $model->sec12text = $r->sec12text;
    
        $model->save();
    
        return back()->with('success', 'Papaya section updated successfully!');



    }


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

            case "section9":

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

            case "section10":

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
}
