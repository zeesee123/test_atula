<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventpageController extends Controller
{
    //

    public function event(){
        try {
            $validated = $request->validate([
                'banner_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'title'               => 'required|string|max:255',
                'google_calendar_link'=> 'nullable|url',
            ]);
    
            // Get the existing Event or create a new one
            $event = Event::first() ?? new Event();
    
            // Handle image upload
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $imageName = $image->hashName();
                $image->move(public_path('images'), $imageName);
                $event->banner_image = $imageName;
            }
    
            // Update other fields
            $event->title = $validated['title'];
            $event->google_calendar_link = $validated['google_calendar_link'] ?? null;
    
            $event->save();
    
            return redirect()->back()->with('success', 'Event saved successfully!');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
