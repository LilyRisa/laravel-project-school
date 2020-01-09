<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Images;
use App\category;
use App\category_child;

class HomeController extends Controller
{
    public function Home(){
    	$blog = Blog::orderBy('blog_id', 'DESC')->take(3)->get();
    	$blogall = Blog::all();
    	$image = Images::all();
    	$category = category::all();
    	$category_child = category_child::all();
    	$home = DB::table('homedetail')->where('id','=',2)->get();
		$home = $home[0];
    	return view('home.index')->with(['blog' => $blog, 'image' => $image, 'category' => $category, 'category_child' => $category_child, 'blogall' => $blogall, 'home' => $home]);
    }

}
