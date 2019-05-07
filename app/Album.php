<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps=true;

    static public function addAlbum($id, $name, $title, $image, $status=0){
        $album= new Album;
        $album->id=$id;
        $album->name= $name;
        $album->title= $title;
        $album->views=0;
        $album->image= $image;
        $album->status= $status;
        $album->save();
    }

    static public function getMostViewAlbums($num=10){
        $mostViewAlbums= Album::orderBy('views','desc')->limit($num)->get();
        return $mostViewAlbums;
    }

    static public function getNewAlbums($num=7){
        $newAlbums= Album::orderBy('id','desc')->limit($num)->get();
        return $newAlbums;
    }

    public function album_singer(){
        return $this->hasMany(Album_singer::class,"id_album","id");
    }

    public function albumMusic(){
        return $this->hasMany(Music::class,"id_album","id");
    }
}
