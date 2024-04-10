@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas 新規登録</h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		        <form action="{{ route('register') }}" method="POST" name="login" class="form-signin">   
                @csrf    
		            <h3 class="form-signin-heading">Welcome ! <br> Please Sign up! </h3>
			        <hr class="colorgraph"><br>
                    <input type="text" class="form-control" id= "name" name="name" placeholder="ユーザー名" required="" autofocus="" /> <br>
			        <input type="text" class="form-control" id= "email" name="email" placeholder="メールアドレス" required=""  /> <br>
			        <input type="password" class="form-control" id="password" name="password" placeholder="パスワード" required=""/>  
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="パスワード （確認）" required=""/>   	  
			        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >新規登録</button> <br><br>
                    
		        </form>	
	        </div>
        </div>
        

    </body>
</html>
@endsection