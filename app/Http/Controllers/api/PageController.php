<?php

namespace App\Http\Controllers\api;

use App\Models\Job;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Homepage;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use App\Models\HomepageSection3;
use App\Models\HomepageSection4;
use App\Models\HomepageSection5;
use App\Models\HomepageSection6;
use App\Models\HomepageSection7;
use App\Models\HomepageSection8;
use App\Models\HomepageSection9;
use App\Models\HomepageSection10;
use App\Models\HomepageSection12;
use App\Models\HomepageSection13;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //test comment

        $model=Homepage::first()??null;
        $section3=HomepageSection3::all()??null;
        $section4=HomepageSection4::all()??null;
        $section5=HomepageSection5::all()??null;
        $section6=HomepageSection6::all()??null;
        $section7=HomepageSection7::all()??null;
        $section8=HomepageSection8::all()??null;
        $section9=HomepageSection9::all()??null;
        $section10=HomepageSection10::all()??null;
        $section12=HomepageSection12::all()??null;
        $section13=HomepageSection13::all()??null;

        // $exists=null;
        
        // if($model){

        //     $exists=true;

        // }else{

        //     $exists=false;
        // }

        // return response()->json(['data'=>$model,'exists'=>$exists]);

        return response()->json(['data'=> $model,'section3'=>$section3,
            'section4'=>$section4,
            'section5'=>$section5,
            'section6'=>$section6,
            'section7'=>$section7,
            'section8'=>$section8,
            'section9'=>$section9,
            'section10'=>$section10,
            'section12'=>$section12,
            'section13'=>$section13,
           
        ]);

        // return response()->json(['data'=>$model,'section3'=>$section3]);
    }

   public function blogs()
{
    // Fetch all blogs
    $blogs = Blog::all();

    // Return JSON response
    return response()->json([
        'success' => true,
        'data' => $blogs
    ], 200);
}




public function blogBySlug($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [$blog]  // return as array for consistency with blogs list
        ]);
    }


    public function eventpage(){

        $event = Event::first();

        return response()->json([
            'banner' => $event->banner_image,
            'heading' => $event ? $event->title : 'Upcoming Events',
            'subtitle' => $event ? 'Don’t miss out!' : '',
            'title' => $event ? $event->title : 'Events',
            'opacity' => 'opacity-50',
            'google_calendar_link' => $event ? $event->google_calendar_link : 'https://calendar.google.com/calendar/embed?src=info%40akv.org.in&ctz=Asia%2FKolkata'
        ]);
    }


    public function gallerypage(){

        $model=Gallerypage::first();

        return response()->json(['banner']);

        
    }


    public function jobs()
    {
        try {
            $jobs = Job::orderBy('created_at', 'desc')->get(); // latest first
    
            return response()->json([
                'success' => true,
                'data' => $jobs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function gallery(){

        // Fetch all categories with their images, ordered by ID
        $categories = GalleryCategory::with(['images' => function ($q) {
            $q->orderBy('id', 'asc');
        }])->orderBy('id')->get();

        // Transform data to match galleryData.json structure
        $data = $categories->map(function ($category) {
            return [
                'title'       => $category->category,
                'description' => $category->category_text ?: null,
                'images'      => $category->images->map(function ($img) {
                    return [
                        'id'          => $img->id,
                        'src'         => 'admin/images/' . $img->image_name,
                        'alt'         => $img->image_name,
                        'youtubeLink' => $img->url ?: null,
                    ];
                }),
            ];
        });

        return response()->json($data);
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
