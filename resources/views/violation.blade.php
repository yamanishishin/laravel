@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas </h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		        <form action="{{ route('post.violation') }}" method="POST" name="login" class="form-signin">   
                @csrf    
		            <h3 class="form-signin-heading"> Please Comment up! </h3>
			        <hr class="colorgraph"><br>
                    <input type="text" class="form-control" id= "title" name="title" value="{{ $post['title']}}" required="" autofocus="" /> <br>
			        <input type="text" class="form-control" id= "reason" name="reason" placeholder="理由"  /> <br>
			        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >違反報告</button> <br><br>
                    
		        </form>	
	        </div>
        </div>

    </body>
</html>
@endsection