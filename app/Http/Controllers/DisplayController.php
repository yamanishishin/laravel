<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index(){
       
        $post = new Post;
        $posts = $post->all()->where('del_flg','0')->toArray();

        return view('detail',[
            'posts' => $posts,
        ]);
    }
}
