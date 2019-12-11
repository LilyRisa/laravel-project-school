<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Images;

class BlogController extends Controller
{
    public function blogiteam($id){
    	$blog = Blog::where('blog_id',$id)->first()->toArray();
    	return view('home.blog')->with(['blog' => $blog]);
    }
    public function blogcategory($id){
    	$images = Images::all();
    	$blog = Blog::where('category_child_id',$id)->get();
    	return view('home.blog_category')->with(['blog' => $blog, 'images' => $images]);
    }
}
