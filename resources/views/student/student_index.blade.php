<!DOCTYPE html>
<html>
<head>
  <title>留学生の詳細情報</title>
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
      <a class="navbar-brand" href="{{url('student/student_login')}}">Mickey_Works</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      <li><a class="nav-link" href="{{url('student/student_match')}}">マックング</a></li>

      <li><a class="nav-link" href="{{url('student/student_logout')}}">log out</a></li>
      </ul>
      </div>
      </div>
      </nav>

    <div class="container"　 style="margin-top:50px">

      <h2>留学生の詳細情報<a class="btn btn-outline-info" href="{{url('student/student_edit')}}">個人情報編集</a></h2>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">ユーザー名</th><td>{{$students->username}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">メールアドレス</th><td>{{$students->email}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">名前</th><td>{{$students->name}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">誕生日</th><td>{{$students->birth}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">携帯</th><td>{{$students->tel}}Not Database</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">最高学位</th><td>{{$students->degree->name}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">専門</th><td>{{$students->ssub->name}}</td>
          </tr>
        </thead>

        <thead>
          <tr>
            <th style="width:15%;text-align:center;font-size:18px">アピール</th><td>{{$students->message}}</td>
          </tr>
        </thead>
      </table>


  <div class="container">
  <table class="table table-striped">
    <h3>応募企業一覧<a class="btn btn-outline-info" href="{{url('student/student_match')}}">マッチング</a></h3>
    <thead>
      <tr>
        <th>会社名</th>
        <th>本社所在地</th>
        <th>メールアドレス</th>
        <th>分野</th>
        <th>給料</th>
        <th>アピール</th>
        <th>結果</th>
      </tr>
    </thead>
  <tbody>
      @foreach($students->matchs as $match)
      <tr>
        <td><a href="student_application/{{$match->id}}">{{$match->company->name}}</a></td>
        <td><a href="student_application/{{$match->id}}">{{$match->company->address}}</a></td>
        <td><a href="student_application/{{$match->id}}">{{$match->company->mail}}</a></td>
        <td><a href="student_application/{{$match->id}}">{{$match->company->csub->name}}</a></td>
        <td><a href="student_application/{{$match->id}}">{{$match->company->money}}</a></td>
        <td><a href="student_application/{{$match->id}}">{{$match->company->message}}</a></td>
        <td><a href="student_application/{{$match->id}}">{{$match->result->name}}</a></td>
        <td><a class="btn btn-outline-danger" href="student_delete/{{$match->id}}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
