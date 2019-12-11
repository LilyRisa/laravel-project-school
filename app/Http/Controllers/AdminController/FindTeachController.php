<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FindTeach;

class FindTeachController extends Controller
{
    public function index(){
    	$fteach = FindTeach::all();
    	return view('admin.find_teach')->with(['fteach' => $fteach]);
    }
    public function confirm($id){
    	$fteach = FindTeach::find($id);
    	$fteach->status = 1;
    	$fteach->save();
    	return json_encode(['status' => 200, 'messenges' => 'Confirm success !']);
    }
    public function del($id){
	   	$fteach = FindTeach::find($id);
	   	$fteach->delete();
	   	return json_encode(['status' => 200, 'messenges' => 'Delete success !']);
   }
}
