<!DOCTYPE html>
<html>
<head>
  <title>管理者の企業ユーザ検索画面</title>
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

  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
          <a class="navbar-brand" href="http://localhost/Mickey_Works/public">
              Mickey_Works
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  <li><a class="nav-link" href="http://localhost/Mickey-Works/public/admin/company_index">管理画面に戻す</a></li>
                  <li><a class="nav-link" href="#">log out</a></li>


              </ul>
          </div>

      </div>
  </nav>

  <div class="container">
  <h2>企業詳細情報</h2>

  <ul class="list-group">


    <li class="list-group-item list-group-item-dark">ID:{{$item->id}}</li>
    <li class="list-group-item list-group-item-secondary">企業名：{{$item->username}}</li>
    <li class="list-group-item list-group-item-dark">本社所在地：{{$item->address}}</li>
    <li class="list-group-item list-group-item-secondary">E-mail：{{$item->email}}</li>
    <li class="list-group-item list-group-item-dark">分野：{{$item->csub->name}}</li>
    <li class="list-group-item list-group-item-secondary">給料：{{$item->money}}</li>
    <li class="list-group-item list-group-item-secondary">アピール：{{$item->message}}</li>

  </ul>


</div>

</body>
</html>
