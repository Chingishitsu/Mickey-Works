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
  <a class="navbar-brand" href="{{url('student/student_index')}}">Mickey_Works</a>
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
  <li><a class="btn btn-outline-info" href="{{url('student/student_index')}}">詳細情報を返す</a></li>
  </ul>
  </div>
  </div>
  </nav>
  <div class="container" style="margin-top:50px">
  <h2>留学生個人情報の編集</h2>
  <form action="" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="name">ユーザー名</label>
      <input type="text" class="form-control" name="username" value="{{ $students->username }}">
    </div>

    <div class="form-group">
      <label for="mail">メールアドレス</label>
      <input type="text" class="form-control" name="email" value="{{ $students->email }}">
    </div>

    <div class="form-group">
      <label for="name">名前</label>
      <input type="text" class="form-control" name="name" value="{{ $students->name }}">
    </div>

    <div class="form-group">
      <label for="birth">誕生日</label>
      <input type="text" class="form-control" name="birth" value="{{ $students->birth }}">
    </div>

    <div class="form-group">
      <label for="tel">携帯</label>
      <input type="text" class="form-control" name="tel" value="{{ $students->tel }}Not Database">
    </div>


    <div class="form-group">
      <label for="mst_degree_id">最高学歴</label>
      <select class="form-control" name="mst_degree_id">
        @foreach($mstdegrees as $mstdegree)
        <option value ="{{$mstdegree->id}}">{{$mstdegree->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="mst_ssub_id">専門</label>
      <select class="form-control" name="mst_ssub_id">
        @foreach($mstssubs as $mstssub)
        <option value="{{$mstssub->id}}">{{$mstssub->name}}</option>
        @endforeach
      </select>
    </div>

<div class="form-group">
<label for="message">アピール</label>
<textarea class="form-control" rows="5" name="message">{{$students->message}}</textarea>
</div>

    <button type="submit" class="btn btn-outline-info">提出</button>
    <button type="reset" class="btn btn-outline-info">リセット</button>
  </form>
</div>

</body>
