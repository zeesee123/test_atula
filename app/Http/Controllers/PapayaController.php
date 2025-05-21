<?php

namespace App\Http\Controllers;
use App\Models\Papaya;

use Illuminate\Http\Request;

class PapayaController extends Controller
{
    //

    public function addpage(Request $r){

        $model = Papaya::first() ?? new Papaya;

        $model->sec1title = $r->sec1title;
        $model->sec1text = $r->sec1text;
        $model->sec1image = $r->sec1image;
    
        $model->sec2title = $r->sec2title;
        $model->sec2addtext = $r->sec2addtext;

        //section 2 images

        $sec2if1=$r->file('sec2imagel');
        $sec2if2=$r->input('sec2titlel');

        $sec2js=[];

        // if($sec2if1 && isValid($sec2if1)){}
        foreach($sec2if1 as $key=>$value){

            if($value && $value->isValid() && !empty($sec2if2[$key])){

               $name=$value->hashName();
               $img=$value;
               $path='images/';
               $img->move(public_path($path),$name);

               $sec2js[]=['image'=>$name,'title'=>$sec2if2[$key]];
            }else{

                return back()->with('error','you missed a field value in Section 2 images ');
            }
        }

        $model->sec2imagez=$sec2js;
    
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

        
        foreach($sec4if1 as $key=>$value){

            if($value && $value->isValid() && !empty($sec4if2[$key]) && !empty($sec4if3[$key])){

               $name=$value->hashName();
               $img=$value;
               $path='images/';
               $img->move(public_path($path),$name);

               $sec4js[]=['image'=>$name,'title'=>$sec4if2[$key],'points'=>$sec4if3[$key]];

            }else{

                return back()->with('error','you missed a field value in Section 4 images ');
            }
        }

        $model->sec4imagez=$sec4js;
    
        $model->sec5title = $r->sec5title;

        //sec 5 images

        $sec5if1=$r->file('sec5textl');
        

        $sec5js=[];

        
        foreach($sec5if1 as $key=>$value){

            if(!empty($value)){

               $sec5js[]=['content'=>$sec5if1[$key]];

            }else{

                return back()->with('error','you missed a field value in Section 5 images ');
            }
        }

        $model->sec5imagez=$sec5js;

    
        $model->sec6title = $r->sec6title;
        $model->sec6image = $r->sec6image;

         //sec 6 images

        $sec6if1=$r->file('sec6titlel');
        $sec6if2=$r->file('sec6pointsl');
        
        

        $sec6js=[];

        
        foreach($sec6if1 as $key=>$value){

            if(!empty($value) && !empty($sec6if2[$key])){

               $sec6js[]=['title'=>$value,'points'=>$sec6if2[$key]];

            }else{

                return back()->with('error','you missed a field value in Section 6 images ');
            }
        }

    

        $model->sec6imagez=$sec6js;

    
        $model->sec7title = $r->sec7title;


        //section 7 images

        $sec7if1=$r->file('sec7imagel');
        $sec7if2=$r->input('sec7titlel');
        $sec7if3=$r->input('sec7pointsl');

        $sec7js=[];

        
        foreach($sec7if1 as $key=>$value){

            if($value && $value->isValid() && !empty($sec7if2[$key]) && !empty($sec7if3[$key])){

               $name=$value->hashName();
               $img=$value;
               $path='images/';
               $img->move(public_path($path),$name);

               $sec7js[]=['image'=>$name,'title'=>$sec7if2[$key],'points'=>$sec7if3[$key]];

            }else{

                return back()->with('error','you missed a field value in Section 7 images ');
            }
        }

        $model->sec7imagez=$sec7js;

    
        $model->sec8title = $r->sec8title;
        $model->sec8image = $r->sec8image;
    
        $model->sec9title = $r->sec9title;

         //section 9 images

        $sec9if1=$r->file('sec9imagel');
        $sec9if2=$r->input('sec9titlel');
        $sec9if3=$r->input('sec9pointsl');

        $sec9js=[];

        
        foreach($sec9if1 as $key=>$value){

            if($value && $value->isValid() && !empty($sec9if2[$key]) && !empty($sec9if3[$key])){

               $name=$value->hashName();
               $img=$value;
               $path='images/';
               $img->move(public_path($path),$name);

               $sec9js[]=['image'=>$name,'title'=>$sec9if2[$key],'points'=>$sec9if3[$key]];

            }else{

                return back()->with('error','you missed a field value in Section 9 images ');
            }
        }

        $model->sec9imagez=$sec9js;

    
        $model->sec10title = $r->sec10title;
        $model->sec10content = $r->sec10content;
        $model->sec10addtext = $r->sec10addtext;
        

         //section 10 images

        $sec10if1=$r->file('sec10imagel');
        $sec10if2=$r->input('sec10titlel');
        $sec10if3=$r->input('sec10pointsl');

        $sec10js=[];

        
        foreach($sec10if1 as $key=>$value){

            if($value && $value->isValid() && !empty($sec10if2[$key]) && !empty($sec10if3[$key])){

               $name=$value->hashName();
               $img=$value;
               $path='images/';
               $img->move(public_path($path),$name);

               $sec10js[]=['image'=>$name,'title'=>$sec10if2[$key],'points'=>$sec10if3[$key]];

            }else{

                return back()->with('error','you missed a field value in Section 10 images ');
            }
        }

        $model->sec10imagez=$sec10js;

    
        $model->sec11title = $r->sec11title;
        $model->sec11image = $r->sec11image;
        $model->sec11text = $r->sec11text;
    
        $model->sec12title = $r->sec12title;
        $model->sec12image = $r->sec12image;
        $model->sec12text = $r->sec12text;
    
        $model->save();
    
        return back()->with('success', 'Papaya section updated successfully!');



    }
}
