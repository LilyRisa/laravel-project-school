<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category_child;
use App\category;

class categoryChildController extends Controller
{
    public function index(){
    	$category_child = category_child::all();
    	$category = category::all();
    	//dd($category,$category_child);
    	return view('admin.category_child')->with(['category_child' => $category_child, 'last_ct' => $category]);
    }
    public function add(Request $request){
    	$input = $request->all();
    	$category_child = new category_child();
    	$category_child->name = $input['name'];
    	$category_child->keyword = $input['keyword'];
    	$category_child->category_id = $input['category_id'];
    	$category_child->status = isset($input['status']) ? $input['status'] : 0;
    	$category_child->save();
    	return \Redirect::route('category_child')->with('status', 'category_child add correctly!!!');
    }
    public function del($id){
    	$category_child = category_child::find($id);
    	$category_child->delete();
    	return json_encode(['status' => 200,'messeges' => 'delete success !']);
    }
    public function edit($id){
    	$category_child = category_child::where('id','=',$id)->first()->toArray();
    	$list = category_child::all();
    	$category = category::all();
    	return view('admin.category_child')->with(['data'=>$category_child,'category_child'=>$list,'last_ct' => $category]);
    }
    public function PostEdit(Request $request,$id){
    	$input = $request->all();
    	$category_child = category_child::find($id);
    	$category_child->name = $input['name'];
    	$category_child->keyword = $input['keyword'];
    	$category_child->status = isset($input['status']) ? $input['status'] : 0;
    	$category_child->save();
    	return $this->edit($id);
    }


}
