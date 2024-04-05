<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comment(){
        return $this->belongsToMany('App\Comment','post_id','user_id','id');
    }
    public function bookmark(){
        return $this->belongsToMany('App\bookmark','post_id','user_id','id');
    }
    public function violation(){
        return $this->belongsToMany('App\violation','post_id','user_id','id');
    }
}
