<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //

    public function addteam(Request $request)
{
    if ($request->isMethod('get')) {
        return view('pages.team.add_team');
    }

    try {
        $validated = $request->validate([
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'linkedin'=> 'nullable|string|max:255',
            'quote'   => 'nullable|string|max:255',
            'content' => 'nullable'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imageName = $img->hashName();
            $img->move(public_path('team'), $imageName);
        }

        TeamMember::create([
            'name'      => $validated['name'],
            'title'     => $validated['title'],
            'linkedin'  => $validated['linkedin'] ?? null,
            'quote'     => $validated['quote'] ?? null,
            'image'     => $imageName,
            'content'   => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Team member created successfully!');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}


public function editteam(Request $request, $id)
{
    $team = TeamMember::findOrFail($id);

    if ($request->isMethod('get')) {
        return view('pages.team.edit_team', compact('team'));
    }

    try {
        $validated = $request->validate([
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'linkedin'=> 'nullable|string|max:255',
            'quote'   => 'nullable|string|max:255',
            'content' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            if ($team->image && file_exists(public_path('team/' . $team->image))) {
                unlink(public_path('team/' . $team->image));
            }

            $img = $request->file('image');
            $imageName = $img->hashName();
            $img->move(public_path('team'), $imageName);
            $team->image = $imageName;
        }

        $team->name     = $validated['name'];
        $team->title    = $validated['title'];
        $team->linkedin = $validated['linkedin'] ?? null;
        $team->quote    = $validated['quote'] ?? null;
        $team->content  = $validated['content'];
        $team->save();

        return redirect()->back()->with('success', 'Team member updated successfully!');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}

public function loadteamtable()
{
    $data = [];
    $count = 1;

    $teams = TeamMember::orderBy('id', 'asc')->get();

    foreach ($teams as $t) {
        $data[] = [
            'id'    => $count++,
            'name'  => $t->name,
            'title' => $t->title,
            'image' => '<img src="'.asset_env('team/'.$t->image).'" width="80">',
            'actions' => '
                <a href="/admin/edit_team/'.$t->id.'" class="btn btn-success mx-1">
                    <i class="bi bi-pencil-square"></i> EDIT
                </a>

                <button type="button" class="btn btn-danger mx-1 eradicator"
                        data-id="'.$t->id.'" 
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-trash3-fill"></i> DELETE
                </button>
            '
        ];
    }

    return response()->json(['data' => $data]);
}


public function delete_team($id)
{
    $team = TeamMember::findOrFail($id);

    if ($team->image && file_exists(public_path('team/'.$team->image))) {
        unlink(public_path('team/'.$team->image));
    }

    $team->delete();

    return response()->json([
        'message' => 'Team member deleted successfully!'
    ]);
}



}
