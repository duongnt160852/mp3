<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistMusic extends Model
{
    protected $table="playlist_music";
    public $timestamps=false;

    public function music(){
    	return $this->hasOne(Music::class,"id","id_music");
    }

    static public function add($a,$b){
    	$x= new PlaylistMusic;
    	$x->id_playlist=$a;
    	$x->id_music=$b;
    	$x->save();
    }
}
