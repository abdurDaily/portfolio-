<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    // INDEX
    public function blogIndex(){
        return view('backend.Blogs.blogIndex');
    }


    //STORE BLOG'S
    public function storeBlog(Request $request){ 

        
        $request->validate([
            'blog_title'=> 'required',
            'blog_category'=> 'required',
            'blog_details'=> 'required',
            'blog_preview_image'=> 'required|mimes:png,jpg,webp,jpeg',
        ]);


        $storeBlog = new Blog();
        $storeBlog->blog_title = $request->blog_title;
        $storeBlog->blog_category = $request->blog_category;
        $storeBlog->blog_details = $request->blog_details;


        if($request->hasFile('blog_preview_image')){
            $blog_preview_image = $request->blog_preview_image->extension();
            $blog_preview_image_name  = 'blog-' . time().'.'.$blog_preview_image;
            $store_image = $request->blog_preview_image->storeAs("blog", $blog_preview_image_name, 'public');
            $path_image = env('APP_URL').'storage/'.$store_image;
            $storeBlog->blog_preview_image = $path_image;
            $storeBlog->save();
        }

        
        $storeBlog->save();
        return back();
    }
    
}
