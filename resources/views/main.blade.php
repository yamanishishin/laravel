@extends('layouts.header')
@section('header')

<div class="border" >
    <br><h1 style='text-align:center '>Overseas 
    <div class ='float-end'>
        <a href="{{ route('new.post') }}">
            <button type="button"  class="btn btn-dark rounded-pill " >新規投稿</button>
        </a>
    </div> </h1><br>
</div>

<main class="py-4 "> 
    <div class="row justify-content-center ">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <form>
                    @csrf    
                        <div class="container-fluid">
                            <div class="container">
                                <div class="card mt-4">
                                    <input type="text" name="kensaku"  class="col-sm" placeholder="タイトルorエピソードorカントリー" value="">
                                    
                                </div>
                                <div class="pt-4 ">
                                    <input type="date" name="from"  class="mt-1" placeholder="from_date" value="">
                                    <span class="mt-2">～</span>
                                    <input type="date" name="until"  class="mt-1" placeholder="until_date" value="">
                                    <div class ='float-end'>
                                    <button type='submit' class='btn btn-primary mt-2 rounded-pill '>検索</button>
                                </div>
                            </div> 
                        </div>
                    </form>
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
                                            <a href="{{ route('post.detail', ['post' => $post['id']]) }}">
                                            <button type='button' class='btn btn-primary mt-2 rounded-pill '>詳細</button>
                                            </a>
                                        </div>
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