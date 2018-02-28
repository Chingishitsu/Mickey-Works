<!DOCTYPE html>
<html>
<head>
  <title>管理者の留学生ユーザ検索画面</title>
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
          <a class="navbar-brand" href="http://localhost/mickey/public">
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
  <h2>留学生のユーザー名を記入して検索する</h2>
  <form action="" method="get">
    <div class="form-inline">
      <input type="text" class="form-control" name="student_name"
        value="{{$student_name}}"
      >
      <input type="submit" class="btn btn-info" value="検索">
    </div>

  </form>
</div>

<div class="container">

  <h3>検索結果</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ユーザー名</th>
        <th>名前</th>
        <th>E-mail</th>
        <th>携帯</th>
        <th>誕生日</th>
        <th>専門</th>
        <th>最高学歴</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $items as $item)
      <tr>
        <td>
          <a href="#" >{{$item->username}}</a>
        </td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->tel}}</td>
        <td>{{$item->birth}}</td>

        <td>{{$item->ssub->name}}</td>
        <td>{{$item->degree->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $items->links() }}
</div>


</body>
