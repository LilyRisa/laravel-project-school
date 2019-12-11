<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Irazasyed\VideoDownloader\Factory;

class FacebookVideo extends Controller
{
    //
    public function download(Request $request){
    	$downloader = new Factory('facebook');
    	$video = $request->all();
    	// $success = $video;
		$videoInfo = $downloader->getVideoInfo($video['url']);
		return json_encode($videoInfo);
    }
}
