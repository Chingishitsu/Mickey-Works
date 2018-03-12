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
                  @if (Auth::guard('company')->id())
                  <li><a class="nav-link" href="{{url('company/logout')}}">ログアウト</a></li>
                  @elseif (Auth::guard('student')->id())
                  <li><a class="nav-link" href="{{url('student/student_logout')}}">ログアウト</a></li>
                  <li><a class="nav-link" href="{{url('student/student_index')}}">自分のページに戻る</a></li>
                  @endif
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
        <th style="width:15%;text-align:center;font-size:18px">ユーザー名</th><td>{{$item->username}}</td>
      </tr>
    </thead>
    <thead>
      <tr>
        <th style="width:15%;text-align:center;font-size:18px">企業名</th><td>{{$item->name}}</td>
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
        <th style="width:15%;text-align:center;font-size:18px">分野</th><td>{{$item->csub->name}}</td>
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
  @if (Auth::guard('student')->id())
  <div class="form-group">
    <form method="POST" action="">
      {{ csrf_field() }}
    <input type="hidden" name="student_id" value="{{Auth::guard('student')->id()}}" >
    <input type="hidden" name="company_id" value="{{$item->id}}" >
    <textarea class="form-control" rows="5" id="message" name="student_comment"></textarea>
    <button type="submit" class="btn btn-info">この企業を応募します</button>
    </form>
  </div>
  @endif

</div>
@if ( Auth::guard('company')->id())
<p align="center">
  <a class="btn btn-info"  href="{{url('company/edit')}}">情報編集</a>
</p>
<div class="container"  style="margin-top:50px">

  <table class="table table-striped">
    <h2>応募した留学生の情報一覧</h2>
    <thead>
      <tr>
        <th>氏名</th>
        <th>学歴</th>
        <th>専門</th>
        <th>学生アピール</th>
        <th>詳細情報</th>
        <th>結果</th>
        <th>コメント</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($item->matchs as $match)
      <tr>
        <td>{{$match->student->name}}</td>
        <td>{{$match->student->degree->name}}</td>
        <td>{{$match->student->ssub->name}}</td>
        <td>{{$match->student_comment}}</td>
        <td><a href="url('student/index/{{$match->id}}')">詳細情報</a></td>
        <form method="POST" action="">
          {{ csrf_field() }}
          <td>
            <input type="hidden" name="id" value="{{$match->id}}">
            <select class="form-control" name="result_id">
              @foreach($results as $result)

              <option value="{{ $result->id }}"
                @if($match->result_id == $result->id)
                {{ "selected" }}
                @endif
                >{{$result->name}}
              </option>
              @endforeach
            </select>
          </td>
          <td>
            <input type="text" class="form-control" name="company_comment" value="{{ $match->company_comment }}">
          </td>
          <td>
            <button type="submit" class="btn btn-info">送信</button>
          </td>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endif


</body>
</html>
