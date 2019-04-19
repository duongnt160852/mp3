<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music_singer extends Model
{
	protected $table="music_singer";
	public $timestamps=false;
    static public function musicSingerAdd($idSong, $idSinger){
    	$a= new Music_singer;
    	$a->id_singer=$idSinger;
    	$a->id_music=$idSong;
    	$a->save();
    }

    public function singer(){
    	return $this->hasOne(Singer::class,'id','id_singer');
    }
}
