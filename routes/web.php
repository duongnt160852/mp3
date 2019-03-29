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

Route::get('/', "UserController@getHome");

Route::get('bai-hat', function () {
    return view('user/song');
});

Route::get('album', function () {
    return view('user/album');
});

Route::get('nghe-si', function () {
    return view('user/singer');
});

Route::get('addMusic','MusicController@addMusic');
Route::get('addAlbum','AlbumController@addAlbum');
Route::get('addSinger','SingerController@addSinger');
Route::post('login','UserController@postLogin');

Route::get('ajax/login/{username}/{password}',"UserController@ajaxLogin");

Route::group(['prefix'=>'user'],function(){
    Route::get('insert','UserController@insertUser');
});

Route::group(["prefix"=>"admin" ],function(){
	Route::group(["prefix"=>"singer"],function(){
		Route::get("list","SingerController@list");
		Route::get("add","SingerController@getAdd");
		Route::post("add","SingerController@postAdd");
		Route::get("edit/{id}","SingerController@getEdit");
		Route::post("edit/{id}","SingerController@postEdit");
		Route::get("delete/{id}","SingerController@delete");
	});
	Route::group(["prefix"=>"song"],function(){
		Route::get("list","SongController@list");
		Route::get("add","SongController@getAdd");
		Route::post("add","SongController@postAdd");
		Route::get("edit/{id}","SongController@getEdit");
		Route::post("edit/{id}","SongController@postEdit");
		Route::get("delete/{id}","SongController@delete");
		Route::post("add1","SongController@postAdd1");
	});
	Route::group(["prefix"=>"album"],function(){
		Route::get("list","AlbumController@list");
		Route::get("add","AlbumController@getAdd");
		Route::post("add","AlbumController@postAdd");
		Route::get("edit/{id}","AlbumController@getEdit");
		Route::post("edit/{id}","AlbumController@postEdit");
		Route::get("delete/{id}","AlbumController@delete");
	});
	Route::group(["prefix"=>"topic"],function(){
		Route::get("add","TopicController@getAdd");
		Route::post("add","TopicController@postAdd");
		Route::get("list","TopicController@list");
		Route::get("edit/{id}","TopicController@getEdit");
		Route::post("edit/{id}","TopicController@postEdit");
		Route::get("delete/{id}","TopicController@delete");
	});
	Route::get("home","AdminController@getHome");
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


