<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="aBzuyKjZYw8pDJuPjESKsK8SO4awBYH8qcEYKHd8">

    <title>管理者の留学生ユーザー新規入会</title>

    <!-- Styles -->
    <link href="http://localhost/mickey/public/css/app.css" rel="stylesheet">
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
                  <li><a class="btn btn-outline-info" href="http://localhost/mickey/public/admin/student_index">留学生一覧に戻す</a></li>
                  <li><a class="btn btn-outline-info" href="index">管理画面に戻す</a></li>
                  <li><a class="btn btn-outline-info" href="#">log out</a></li>

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
                          <input type="text" class="form-control" name="username" value="">
                        @if($errors->has('username'))
                          <p class="text-danger">{{$errors->first('username')}}</p>
                        @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">名前</label>

                      <div class="col-md-6">
                          <input type="text" class="form-control" name="name" value="">
                          @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                          @endif

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">パス―ワード</label>

                      <div class="col-md-6">
                          <input type="password" class="form-control" name="password">
                          @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                          @endif

                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">パスワード確認</label>

                      <div class="col-md-6">
                          <input type="password" class="form-control" name="password_confirmation">
                          @if($errors->has('password_confirmation'))
                            <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">E-Mailアドレス</label>

                      <div class="col-md-6">
                          <input type="email" class="form-control" name="email" value="">
                          @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                          @endif

                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">生年月日</label>

                      <div class="col-md-6">
                          <input type="text" class="form-control" name="birth" value="">
                          @if($errors->has('birth'))
                            <p class="text-danger">{{$errors->first('birth')}}</p>
                          @endif
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
                        @if($errors->has('message'))
                          <p class="text-danger">{{$errors->first('message')}}</p>
                        @endif
                      </div>
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
</body>
