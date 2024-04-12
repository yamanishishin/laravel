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
                        <form action="{{ route('user.edit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for='image' class='mt-2'>ユーザーアイコン</label> <br>
                                <input type="file" name="image" accept="image/*" value=""/> <br> <br>
                            <label for='name'>ユーザー名</label>
                                <input type='text' class='form-control' name='name' value="{{ Auth::user()->name }}"/> <br>
                            <label for='comment' class='mt-2'>ユーザーコメント</label>
                                <input type='text' class='form-control' name='comment'  value="{{ Auth::user()->comment }}"/> <br>
                            <label for='email' class='mt-2'>メールアドレス</label>
                                <input type='text' class='form-control' name='email' value="{{ Auth::user()->email }}"/> <br>
                            <label  class='mt-2'>パスワード変更したい場合はログイン画面の再設定案内から</label>

                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>編集する</button>
                            </div> 
                            <div class ='float-end'>
                                <a href="{{ route('my.user') }}">
                                    <button type="button"  class="btn btn-success rounded-pill " >マイページに戻る</button>
                                </a>
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