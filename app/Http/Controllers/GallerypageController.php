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

   




}
