<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
	protected $table="admins";
	protected $guard = 'admin';
	protected $primaryKey = 'id';
	protected $fillable = [
        'username', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

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
