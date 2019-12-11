<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Banner;
use App\Images;

class BannerController extends Controller
{
    //

    public function list(){
    	$data = Banner::with('user')->get()->toArray();
    	$data = array_map(function($item){
    		$item['user_id'] = User::find($item['user_id']);
            $item['img_id'] = Images::find($item['img_id']);
    		return $item;
    	}, $data);
    	return json_encode(['count' => count($data), 'response' => $data]);
    }

    public function getId($id){
    	$data = Banner::find($id);
    	$data['user_id'] =  User::find($data['user_id']);
    	$data['img_id'] =  Images::find($data['img_id']);
    	return json_encode(['count' => 1, 'response' => $data]);
    }

    public function createBanner(request $request){
    	$this->validate($request, [
	    	'banner_name' => 'required',
            'banner_title' => 'required',
        ]);
    	$data = $request->all();
    	$status = 0 ;


    	try {
    		DB::table('banner')->insert([
    			'banner_name' => $data['banner_name'],
    			'banner_title' => $data['banner_title'],
    			'user_id' => isset($data['user_id']) ? (int)$data['user_id'] : 1,
                'img_id' => isset($data['img_id']) ? (int)$data['img_id'] : null,
    		]);
    	}catch(\Exception $e){
    		$status = 1;
    		$messesges = $e;
    	}

    	if($status == 0){
    		return json_encode($data);
    	}else{
    		return json_encode(['error' => $e]);
    	}
    }
}
