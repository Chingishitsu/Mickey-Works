<!DOCTYPE html>
<html>
<head>
  <title>企業の詳細情報</title>
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
              <ul class="navbar-nav mr-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
  <li><a class="btn btn-outline-info" href="{{url('student/student_login')}}">logout</a></li>

                                      </ul>
          </div>
      </div>
  </nav>

<div class="container"　 style="margin-top:50px">

  <h2>企業の詳細情報
    @if (isset($msg))
    {{$msg}}
    @endif
  </h2>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">企業名</th><td>{{$item->name}}</td>
      </tr>
    </thead>

    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">本社所在地</th><td>{{$item->address}}</td>
      </tr>
    </thead>

    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">E-mail</th><td>{{$item->email}}</td>
      </tr>
    </thead>

    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">分野</th>
        <td>
        {{$item->csub->name}}
        </td>
      </tr>
    </thead>

    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">給料</th><td>{{$item->money}}</td>
      </tr>
    </thead>

    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">アピール</th><td>{{$item->message}}</td>
      </tr>
    </thead>

  </table>
  <div>
    <form class="" action="" method="post">
      {{csrf_field()}}
      <input type="hidden" name="company_id" value="{{$item->id}}"><br>
      希望動機を入力してください：<br>
      <textarea name="message" rows="8" cols="80"></textarea><br>

    <button type="submit" class="btn btn-outline-info">応募</button>
    <a class="btn btn-outline-info" href="{{url('student/student_index')}}">戻す</a>
  </form>
  </div>
</body>
</html>
