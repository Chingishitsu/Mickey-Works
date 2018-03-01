<!DOCTYPE html>
<html lang="en">
<head>
  <title>管理者の企業ユーザー情報編集</title>
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
          <a class="navbar-brand" href="http://localhost/Mickey-Works/public">
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
                  <li><a class="nav-link" href="#">管理画面に戻す</a></li>
                  <li><a class="nav-link" href="#">log out</a></li>


              </ul>
          </div>

      </div>
  </nav>

  <div class="container" style="margin-top:50px">
  <h2>管理者の企業情報編集</h2>
  <form method="post" action="">
    {{ csrf_field()}}

    <div class="form-group">
      <label for="name">企業名</label>
      <input type="text" class="form-control" name="username" value="{{$form->username}}">
      @if($errors -> has('username'))
      <tr><th>ERROR</th><td>{{$errors->first('username')}}</td></tr>
      @endif
    </div>


    <div class="form-group">
      <label for="address">本社所在地</label>
      <input type="text" class="form-control" name="address" value="{{$form->address}}">
      @if($errors -> has('address'))
      <tr><th>ERROR</th><td>{{$errors->first('address')}}</td></tr>
      @endif
    </div>


    <!-- <div class="form-group">
        <label for="password">パス―ワード</label>
            <input  type="password" class="form-control" name="password">
    </div>
    <div class="form-group ">
        <label for="password-confirm">パスワード確認</label>
            <input  type="password" class="form-control" name="password_confirmation" >
    </div> -->
    <div class="form-group">
      <label for="mail">E-mail</label>
      <input type="text" class="form-control" name="email" value="{{$form->email}}">
      @if($errors -> has('email'))
      <tr><th>ERROR</th><td>{{$errors->first('email')}}</td></tr>
      @endif
    </div>

    <div class="form-group">
      <label for="csub">分野</label>
      <select class="form-control" name="mst_csub_id" value="{{$form->mst_csub_id}}">
        @foreach($csubs as $csub)
        <option value="{{$csub->id}}">{{$csub->name}}</option>
        @endforeach

      </select>
      @if($errors -> has('mst_csub_id'))
      <tr><th>ERROR</th><td>{{$errors->first('mst_csub_id')}}</td></tr>
      @endif
    </div>

    <div class="form-group">
      <label for="money">給料</label>
      <input type="text" class="form-control" name="money" value="{{$form->money}}">
      @if($errors -> has('money'))
      <tr><th>ERROR</th><td>{{$errors->first('money')}}</td></tr>
      @endif
    </div>

    <div class="form-group">
      <label for="message">アピール</label>
      <textarea class="form-control" rows="5" name="message" value="{{$form->message}}"></textarea>
      @if($errors -> has('message'))
      <tr><th>ERROR</th><td>{{$errors->first('message')}}</td></tr>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">提出</button>
    <button type="reset" class="btn btn-primary">リセット</button>
  </form>
</div>

</body>
