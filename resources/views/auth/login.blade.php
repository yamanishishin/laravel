<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Overseas</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
    </head>
    <body>
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">Overseas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('main') }}">テストログイン</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>The more you do, the more you learn</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <style>
            .border {background-color: #e0ffff;}
            .footer {  width:200px; margin: 0 auto;}
        </style>

        <div class="border" >
            <br><h1 style='text-align:center '>Overseas ログイン</h1><br>
        </div>

        <div class = "container">
	        <div class="wrapper">
		        <form action="{{ route('login') }}" method="POST" name="login" class="form-signin">   
                @csrf    
		            <h3 class="form-signin-heading">Welcome Back! <br> Please Sign In! </h3>
			        <hr class="colorgraph"><br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			        <input type="text" class="form-control" id="email" name="email" placeholder="メールアドレス" required="" autofocus="" />
			        <input type="password" class="form-control" id="password" name="password" placeholder="パスワード" required=""/>     		  
			        <button type="submit" class="btn btn-lg btn-primary btn-block"  name="submit"  >ログインする</button> <br><br>
                    <a href="{{ route('register') }}">
                        <button type='button' class='btn  btn-primary'>新規登録</button>
                    </a>
                    
                    <a href="{{ route('login') }}">
                        <button type='button' class='btn btn-success'>パスワード忘れた方</button>
                    </a>	
		        </form>	
	        </div>
        </div>
        
<!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
    </body>
</html>

        
