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
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">マイページ</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">ログアウト</a></li>
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
        
            <br><h1 style='text-align:center '>Overseas 
            <div class ='float-end'>
            <button type="button"  class="btn btn-dark rounded-pill " >新規投稿</button>
            </div> 
            </h1><br>
        </div>

    <main class="py-4 "> 
        <div class="row justify-content-center ">
            <div class="col-md">
                <div class="card">
                        <div class="card-body">
                            <form>
                            <div class="container-fluid">
                            <div class="container">
                                <div class="row mt-4">
                                    <input type="text" name="title"  class="col-sm" placeholder="タイトル" value="">
                                    <input type="text" name="region"  class="col-sm" placeholder="地域（カントリー）" value="">
                                </div>
                                <div class="card mt-4">
                                    <input type="text" name="episode"  class="col-sm" placeholder="エピソード" value="">
                                    
                                </div>
                                <div class="pt-4 ">
                                    <input type="date" name="from"  class="mt-1" placeholder="from_date" value="">
                                    <span class="mt-2">～</span>
                                    <input type="date" name="until"  class="mt-1" placeholder="until_date" value="">
                                    <div class ='float-end'>
                                    <button type='submit' class='btn btn-primary mt-2 rounded-pill '>検索</button>
                                </div>
                            </div> 
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header ">
                            <div class='text-center'>投稿</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col' style="background-color:ghostwhite">タイトル</th>
                                            <th scope='col' style="background-color:ghostwhite">カントリー</th>
                                            <th scope='col' style="background-color:ghostwhite">エピソード</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- ここに投稿を表示する -->
                                    @foreach($posts as $post)
                                    <tr>
                                        <th scope='col'>{{ $post['title'] }}</th>
                                        <th scope='col'>{{ $post['region'] }}</th>
                                        <th scope='col'>{{ $post['episode'] }}
                                        <div class ='float-end'>
                                            <button type='submit' class='btn btn-primary mt-2 rounded-pill '>詳細</button>
                                        </div>
                                        </th>
                                    </tr>        
                                   
                                    @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </main>
    <!-- Footer-->
    <footer>
        <div class="footer">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="前">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="次">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
