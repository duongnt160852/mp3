<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps=true;

    static public function addAlbum($name, $title){
        $album= new Album;
        $album->name= $name;
        $album->title= $title;
        $album->save();
    }

    static public function getMostViewAlbums(){
        $mostViewAlbums= Music::orderBy('views','desc')->limit(10)->get();
        return $mostViewAlbums;
    }
}
