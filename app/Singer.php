<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table="singers";
    public $timestamps=true;
    
    static public function addSinger($name, $title, $status=0,$image){
        $singer= new Singer;
        $singer->name= $name;
        $singer->title= $title;
        $singer->status=$status;
        $singer->image=$image;
        $singer->save();
    }

    static public function id($name){
    	$id=Singer::where("name",$name)->get()[0]->id;
    	return $id;
    }
}
