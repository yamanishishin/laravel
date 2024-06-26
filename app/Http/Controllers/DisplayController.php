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
        $posts = post::where('del_flg','0')->get();

        return view('main',[
            'posts' => $posts,
        ]);
    }

    public function mainForm(){

        $posts = post::where('del_flg','0')->get();

        return view('main',[
            'posts' => $posts,
        ]);
    }

    public function postDetail(Post $post){

        // 投稿に関連するコメントを取得
        $comments = Comment::with('user')->where('post_id', $post->id)->get();
        // 投稿に関連するユーザーを取得
        $user = User::find($post->user_id);

        $bookmark_model = new Bookmark;
       //dd($comments);

        if(is_null($post)){
            abort(404);
        }

        return view('detail',[
            'post' => $post,
            'comments' => $comments,
            'user' => $user,
            'bookmark_model' => $bookmark_model,
        ]);
        
    }

    public function myUser(User $user){

        $post = new Post;
        $posts = Auth::user()->post()->where('del_flg','0')->get();

        if(is_null($user)){
            abort(404);
        }
        return view('my_user',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function otherUser(User $user){

        $post = new Post;
        $posts = $user->post()->where('del_flg','0')->get();

        if(is_null($user)){
            abort(404);
        }
        return view('other_user',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function myBookmark(){

        $post = new Post;
        $user_id = Auth::user()->id ;
        
        //$posts = $post->with('bookmark')->whereHas('user_id',$user_id)->get();
        $posts = $post->with('bookmark')->whereHas('bookmark',function ($q) use($user_id){
            $q->where('user_id',$user_id);
        })->get();
        //dd($posts);
        return view('my_bookmark',[
            
            'posts' => $posts
        ]);
    }
}
