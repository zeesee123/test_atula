<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Careerpage;
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

    public function add_job(Request $r){

        try {
            // Validate the request
            $r->validate([
                'profile' => 'required|string|max:255',
                'positions' => 'nullable|string|max:50',
                'experience' => 'nullable|string|max:50',
                'location' => 'nullable|string',
                'eligibility' => 'nullable|string',
                'summary' => 'nullable|string',
                'requirements' => 'nullable|string',
            ]);
    
            // Create the job
            Job::create([
                'profile' => $r->input('profile'),
                'positions' => $r->input('positions'),
                'experience' => $r->input('experience'),
                'location' => $r->input('location'),
                'eligibility' => $r->input('eligibility'),
                'summary' => $r->input('summary'),
                'requirements' => $r->input('requirements'),
            ]);
    
            // Redirect back with success
            return redirect()->back()->with('success', 'Job added successfully!');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Any other error
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }


    }


    public function loadtable()
{
    $data = [];
    $counter = 1;

    // Fetch all careers
    $careers = Job::all(); // make sure you have a Career model

    foreach ($careers as $career) {
        $data[] = [
            'id' => $counter++,            // serial number
            'title' => $career->profile,     // job title
            'actions' => '
                <a href="'.url('/admin/careers/edit/'.$career->id).'" class="btn btn-success mx-1">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <button type="button" class="btn btn-danger mx-1 eradicator" data-id="'.$career->id.'">
                    <i class="bi bi-trash3-fill"></i> Delete
                </button>'
        ];
    }

    return response()->json(['data' => $data]);
}


public function update(Request $request,$id)
    {
        $request->validate([
            'profile' => 'required|string|max:255',
            'positions' => 'nullable|string|max:50',
            'experience' => 'nullable|string|max:100',
            'location' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'summary' => 'nullable|string',
            'requirements' => 'nullable|string',
        ]);

        $job = Job::findOrFail($id); // make sure id is sent in hidden input

        $job->profile = $request->profile;
        $job->positions = $request->positions;
        $job->experience = $request->experience;
        $job->location = $request->location;
        $job->eligibility = $request->eligibility;
        $job->summary = $request->summary;
        $job->requirements = $request->requirements;

        $job->save();

        return redirect()->back()->with('success', 'Job updated successfully!');
    }


    public function delete($id)
{
    try {
        $job = Job::findOrFail($id);  // find job or fail
        $job->delete();               // delete it

        return response()->json([
            'message' => 'Job deleted successfully!'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to delete job!',
            'error' => $e->getMessage()
        ], 500);
    }
}

}

