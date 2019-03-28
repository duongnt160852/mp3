<?php

namespace App\Http\Controllers;
use App\Music;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\User;

class UserController extends Controller
{

    function getHome(){
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        return view('user/index',['newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics]);
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
