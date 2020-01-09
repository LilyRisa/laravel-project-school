<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\detail;

class DetailController extends Controller
{
    public function index(){

    	if(detail::all()->first() != null){
    		$detail = detail::all()->first()->toArray();
    		return view('admin.deltail')->with(['detail' => $detail]);
    	}else{
    		return view('admin.deltail');
    	}
    	
    }
    public function edit(Request $request, $id){
    	$input = $request->all();
    	$detail = detail::find($id);
    	$detail->name = $input['name'];
    	$detail->phone = $input['phone'];
    	$detail->email = $input['email'];
    	$detail->address = $input['address'];
    	$detail->contentText = $input['contentText'];
    	$detail->keyword = $input['keyword'];
    	$detail->recommend = $input['recommend'];
    	$detail->description = $input['description'];
    	$detail->logoSite = $input['logoSite'];
    	$detail->mapIframe = $input['mapIframe'];
    	$detail->linkFB = $input['linkFB'];
    	$detail->linkTW = $input['linkTW'];
    	$detail->save();
    	return json_encode(['status' => 200, 'messenges' => 'Update success !']);
    }
}
