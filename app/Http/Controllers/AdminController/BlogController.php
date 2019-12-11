<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category_child;
use App\Blog;
use App\User;
use App\Images;

class BlogController extends Controller
{
    public function index(){
    	$category = category_child::all();
    	$api = route('image-upload');
    	return view('admin.blog')->with(['category' => $category,'api'=>$api]);
    }
    public function add(Request $request){
    	$input = $request->all();
    	$blog = new Blog();
    	$blog->blog_title = $input['blog_title'];
    	$blog->blog_meta = $input['blog_meta'];
    	$blog->blog_body = $input['body'];
    	$blog->user_id = $input['user'];
    	$blog->category_child_id = $input['category'];
    	$blog->img_id = $input['img_id'];
    	$blog->save();
    	return json_encode(['status' => 200, 'messeges' => 'Success !']);
    }
    public function list(){
    	$category = category_child::all();
    	$blog = Blog::all();
    	$user = User::all();
    	$image = Images::all();
    	return view('admin.list_blog')->with(['category' => $category, 'blog' => $blog, 'user' => $user, 'image' => $image]);	
    }
    public function getUpdate($id){
    	$category = category_child::all();
    	$blog = Blog::where('blog_id',$id)->first()->toArray();
    	$user = User::all();
    	$image = Images::all();
    	return view('admin.blog')->with(['category' => $category, 'blog' => $blog, 'user' => $user, 'image' => $image]);
    }

    public function postUpdate(Request $request, $id){
        $input = $request->all();
        $blog = Blog::find($id);
        $blog->blog_title = $input['blog_title'];
        $blog->blog_meta = $input['blog_meta'];
        $blog->blog_body = $input['body'];
        $blog->category_child_id = $input['category'];
        if(isset($input['img_id']) && $input['img_id'] != null && $input['img_id'] != ''){
            $blog->img_id = $input['img_id'];
        }
        $blog->save();
        return json_encode(['status' => 200,'messenges' => 'update success !']);
    }

    public function del($id){
        $blog = Blog::find($id);
        $blog->delete();
        return json_encode(['status' => 200,'messenges' => 'delete success !']);
    }
}
