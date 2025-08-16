<?php

namespace App\Http\Controllers;

use App\Models\Gallerypage;
use Illuminate\Http\Request;

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




}
