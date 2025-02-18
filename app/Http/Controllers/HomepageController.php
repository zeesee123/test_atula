<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //

    public function add_homepage(Request $r){

        // dd($r);

        $model=new Homepage();
        $model->title=$r->title;
        $model->save();

        return back()->with('success','message added');


    }
}
