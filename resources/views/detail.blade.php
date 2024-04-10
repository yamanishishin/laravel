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
                                            <th scope='col'>{{ $post->user->image }}</th>
                                            <th scope='col'>{{ $post->user->name }}</th>
                                            <th scope='col'>{{ $post->title }}</th>
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
                                            <th scope='col'>{{ $post->episode }}</th>
                                            <th scope='col'>{{ $post->region }}</th>
                                        </tr>  
                                    </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope='col'>
                                                <img src="{{ asset('img/'.$post->image.'.png')}}" class="h-10 img-fluid">
                                            </th>
                                            <th scope='col'>
                                            <form action="{{ route('post.comment') }}" method="POST" name="comment"  >
                                                @csrf    
		                                        <h3 class="form-signin-heading">コメント投稿</h3>
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" /> 
                                                <input type="text" class="form-control" id= "comment" name="comment" placeholder="本文" required="" autofocus=""/> <br>
			                                    <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >送信</button> <br><br>
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
                </div>
   

        </main>    
    </body>
</html>
@endsection