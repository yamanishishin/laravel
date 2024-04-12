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
                                    <th scope='col'><img src="{{asset('storage/img/'.Auth::user()->image)}}" class="h-1 img-fluid"></th>
                                    <th scope='col'>{{ Auth::user()->name }}</th>
                                    <th scope='col'>{{ Auth::user()->comment }}</th>
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
                    <div class='text-center'>いいねした投稿</div>
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
                                </th>
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