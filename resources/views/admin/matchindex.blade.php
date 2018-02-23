<!DOCTYPE html>
<html>
<head>
  <title>マッチング履歴の検索画面</title>
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
                  <li><a class="nav-link" href="{{url('admin/index')}}">管理画面に戻す</a></li>
                  <li><a class="nav-link" href="{{url('admin/logout')}}">log out</a></li>


              </ul>
          </div>

      </div>
  </nav>


  <div class="container">
  <h2>マッチング情報の検索</h2>
  <form>
    <div class="form-inline">
      <h3>会社名記入</h3><input type="text" class="form-control" name="company_name" value="">
    </div>

    <div class="form-inline">
      <h3>留学生名前記入</h3><input type="text" class="form-control" name="student_name" value="">
    </div>

    <input type="submit" class="btn btn-info" value="検索">
  </form>
</div>

<div class="container">

  <h3>検索結果</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>マッチングID</th>
        <th>企業のID</th>
        <th>企業本名</th>
        <th>留学生のID</th>
        <th>留学生の名前</th>
        <th>マッチングの結果</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
      <tr>
        <td><a href="#" >{{$item->id}}</a></td>
        <td><a href="#" >{{$item->company_id}}</a></td>
        <td><a href="#" >{{$item->company()->name}}</a></td>
        <td><a href="#" >{{$item->student_id}}</a></td>
        <td><a href="#" >{{$item->student()->name}}</a></td>
        <td><a href="#" >{{$item->result()->name}}</a></td>
        <td>edit</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


</body>
