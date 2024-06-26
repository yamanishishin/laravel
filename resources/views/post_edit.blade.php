@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas</h1><br>
        </div>
    <main class="py-4 "> 
        <div class="row justify-content-center ">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <div class='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <form action="{{ route('post.edit', ['post' => $post['id']]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ $post['title'] }}"/>
                            <label for='region' class='mt-2'>地域カントリー</label>
                                <input type='text' class='form-control' name='region'  value="{{ $post['region'] }}"/>
                            <label for='episode' class='mt-2'>エピソード</label>
                                <textarea class='form-control' name='episode'>{{ $post['episode'] }}</textarea>
                            <label for='image' class='mt-2'>画像ファイル</label>
                                <input type="file" name="image" accept="image/*" value="{{ $post['image'] }}"/>

                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>編集</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>
    

</body>
</html>
@endsection