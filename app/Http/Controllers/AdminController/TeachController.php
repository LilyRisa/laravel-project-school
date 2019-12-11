<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\teach;

class TeachController extends Controller
{
    public function index(){
    	$teach = teach::all();
    	return view('admin.teach')->with(['teach' => $teach]);
    }
    public function add(Request $request){
    	$input = $request->all();
    	$teach = new teach();
    	$teach->teach_name = $input['teach_name'];
    	$teach->teach_email = $input['teach_email'];
    	$teach->teach_phone = $input['teach_phone'];
    	$teach->teach_facebook = $input['teach_facebook'];
    	$teach->teach_skype = $input['teach_skype'];
    	$teach->teach_avatar = $input['teach_avatar'];
        $teach->meta = $input['meta'];
    	$teach->teach_descriptions = $input['teach_descriptions'];
    	$teach->save();
    	return json_encode(['status' => 200, 'messenges' => 'upload success !']);
    }
    public function del($id){
    	$teach = teach::find($id);
    	$teach->delete();
    	return json_encode(['status' => 200, 'messenges' => 'delete success !']);
    }
    public function getEdit($id){
    	$teach = teach::all();
    	$data = teach::where('id',$id)->first()->toArray();
    	return view('admin.teach')->with(['teach' => $teach,'data' => $data]);
    }
    public function postEdit(Request $request,$id){
    	$input = $request->all();
    	$teach = teach::find($id);
    	$teach->teach_name = $input['teach_name'];
    	$teach->teach_email = $input['teach_email'];
    	$teach->teach_phone = $input['teach_phone'];
    	$teach->teach_facebook = $input['teach_facebook'];
    	$teach->teach_skype = $input['teach_skype'];
    	$teach->teach_avatar = $input['teach_avatar'];
    	$teach->teach_descriptions = $input['teach_descriptions'];
        $teach->meta = $input['meta'];
    	$teach->save();
    	return json_encode(['status' => 200, 'messenges' => 'update success !']);
    }

}
