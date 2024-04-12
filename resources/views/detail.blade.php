@extends('layouts.header')
@section('header')
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
                                                    <img src="{{asset('storage/img/'.$user['image'])}}" class="h-1 img-fluid"></th>
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
                                                <a href="{{ route('post.violation', ['post' => $post['id']]) }}">
                                                    <button type='button' class='btn btn-danger mt-2 rounded-pill '>違反報告</button>
                                                </a>
                                            </div>
                                            <div class ='float-end'>
                                                <form action="{{ route('post.bookmark', ['post' => $post['id']]) }}" method="POST" name="bookmark"  >
                                                @csrf  
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}" /> 
                                                    <button type='submit' class='btn btn-success mt-2 rounded-pill' name="submit">いいね</button>
                                                </form>
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
                                                <img src="{{asset('storage/img/'.$post->image)}}" class="h-1 img-fluid">
                                            </th>
                                            
                                            <form action="{{ route('post.comment', ['post' => $post['id']]) }}" method="POST" name="comment"  >
                                                @csrf    
		                                        <h3 class="form-signin-heading">コメント投稿</h3>
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" /> 
                                                <input type="text" class="form-control" id= "comment" name="comment" placeholder="本文" required="" autofocus=""/> <br>
			                                    <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >送信</button> <br><br>
		                                    </form>	
                                            
                                        </tr>  
                                    </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope='col' style="background-color:ghostwhite">コメント一覧</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
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