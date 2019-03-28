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

Route::group(['prefix'=>'admin'],function(){
    Route::get('insert','AdminController@insertAdmin');
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


