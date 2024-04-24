<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use Illuminate\Http\Request;
use App\Http\Requests\CreateDate;
use App\Http\Requests\CreatePost;
use App\Http\Requests\CreateComment;
use App\Http\Requests\CreateViolation;

use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function newPostForm() {
        return view('newpost');
    }

    public function userEditForm(User $user) {
        if(is_null($user)){
            abort(404);
        }
        return view('user_edit',[
            'user' => $user,
        ]);
    }

    public function postEditForm(Post $post) {
        if(is_null($post)){
            abort(404);
        }
        return view('post_edit',[
            'post' => $post,
        ]);
    }

    public function postViolationForm(Post $post) {
        if(is_null($post)){
            abort(404);
        }
        return view('violation',[
            'post' => $post,
        ]);
    }

    public function userListForm() {
        $user = new User;
      
        $users = User::where('role',0)->with(['post' => function ($query) {
            $query->where('del_flg', '1');
        }])
        ->withCount(['post' => function ($query) {
            $query->where('del_flg', '1');
        }])
        ->orderBy('post_count', 'desc')->take(10)->get();

        
        //dd($users);

        return view('user_list',[
            'users' => $users,
        ]);
    }

    public function postHiddenForm(post $post){
        
        $image = $post->image;
        $users = User::find($post->user_id);

        if(is_null($post)){
            abort(404);
        }
        return view('hidden',[
            'user' => $users,
            'post' => $post,
            'image' => $image,
        ]);
    }

    public function postDeleteForm(Post $post){
        if(is_null($post)){
            abort(404);
        }
        $post->delete();  // 物理削除
        return redirect('my_user');
    }

   public function userDeleteForm(User $user){
        if(is_null($user)){
             abort(404);
        }
        //dd($user);
        return view('user_delete',[
            'user' => $user,
        ]);
   }

   public function userDelete(user $user){

        $user = User::find(Auth::user()->id);
        $user->delete();  // 物理削除
        return redirect('login');
    }

   public function userStop(user $user) {
        if(is_null($user)){
            abort(404);
        }
        if($user->del_flg == 0){
            $user->del_flg = 1;
        }
        elseif($user->del_flg == 1){
            $user->del_flg = 0;
        }

        $user->save();
        return redirect('user_list');
   }

    public function postComment(Post $post,CreateComment $request){

        $comment = new Comment;

        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        //dd($comment);
        Auth::user()->comment()->save($comment);
        return redirect()->route('post.detail',['post' => $post['id']]);

    }

    public function postBookmark(Post $post,Request $request){

        $bookmark = new Bookmark;

        $bookmark->user_id = $request->user_id;
        $bookmark->post_id = $request->post_id;
        //dd($bookmark);
        Auth::user()->bookmark()->save($bookmark);
        return redirect()->route('post.detail',['post' => $post['id']]);

    }

    public function postViolation(Post $post,CreateViolation $request) {
         
        $violation = new Violation;

        $violation->user_id = $request->user_id;
        $violation->post_id = $request->post_id;
        $violation->title = $request->title;
        $violation->reason = $request->reason;
    
        Auth::user()->violation()->save($violation);
        return redirect('/');
    }

    public function postEdit(Post $post,CreatePost $request) {

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
        return redirect()->route('post.detail',['post' => $post['id']]);
    }

    public function userEdit(CreateDate $request) {

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
        return redirect('my_user');
    }

    public function postHidden(Post $post){

        if(is_null($post)){
            abort(404);
        }
        if($post->del_flg == 0){
            $post->del_flg = 1;
        }
        elseif($post->del_flg == 1){
            $post->del_flg = 0;
        }
        

        $post->save();
        return redirect('/');
    }

   

}
