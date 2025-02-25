<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index(){

      $section=Homepage::first()??null;     
      
    //   dd($section);

      return view('pages.homepage',compact('section'));
    }
}
