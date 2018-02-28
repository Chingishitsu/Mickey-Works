<!DOCTYPE html>
<html lang="en">
<head>
  <title>留学生個人情報の編集</title>
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
  <ul class="navbar-nav mr-auto">
  </ul>
  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto">
  <!-- Authentication Links -->
  <li><a class="nav-link" href="http://localhost/mickey/public/login">企業ユーザー</a></li>
  <li><a class="nav-link" href="http://localhost/mickey/public/login">留学生ユーザー</a></li>
  </ul>
  </div>
  </div>
  </nav>
  <div class="container" style="margin-top:50px">
  <h2>留学生個人情報の編集</h2>
  <form>
      {{ csrf_field() }}
    <div class="form-group">
      <label for="name">名前</label>
      <input type="text" class="form-control" id="name">
    </div>

    <div class="form-group">
      <label for="pwd">パスワード</label>
      <input type="password" class="form-control" id="pwd">
    </div>

    <div class="form-group">
      <label for="pwd">パスワード確認</label>
      <input type="password" class="form-control" id="pwd">
    </div>

    <div class="form-group">
      <label for="tel">携帯</label>
      <input type="text" class="form-control" id="tel">
    </div>

    <div class="form-group">
      <label for="mail">E-mail</label>
      <input type="text" class="form-control" id="mail">
    </div>

    <div class="form-group">
      <label for="mst_degree_id">最高学歴</label>
      <select class="form-control" id="mst_degree_id">
        <option>小学</option>
        <option>中学</option>
        <option>高校</option>
        <option>専門学校</option>
        <option>大学</option>
        <option>修士</option>
        <option>博士</option>
      </select>
    </div>

    <div class="form-group">
      <label for="mst_ssub_id">専門</label>
      <select class="form-control" id="mst_ssub_id">
        <option>IT</option>
        <option>経済</option>
        <option>販売</option>
        <option>飲食</option>
        <option>看護</option>
        <option>運送</option>
      </select>
    </div>

    <div class="form-group">
      <label for="message">アピール</label>
      <textarea class="form-control" rows="5" id="message"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">提出</button>
    <button type="reset" class="btn btn-primary">リセット</button>
  </form>
</div>

</body>
