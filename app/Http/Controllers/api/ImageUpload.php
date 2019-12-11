<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;

class ImageUpload extends Controller
{
    //
    public function isUpload(request $request){
    	$this->validate($request, [
	    	'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    	if ($request->hasFile('image')) {
    		$data = $request->all();
    		$image = $request->file('image');
    		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    		$destinationPath = public_path('/thumbnail');
    		
        	try{
        		DB::table('images')->insert([
        			'name' => $data['title'],
        			'url' => public_path('/images').'/'.$input['imagename'],
        			'url_thumb' => public_path('/thumbnail').'/'.$input['imagename'],
        		]);
        		$img = Image::make($image->getRealPath());
    			$img->resize(100, 100, function ($constraint) {
		    		$constraint->aspectRatio();
				})->save($destinationPath.'/'.$input['imagename']);
			 	$destinationPath = public_path('/images');
        		$image->move($destinationPath, $input['imagename']);
        		$this->save();
        		
        	}catch(\exception $e){

        	}
        }
        
        if(isset($e)){
        	return json_encode(['error' => $e]);
        }else{
        	return json_encode(['success' => $input['imagename']]);
        }

    }

    public function GetImage($id){
    	$row = DB::table('images')->where('id', $id)->get()->toArray();
    	return json_encode($row);

    }
}
