<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contact;

class ContactController extends Controller
{
    public function index(){
    	$contact = contact::all();
    	return view('admin.contact')->with(['contact' => $contact]);
    }
    public function confirm($id){
    	$contact = contact::find($id);
    	$contact->status = 1;
    	$contact->save();
    	return json_encode(['status' => 200, 'messenges' => 'Confirm success !']);
    }

   public function del($id){
   	$contact = contact::find($id);
   	$contact->delete();
   	return json_encode(['status' => 200, 'messenges' => 'Delete success !']);
   }
}
