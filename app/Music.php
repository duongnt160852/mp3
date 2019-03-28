<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table="musics";

    public $timestamps=true;

    static public function getNewMusics(){
        $newMusics= Music::orderBy('id','desc')->limit(8)->get();
        return $newMusics;
    }

    static public function getMostViewMusics(){
        $mostViewMusics= Music::orderBy('views','desc')->limit(10)->get();
        return $mostViewMusics;
    }

    static public function addMusic($uploader, $name, $title, $link, $musician, $image, $id_album){
        $music= new Music;
        $music->uploader= $uploader;
        $music->name= $name;
        $music->title= $title;
        $music->link= $link;
        $music->views=0;
        $music->musician= $musician;
        $music->status=0;
        $music->image=$image;
        $music->id_album= $id_album;
        $music->save();
    }
}
