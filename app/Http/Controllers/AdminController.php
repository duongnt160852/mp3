<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

class AdminController extends Controller
{

    function getHome(){
        return view('admin/admin/home');
    }

    function getAddSong(){
        return view('admin/song/add');
    }

    function getListSong(){
        return view('admin/song/list');
    }

    function getEditSong(){
        return view('admin/song/edit');
    }

    function postAddSong(){

    }

    function postEditSong(){
        
    }

    function deleteSong(){

    }

    function getApproveSong(){
        return view('admin/song/approve');
    }
    
    function getAddSinger(){
        return view('admin/singer/add');
    }

    function getListSinger(){
        return view('admin/singer/list');
    }

    function getEditSinger(){
        return view('admin/singer/edit');
    }

    function postAddSinger(){
        
    }

    function postEditSinger(){
        
    }

    function deleteSinger(){

    }
    
    function getAddAlbum(){
        return view('admin/album/add');
    }

    function getListAlbum(){
        return view('admin/album/list');
    }

    function getEditAlbum(){
        return view('admin/album/edit');
    }

    function postAddAlbum(){
        
    }

    function postEditAlbum(){
        
    }

    function deleteAlbum(){

    }

    function getAddTopic(){
        return view('admin/topic/add');
    }

    function getListTopic(){
        return view('admin/topic/list');
    }

    function getEditTopic(){
        return view('admin/topic/edit');
    }

    function postAddTopic(){
        
    }

    function postEditTopic(){
        
    }

    function deleteTopic(){

    }
    
    function insertAdmin(){
        Admin::insert("admin","123456","admin@gmail.com","admin","1");
    }
}
