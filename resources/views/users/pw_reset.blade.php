@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas パスワード再設定</h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		        <form action="{{ route('') }}" method="POST" name="pw_reset" class="form-signin">   
                @csrf    
		            <h3 class="form-signin-heading">Welcome ! </h3>
			        <hr class="colorgraph"><br>
                    <div>
                        <label>メールアドレス</label>
			            <input type="text" class="form-control" name="email" value="" required="" autofocus="" /> <br>
                        
                    </div>  		  
			        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >メール送信</button> <br><br>
                    
		        </form>	
	        </div>
        </div>
        

    </body>
</html>
@endsection