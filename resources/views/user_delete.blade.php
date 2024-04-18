@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas </h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		        <br><br><h2 style='text-align:center'>本当に退会してもよろしいですか？</h2>
                <div class ='float-end'>
                    <a href="{{ route('user.delete', ['user' => $user['id']]) }}">
                        <button type="button"  class="btn btn-danger rounded-pill " >退会</button>
                    </a>
                </div>    
	        </div><br><br>
        </div>

    </body>
</html>
@endsection