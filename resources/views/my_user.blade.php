@extends('layouts.header')
@section('header')

<div class="border" >
    <br><h1 style='text-align:center '>Overseas </h1><br>
</div>

<main class="py-4 "> 
    <div class="row justify-content-center ">
        <div class="col-md">
            <div class="card">
                <div class="card-body"> 
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col' style="background-color:ghostwhite">ユーザーアイコン</th>
                                    <th scope='col' style="background-color:ghostwhite">ユーザー名</th>
                                    <th scope='col' style="background-color:ghostwhite">ユーザーコメント</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='col'><img src="{{asset('storage/img/'.Auth::user()->image)}}" class="h-1 img-fluid" width="80" height="80"></th>
                                    <th scope='col'>{{ Auth::user()->name }}</th>
                                    <th scope='col'>{{ Auth::user()->comment }}
                                    <div class ='float-end'>
                                        <a href="{{ route('user.edit') }}">
                                            <button type="button"  class="btn btn-dark rounded-pill " >アカウント編集</button>
                                        </a>
                                    </div> </th>
                                </tr>  
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md">
            <div class="card">
                <div class="card-header ">
                    <div class='text-center'>投稿</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col' style="background-color:ghostwhite">タイトル</th>
                                    <th scope='col' style="background-color:ghostwhite">カントリー</th>
                                    <th scope='col' style="background-color:ghostwhite">エピソード</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <th scope='col'>{{ $post['title'] }}</th>
                                    <th scope='col'>{{ $post['region'] }}</th>
                                    <th scope='col'>{{ $post['episode'] }}
                                <div class ='float-end'>
                                    <a href="{{ route('post.edit', ['post' => $post['id']]) }}">
                                        <button type='button' class='btn btn-primary mt-2 rounded-pill '>編集</button>
                                    </a>
                                    <a href="{{ route('post.delete', ['post' => $post['id']]) }}">
                                        <button type='button' class='btn btn-warning mt-2 rounded-pill '>削除</button>
                                    </a>
                                </div> 
                                </th>
                                </tr>        
                                @endforeach    
                            </tbody>
                        </table>
                        <table class='table'>
                            
                            <tbody>
                                <tr>
                                    <th scope='col'>
                                        <a href="{{ route('new.post') }}">
                                            <button type="button"  class="btn btn-success rounded-pill " >新規投稿</button>
                                        </a>
                                    </th>
                                    <th scope='col'>
                                        <a href="{{ route('my.bookmark') }}">
                                            <button type="button"  class="btn btn-info rounded-pill " >いいねした投稿</button>
                                        </a>
                                    </th>
                                    <th scope='col'>
                                        <a href="{{ route('user.delete.form') }}">
                                            <button type="button"  class="btn btn-danger rounded-pill " >退会</button>
                                        </a>
                                    </th>
                                </tr>  
                            </tbody>
                            
                        </table>
                    </div>
                </div> 
            </div>
        </div>
</main>
</body>
</html>
@endsection