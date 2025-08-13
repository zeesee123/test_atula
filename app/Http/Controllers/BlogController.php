<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addblog(Request $request)
    {
        $validated = $request->validate([
            'blog_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title'            => 'required|string|max:255|unique:blogs,title',
            'date'             => 'nullable|date',
            'publish'          => 'nullable|boolean',
            'content'          => 'required|string',
            'slug'             => 'nullable|string|max:255|unique:blogs,slug',
            'meta_title'       => 'nullable|string|max:255|unique:blogs,meta_title',
            'meta_description' => 'nullable|string',
            'schema_markup'    => 'nullable|string',
        ]);

        // Handle file upload
        $imageName = null;
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $imageName = $image->hashName();
            $image->move(public_path('blogs'), $imageName);
        }

        // Handle slug and ensure uniqueness
        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Create blog
        $blog = Blog::create([
            'blog_image'       => $imageName,
            'title'            => $validated['title'],
            'date'             => $validated['date'] ?? null,
            'publish'          => $request->has('publish') ? 1 : 0,
            'content'          => $validated['content'],
            'slug'             => $slug,
            'meta_title'       => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'schema_markup'    => $validated['schema_markup'] ?? null,
        ]);

        return redirect()->route('pages.blogs.add_blog')
            ->with('success', 'Blog created successfully!');
    }
}