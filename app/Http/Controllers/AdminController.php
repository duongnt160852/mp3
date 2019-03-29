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
        return view('admin/song/add');
    }

    function getEditSong(){
        return view('admin/song/add');
    }

    function getApproveSong(){
        return view('admin/song/approve');
    }
    
    function getAddSinger(){
        return view('admin/singer/add');
    }

    function getListSinger(){
        return view('admin/singer/add');
    }

    function getEditSinger(){
        return view('admin/singer/add');
    }

    function getAddAlbum(){
        return view('admin/album/add');
    }

    function getListAlbum(){
        return view('admin/album/add');
    }

    function getEditAlbum(){
        return view('admin/album/add');
    }

    function getAddTopic(){
        return view('admin/topic/add');
    }

    function getListTopic(){
        return view('admin/topic/add');
    }

    function getEditTopic(){
        return view('admin/topic/add');
    }
    
    function insertAdmin(){
        Admin::insert("admin","123456","admin@gmail.com","admin","1");
    }
}
