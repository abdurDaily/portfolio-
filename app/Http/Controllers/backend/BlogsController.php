<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    // INDEX
    public function blogIndex(){
        $categories = Category::select('id','category_name')->get();
        return view('backend.Blogs.blogIndex', compact('categories'));
    }


    //STORE BLOG'S
    public function storeBlog(Request $request) { 

        $request->validate([
            'blog_title' => 'required',
            'blog_category' => 'required|array',
            'blog_details' => 'required',
            'blog_preview_image' => 'nullable|mimes:png,jpg,webp,jpeg', // Make it nullable
        ]);


        $storeBlog = new Blog();
        $storeBlog->blog_title = $request->blog_title;
        $storeBlog->blog_slug = 'blog-' . Str::slug($request->blog_title) . '-' . time();
        $storeBlog->blog_category = json_encode($request->blog_category);
        $storeBlog->blog_details = $request->blog_details;


                if ($request->hasFile('blog_preview_image')) {
                    $blog_preview_image = $request->blog_preview_image->extension();
                    $blog_preview_image_name = 'blog-' . time() . '.' . $blog_preview_image;
                    $store_image = $request->blog_preview_image->storeAs("blog", $blog_preview_image_name, 'public');
                    $path_image = env('APP_URL') . 'storage/' . $store_image;
                    $storeBlog->blog_preview_image = $path_image;
                }


                $storeBlog->save();
                return back();
                return response()->json($request->all());
    }


    // BLOG lIST 
    public function blogList(){
        $blogs = Blog::get();
        return view('backend.Blogs.allBlogs', compact('blogs'));
    }


    // BLOG EDIT 
    public function blogEdit($blog_slug){
        $blog = Blog::where('blog_slug', $blog_slug)->first(); 
        // dd($blog);
        $categories = Category::get();
        return view('backend.Blogs.editBlog',compact('blog','categories'));
    }
    
}
