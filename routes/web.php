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

Route::get("ajax/search/{str}","UserController@search");

Route::get("download","MusicController@getDownload");

Route::post("user/login","LoginController@postLogin")->name("userlogin");

Route::get("search/{str}","UserController@getSearch");

Route::get("search/bai-hat/{str}","UserController@searchSong");

Route::get("search/ca-si/{str}","UserController@searchSinger");

Route::get("search/album/{str}","UserController@searchAlbum");

Route::post("search","UserController@postSearch");

Route::post("signup","LoginController@signup");

Route::get("ajax/songview/{id}/{duration}","AlbumController@ajaxSong");

Route::get("ajax/album/{id}","UserController@getAlbum");

Route::get("ajax/playlist/{id}","UserController@getSongPlaylist");

Route::get('/', "UserController@getHome")->name("gethome");

Route::get('admin/login',"LoginController@getLoginAdmin")->name("login");

Route::post('admin/login',"LoginController@postLoginAdmin");

Route::get('bai-hat', "MusicController@getListSong");

Route::get("bai-hat/{title}","MusicController@getSong")->name("bai-hat");

Route::get('album', "AlbumController@getListAlbum");

Route::get("album/{title}","AlbumController@getAlbum");

Route::get('nghe-si', "UserController@listSinger");

Route::get("nghe-si/{title}","UserController@getSinger");

Route::get("upload","UserController@getUpload");

Route::post("postUpload","UserController@postUpload");

Route::get("ajax/update/{name}","UserController@update");

Route::get('audio',function(){
	return view('user/audio');
});

Route::get('change',"UserController@change");

Route::get('addMusic','MusicController@addMusic');
Route::get('addAlbum','AlbumController@addAlbum');
Route::get('addSinger','SingerController@addSinger');
Route::post('login','UserController@postLogin');

Route::post('ajax/login',"LoginController@ajaxLogin");

Route::group(["middleware"=>"auth"],function(){
	Route::get("playlist","UserController@getPlaylist");

	Route::post("changePass","UserController@changePass");

	Route::get("playlist/{id}","UserController@playlist");

	Route::get("ajax/createPlaylist/{playlist}/{song}","UserController@ajaxCreatePLaylist");

	Route::get("ajax/playlist/{id}/{song}","UserController@ajaxPlaylist");

	Route::get("ajax/getPlaylist/{id}","UserController@ajaxGetPlaylist");

	Route::get("user/logout","LoginController@userLogout");
});

Route::group(["prefix"=>"admin","middleware"=>"admin"],function(){
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
		Route::get("approve","AdminController@getApprove");
		Route::get("approve/{id}","AdminController@approve");
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
