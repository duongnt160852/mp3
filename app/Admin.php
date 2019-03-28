<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    static public function insert($username, $password, $email, $name, $level){
        $admin= new Admin;
        $admin->username= $username;
        $admin->password= \bcrypt($password);
        $admin->email= $email;
        $admin->name= $name;
        $admin->level= $level;
        $admin->save();
    }
}
