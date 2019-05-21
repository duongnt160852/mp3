<?php

namespace App\Http\Controllers;
use App\Music;
use App\User;
use App\Singer;
use App\Album;
use App\PlaylistMusic;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;


class MusicController extends Controller
{

    function getSong(Request $request){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        $song=Music::where("title",$request->title)->get()[0];
        $randomMusics=Music::getRandomMusic(10);
        return view("user/song",["song"=>$song,"mostViewMusics"=>$randomMusics,"user"=>$user,"id"=>$id]);
    }

    function getListSong(){
        $user=Auth::user();
        $newMusics=Music::getNewMusics(24);
        $mostViewMusics=Music::getMostViewMusics(12);
        return view("user/listSong",["newMusics"=>$newMusics,"mostViewMusics"=>$mostViewMusics,"user"=>$user]);
    }

    function addMusic(){
        $uploader="nhaccuachungtui";
        $name="Trú mưa 12345612";
        $title="Trú mưa 12345612";
        $link="123";
        $musician="123";
        $image="hkt.jpg";
        $id_album="1";
        Music::addMusic($uploader, $name, $title, $link, $musician, $image, $id_album);
    }

    public function getDownload(){
        $playlistsong=PlaylistMusic::where([["id_playlist","1"],["id_music","1"]])->get()->first();
        dd($playlistsong);
    }
}
