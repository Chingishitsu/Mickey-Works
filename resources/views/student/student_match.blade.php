<head>
  <title>マッチング画面</title>
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

      <li><a class="btn btn-outline-info" href="{{url('student/student_login')}}">log out</a></li>
      </ul>
      </div>
      </div>
      </nav>

    <div class="container"　 style="margin-top:50px">
<h2>マッチング情報の検索</h2>
<form action="" method="get">
  <div class="form-inline">
    <h3>会社名記入</h3><input type="text" class="form-control" name="company_name" value="{{$company_name}}">
  </div>

  <div class="form-inline">
    <h3>本社所在地記入</h3><input type="text" class="form-control" name="company_address" value="{{old('company_address')}}">
  </div>

  <div class="form-inline">
    <h3>分野記入</h3><input type="text" class="form-control" name="company_mst_csub_id" value="{{old('company_mst_csub_id')}}">
  </div>

  <div class="form-inline">
    <h3>給料記入</h3><input type="text" class="form-control" name="company_money" value="{{old('company_money')}}">
  </div>
  <input type="submit" class="btn btn-outline-info" value="検索">
  <a class="btn btn-outline-info" href="{{url('student/student_index')}}">詳細情報を返す</a>
</form>
</div>
<div class="container">
<h3>検索結果</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th>企業本名</th>
      <th>企業Address</th>
      <th>企業分野</th>
      <th>給料</th>
      <th>アピール</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $item)
    <tr>
      <td><a href="student_application/{{$item->id}}">{{$item->name}}</a></td>
      <td><a href="student_application/{{$item->id}}">{{$item->address}}</a></td>
      <td><a href="student_application/{{$item->id}}">{{$item->csub->name}}</a></td>
      <td><a href="student_application/{{$item->id}}">{{$item->money}}</a></td>
      <td><a href="student_application/{{$item->id}}">{{$item->message}}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</body>
