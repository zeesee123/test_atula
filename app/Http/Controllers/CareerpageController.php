<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerpageController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'banner_image' => 'nullable|mimes:jpg,jpeg,png,svg,webp,gif|max:2048',
                'title'        => 'required|string|max:255',
                'content'      => 'nullable|string',
            ]);
    
            // Fetch the first row or create a new one
            $careerPage = Careerpage::first() ?? new Careerpage();
    
            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                // Delete old image if it exists
                if ($careerPage->banner_image && file_exists(public_path('images/' . $careerPage->banner_image))) {
                    unlink(public_path('images/' . $careerPage->banner_image));
                }
    
                // Save new image with a unique hash name
                $imageName = $request->file('banner_image')->hashName();
                $request->file('banner_image')->move(public_path('images'), $imageName);
    
                $careerPage->banner_image = $imageName;
            }
    
            // Save other fields
            $careerPage->title   = $request->input('title');
            $careerPage->content = $request->input('content');
            $careerPage->save();
    
            return redirect()->back()->with('success', 'Career page saved successfully!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Any other errors
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}

