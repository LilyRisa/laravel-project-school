<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teach;

class TeachController extends Controller
{
    public function teachitem($id){
    	$teach = teach::find($id)->first()->get()->toArray();
    	return view('home.teach')->with(['teach' => $teach[0]]);
    }
}
