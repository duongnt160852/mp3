<?php

namespace App\Http\Controllers;
use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    function addAlbum(){
        $name="Một bước yêu, vạn dặm đau 8";
        $title="Mot-buoc-yeu-van-dam-dau 8";
        $image="images/mot-buoc-yeu-van-dam-dau.jpg";
        Album::addAlbum($name, $title, $image);
    }
}
