<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookmark;
use App\Comment;
use App\User;
use App\Violation;

use \InterventionImage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = new Post;
        
        $kensaku = $request->input('kensaku');
        $from = $request->input('from');
        $until = $request->input('until');

        // 日付検索
        if (isset($from) && isset($until)) {
            $posts = $post->all()->where('del_flg','0')->whereBetween('created_at', [$from, $until])->toArray();

            
            return view('main',[
                'posts' => $posts,
                'from' => $from,
                'until' => $until,
                'kensaku' => $kensaku,
            ]);
        //キーワード部分検索
        }elseif (isset($kensaku)) {
            $posts = $post->all()->where('del_flg','0')->where('title', 'LIKE', "%{$kensaku}%")
                                                        ->orWhere('region','LIKE',"%{$kensaku}%")
                                                        ->orWhere('episode','LIKE',"%{$kensaku}%")
                                                        ->toArray();
            

            dd($posts);
            return view('main',[
                'posts' => $posts,
                'from' => $from,
                'until' => $until,
                'kensaku' => $kensaku,
            ]);
        }
        else{
            $posts = $post->all()->where('del_flg','0')->toArray();

            return view('main',[
                'posts' => $posts,
            ]);
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->region = $request->region;
        $post->episode = $request->episode;

        //画像を空にした時の条件分岐いれる  

        // ディレクトリ名
        $dir = 'img';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

         // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $post->image = $file_name;
        Auth::user()->post()->save($post);
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
