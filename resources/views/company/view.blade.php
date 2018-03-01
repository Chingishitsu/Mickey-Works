<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="aBzuyKjZYw8pDJuPjESKsK8SO4awBYH8qcEYKHd8">

    <title>企業の詳細情報</title>

    <!-- Styles -->
    <link href="http://localhost/mickey/public/css/app.css" rel="stylesheet">



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
                                              <li><a class="nav-link" href="company/view">情報編集</a></li>
                      <li><a class="nav-link" href="http://localhost/mickey/public/login">ログアウト</a></li>

                                      </ul>
          </div>
      </div>
  </nav>



<div class="container"　 style="margin-top:50px">

  <h2>企業の詳細情報</h2>
  @if (session('msg'))
  <p align="center">
    {{ session('msg') }}
  </p>
  @endif

  <table class="table table-bordered">

    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">企業名</th><td>{{$item->username}}</td>
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

  <!-- <div class="form-group">
    <label for="message">応募したい留学生のアピール（留学生ユーザーのみ）</label>
    <textarea class="form-control" rows="5" id="message"></textarea>

  </div> -->
  <!-- <button type="button" class="btn btn-info">この企業を応募します（留学生ユーザーのみ）</button>
  <button type="button" class="btn btn-info">企業情報編集（企業ユーザーのみ）</button> -->


</div>

<div class="container" style="margin-top:50px">
  <h2>応募した留学生の情報一覧</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>氏名</th>
        <th>学歴</th>
        <th>専門</th>
        <th>学生アピール</th>
        <th>詳細情報</th>
        <th>結果</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($item->matchs as $match)
      <tr>
        <td>{{$match->student->name}}</td>
        <td>{{$match->student->degree->name}}</td>
        <td>{{$match->student->ssub->name}}</td>
        <td>{{$match->student_comment}}</td>
        <td><a href="student/index/{{$match->id}}">詳細情報</a></td>
        <td>{{$match->result->name}}</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>


</body>
</html>
