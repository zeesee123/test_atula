<?php

namespace App\Http\Controllers;

use App\Models\Gallerypage;
use Illuminate\Http\Request;
use App\Models\GalleryImages;
use App\Models\GalleryCategory;

class GallerypageController extends Controller
{
    //

    public function store(Request $request)
{
    $request->validate([
        'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'title'        => 'required|string|max:255',
        'content'      => 'nullable|string',
    ]);

    // Fetch existing row or create new one
    $gallery = Gallerypage::first() ?? new Gallerypage();

    // Handle image upload
    if ($request->hasFile('banner_image')) {
        // Delete old image if exists
        if ($gallery->banner_image && file_exists(public_path('images/' . $gallery->banner_image))) {
            unlink(public_path('images/' . $gallery->banner_image));
        }

        // Save new image with hashName()
        $imageName = $request->file('banner_image')->hashName();
        $request->file('banner_image')->move(public_path('images'), $imageName);

        $gallery->banner_image = $imageName;
    }

    // Save other fields
    $gallery->title   = $request->title;
    $gallery->content = $request->content;
    $gallery->save();

    return redirect()->back()->with('success', 'Gallery saved successfully!');
}

public function gallerypage_category(Request $request){

    

    $request->validate([
        'category' => 'required|string|unique:gallery_categories,category|max:255',
        'category_text' => 'nullable|string',
    ]);

    // Create new category
    $category = new GalleryCategory();
    $category->category = $request->category;
    $category->category_text = $request->category_text;
    $category->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Gallery category added successfully.');
}


public function gallery_images(Request $request)
    {
            //  dd($request);       
        try {
            $categoryId = $request->input('category_id');
    
            // Get the category
            $category = GalleryCategory::findOrFail($categoryId);
            $isVideo = strtolower($category->category) === 'video';
    
            // Dynamic validation
            $rules = [
                'category_id' => 'required|exists:gallery_categories,id',
            ];
    
            if ($isVideo) {
                $rules['video_thumbnails.*'] = 'required|mimes:jpg,jpeg,png,svg,webp,gif|max:2048';
                $rules['video_urls.*'] = 'required|url';
            } else {
                $rules['images.*'] = 'required|mimes:jpg,jpeg,png,svg,webp,gif|max:2048';
            }
    
            $request->validate($rules);
    
            if ($isVideo) {
                $thumbnails = $request->file('video_thumbnails', []);
                $urls = $request->input('video_urls', []);
    
                foreach ($thumbnails as $index => $thumbnail) {
                    $imageName = $thumbnail->hashName();
                    $thumbnail->move(public_path('images'), $imageName);
    
                    GalleryImages::create([
                        'gallery_category_id' => $categoryId,
                        'image_name'          => $imageName,
                        'url'                 => $urls[$index] ?? null,
                    ]);
                }
            } else {
                foreach ($request->file('images') as $image) {
                    $imageName = $image->hashName();
                    $image->move(public_path('images'), $imageName);
    
                    GalleryImages::create([
                        'gallery_category_id' => $categoryId,
                        'image_name'          => $imageName,
                        'url'                 => null,
                    ]);
                }
            }
    
            return redirect()->back()->with('success', 'Gallery items added successfully!');
    
        }
     catch (\Illuminate\Validation\ValidationException $e) {
        // If validation fails
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Any other error
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }


    public function loadtable_galleryimages($category_id){

        $images = GalleryImages::where('gallery_category_id', $category_id)->get();
        $data = [];
        $c = 1;
    
        foreach ($images as $image) {
            $data[] = [
                'id' => $c++,
                'image' => '<img src="'.asset_env('images/'.$image->image_name).'" style="width: 100px; height:auto; object-fit:contain;">',
                'actions' => '
                    <a href="/admin/edit_galleryimage/'.$image->id.'" class="btn btn-success btn-sm mx-1">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <button class="btn btn-danger btn-sm delete-btn mx-1" data-id="'.$image->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="bi bi-trash3-fill"></i> Delete
                    </button>'
            ];
        }
    
        return response()->json(['data' => $data]);
    }

    public function loadtable_gallerycategories(){

        return view('pages.view_gallerycategories');
    }


    // public function delete_image(){}

    public function delete_image($id) {
        $image = GalleryImages::findOrFail($id);
        $categoryId = $image->gallery_category_id;
    
        if ($image->image_name && file_exists(public_path('images/' . $image->image_name))) {
            unlink(public_path('images/' . $image->image_name));
        }
    
        $image->delete();
    
        return response()->json([
            'message' => 'Image deleted successfully!',
            'category_id' => $categoryId
        ]);
    }

    // public function delete_category(){}

    public function update_image(Request $request,$id){

        $image = GalleryImages::findOrFail($id);
        $category = GalleryCategory::findOrFail($request->category_id);
    
        // Validation rules
        $rules = [
            'category_id' => 'required|exists:gallery_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'url' => strtolower($category->category) === 'video' ? 'required|url' : 'nullable|string',
        ];
    
        $request->validate($rules);
    
        // Image must exist either already or uploaded
        if (!$image->image_name && !$request->hasFile('image')) {
            return back()->withErrors(['image' => 'Image is required for this gallery item.']);
        }
    
        // Handle video category
        if (strtolower($category->category) === 'video') {
            $image->url = $request->url;
        } else {
            $image->url = null;
        }
    
        // Handle image upload and delete old image
        if ($request->hasFile('image')) {
            if ($image->image_name && file_exists(public_path('images/' . $image->image_name))) {
                unlink(public_path('images/' . $image->image_name));
            }
    
            $file = $request->file('image');
            $imageName = $file->hashName();
            $file->move(public_path('images'), $imageName);
            $image->image_name = $imageName;
        }
    
        $image->gallery_category_id = $request->category_id;
        $image->save();
    
        return redirect()->back()->with('success', 'Gallery updated successfully!');
    }

    // public function edit_category(){}

   




}
