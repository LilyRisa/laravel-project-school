<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* 
	Login and register

 */
	Route::post('login', 'api\UserController@login');
	Route::post('register', 'api\UserController@register');
// anonymous get data

//blog
	Route::get('blog/', 'api\BlogController@BlogList');
	Route::get('blog/{id}', 'api\BlogController@BlogItem')->where('id', '[0-9]+');
//blog

//category
	Route::get('category/', 'api\CategoryController@list');
	Route::get('category_child/', 'api\CategoryChildController@list');
	Route::get('category/{id}','api\CategoryController@getId')->where('id', '[0-9]+');
	Route::get('category_child/{id}','api\CategoryChildController@getId')->where('id', '[0-9]+');
//category

//image
	Route::get('image/{id}', 'api\ImageUpload@GetImage')->where('id', '[0-9]+');
//image

//banner
	Route::get('banner/','api\BannerController@list');
	Route::get('banner/{id}','api\BannerController@getId')->where('id', '[0-9]+');
//banner
//

Route::group(['middleware' => 'auth:api'], function() { // #protected
	Route::post('details', 'api\UserController@details');

	// Video facebook Download 
	Route::post('facebook/video','api\FacebookVideo@Download');

	//blog
	Route::post('blog/search', 'api\BlogController@Search');
	Route::post('blog/create', 'api\BlogController@BlogCreate');
	Route::get('blog/delete/{id}', 'api\BlogController@BlogDelete')->where('id', '[0-9]+');
	Route::post('blog/update/{id}', 'api\BlogController@BlogUpdate')->where('id', '[0-9]+');
	//blog

	//image upload
	Route::post('image/upload', 'api\ImageUpload@isUpload')->name('image-upload');
	//image upload

	//category
	Route::post('category/create', 'api\CategoryController@createCategory');
	Route::post('category_child/create', 'api\CategoryChildController@createCategoryChild');
	//category

	//banner
	Route::post('banner/create', 'api\BannerController@createBanner');
	//banner
});
