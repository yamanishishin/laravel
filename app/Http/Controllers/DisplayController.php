<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(Request $request){
       
        $post = new Post;
        $posts = $post->all()->where('del_flg','0')->toArray();

        return view('main',[
            'posts' => $posts,
        ]);
    }

    public function mainForm(){
        $post = new Post;
        $posts = $post->all()->where('del_flg','0')->toArray();

        return view('main',[
            'posts' => $posts,
        ]);
    }

    public function postDetail(Post $post){

        

        //dd($post);
        return view('detail',[
            'post' => $post,
        ]);
        
    }

    public function postViolationForm(Post $post){

        return view('violation',[
            'post' => $post,
        ]);
    }

    public function myUser(User $user){

        $post = new Post;
        $posts = Auth::user()->post()->where('del_flg','0')->get();
        return view('my_user',[
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
