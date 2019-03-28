<?php

namespace App\Http\Controllers;
use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    function addAlbum(){
        $name="Một bước yêu, vạn dặm đau";
        $title="Mot-buoc-yeu-van-dam-dau";
        Album::addAlbum($name, $title);
    }
}
