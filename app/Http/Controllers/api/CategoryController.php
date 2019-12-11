<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function list(){
    	$data = DB::table('category')->get()->toArray();
    	return json_encode($data);
    }

    public function createCategory(request $request){
    	$this->validate($request, [
	    	'name' => 'required',
            'keyword' => 'required',
        ]);
    	$data = $request->all();
        try{
        	DB::table('category')->insert([
        		'name' => $data['name'],
        		'keyword' => $data['keyword'],
        	]);
        		
        		
        }catch(\exception $e){

        }
        if(isset($e)){
        	return json_encode(['error' => $e]);
        }else{
        	return json_encode($data);
        }
    }

    public function getId($id){
        $data = DB::table('category')->where('id',$id)->get();
        return json_encode(['count'=>count($data),'response'=>$data]);
    }
}
