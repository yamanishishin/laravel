@extends('layouts.header')
@section('header')
        <div class="border" >
            <br><h1 style='text-align:center '>Overseas </h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
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
		        <form action="{{ route('post.violation', ['post' => $post['id']]) }}" method="POST" name="login" class="form-signin">   
                @csrf    
		            <h3 class="form-signin-heading"> Please Comment up! </h3>
			        <hr class="colorgraph"><br>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="post_id" value="{{ $post['id']}}" />
                    <input type="text" class="form-control" id= "title" name="title" value="{{ old('title') }}" placeholder="タイトル" required=""  autofocus="" /> <br>
			        <input type="text" class="form-control" id= "reason" name="reason"  value="{{ old('reason') }}" placeholder="理由"/> <br>
			        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >違反報告</button> <br><br>
                    
		        </form>	
	        </div>
        </div>

    </body>
</html>
@endsection