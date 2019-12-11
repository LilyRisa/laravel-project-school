<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\User;
use App\Images;

class BlogController extends Controller
{
    //
    public function BlogList(){
    	//$list =  DB::table('blog')->whereNull('deleted_at')->get();
    	$list = Blog::with('user')->whereNull('deleted_at')->get()->toArray();
    	$count = count($list);
    	$list = $list;
    	$list = array_map(function($item){
    		$item['user_id'] = User::find($item['user_id']);
            $item['img_id'] = Images::find($item['img_id']);
    		return $item;
    	}, $list);
    	$reponse = ['count' => $count, 'reponse' => $list];
    	//dd($list);
    	return json_encode($reponse);
    }
    public function BlogCreate(request $request){
    	$data = $request->all();
    	$status = 0 ;

    	try {
    		DB::table('blog')->insert([
    			'blog_title' => $data['blog_title'],
    			'blog_meta' => $data['blog_meta'],
    			'blog_body' => $data['blog_body'],
    			'user_id' => isset($data['user_id']) ? (int)$data['user_id'] : 1,
                'category_child_id' => isset($data['category_child_id']) ? (int)$data['category_child_id'] : null,
    			'blog_image' => $data['blog_image'],
    		]);
    	}catch(\Exception $e){
    		$status = 1;
    		$messesges = $e;
    	}

    	if($status == 0){
    		return json_encode($data);
    	}else{
    		return json_encode($messesges);
    	}

    	
    }

    public function BlogDelete($id){
    	$id = Blog::find($id,'*');
		$id ->delete();
    	return json_encode(['status' => 'success']);

    }
    public function BlogUpdate(Request $request, $id){
    	$data = $request->all();
    	$blog = Blog::find($id,'*');
    	$blog->blog_title = $data['blog_title'];
    	$blog->blog_meta = $data['blog_meta'];
    	$blog->blog_body = $data['blog_body'];
    	$blog->user_id = isset($data['user_id']) ? (int)$data['user_id'] : 1;
    	$blog->blog_image = $data['blog_image'];
    	$blog->save();
    	return json_encode($data);
    }

    public function BlogItem($id){
    	$blog = Blog::find($id);
    	if(empty($blog)){
    		return json_encode(['count' => 0,'reponse' => null ]);
    	}else{
            $blog['user_id'] = User::find($blog['user_id']);
    		return json_encode(['count' => 1,'reponse' => $blog ]);
    	}
    	
    }
    public function Search(request $request){
        $data = $request['query'];
        $key = $request['key'];
        //return json_encode($request);
        //return $request;
        if($key != 'blog_id'){
            if($key == 'blog_title'){
                $response = DB::table('blog')->where('blog_title', 'LIKE', '%'.$data.'%')->get();
            }else
            if($key == 'blog_meta'){
                $response = DB::table('blog')->where('blog_meta', 'LIKE', '%'.$data.'%')->get();
            }else{
                $response = DB::table('blog')->where('blog_body', 'LIKE', '%'.$data.'%')->get();
            }
            
            if($response == null){
                return json_encode(['count' => 0,['reponse' => null ]]);
            }else{
                return json_encode(['count' => count($response),'reponse' => $response]);
            }
        }else{
            $response = Blog::find(intval($data),'*')->toArray();
            if($response == null){
                return json_encode(['count' => 0,['reponse' => null ]]);
            }else{
                return json_encode(['count' => count($response),'reponse' => $response]);
            }
        }
            
    }
}
