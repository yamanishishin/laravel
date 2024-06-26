<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','comment','image', 'password','del_flg','role'
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


    public function post(){
        return $this->hasMany('App\Post');
    }
    public function bookmarks(){
        return $this->hasMany('App\Bookmark');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    //public function bookmark(){return $this->hasMany('App\bookmark');}
    public function violation(){
        return $this->hasMany('App\Violation');
    }



   

}
