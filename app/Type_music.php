<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_music extends Model
{
    protected $table="topic_music";
    public $timestamps=false;
    static public function add($idSong, $idTopic){
    	$a= new Type_music;
    	$a->id_topic=$idTopic;
    	$a->id_music=$idSong;
    	$a->save();
    }

    public function topic(){
    	return $this->hasOne(Topic::class,"id","id_topic");
    }
}
