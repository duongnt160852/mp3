<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album_singer extends Model
{
    protected $table="album_singer";

    public $timestamps=false;

    static function albumSingerAdd($idAlbum, $idSinger){
    	$a= new Album_singer;
    	$a->id_album= $idAlbum;
    	$a->id_singer= $idSinger;
    	$a->save();
    }

    public function singer(){
    	return $this->hasOne(Singer::class,"id","id_singer");
    }
}
