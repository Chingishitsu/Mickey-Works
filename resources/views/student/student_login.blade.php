<!DOCTYPE html>
<html lang="en">
<head>
  <title>留学生ログイン</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <style>
    div{margin: 25px}
  </style>
</head>

<body>
  <div id="app">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  <div class="container">
  <a class="navbar-brand" href="http://localhost/m-work/public">Mickey_Works</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <!-- Left Side Of Navbar -->
  <ul class="navbar-nav mr-auto">
  </ul>
  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto">
  <!-- Authentication Links -->
  <li><a class="nav-link" href="http://localhost/m-work/public/company/company_login">企業ユーザー</a></li>
  <li><a class="nav-link" href="http://localhost/m-work/public/student/student_login">留学生ユーザー</a></li>
  </ul>
  </div>
  </div>
  </nav>
  <main class="py-4">
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card card-default">
  <div class="card-header">留学生方のログイン</div>
  <div class="card-body">

  <form method="post" action="">
    {{  csrf_field()  }}
  <!-- <input type="hidden" name="_token" value=""> -->
  <div class="form-group row">
  <label for="email" class="col-sm-4 col-form-label text-md-right">ユーザー名</label>
  <div class="col-md-6">
  <input type="text" class="form-control" name="usename">
  </div>
  </div>
  <div class="form-group row">
  <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
  <div class="col-md-6">
  <input type="password" class="form-control" name="password">
  </div>
  </div>
  <div class="form-group row">
  <div class="col-md-6 offset-md-4">
  <div class="checkbox">
  <label>
  <input type="checkbox" name="remember">Remember Me</label>
  </div>
  </div>
  </div>
  <div class="form-group row mb-0">
  <div class="col-md-8 offset-md-4">
  <button type="submit" class="btn btn-primary">ログイン</button>
  <a class="btn btn-link" href="http://localhost/m-work/public/student/student_index">登録</a>
  </div>
  </div>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </main>
  </div>
  <!-- Scripts -->
  <script src="http://localhost/mickey/public/js/app.js"></script>
</body>
</html>
