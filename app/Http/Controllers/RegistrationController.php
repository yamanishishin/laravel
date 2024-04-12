<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use InterventionImage;

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

    public function userEditForm(User $user) {
        return view('user_edit',[
            'user' => $user,
        ]);
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
        return view('user_delete',[
            'user' => $user,
        ]);
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

        $post = Post::find($post->id);

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->region = $request->region;
        $post->episode = $request->episode;
        //$post->image = $request->image;

        // 画像がアップロードされた場合、新しい画像を保存して既存の画像を上書きする
        if ($request->hasFile('image')) {

        $dir = 'img';
    
        $file_name = $request->file('image')->getClientOriginalName();
    
        $request->file('image')->storeAs('public/' . $dir, $file_name);
    
        $post->image = $file_name;
    
    }
    
        $post->save(); 
        return redirect('/');
    }

    public function userEdit(Request $request) {

        $user = Auth::user();

        $user->name = $request->name;
        $user->comment = $request->comment;
        $user->email = $request->email;
        //$user->image = $request->image;

        // 画像がアップロードされた場合、新しい画像を保存して既存の画像を上書きする
        if ($request->hasFile('image')) {

            $dir = 'img';
        
            $file_name = $request->file('image')->getClientOriginalName();
        
            $request->file('image')->storeAs('public/' . $dir, $file_name);

            //InterventionImage::$request->file('image')->resize(80, 80);
        
            $user->image = $file_name;
        }
        else{
            $dir = 'img';

            $file_name = $request->file('image')->getClientOriginalName();
    
            $request->file('image')->storeAs('public/' . $dir, $file_name);

            //InterventionImage::$request->file('image')->resize(80, 80);
    
            $user->image = $file_name;
        }
        
        $user->save();
        return redirect('/');
    }

    public function userDelete(){

        $user->delete();  // 物理削除
        return redirect('login');
    }

}
