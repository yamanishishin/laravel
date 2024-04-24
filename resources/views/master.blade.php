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
                                    <th scope='col' style="background-color:ghostwhite">コメント</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='col'><img src="{{asset('storage/img/'.Auth::user()->image)}}" class="h-1 img-fluid" width="80" height="80"></th>
                                    <th scope='col'>{{ Auth::user()->name }}</th>
                                    <th scope='col'>違反報告の多い投稿を表示中
                                    <div class ='float-end'>
                                        <a href="{{ route('user.list') }}">
                                            <button type="button"  class="btn btn-dark rounded-pill " >一般ユーザーリストへ</button>
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
                                    <th scope='col' style="background-color:ghostwhite">違反報告数</th>
                                    <th scope='col' style="background-color:ghostwhite">タイトル</th>
                                    <th scope='col' style="background-color:ghostwhite">カントリー</th>
                                    <th scope='col' style="background-color:ghostwhite">エピソード</th>
                                    <th scope='col' style="background-color:ghostwhite">表示切替</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <th scope='col'>{{ $post['violation_count'] }}</th>
                                    <th scope='col'>{{ $post['title'] }}</th>
                                    <th scope='col'>{{ $post['region'] }}</th>
                                    <th scope='col'>{{ $post['episode'] }}
                                    <div class ='float-end'>
                                        <a href="{{ route('post.hidden', ['post' => $post['id']]) }}">
                                            <button type='button' class='btn btn-primary mt-2 rounded-pill '>詳細</button>
                                        </a>
                                     </div>
                                    </th>
                                    @if($post['del_flg'] == 0)
                                    <th scope='col'>
                                        <form action="{{ route('post.hidden', ['post' => $post['id']]) }}" method="POST" name="hidden"  >
                                        @csrf  
                                            <input type="hidden" name="del_flg" value="1" /> 
                                            <button type='submit' class='btn btn-success mt-2 rounded-pill' name="submit">非表示にする</button>
                                        </form>
                                    </th>
                                    @else
                                    <th scope='col'>
                                        <form action="{{ route('post.hidden', ['post' => $post['id']]) }}" method="POST" name="hidden"  >
                                        @csrf  
                                            <input type="hidden" name="del_flg" value="0" /> 
                                            <button type='submit' class='btn btn-warning mt-2 rounded-pill' name="submit">表示にする</button>
                                        </form>
                                    </th>
                                    @endif
                                    
                                </tr>        
                                @endforeach    
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