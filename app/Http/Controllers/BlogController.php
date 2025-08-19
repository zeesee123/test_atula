<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
 public function addblog(Request $request)
{
    try {
        $validated = $request->validate([
            'blog_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title'            => 'required|string|max:255|unique:blogs,title',
            'date'             => 'nullable|date',
            'content'          => 'required|string',
            'slug'             => 'nullable|string|max:255|unique:blogs,slug',
            'meta_title'       => 'nullable|string|max:255|unique:blogs,meta_title',
            'meta_description' => 'nullable|string',
            'schema_markup'    => 'nullable|string',
            'summary'=>'nullable|string'
        ]);

        $imageName = null;
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $imageName = $image->hashName();
            $image->move(public_path('blogs'), $imageName);
        }

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        Blog::create([
            'blog_image'       => $imageName,
            'title'            => $validated['title'],
            'date'             => $validated['date'] ?? null,
            'publish'          => $request->has('publish') ? 1 : 0,
            'content'          => $validated['content'],
            'slug'             => $slug,
            'meta_title'       => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'schema_markup'    => $validated['schema_markup'] ?? null,
             'summary'=>$request->summary??null
        ]);

        return redirect()->back()->with('success', 'Blog created successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->with('error', $e->getMessage());
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}





public function editblog(Request $request, $id)
{
    try {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'blog_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title'            => 'required|string|max:255',
            'date'             => 'nullable|date',
            'content'          => 'required|string',
            'slug'             => 'nullable|string|max:255',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'schema_markup'    => 'nullable|string',
            'summary'=>'nullable|string'
        ]);

        if ($request->hasFile('blog_image')) {
            if ($blog->blog_image && file_exists(public_path('blogs/' . $blog->blog_image))) {
                unlink(public_path('blogs/' . $blog->blog_image));
            }

            $image = $request->file('blog_image');
            $imageName = $image->hashName();
            $image->move(public_path('blogs'), $imageName);
            $blog->blog_image = $imageName;
        }

        $blog->title = $validated['title'];
        $blog->date = $validated['date'] ?? null;
        $blog->publish = $request->has('publish') ? 1 : 0;
        $blog->content = $validated['content'];
        $blog->slug = $validated['slug'] ?? Str::slug($validated['title']);
        $blog->meta_title = $validated['meta_title'] ?? null;
        $blog->meta_description = $validated['meta_description'] ?? null;
        $blog->schema_markup = $validated['schema_markup'] ?? null;
        $blog->summary=$request->summary;

        $blog->save();

        return redirect()->back()->with('success', 'Blog updated successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->with('error', $e->getMessage());
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}


    public function loadtable()
{
    $data = [];
    $c = 1;

    $blogs = Blog::all();

    foreach ($blogs as $blog) {
        $data[] = [
            'id'        => $c++,
            'blog_name' => $blog->title,
            'image'     => '<img src="'.asset_env('blogs/'.$blog->blog_image).'" style="width: 100px; height: auto; object-fit: contain;">',
            'actions'   => '
        <a href="#" target="_blank" class="btn btn-primary mx-1">
          <i class="bi bi-eye-fill mx-1"></i> Preview
        </a>
          <a href="/admin/edit_blog/'.$blog->id.'" target="_blank" class="btn btn-success mx-1">
          <i class="bi bi-pencil-square mx-1"></i> EDIT
        </a>

        
          
                            <button type="button" class="btn btn-danger mx-1 eradicator" data-id="'.$blog->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-trash3-fill mx-1"></i> DELETE
                            </button>'
        ];
    }

    return response()->json(['data' => $data]);
}


public function delete_blog($id)
{
    $blog = Blog::findOrFail($id);

    // Delete image from server
    if ($blog->blog_image && file_exists(public_path('blogs/'.$blog->blog_image))) {
        unlink(public_path('blogs/'.$blog->blog_image));
    }

    $blog->delete();

    return response()->json([
        'message' => 'Blog deleted successfully!',
        'category_id' => null // optional if not needed for blogs
    ]);
}

}