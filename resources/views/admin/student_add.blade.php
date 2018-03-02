@extends('layouts.admin_layout')

@section('title','')
@section("content")
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

@endsection