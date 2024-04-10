@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas </h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		           <h3 class="form-signin-heading">本当に退会してもよろしいですか？ </h3>
			    <hr class="colorgraph"><br>
                    <div class ='float-end'>
                        <a href="{{ route('user.delete', ['user' => $user['id']]) }}">
                            <button type="button"  class="btn btn-dark rounded-pill " >退会</button>
                        </a>
            </div>
                    
		       
	        </div>
        </div>

    </body>
</html>
@endsection