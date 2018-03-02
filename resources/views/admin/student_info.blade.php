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
    th{width:15%}
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
                  <li><a class="btn btn-outline-info" href="http://localhost/mickey/public/admin/student_index">留学生一覧に戻す</a></li>
                  <li><a class="btn btn-outline-info" href="http://localhost/mickey/public/admin/index">管理画面に戻す</a></li>
                  <li><a class="btn btn-outline-info" href="#">log out</a></li>


              </ul>
          </div>

      </div>
  </nav>

  <!-- <div class="container">
  <h2>留学生詳細情報</h2>

  <ul class="list-group">

    <li class="list-group-item list-group-item-dark">ID:{{$item->id}}</li>
    <li class="list-group-item list-group-item-secondary">ユーザー名：{{$item->username}}</li>
    <li class="list-group-item list-group-item-dark">氏名：{{$item->name}}</li>
    <li class="list-group-item list-group-item-secondary">メールアドレス：{{$item->email}}</li>
    <li class="list-group-item list-group-item-dark">生年月日：{{$item->birth}}</li>
    <li class="list-group-item list-group-item-secondary">最高学歴：{{$item->degree->name}}</li>
    <li class="list-group-item list-group-item-dark">専門：{{$item->ssub->name}}</li>
    <li class="list-group-item list-group-item-secondary">アピール：{{$item->message}}</li>

  </ul>
</div> -->

  <div class="container">
  <h2>留学生詳細情報</h2>
  <table class="table table-dark table-hover">
    <tr>
      <th>ID</th><td>{{$item->id}}</td>
    </tr>
    <tr>
      <th>ユーザー名</th><td>{{$item->username}}</td>
    </tr>
    <tr>
      <th>氏名</th><td>{{$item->name}}</td>
    </tr>
    <tr>
      <th>メールアドレス</th><td>{{$item->email}}</td>
    </tr>
    <tr>
      <th>生年月日</th><td>{{$item->birth}}</td>
    </tr>
    <tr>
      <th>最高学歴</th><td>{{$item->degree->name}}</td>
    </tr>
    <tr>
      <th>専門</th><td>{{$item->ssub->name}}</td>
    </tr>
    <tr>
      <th>アピール</th><td>{{$item->message}}</td>
    </tr>
  </table>
</div>




</body>
</html>
