<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    } 
    public function post(){
        return $this->belongsTo('App\Post');
    } 
}
