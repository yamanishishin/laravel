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
                                    <th scope='col'>非表示件数の多いユーザーを表示中
                                    <div class ='float-end'>
                                        <a href="{{ url('/') }}">
                                            <button type="button"  class="btn btn-dark rounded-pill " >投稿リストへ</button>
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
                    <div class='text-center'>ユーザー</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col' style="background-color:ghostwhite">ユーザーアイコン</th>
                                    <th scope='col' style="background-color:ghostwhite">表示停止件数</th>
                                    <th scope='col' style="background-color:ghostwhite">ユーザー名</th>
                                    <th scope='col' style="background-color:ghostwhite">ユーザーコメント</th>
                                    <th scope='col' style="background-color:ghostwhite">利用切替</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                        <th scope='col'> <img src="{{asset('storage/img/'.$user['image'])}}" class="h-1 img-fluid" width="80" height="80"></th>
                                        <th scope='col'>{{ $user['post_count'] }}</th>
                                        <th scope='col'>{{ $user['name'] }}</th>
                                        <th scope='col'>{{ $user['comment'] }}</th>
                                    @if($user['del_flg'] == 0)
                                        <th scope='col'>
                                            <a href="{{ route('user.stop', ['user' => $user['id']]) }}">
                                                <button type='button' class='btn btn-success mt-2 rounded-pill '>利用停止</button>
                                            </a>
                                        </th>
                                    @else
                                        <th scope='col'>
                                            <a href="{{ route('user.stop', ['user' => $user['id']]) }}">
                                                <button type='button' class='btn btn-warning mt-2 rounded-pill '>利用停止解除</button>
                                            </a>
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