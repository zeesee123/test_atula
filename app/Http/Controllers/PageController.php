<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Papaya;
use App\Models\Homepage;
use App\Models\Aboutpage;
use App\Models\Careerpage;
use App\Models\Gallerypage;
use App\Models\Aboutpagetwo;
use App\Models\Businesspage;
use Illuminate\Http\Request;
use App\Models\GalleryImages;
use App\Models\GalleryCategory;
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

      return view('pages.aboutpage',compact('section'));
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

    public function trainingNdev(){

      $section=Ecoinitiativepage::first()??null;     
      
      //   dd($section);
  
        return view('pages.trainingdev',compact('section'));

    }

    public function contractfarming(){

      $section=Ecoinitiativepage::first()??null;     
      
      //   dd($section);
  
        return view('pages.contractfarming',compact('section'));
    }

    public function bamboo(){

      $section=Ecoinitiativepage::first()??null;     
      $title='Bamboo';
      //   dd($section);
  
        return view('pages.timber',compact('section','title'));
    }

    public function fruitsNveggies(){

      $section=Ecoinitiativepage::first()??null;     
      
      //   dd($section);
  
        return view('pages.fruitsnveggies',compact('section'));
    }

    public function papaya(){

      $section=Papaya::first()??null;     
      
      //   dd($section);
  
        return view('pages.papaya',compact('section'));

    }


    public function listusers(){

      return view('pages.users');


    }

    public function addblog(){

      return view('pages.blogs.add_blog');
    }

  public function editblog($id)
{
    // Fetch the blog by ID
    $blog = Blog::findOrFail($id);

    // dd($blog);

    // Pass it to the view
    return view('pages.blogs.edit_blogs', compact('blog'));
}


    public function viewblogs(){

      return view('pages.blogs.view_blogs');
    }

    public function eventpage(){

      $model=Event::first()??null;

      return view('pages.events',compact('model'));
    }


    public function gallerypage(){

      $model=Gallerypage::first()??null;

      return view('pages.gallery',compact('model'));

    }


    public function gallerypage_category(){

      // $model=GalleryCategory::all();

      return view('pages.gallery_categories');
    }

    public function gallery_images(){

      $categories=GalleryCategory::all();
      

      return view('pages.gallery_images',compact('categories'));
    }

    public function careerpage(){

    $model=Careerpage::first()??null;
      

      return view('pages.careerpage',compact('model'));
    }

    public function add_jobs(){
      return view('pages.add_job');
    
    }

    public function view_galleryimages(){

      $categories=GalleryCategory::all();
      
      return view('pages.view_galleryimages',compact('categories'));
    }

    public function edit_galleryimage($id){

       // Fetch the image by ID
    $image = GalleryImages::findOrFail($id);

    // Fetch all categories for the dropdown in case you want to change category
    $categories = GalleryCategory::all();

    //i will also have to check whether the category is video or not 
//dd($image);
    // Return edit view
    return view('pages.edit_galleryimage', compact('image', 'categories'));
    }

    public function view_jobs(){

      return view('pages.view_jobs');
    }

    public function edit_job($id){
      $job = Job::findOrFail($id); // fetch the job by id
        return view('admin.careers.edit', ['model' => $job]);
    }
}
