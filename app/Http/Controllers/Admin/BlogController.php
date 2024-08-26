<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
     //Get Add Blog
     public function getAddblog(){
        $title = "Add Blog - Selligion";
        return view('Backend.WebsiteAdmin.Blog.add',[
            'title' => $title
        ]);
    }

    //Get Edit Blog
    public function getEditBlog($id){
        $blog = Blog::findOrFail($id);
        $title = "Edit Blog - Selligion";
        return view('Backend.WebsiteAdmin.Blog.edit',[
            'title' => $title,
            'blog' => $blog,
        ]);
    }

    //Get All Blog
    public function getAllBlog(){
        $title = "All Blogs - Selligion";
        $blogs = Blog::all();
        return view('Backend.WebsiteAdmin.Blog.all',[
            'title' => $title,
            'blogs' => $blogs
        ]);
    }

    //Add Blog
    public function addBlog(Request $request){
        $title = "Add Blog - Selligion";
        $slugCheck = Blog::where('slug',$request->slug)->first();
        if($slugCheck){
            return redirect()->back()->with('warning','Slug already taken for another Blog');
        }
        else{
            if ($request->hasFile('thumbnail')) {
                $blogImg = $request->file('thumbnail');
                $blogImgFileName = now()->timestamp . '-' . $blogImg->getClientOriginalName();
                $blogImg->move(public_path('img_store/blogs'), $blogImgFileName);
            }
            else{
                $blogImgFileName = NULL;
            }
            $blog = Blog::create([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'body' => $request->input('post_body'),
                'status' => $request->input('status'),
                'thumbnail_img_path' => 'img_store/blogs/'.$blogImgFileName,
            ]);
            return redirect()->back()->with('success','Blog created Successfully');
        }
    }

    //Update Blog
    public function updateBlog($id, Request $request){
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            $blogImg = $request->file('thumbnail');
            $blogImgFileName = now()->timestamp . '-' . $blogImg->getClientOriginalName();
            $blogImg->move(public_path('img_store/blogs'), $blogImgFileName);
            $blog->update([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'body' => $request->input('post_body'),
                'status' => $request->input('status'),
                'thumbnail_img_path' => 'img_store/blogs/'.$blogImgFileName,
            ]);
        }
        else{
            $blog->update([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'body' => $request->input('post_body'),
                'status' => $request->input('status'),
            ]);
        }
        return redirect()->back()->with('success','Blog updated Successfully');
    }

    //Delete Blog
    public function deleteBlog($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success','Blog deleted Successfully');
    }

    //user get Blogs
    public function getUserViewBlogs(){
        $title = 'Blogs - Selligion';
        $blogs = Blog::where('status', 'publish')->get();
        return view('Frontend.Blog.blogs',[
            'blogs' => $blogs,
            'title' => $title,
        ]);
    }

    //view Blog
    public function viewBlog($slug){
        $blog = Blog::where('slug', $slug)->first();
        $blogs = Blog::where('status', 'publish')->where('slug' , '!=' , $slug)->get();
        $title = 'Blogs - Selligion';
        return view('Frontend.Blog.blogView',[
            'blog' => $blog,
            'blogs' => $blogs,
            'title' => $title,
        ]);
    }
}
