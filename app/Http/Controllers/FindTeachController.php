<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FindTeach;
use App\detail;

class FindTeachController extends Controller
{
    public function postFind(Request $request){
    	$input = $request->all();
    	$subject = ''.$input['tieuhoc'].'|'.$input['toan'].'|'.$input['tiengviet'].'|'.$input['toeic'].'|'.$input['vatly'].'|'.$input['tienganh'].'|'.$input['laptrinh'].'|'.$input['monkhac'];
    	$input['subject'] = $subject;
    	FindTeach::create($input);
    	return json_encode(['status' => 200, 'messenges' => 'Cảm ơn bạn đã liên hệ !']);
    }
    public function index(){
    	$detail = detail::where('id',1)->first()->toArray();
    	return view('home.findteach')->with(['detail' => $detail]);
    }
}
