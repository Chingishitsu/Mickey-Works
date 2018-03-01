<!DOCTYPE html>
<html>
<head>
  <title>留学生ユーザー画面</title>
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
      <a class="navbar-brand" href="http://localhost/mickey/public">Mickey_Works</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      <li><a class="nav-link" href="#">マックング</a></li>
      <li><a class="nav-link" href="#">個人情報編集</a></li>
      <li><a class="nav-link" href="#">log out</a></li>
      </ul>
      </div>
      </div>
      </nav>

    <div class="container"　 style="margin-top:50px">

      <h2>留学生の詳細情報</h2>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">ユーザー名</th><td>{{$items->username}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">メールアドレス</th><td>{{$items->email}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">名前</th><td>{{$items->name}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">誕生日</th><td>{{$items->birth}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">携帯</th><td>{{$items->tel}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">最高学位</th><td>{{$items->mst_degree_id}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">専門</th><td>{{$items->mst_ssub_id}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">アピール</th><td>{{$items->message}}</td>
          </tr>
        </thead>
      </table>
  <div class="container">
  <table class="table table-striped">
    <h3>応募企業一覧</h3>
    <thead>
      <tr>
        <th>会社名</th>
        <th>本社所在地</th>
        <th>メールアドレス</th>
        <th>分野</th>
        <th>給料</th>
        <th>アピール</th>
      </tr>
    </thead>
  <tbody>
      @foreach($items->matchs as $match)
      <tr>
        <td>{{$match->company->name}}</td>
        <td>{{$match->company->address}}</td>
        <td>{{$match->company->mail}}</td>
        <td>{{$match->company->csub->name}}</td>
        <td>{{$match->company->money}}</td>
        <td>{{$match->company->message}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


</body>
