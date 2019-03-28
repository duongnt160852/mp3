<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    public $timestamps=true;
    
    static public function addSinger($name, $title){
        $singer= new Singer;
        $singer->name= $name;
        $singer->title= $title;
        $singer->save();
    }
}
