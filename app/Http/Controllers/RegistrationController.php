<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{


    public function pwresetForm() {
        return view('pw_reset');
    }


    public function newPostForm() {
        return view('newpost');
    }

    public function userEditForm() {
        return view('user_edit');
    }

    public function postEditForm(Post $post) {

        return view('post_edit',[
            'post' => $post,
        ]);
    }

    public function postViolationForm(Post $post) {
        //dd($post);

        return view('violation',[
            'post' => $post,
        ]);
    }



    public function postDeleteForm(Post $post){
        $post->delete();  // 物理削除
        return redirect('my_user');
    }

   public function userDeleteForm(User $user){
        $user->delete();  // 物理削除
        return redirect('/');
    }

   

    public function newPost(Request $request) {
         
        $post = new Post;

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->region = $request->region;
        $post->episode = $request->episode;
        //$post->image = $request->image;
        

        Auth::user()->post()->save($post);
        return redirect('/');
    }

    public function postComment(Post $post,Request $request){

        $comment = new Comment;

        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        //dd($comment);

        Auth::user()->comment()->save($comment);
        return redirect('/');

    }

    public function postBookmark(Post $post,Request $request){

        $bookmark = new Bookmark;

        $bookmark->user_id = $request->user_id;
        $bookmark->post_id = $request->post_id;
        //dd($bookmark);

        Auth::user()->bookmark()->save($bookmark);
        return redirect('/');

    }




    public function postViolation(Post $post,Request $request) {
         
        $violation = new Violation;

        $violation->user_id = $request->user_id;
        $violation->post_id = $request->post_id;
        $violation->title = $request->title;
        $violation->reason = $request->reason;
        

        Auth::user()->violation()->save($violation);
        return redirect('/');
    }

    public function postEdit(Post $post, Request $request) {

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->region = $request->region;
        $post->episode = $request->episode;
        //$post->image = $request->image;
        

        Auth::user()->post()->save($post);
        return redirect('/');
    }

    

}
