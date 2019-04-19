<?php

namespace App\Http\Controllers;
use App\Music;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\User;

class UserController extends Controller
{

    function change(){
        $a="Nguyễn Tùng Dương 123456";
        $a=changeTitle($a);
        echo $a;
    }

    function getHome(){
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        $newAlbums=Album::getNewAlbums();
        $mostViewAlbums=Album::getMostViewAlbums();
        return view('user/index',['newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics,'newAlbums'=>$newAlbums,'mostViewAlbums'=>$mostViewAlbums]);
    }

    function ajaxLogin(Request $request, $username, $password){
        if (Auth::attempt(["username"=>$request->username, "password"=>$request->password, "status"=>"1"])){
            return redirect("user/index")->with('user',Auth::user());
        }
    }

    function insertUser(){
        User::insert("nhaccuachungtui","123456","nhaccuachungtui@gmail.com","Nhạc của chúng tôi");
        echo "Insert succesfully!";
    }
}
