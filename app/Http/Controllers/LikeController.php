<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function ajaxbookmark(Request $request)
    {
        //dd($request);
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $bookmark = new Bookmark;
        $post = Post::findOrFail($post_id);

        

        // 空でない（既にいいねしている）なら
        if ($bookmark->bookmark_exist($id, $post_id)) {
            //テーブルのレコードを削除
            $bookmark = Bookmark::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）なら新しいレコードを作成する
            $bookmark = new Bookmark;
            $bookmark->post_id = $request->post_id;
            $bookmark->user_id = Auth::user()->id;
            $bookmark->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postBookmarksCount = $post->loadCount('bookmarks')->bookmarks_count;

        //一つの変数にajaxに渡す値をまとめる
        
        $json = [
            'postBookmarksCount' => $postBookmarksCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}

