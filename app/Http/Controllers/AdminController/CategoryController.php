<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
{
    public function index(){
    	$category = category::all();
    	return view('admin.category')->with('category',$category);
    }
    public function add(Request $request){
    	$input = $request->all();
    	$category = new category();
    	$category->name = $input['name'];
    	$category->keyword = $input['keyword'];
    	$category->status = isset($input['status']) ? $input['status'] : 0;
    	$category->save();
    	return \Redirect::route('category')->with('status', 'Category add correctly!!!');
    }
    public function del($id){
    	$category = category::find($id);
    	$category->delete();
    	return json_encode(['status' => 200,'messeges' => 'delete success !']);
    }
    public function edit($id){
    	$category = category::where('id','=',$id)->first()->toArray();
    	$list = category::all();
    	return view('admin.category')->with(['data'=>$category,'category'=>$list]);
    }
    public function PostEdit(Request $request,$id){
    	$input = $request->all();
    	$category = category::find($id);
    	$category->name = $input['name'];
    	$category->keyword = $input['keyword'];
    	$category->status = isset($input['status']) ? $input['status'] : 0;
    	$category->save();
    	return $this->edit($id);
    }


}
