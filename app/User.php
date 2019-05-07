<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps=false;
    static public function insert($username, $password, $email, $name, $status=1){
        $user= new User;
        $user->id=User::max("id")+1;
        $user->username= $username;
        $user->password= bcrypt($password);
        $user->email= $email;
        $user->name= $name;
        $user->status=$status;
        $user->save();
    }

    public function playlist(){
        return $this->hasMany(Playlist::class,"id_user","id");
    }
}
