<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Company;
class CompanyController extends Controller
{
  public function register(Request $request)
  {
    //getでアクセスする場合、以下の処理を行う。
    if ($request->ismethod('get')) {
      //情報登録画面をレンダルする。
      return view('company.register');
    } else {
  //postでアクセスする場合、以下の処理を行う。
  //requestで所得したデータを、バリテーションのルールとマッチングする。
      $validator = Validator::make($request->all(),Company::$rules,Company::$messages);
      // 失敗した場合：
      // 　　エラーメッセージと入力した情報とともに登録画面にリディレクトする。
      if ($validator->fails()) {
        return redirect('company.register')->withErrors($validator)->withInput();
      } else {
        // 成功した場合：
        // 登録情報をデータベースに保存して、
        $company = new Company;
        $form = $request->all();
        unset($form['_token']);
        $company->fill($form)->save();
        //登録成功のメッセージとともに企業ログイン画面に遷移する。
        $msg = "登録成功しました";
        return view('company.login',['message' => $msg]);
      }
    }
  }
  public function edit(Request $request)
  {
    $user = Auth::user();
  }
}
