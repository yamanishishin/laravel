@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas </h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		           <h3 class="form-signin-heading">管理者により利用停止されています。 </h3>
			    <hr class="colorgraph"><br>
                    <div class ='float-end'>
                        <a href="{{ route('login') }}">
                            <button type="button"  class="btn btn-dark rounded-pill " >ログイン画面へ</button>
                        </a>
            </div>
                    
		       
	        </div>
        </div>

    </body>
</html>
@endsection