@extends('layouts.student_layout')
@section('title','student_add')

@section('content')
  <main class="py-4">
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card card-default">

  <div class="btn btn-outline-info btn-lg">留学生新規入会</div>
  <div class="card-body">
  <form method="post" action="">
    {{ csrf_field() }}
  <div class="form-group row">
  <label for="username" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
  <div class="col-md-6">
    <input type="text" class="btn btn-outline-info btn-lg" name="username" value="{{old('username')}}">
  </div>
  </div>
    @if ($errors->has('username'))
    <p align="center">{{$errors->first('username')}}</p>
    @endif
  <div class="form-group row">
  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
  <div class="col-md-6">
    <input type="email" class="btn btn-outline-info btn-lg" name="email" value="{{old('email')}}">
  </div>
  </div>
  @if ($errors->has('email'))
  <p align="center">{{$errors->first('email')}}</p>
  @endif

  <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">パス―ワード</label>
  <div class="col-md-6">
    <input type="password" class="btn btn-outline-info btn-lg" name="password" value="{{old('password')}}">
  </div>
  </div>
  @if ($errors->has('password'))
  <p align="center">{{$errors->first('passowrd')}}</p>
  @endif

  <div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>
  <div class="col-md-6">
    <input type="password" class="btn btn-outline-info btn-lg" name="password_confirmation" value="{{old('password_confirmation')}}">
  </div>
  </div>
  @if ($errors->has('password_confirmation'))
  <p align="center">{{$errors->first('password_confirmation')}}</p>
  @endif

  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
  <div class="col-md-6">
    <input type="text" class="btn btn-outline-info btn-lg" name="name" value="{{old('name')}}">
  </div>
  </div>
  @if ($errors->has('name'))
  <p align="center">{{$errors->first('name')}}</p>
  @endif

  <div class="form-group row">
    <label for="birth" class="col-md-4 col-form-label text-md-right">誕生日</label>
  <div class="col-md-6">
    <input type="text" class="btn btn-outline-info btn-lg" name="birth" value="{{old('birth')}}">
  </div>
  </div>
  @if ($errors->has('birth'))
  <p align="center">{{$errors->first('birth')}}</p>
  @endif
<!--
  <div class="form-group row">
    <label for="tel" class="col-md-4 col-form-label text-md-right">携帯</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="tel" value="{{old('tel')}}">
  </div>
  </div>
  @if ($errors->has('tel'))
  <p align="center">{{$errors->first('tel')}}</p>
  @endif -->

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
    <textarea class="btn btn-outline-info btn-lg" rows="5" name="message">{{old('message')}}</textarea>
  </div>
  </div>

  <div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-outline-info btn-lg">提出</button>
    <button type="reset" class="btn btn-outline-info btn-lg">リセット</button>
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
