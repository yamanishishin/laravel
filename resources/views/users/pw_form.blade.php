@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas パスワード再設定</h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		        <form action="{{ route('') }}" method="post" name="pw_form" class="form-signin">   
                @csrf    
		            <h3 class="form-signin-heading">Welcome ! </h3>
			        <hr class="colorgraph"><br> 
                    <div>
                        <label>新パスワード</label> 
                        <input type="password" class="form-control" name="password" value="" required="" autofocus=""/>  <br>
                           
                    </div>
                    <div>
                        <label>新パスワード<span>確認</span></label>
                        <input type="password" class="form-control" name="password-confirm" value="" required=""/> 	
                    </div>	  
			        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >登録</button> <br><br>
                    
		        </form>	
	        </div>
        </div>
        

    </body>
</html>
@endsection