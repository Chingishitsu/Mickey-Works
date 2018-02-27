<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="aBzuyKjZYw8pDJuPjESKsK8SO4awBYH8qcEYKHd8">

    <title>企業登録</title>

    <!-- Styles -->
    <link href="http://localhost/mickey/public/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
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
                                                    <li><a class="nav-link" href="http://localhost/mickey/public/login">企業ユーザー</a></li>
                            <li><a class="nav-link" href="http://localhost/mickey/public/login">留学生ユーザー</a></li>

                                            </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">新しい企業ユーザーを作る</div>

                <div class="card-body">
                    <form method="POST" action="">
                        {{ csrf_field() }}

                        <input type="hidden" name="_token" value="aBzuyKjZYw8pDJuPjESKsK8SO4awBYH8qcEYKHd8">
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">ユーザー名</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="" >

                            </div>
                            @if ($errors->has('username'))
                            {{$errors->first('username')}}


                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">企業本名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" >
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パス―ワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mailアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" >

                                                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    提出
                                </button>

                                <button type="reset" class="btn btn-info">
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

    <!-- Scripts -->
    <script src="http://localhost/mickey/public/js/app.js"></script>
</body>
</html>
