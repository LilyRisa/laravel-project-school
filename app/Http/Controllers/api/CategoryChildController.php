<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryChildController extends Controller
{
    //
    public function list(){
    	$data = DB::table('category_child')->get()->toArray();
    	return json_encode($data);    

    }

    public function createCategoryChild(request $request){
    	$this->validate($request, [
	    	'name' => 'required',
            'keyword' => 'required',
        ]);
    	$data = $request->all();
        try{
        	DB::table('category_child')->insert([
        		'name' => $data['name'],
        		'keyword' => $data['keyword'],
        		'category_id' => isset($data['category_id']) ? (int) $data['category_id'] : null,
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
        $data = DB::table('category_child')->where('id',$id)->get();
        return json_encode(['count' => count($data), 'response' => $data]);
    }
}
