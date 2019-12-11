<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use App\User;
use App\Images;

class BannerController extends Controller
{
    public function index(){
    	$banner = Banner::all();
    	$user = User::all();
    	$image = Images::all();
    	return view('admin.banner')->with(['banner' => $banner,'user' => $user,'image' => $image]);
    }
    public function add(Request $request){
    	$input = $request->all();
    	$banner = new Banner();
    	$banner->banner_name = $input['banner_name'];
    	$banner->banner_title = $input['banner_title'];
    	$banner->img_id = $input['img_id'];
    	$banner->user_id = $input['user_id'];
    	$banner->save();
    	return json_encode(['status' => 200, 'messenges' => 'Create banner success!']);
    }
    public function del($id){
    	$banner = Banner::find($id);
    	$banner->delete();
    	return json_encode(['status' => 200, 'messenges' => 'Delete success!']);
    }
    public function getEdit($id){
    	$banner = Banner::all();
    	$user = User::all();
    	$image = Images::all();
    	$data = Banner::where('banner_id',$id)->first()->toArray();
    	return view('admin.banner')->with(['banner' => $banner,'user' => $user,'image' => $image, 'data' => $data]);
    }
    public function postEdit(Request $request,$id){
    	$input = $request->all();
    	$banner = Banner::find($id);
    	$banner->banner_name = $input['banner_name'];
    	$banner->banner_title = $input['banner_title'];
    	$banner->img_id = $input['img_id'];
    	$banner->user_id = $input['user_id'];
    	$banner->save();
    	return json_encode(['status' => 200, 'messenges' => 'Update banner success!']);
    }
}
