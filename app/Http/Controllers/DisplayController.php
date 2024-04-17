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

        $id = $post->id;
        $user_id = $post->user_id;
        $image = $post->image;

        $comment = new Comment;
        $comments = $comment->all()->where('post_id', $id)->toArray();

        $user = new User;
        $users = $user->all()->where('id',$user_id)->toArray();
        //dd($post);

        return view('detail',[
            'post' => $post,
            'comments' => $comments,
            'user' => $users[0],
            'image' => $image,
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

    public function otherUser(User $user){

        $post = new Post;
        $posts = $user->post()->where('del_flg','0')->get();
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
