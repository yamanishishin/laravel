<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';
    public $timestamps = false;
    public $comment = false;
    
    
    public function user(){
        return $this->belongsTo('App\User');
    } 
    public function post(){
        return $this->belongsTo('App\Post');
    } 

    //いいねされてるかどうか
    public function bookmark_exist($user_id, $post_id) {        
        return Bookmark::where('user_id', $user_id)->where('post_id', $post_id)->exists();       
        }
}
