<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    public $table = 'posts';
    protected $fillable = ['user_id','title', 'region', 'episode', 'image'];

    public function user(){
        return $this->belongsTo('App\Post');
    } 
    public function bookmarks(){
        return $this->hasMany('App\Bookmark');
    }
    
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    //public function bookmark(){return $this->hasMany('App\Bookmark');}
    public function violation(){
        return $this->hasMany('App\Violation');
    }

    
 

}

