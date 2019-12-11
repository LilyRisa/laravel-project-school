<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);

//find master
Route::post('/findteach_post',['as' => 'home_findteach_post', 'uses' => 'FindTeachController@postFind']);
/**
 * Blog
 */
Route::get('/blog/{id}',['as' => 'blog_item','uses' => 'BlogController@blogiteam']);
Route::get('/blog/category/{id}',['as' => 'blog_category','uses' => 'BlogController@blogcategory']);
/**
 * Teach
 */
Route::get('/teach/{id}',['as' => 'teach_item','uses' => 'TeachController@Teachitem']);
/**
 * Contact
 */
Route::get('/contact',['as' => 'contact','uses' => 'ContactController@index']);
Route::post('/contact_post',['as' => 'contact_post','uses' => 'ContactController@postContact']);
/**
 * Find find
 */
Route::get('/findteach',['as' => 'homefindteach','uses' => 'FindTeachController@index']);

// admin
Route::get('admin/login', ['as' => 'getLogin', 'uses' => 'AdminController\LoginController@getLogin']);
Route::post('admin/login', ['as' => 'postLogin', 'uses' => 'AdminController\LoginController@postLogin']);
Route::get('admin/register', ['as' => 'getRegister', 'uses' => 'AdminController\LoginController@getReg']);
Route::post('admin/register', ['as' => 'postRegister', 'uses' => 'AdminController\LoginController@postReg']);
Route::get('admin/logout', ['as' => 'getLogout', 'uses' => 'AdminController\LoginController@getLogout']);



// middware
Route::group(['middleware' => 'checkAdminLogin','prefix' => 'admin','namespace' => 'AdminController'], function () {
	Route::get('/home',['as' => 'admin_home','uses' => 'HomeController@home']);
	// category
	Route::get('/category',['as' => 'category','uses' => 'CategoryController@index']);
	Route::post('/category',['as' => 'category_add','uses' => 'CategoryController@add']);
	Route::get('/category/del/{id}',['as' => 'category_del','uses' => 'CategoryController@del'])->where('id', '[0-9]+');
	Route::get('/category/{id}',['as' => 'category_edit','uses' => 'CategoryController@edit'])->where('id', '[0-9]+');
	Route::post('/category/{id}',['as' => 'category_edit_post','uses' => 'CategoryController@PostEdit'])->where('id', '[0-9]+');

	// category child
	Route::get('/category_child',['as' => 'category_child','uses' => 'CategoryChildController@index']);
	Route::post('/category_child',['as' => 'category_child_add','uses' => 'CategoryChildController@add']);
	Route::get('/category_child/del/{id}',['as' => 'category_child_del','uses' => 'CategoryChildController@del'])->where('id', '[0-9]+');
	Route::get('/category_child/{id}',['as' => 'category_child_edit','uses' => 'CategoryChildController@edit'])->where('id', '[0-9]+');
	Route::post('/category_child/{id}',['as' => 'category_child_post','uses' => 'CategoryChildController@PostEdit'])->where('id', '[0-9]+');

	/**
	 *  blog
	 */
	Route::get('/blog',['as' => 'blog','uses' => 'BlogController@index']);
	Route::post('/blog',['as' => 'blog_add','uses' => 'BlogController@add']);
	Route::get('/blog_list',['as' => 'blog_list','uses' => 'BlogController@list']);
	Route::get('/blog_update/{id}',['as' => 'blog_update_get','uses' => 'BlogController@getUpdate']);
	Route::get('/blog_del/{id}',['as' => 'blog_del','uses' => 'BlogController@del']);
	Route::post('/blog_update/{id}',['as' => 'blog_update_post','uses' => 'BlogController@postUpdate']);
	/**
	 * teach
	 */
	Route::get('/teach',['as' => 'teach','uses' => 'TeachController@index']);
	Route::post('/teach',['as' => 'teach_add','uses' => 'TeachController@add']);
	Route::post('/image_teach',['as' => 'image_teach','uses' => 'TeachController@img']);
	Route::get('/teach_del/{id}',['as' => 'teach_del','uses' => 'TeachController@del']);
	Route::get('/teach/{id}',['as' => 'teach_edit_get','uses' => 'TeachController@getEdit']);
	Route::post('/teach/{id}',['as' => 'teach_edit_post','uses' => 'TeachController@postEdit']);

	/**
	 * Banner
	 */
	Route::get('/banner',['as' => 'banner','uses' => 'BannerController@index']);
	Route::post('/banner',['as' => 'banner_add','uses' => 'BannerController@add']);
	Route::get('/banner_del/{id}',['as' => 'banner_del','uses' => 'BannerController@del']);
	Route::get('/banner_edit/{id}',['as' => 'banner_get_edit','uses' => 'BannerController@getEdit']);
	Route::post('/banner_edit/{id}',['as' => 'banner_post_edit','uses' => 'BannerController@postEdit']);

	/**
	 *	Home 
	 */
	Route::get('/detail',['as' => 'detail','uses' => 'DetailController@index']);
	Route::post('/detail_edit/{id}',['as' => 'detail_edit','uses' => 'DetailController@edit']);

	/**
	 * Contact
	 */
	Route::get('/contact',['as' => 'contact','uses' => 'ContactController@index']);
	Route::get('/contact_confirm/{id}',['as' => 'contact_confirm','uses' => 'ContactController@confirm']);
	Route::get('/contact_delete/{id}',['as' => 'contact_del','uses' => 'ContactController@del']);
	/**
	 * Find teach
	 */
	Route::get('/findteach',['as' => 'findteach','uses' => 'FindTeachController@index']);
	Route::get('/findteach_confirm/{id}',['as' => 'findteach_confirm','uses' => 'FindTeachController@confirm']);
	Route::get('/findteach_delete/{id}',['as' => 'findteach_del','uses' => 'FindTeachController@del']);
	/**
	 * image upload
	 */
	Route::post('/upload',['as' => 'imgupload','uses' => 'ImageUploadController@upload']);
});

