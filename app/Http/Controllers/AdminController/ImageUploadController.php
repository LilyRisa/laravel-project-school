<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Image;
use App\Images;

class ImageUploadController extends Controller
{
    public function upload(Request $request){
    	
         $validator = Validator::make($request->all(),
                [
                    'image' => 'image',
                ],
                [
                    'image.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
       ]);
         if ($validator->fails())
                return json_encode(array(
                    'fail' => true,
                    'errors' => $validator->errors()
        ));
            $extension = $request->file('file')->getClientOriginalExtension();
            $dir = public_path('images/');
            $thumb = public_path('thumbnail/');
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $request->file('file')->move($dir, $filename);
            // $img = Image::make($request->file('file')->getRealPath());
            // $img->resize(100, 100, function ($constraint) {
            //         $constraint->aspectRatio();
            //     })->save($thumb.$filename);


            $imageupload = new Images();
            $imageupload->name = md5($filename);
            $imageupload->url = 'images'.'/'.$filename;
            $imageupload->url_thumb = 'thumbnail'.'/'.$filename;
            $imageupload->save();
            $getimg = Images::select('id')->where('name',md5($filename))->first();

        
        
            return json_encode(['success' => $filename,'data' => $getimg]);
        

    }
}
