<?php

namespace App;

use App\Music_singer;

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

    static public function addMusic($id,$uploader, $name, $title, $status=0, $lyric, $link, $musician, $image, $id_album){
        $music= new Music;
        $music->id=$id;
        $music->status=$status;
        $music->uploader= $uploader;
        $music->name= $name;
        $music->title= $title;
        $music->link= $link;
        $music->lyric=$lyric;
        $music->views=0;
        $music->musician= $musician;
        $music->status=$status;
        $music->image=$image;
        $music->id_album= $id_album;
        $music->save();
    }

    public function music_singer(){
        return $this->hasMany(Music_singer::class,'id_music','id');
    }

    public function album(){
        return $this->hasOne(Album::class,'id','id_album');
    }

    public function music_topic(){
        return $this->hasMany(Type_music::class,"id_music","id");
    }
}
