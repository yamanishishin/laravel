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
                                            <th scope='col'><img src="{{asset('storage/img/'.$user['image'])}}" class="h-1 img-fluid" width="80" height="80"></th>
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
                                            <th scope='col'>{{ $post['region'] }}</th>
                                        </tr>  
                                    </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope='col'>
                                                <img src="{{asset('storage/img/'.$post->image)}}" class="h-1 img-fluid" width="850" height="650">
                                            </th>
                                            <th scope='col'>
                                                <a href="{{ url('/') }}">
                                                    <button type="button"  class="btn btn-dark rounded-pill " >投稿リストへ</button>
                                                 </a> <br> <br> <br> <br>
                                                <form action="{{ route('post.hidden', ['post' => $post['id']]) }}" method="POST" name="hidden"  >
                                                    @csrf  
                                                    <input type="hidden" name="del_flg" value="1" /> 
                                                    <button type='submit' class='btn btn-success mt-2 rounded-pill' name="submit">非表示にする</button>
                                                </form>
                                            </th>
                                        </tr>  
                                    </tbody>
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