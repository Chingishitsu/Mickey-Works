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
          <a class="navbar-brand" href="http://localhost/Mickey-Works/public">
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
                  <li><a class="nav-link" href="#">管理画面に戻す</a></li>
                  <li><a class="nav-link" href="#">log out</a></li>


              </ul>
          </div>

      </div>
  </nav>


  <div class="container">
  <h2>企業名を記入して検索する</h2>
  <form action="" method="get">
    <div class="form-inline">
      <input type="text" class="form-control" name="company_username"
        value="{{$company_username}}">
      <input type="submit" class="btn btn-info" value="検索">
    </div>

  </form>
</div>

<div class="container">

  <h3>検索結果</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>企業名</th>
        <th>本社所在地</th>
        <th>E-mail</th>
        <th>分野</th>
        <th>給料</th>
        <th>アピール</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $items as $item)
      <tr>
        <td>
          <a href="#" >{{$item->username}}</a>
        </td>
        <td>{{$item->address}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->csub->name}}</td>
        <td>{{$item->money}}</td>
        <td>{{$item->message}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $items->links() }}
</div>


</body>
