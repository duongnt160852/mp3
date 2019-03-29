<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps=true;

    static public function addAlbum($name, $title, $image){
        $album= new Album;
        $album->name= $name;
        $album->title= $title;
        $album->views=0;
        $album->image= $image;
        $album->save();
    }

    static public function getMostViewAlbums(){
        $mostViewAlbums= Album::orderBy('views','desc')->limit(10)->get();
        return $mostViewAlbums;
    }

    static public function getNewAlbums(){
        $newAlbums= Album::orderBy('id','desc')->limit(7)->get();
        return $newAlbums;
    }
}
