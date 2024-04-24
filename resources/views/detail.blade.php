@extends('layouts.header')
@section('header')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas </h1><br>
        </div>
        <main class="py-4 "> 
        <div class="row justify-content-center mt-4">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header ">
                            <div class='text-center'>詳細</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class='panel-body'>
                                @if($errors->any())
                                    <div class='alert alert-danger'>
                                        <li>コメント本文は必須入力です。</li>
                                    </div>
                                @endif
                            </div>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col' style="background-color:ghostwhite">ユーザーアイコン</th>
                                            <th scope='col' style="background-color:ghostwhite">ユーザー名</th>
                                            <th scope='col' style="background-color:ghostwhite">タイトル</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope='col'>
                                                <a href="{{ route('other.user', ['user' => $user['id']]) }}">
                                                    <img src="{{asset('storage/img/'.$user['image'])}}" class="h-1 img-fluid" width="80" height="80"></th>
                                                </a>
                                            <th scope='col'>{{ $user['name'] }}</th>
                                            <th scope='col'>{{ $post['title'] }}</th>
                                        </tr>  
                                    </tbody>
                                </table>
                                <div class="card-body">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope='col' style="background-color:ghostwhite">エピソード</th>
                                            <th scope='col' style="background-color:ghostwhite">カントリー</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope='col'>{{ $post['episode'] }}</th>
                                            <th scope='col'>{{ $post['region'] }}
                                                <div class ='float-end'>
                                                @if($bookmark_model->bookmark_exist(Auth::user()->id,$post->id))
                                                <p class="favorite-marke" >
                                                    <a class="js-bookmark-toggle loved"   href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"  ></i></a>
                                                    <span class="bookmarksCount" >{{$post->bookmarks_count}}</span>
                                                </p>
                                                @else
                                                <p class="favorite-marke">
                                                    <a class="js-bookmark-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart" ></i></a>
                                                    <span class="bookmarksCount">{{$post->bookmarks_count}}</span>
                                                </p>
                                                @endif
                                                </div>
                                            </th>
                                        </tr>  


                                    </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope='col'>
                                                <img src="{{asset('storage/img/'.$post->image)}}" class="h-1 img-fluid" width="550" height="450">
                                            </th>
                                            <th scope='col'>
                                                <form action="{{ route('post.comment', ['post' => $post['id']]) }}" method="POST" name="comment"  >
                                                @csrf    
		                                            <h3 class="form-signin-heading">コメント投稿</h3>
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}" /> 
                                                    <input type="text" class="form-control" id= "comment" name="comment" value="{{ old('comment') }}" placeholder="本文"  autofocus=""/> <br>
			                                        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >送信</button> <br><br>
		                                        </form>	
                                                <div class ='float-end'>
                                                <a href="{{ route('post.violation', ['post' => $post['id']]) }}">
                                                    <button type='button' class='btn btn-danger mt-2 rounded-pill '>違反報告</button>
                                                </a>
                                            </div>
                                            </th>
                                            
                                        </tr>  
                                    </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope='col' style="background-color:ghostwhite">ユーザー名</th>
                                            <th scope='col' style="background-color:ghostwhite">日付</th>
                                            <th scope='col' style="background-color:ghostwhite">コメント本文</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <th scope='col'>{{ $comment->user->name }}</th>
                                            <th scope='col'>{{ $comment['created_at'] }}</th>
                                            <th scope='col'>{{ $comment['comment'] }}</th>
                                        </tr>  
                                    </tbody>
                                    @endforeach  
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
   

        </main>    
    </body>
</html>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(function () {
    var bookmark = $('.js-bookmark-toggle');
    var bookmarkPostId;
    
    bookmark.on('click', function () {
        var $this = $(this);
        bookmarkPostId = $this.data('postid');
        $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                url: '/ajaxbookmark',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': bookmarkPostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.bookmarksCount').html(data.postBookmarksCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
</script>