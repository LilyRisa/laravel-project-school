<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detail;
use App\contact;

class ContactController extends Controller
{
    public function index(){
    	$detail = detail::where('id',1)->first()->toArray();
    	return view('home.contact')->with(['home' => $detail]);
    }
    public function postContact(Request $request){
    	$input = $request->all();
    	$contact = new contact();
    	$contact->fullname = $input['fullname'];
    	$contact->email = $input['email'];
    	$contact->phone = $input['phone'];
    	$contact->category = $input['category'];
    	$contact->question = $input['question'];
    	$contact->status = $input['status'];
    	$contact->save();
    	return json_encode(['status' => 200, 'messenges' => 'test']);
    }
}
