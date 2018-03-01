<!DOCTYPE html>
<html lang="en">
<head>
  <title>留学生ユーザー登録</title>
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
  <div id="app">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  <div class="container">
    <a class="navbar-brand" href="http://localhost/m-work/public">Mickey_Works</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
      <li><a class="nav-link" href="http://localhost/m-work/public/company_add">企業ユーザー</a></li>
      <li><a class="nav-link" href="http://localhost/m-work/public/student_add">留学生ユーザー</a></li>
    </ul>
  </div>
  </div>
  </nav>
  <main class="py-4">
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card card-default">

  <div class="card-header">留学生新規入会</div>
  <div class="card-body">
  <form method="post" action="">
    {{ csrf_field() }}
  <!-- <input type="hidden" name="_token" value=""> -->
  <div class="form-group row">
  <label for="username" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="username" value="{{old('username')}}">
  </div>
  </div>
    @if ($errors->has('username'))
    <p align="center">{{$errors->first('username')}}</p>
    @endif
  <div class="form-group row">
  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
  <div class="col-md-6">
    <input type="email" class="form-control" name="email" value="{{old('email')}}">
  </div>
  </div>
  @if ($errors->has('email'))
  <p align="center">{{$errors->first('email')}}</p>
  @endif

  <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">パス―ワード</label>
  <div class="col-md-6">
    <input type="password" class="form-control" name="password" value="{{old('password')}}">
  </div>
  </div>
  @if ($errors->has('password'))
  <p align="center">{{$errors->first('passowrd')}}</p>
  @endif

  <div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>
  <div class="col-md-6">
    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
  </div>
  </div>
  @if ($errors->has('password_confirmation'))
  <p align="center">{{$errors->first('password_confirmation')}}</p>
  @endif

  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="name" value="{{old('name')}}">
  </div>
  </div>
  @if ($errors->has('name'))
  <p align="center">{{$errors->first('name')}}</p>
  @endif

  <div class="form-group row">
    <label for="birth" class="col-md-4 col-form-label text-md-right">誕生日</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="birth" value="{{old('birth')}}">
  </div>
  </div>
  @if ($errors->has('birth'))
  <p align="center">{{$errors->first('birth')}}</p>
  @endif

  <div class="form-group row">
    <label for="tel" class="col-md-4 col-form-label text-md-right">携帯</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="tel" value="{{old('tel')}}">
  </div>
  </div>
  @if ($errors->has('tel'))
  <p align="center">{{$errors->first('tel')}}</p>
  @endif

  <div class="form-group row">
    <label for="mst_degree_id" class="col-md-4 col-form-label text-md-right">最高学歴</label>
  <div class="col-md-6">
    <select class="form-control" name="mst_degree_id">
      @foreach($mstdegrees as $mstdegree)
    <option value="{{$mstdegree->id}}">{{$mstdegree->name}}</option>
      @endforeach
    </select>
  </div>
  </div>

  <div class="form-group row">
    <label for="mst_ssub_id" class="col-md-4 col-form-label text-md-right">専門</label>
  <div class="col-md-6">
    <select class="form-control" name="mst_ssub_id">
      @foreach($mstssubs as $mstssub)
      <option value="{{$mstssub->id}}">{{$mstssub->name}}</option>
      @endforeach
    </select>
  </div>
  </div>

  <div class="form-group row">
    <label for="message" class="col-md-4 col-form-label text-md-right">アピール</label>
  <div class="col-md-6">
    <textarea class="form-control" rows="5" name="message"></textarea>
  </div>
  </div>

  <div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-info">提出</button>
    <button type="reset" class="btn btn-info">リセット</button>
  </div>
  </div>
  </form>
  </div>
  </div>
  </div>
  </div>
</div>
  </main>
</div>

    <!-- Scripts -->
    <script src="http://localhost/mickey/public/js/app.js"></script>
</body>
</html>
