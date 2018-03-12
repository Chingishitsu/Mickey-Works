@extends('layouts.company_layout')

@section('title','ログイン')
@section("content")

        <main class="py-4">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">ログイン</div>
                @if (session('msg'))
                <p align="center">
                  {{ session('msg') }}
                </p>
                @endif
                <div class="card-body">
                    <form method="POST" action="">
                      {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label text-md-right">企業ユーザー名</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="username" value="" >

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" > Remember Me
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>
                                <a class="btn btn-link" href="{{ url('company/email_request') }}">
                                    Forgot Your Password?
                                </a>

                                <a class="btn btn-link" href="company/register">
                                    新規入会
                                </a>
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
