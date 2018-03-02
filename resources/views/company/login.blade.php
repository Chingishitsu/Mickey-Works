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
                    <form method="POST" action="http://localhost/mickey/public/login">
                        <input type="hidden" name="_token" value="aBzuyKjZYw8pDJuPjESKsK8SO4awBYH8qcEYKHd8">
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">企業ユーザー名</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

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

                                <a class="btn btn-link" href="http://localhost/Mickey-Works/public/company/register">
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
