@extends('layouts.header')
@section('header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border" >
                <br><h1 style='text-align:center '>Overseas パスワード再設定</h1><br>
            </div> <br> <br>
            <div class="card">
                <div class="card-header">登録済みのメールアドレスにリンクを送付します</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" name="pw_reset" class="form-signin">
                        @csrf
            
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <br> <br>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
