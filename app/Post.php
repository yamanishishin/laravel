<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    public $table = 'posts';
    protected $fillable = ['user_id','title', 'region', 'episode', 'image'];

    public function user(){
        return $this->belongsTo('App\Post','user_id','id');
    } 

    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function bookmark(){
        return $this->hasMany('App\bookmark');
    }
    public function violation(){
        return $this->hasMany('App\violation');
    }
}

