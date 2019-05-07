<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table="playlists";
    public $timestamps=true;

    public function playlistMusic(){
    	return $this->hasMany(PlaylistMusic::class,"id_playlist","id");
    }

    static public function add($name, $idUser){
    	$a= new Playlist;
    	$a->name=$name;
    	$a->id_user=$idUser;
    	$a->save();
    }
}
