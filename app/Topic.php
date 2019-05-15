<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $table="topic";

	public $timestamps=false;

    static public function addTopic($name){
    	$topic= new Topic;
    	$topic->name= $name;
    	$topic->title=changeTitle($name);
        $topic->status=1;
    	$topic->save();
    }
    
    static public function id($name){
    	$id=Topic::where("name",$name)->get()[0]->id;
    	return $id;
    }
}
