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
Auth::routes(['register' => false]);

Route::get("playlist",function(){
	return view("user/playlist");
});

Route::get("search",function(){
	return view("user/search");
});

Route::get('/', "UserController@getHome");

Route::get('admin/login',"LoginController@getLoginAdmin")->name("login");

Route::post('admin/login',"LoginController@postLoginAdmin");

Route::get('bai-hat', function () {
    return view('user/listSong');
});

Route::get("bai-hat/{title}","MusicController@getSong")->name("bai-hat");

Route::get('album', function () {
    return view('user/album');
});

Route::get('nghe-si', function () {
    return view('user/singer');
});

Route::get('audio',function(){
	return view('user/audio');
});

Route::get('change',"UserController@change");

Route::get('addMusic','MusicController@addMusic');
Route::get('addAlbum','AlbumController@addAlbum');
Route::get('addSinger','SingerController@addSinger');
Route::post('login','UserController@postLogin');

Route::get('ajax/login/{username}/{password}',"UserController@ajaxLogin");

Route::group(['prefix'=>'user'],function(){
    Route::get('insert','UserController@insertUser');
});

Route::group(["prefix"=>"admin", "middleware"=>"auth:admin"],function(){
	Route::group(["prefix"=>"singer"],function(){
		Route::get("list","AdminController@getListSinger");
		Route::get("add","AdminController@getAddSinger");
		Route::post("add","AdminController@postAddSinger");
		Route::get("edit/{id}","AdminController@getEditSinger");
		Route::post("edit/{id}","AdminController@postEditSinger");
		Route::get("delete/{id}","AdminController@deleteSinger");
	});
	Route::group(["prefix"=>"song"],function(){
		Route::get("list","AdminController@getListSong");
		Route::get("add","AdminController@getAddSong");
		Route::post("add","AdminController@postAddSong");
		Route::get("edit/{id}","AdminController@getEditSong");
		Route::post("edit/{id}","AdminController@postEditSong");
		Route::get("delete/{id}","AdminController@deleteSong");
	});
	Route::group(["prefix"=>"album"],function(){
		Route::get("list","AdminController@getListAlbum");
		Route::get("add","AdminController@getAddAlbum");
		Route::post("add","AdminController@postAddAlbum");
		Route::get("edit/{id}","AdminController@getEditAlbum");
		Route::post("edit/{id}","AdminController@postEditAlbum");
		Route::get("delete/{id}","AdminController@deleteAlbum");
	});
	Route::group(["prefix"=>"topic"],function(){
		Route::get("add","AdminController@getAddTopic");
		Route::post("add","AdminController@postAddTopic");
		Route::get("list","AdminController@getListTopic");
		Route::get("edit/{id}","AdminController@getEditTopic");
		Route::post("edit/{id}","AdminController@postEditTopic");
		Route::get("delete/{id}","AdminController@deleteTopic");
	});
	Route::group(["prefix"=>"ajax"],function(){
		Route::get("search/{str}/{arr}","AdminController@ajaxSearch");
		Route::get("album/{id?}","AdminController@ajaxAlbum");
		Route::get("searchTopic/{str}/{arr}","AdminController@ajaxSearchTopic");
	});
	Route::get("home","AdminController@getHome")->name("home");
	Route::get("/","AdminController@getHome");
	Route::get("taikhoan","AdminController@taikhoan");
	Route::get("thongbao","AdminController@thongbao");
	Route::get("logout","AdminController@logout");
	Route::get("test","AdminController@export");
	Route::get("test1","AdminController@import");
});

Route::group(['prefix'=>'singer'],function(){
    Route::get('insert','AdminController@insertAdmin');
});

Route::group(['prefix'=>'music'],function(){
    Route::get('insert','AdminController@insertAdmin');
});

Route::group(['prefix'=>'album'],function(){
    Route::get('insert','AdminController@insertAdmin');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
