<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="aBzuyKjZYw8pDJuPjESKsK8SO4awBYH8qcEYKHd8">

    <title>企業登録情報の編集</title>

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
                      <li><a class="nav-link" href="{{url('company/logout')}}">ログアウト</a></li>
                      <li><a class="nav-link" href="{{url('company/view')}}">詳細情報ページ</a></li>

              </ul>
          </div>
      </div>
  </nav>

  <div class="container" style="margin-top:50px">
  <h2>企業登録情報の編集</h2>
  <form method="POST" action="">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">企業名</label>
      <input type="text" class="form-control" name="name" value="{{ old('name',$items->name) }}">
    </div>
    @if ($errors->has('name'))
    <p align="center" >
      {{$errors->first('name')}}
    </p>
    @endif

    <div class="form-group">
      <label for="address">本社所在地</label>
      <input type="text" class="form-control" name="address" value="{{ old('address',$items->address)}}">
    </div>


    <div class="form-group">
      <label for="mail">E-mail</label>
      <input type="text" class="form-control" name="email" value="{{ old('email',$items->email) }}">
    </div>
    @if ($errors->has('email'))
    <p align="center" >
      {{$errors->first('email')}}
    </p>
    @endif

    <div class="form-group">
      <label for="csub">分野</label>
      <select class="form-control" name="mst_csub_id">
        @foreach($csubs as $csub)
        <option value="{{$csub->id}}"
          @if ($items->mst_csub_id == $csub->id)
          {{ "selected" }}
          @endif
          >{{$csub->name}}
        </option>
        @endforeach
      </select>
    </div>
    @if ($errors->has('mst_csub_id'))
    <p align="center" >
      {{$errors->first('mst_csub_id')}}
    </p>
    @endif

    <div class="form-group">
      <label for="money">年俸</label>
      <input type="text" class="form-control" name="money" value="{{  old('money',$items->money)}}"

      >
    </div>


    <div class="form-group">
      <label for="message">アピール</label>
      <textarea class="form-control" rows="5" name="message">{{ old('message',$items->message)}}</textarea>
      {{var_dump(old('message'))}}
    </div>

    <button type="submit" class="btn btn-primary">提出</button>
    <button type="reset" class="btn btn-primary">リセット</button>
  </form>
</div>

</body>
