<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Aboutpage;
use App\Models\Aboutpagetwo;
use App\Models\Businesspage;
use Illuminate\Http\Request;
use App\Models\Agroforestrypage;
use App\Models\Ecoinitiativepage;

class PageController extends Controller
{
    //

    public function index(){

      $section=Homepage::first()??null;     
      
    //   dd($section);

      return view('pages.homepage',compact('section'));
    }

    public function about(){

      $section=Aboutpage::first()??null;     
      
    //   dd($section);

      return view('pages.homepage',compact('section'));
    }

    public function about_two(){

      $section=Aboutpagetwo::first()??null;     
      
    //   dd($section);

      return view('pages.anmAgriventure',compact('section'));
    }

    public function agroforestry(){

      $section=Agroforestrypage::first()??null;     
      
    //   dd($section);

      return view('pages.agroforestry',compact('section'));
    }

    public function business(){

      $section=Businesspage::first()??null;     
      
    //   dd($section);

      return view('pages.businesspage',compact('section'));
    }

    public function eco_initiative(){

      $section=Ecoinitiativepage::first()??null;     
      
    //   dd($section);

      return view('pages.ecoinitiative',compact('section'));
    }
}
