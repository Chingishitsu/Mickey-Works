@extends('layouts.student_layout')
@section('title','student_login')
@section('content')
  <main class="py-4">
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card card-default">
  <div class="btn btn-outline-info btn-lg">留学生方のログイン</div>
  <div class="card-body">

  <form method="post" action="">
    {{  csrf_field()  }}
  <!-- <input type="hidden" name="_token" value=""> -->
  <div class="form-group row">
  <label for="email" class="col-sm-4 col-form-label text-md-right">ユーザー名</label>
  <div class="col-md-6">
  <input type="text" class="btn btn-outline-info btn-lg" name="username">
  </div>
  </div>
  @if ($errors->has('username'))
  <p align="center">{{$errors->first('username')}}</p>
  @endif
  <div class="form-group row">
  <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
  <div class="col-md-6">
  <input type="password" class="btn btn-outline-info btn-lg" name="password">
  <br>{{$msg}}
  </div>
  </div>
  @if ($errors->has('password'))
  <p align="center">{{$errors->first('passowrd')}}</p>
  @endif

  <div class="form-group row">
  <div class="col-md-6 offset-md-4">
  <div class="checkbox">
  <label>
  <input type="checkbox" name="remember">Remember Me</label>
  </div>
  </div>
  </div>
  <div class="form-group row mb-0">
  <div class="col-md-8 offset-md-4">
  <button type="submit" class="btn btn-outline-info btn-lg">ログイン</button>
  <a class="btn btn-link" href="{{ url('student/email_request') }}">
      Forgot Your Password?
  </a>
  <a class="btn btn-link" href="{{url('student/student_add')}}">登録</a>
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

@endsection
