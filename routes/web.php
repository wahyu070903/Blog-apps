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

Route::get('/','BlogController@showHome')->middleware("auth.basic");
Route::get('/article/{id}','BlogController@showArticle');

//login routes
Route::get("/signup",function(){
	return view('authentication/signup');
});

Route::get("/login",function(){
	return view("authentication/login");
});

Route::get("/verify/{code}","Authentication\RegisterController@verify");

Route::post("auth/signup","Authentication\RegisterController@register");
Route::post("auth/login","Authentication\LoginController@authenticate");

//admin routes
Route::get("admin","AdminController@show");

Route::get("admin/add",function(){
	return view('admin-pages/add-panel');
});

Route::post("admin/add","AdminController@uploadtoDB");

Route::post('ckeditor/upload', 'CkeditorController@uploadImages')->name('ckeditor.upload');

Route::get("/admin/destroy/{id}",'AdminController@SoftDeleteItem');

Route::get("/admin/trash",'AdminController@trash');

Route::get("/admin/delete/{id}","AdminController@delete");
Route::get("/admin/restore/{id}","AdminController@restore");

Route::get("/admin/update/{id}","AdminController@updatePost");
Route::post("/admin/update/{id}",'AdminController@sendUpdate');

//blog routes
Route::post("get/newpost/{page}",'BlogController@updateNewPost')->name('get.newpost');

Route::post("get/search/{keyword}","BlogController@liveSearch")->name('get.search');

Route::get("categories/{category}","BlogController@getCategories");