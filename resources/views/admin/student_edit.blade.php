<!DOCTYPE html>
<html lang="en">
<head>
  <title>管理者の留学生ユーザー情報編集</title>
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
                  <li><a class="nav-link" href="http://localhost/mickey/public/admin/student_index">留学生一覧に戻す</a></li>
                  <li><a class="nav-link" href="http://localhost/mickey/public/admin/index">管理画面に戻す</a></li>
                  <li><a class="nav-link" href="#">log out</a></li>


              </ul>
          </div>

      </div>
  </nav>

  <div class="container" style="margin-top:50px">
  <h2>管理者の留学生情報編集</h2>
  <form method="post" action="">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$student->id}}">
    <div class="form-group">
      <label for="name">留学生氏名</label>
      <input type="text" class="form-control" name="name" value="{{$student->name}}">
      @if($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>


    <div class="form-group">
      <label for="pwd">パスワード</label>
      <input type="password" class="form-control" name="password" value="{{$student->password}}">
      @if($errors->has('password'))
        <p class="text-danger">{{$errors->first('password')}}</p>
      @endif
    </div>


    <div class="form-group">
      <label for="pwd">パスワード確認</label>
      <input type="password" class="form-control" name="password_confirmation" value="{{$student->password}}">
      @if($errors->has('password_confirmation'))
        <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
      @endif
    </div>


    <div class="form-group">
      <label for="mail">E-mail</label>
      <input type="text" class="form-control" name="email" value="{{$student->email}}">
      @if($errors->has('email'))
        <p class="text-danger">{{$errors->first('email')}}</p>
      @endif
    </div>


    <div class="form-group">
      <label for="tel">携帯</label>
      <input type="text" class="form-control" name="tel" value="{{$student->tel}}">
      @if($errors->has('tel'))
        <p class="text-danger">{{$errors->first('tel')}}</p>
      @endif
    </div>


    <div class="form-group">
      <label for="birth">誕生日</label>
      <input type="text" class="form-control" name="birth" value="{{$student->birth}}">
      @if($errors->has('birth'))
        <p class="text-danger">{{$errors->first('birth')}}</p>
      @endif
    </div>

    <div class="form-group">
      <label for="mst_degree_id">最高学歴</label>
      <select class="form-control" name="mst_degree_id" value="{{$student->mst_degree_id}}">
        @foreach($degrees as $degree)
        <option value="{{$degree->id}}">{{$degree->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="mst_ssub_id">専門</label>
      <select class="form-control" name="mst_ssub_id" value="{{$student->mst_ssub_id}}">
        @foreach($ssubs as $ssub)
        <option value="{{$ssub->id}}">{{$ssub->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="message">アピール</label>
      <textarea class="form-control" rows="5" name="message">{{$student->message}}</textarea>
      @if($errors->has('message'))
        <p class="text-danger">{{$errors->first('message')}}</p>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">提出</button>
    <button type="reset" class="btn btn-primary">リセット</button>
  </form>
</div>

</body>
