<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    // INDEX
    public function blogIndex(){
        return view('backend.Blogs.blogIndex');
    }


    //STORE BLOG'S
    public function storeBlog(Request $request) { 

        // Validate the request first
        $request->validate([
            'blog_title' => 'required',
            'blog_category' => 'required|array', // Ensure it's an array
            'blog_details' => 'required',
            'blog_preview_image' => 'nullable|mimes:png,jpg,webp,jpeg', // Make it nullable
        ]);
    
        // Convert the selected categories to a string
        // $categoriesString = implode(',', $request->input('blog_category'));
    
        // Create a new Blog instance
        $storeBlog = new Blog();
        $storeBlog->blog_title = $request->blog_title;
        $storeBlog->blog_slug = 'blog-' . Str::slug($request->blog_title) . '-' . time();
        $storeBlog->blog_category = json_encode($request->blog_category);
        $storeBlog->blog_details = $request->blog_details;
    
        // Handle the file upload if a file is provided
        if ($request->hasFile('blog_preview_image')) {
            $blog_preview_image = $request->blog_preview_image->extension();
            $blog_preview_image_name = 'blog-' . time() . '.' . $blog_preview_image;
            $store_image = $request->blog_preview_image->storeAs("blog", $blog_preview_image_name, 'public');
            $path_image = env('APP_URL') . 'storage/' . $store_image;
            $storeBlog->blog_preview_image = $path_image;
        }
    
        // Save the blog instance
        $storeBlog->save();
    
        // Redirect back with a success message (optional)
        return back()->with('success', 'Blog created successfully!');
    }
    
}
