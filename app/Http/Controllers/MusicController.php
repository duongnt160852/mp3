<?php

namespace App\Http\Controllers;
use App\Music;
use App\Singer;
use Aapp\Album;
use Illuminate\Http\Request;

class MusicController extends Controller
{
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
}
