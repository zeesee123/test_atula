<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use App\Models\Testpage;
use Illuminate\Support\Str; 

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $home=Homepage::first();
        
        return response()->json(['status'=>'success','content'=>$home]);

    }

    


    public function submit_pg(Request $r){

        $model=Testpage::first()??new Testpage;
        
        $model->field1=$r->field1;
        $model->field2=$r->field2;
        $model->field3=$r->field3;
        $model->field4=$r->field4;

        $section1=$r->file('whatwe_doimg');
        $section2=$r->file('whatwe_doimg2');

        $section1_arr=[];


        
        foreach($section1 as $key=>$value){

            if($value && $value->isValid()){


                $section1_arr[]=['id'=>Str::uuid(),'name'=>$value->hashName()];

            }
        }

        if(!empty($section1_arr)){
//if this one is an array then work with this 
            $existing_section=is_array($model->section1)?$model->section1:(json_decode($model->section1,true)??[]);
            
            $model->section1=array_merge($existing_section,$section1_arr);

        }

        // $model->section1=$section1_arr;

        $section2_arr=[];

        foreach($section2 as $key=>$value){

            if($value && $value->isValid()){


                $section2_arr[]=['id'=>Str::uuid(),'name'=>$value->hashName()];

            }

            
        }

        
        if(!empty($section2_arr)){
//if this one is an array then work with this 
            $existing_section=is_array($model->section2)?$model->section2:(json_decode($model->section2,true)??[]);
            
            $model->section2=array_merge($existing_section,$section2_arr);

        }
        
    

        $model->save();


        return back()->with('success','test did work right');
        //now comes the part for making the json field 

        
    }


    public function loadtable(){

        //   $content=Testpage::latest()->first()->section1;
        $content=Testpage::first()->section1;
    


                if(is_string($content)){
                    $content=json_decode($content);
                }

                                $count=count($content);

                $data=[];
    
                $c=1;
            
            foreach($content as $cl){
    
    //           $serv_ind=[
    //               'id'=>$c++,
    //               'image'=>'<img src="'.asset_env('homepage/'.$cl->whatwe_doimg).'" style="width: 100px; height: auto; object-fit: contain;">',
    //               'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl->id.'" data-type="section3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    // EDIT</button><button type="button" data-type="section3" class="btn btn-danger mx-1 eradicator" data-id="'.$cl->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    // DELETE</button>'
    //           ];

      $serv_ind=[
                  'id'=>$c++,
                  'image'=>$cl['name']??'nah',
                  'actions'=>'<button type="button" class="btn btn-success editer" data-id="'.$cl['id'].'" data-type="section3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square mx-1"></i>
    EDIT</button><button type="button" data-type="section3" class="btn btn-danger mx-1 eradicator" data-id="'.$cl['id'].'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3-fill mx-1"></i>
    DELETE</button>'
              ];
    
              $data[]=$serv_ind;

    };


return response()->json(['data'=>$data]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
