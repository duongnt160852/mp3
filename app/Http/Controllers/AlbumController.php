<?php

namespace App\Http\Controllers;
use App\Album;
use App\Music;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class AlbumController extends Controller
{
    function addAlbum(){
        $name="Một bước yêu, vạn dặm đau 8";
        $title="Mot-buoc-yeu-van-dam-dau 8";
        $image="images/mot-buoc-yeu-van-dam-dau.jpg";
        Album::addAlbum($name, $title, $image);
    }

    function getAlbum($title){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        $randomMusics=Music::getRandomMusic(10);
    	$album=Album::where("title",$title)->get()[0];
    	return view("user/album",["album"=>$album,"mostViewMusics"=>$randomMusics,"user"=>$user,"id"=>$id]);
    }

    function getListAlbum(){
        if (Auth::check()) $user=User::find(Auth::user()->id);
        else $user=null;
        $newAlbums=Album::getNewAlbums(24);
        $mostViewAlbums=Album::getMostViewAlbums(12);
        return view("user/listAlbum",["newAlbums"=>$newAlbums,"mostViewAlbums"=>$mostViewAlbums,"user"=>$user]);
    }

    function ajaxSong($id , $duration){
        $song=Music::find($id);
        if(!session($song->title)){
            $song->views+=1;
            $song->save();
            session([$song->title => time()]);
        }
        else if((time()-session($song->title))>$duration){
            $song->views+=1;
            $song->save();
            session([$song->title => time()]);
        }
        else{
            session([$song->title => time()]);
        } 
        echo session($song->title);
    }
}
