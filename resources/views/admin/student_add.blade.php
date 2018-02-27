<!DOCTYPE html>
<html>
<head>
  <title>管理者の留学生ユーザー新規入会</title>
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
  {{ csrf_field() }}
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

              <ul class="navbar-nav ml-auto">

                  <li><a class="nav-link" href="#">管理画面に戻す</a></li>
                  <li><a class="nav-link" href="#">log out</a></li>

              </ul>
          </div>

      </div>
  </nav>

  <main class="py-4">
      <div class="container">
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card card-default">
          <div class="card-header">管理者の留学生ユーザー新規入会</div>

          <div class="card-body">
              <form method="post" action="">
                  {{ csrf_field() }}
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">ユーザー名</label>

                      <div class="col-md-6">
                          <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">名前</label>

                      <div class="col-md-6">
                          <input type="text" class="form-control" name="name" value="" required autofocus>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">パス―ワード</label>

                      <div class="col-md-6">
                          <input type="password" class="form-control" name="password" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">パスワード確認</label>

                      <div class="col-md-6">
                          <input type="password" class="form-control" name="password" required>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">E-Mailアドレス</label>

                      <div class="col-md-6">
                          <input type="email" class="form-control" name="email" value="" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">生年月日</label>

                      <div class="col-md-6">
                          <input type="text" class="form-control" name="birth" value="" required autofocus>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">最高学歴</label>

                      <div class="col-md-6">
                        <select class="form-control" name="mst_degree_id">
                          @foreach($degrees as $degree)
                          <option value="{{$degree->id}}">{{$degree->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">専門</label>

                      <div class="col-md-6">
<<<<<<< HEAD
                          <input id="email" type="email" class="form-control" name="email" value="" required>
                     </div>
=======
                        <select class="form-control" name="mst_ssub_id">
                          @foreach($ssubs as $ssub)
                          <option value="{{$ssub->id}}">{{$ssub->name}}</option>
                          @endforeach
                        </select>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">アピール</label>

                      <div class="col-md-6">
                        <textarea class="form-control" rows="5" name="message"></textarea>
                      </div>
>>>>>>> 05f56f0d59d201de01af8181d3c3e48c09a41853
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              提出
                          </button>

                          <button type="reset" class="btn btn-primary">
                              リセット
                          </button>
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
</body>
