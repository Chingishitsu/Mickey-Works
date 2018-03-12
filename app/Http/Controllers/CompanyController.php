<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use App\Company;
use App\MstCsub;
use App\Match;
use App\Student;
use App\MstSsub;
use App\MstDegree;
use App\MstResult;
class CompanyController extends Controller
{
  public function register(Request $request)
  {
    $csubs = MstCsub::all();
    //getでアクセスする場合、以下の処理を行う。
    if ($request->isMethod('get')) {
      //情報登録画面をレンダルする。
      return view('company.register',['csubs' => $csubs]);
    } else {
  //postでアクセスする場合、以下の処理を行う。
  //requestで所得したデータを、バリテーションのルールとマッチングする。
      $validator = Validator::make($request->all(),Company::$rules,Company::$messages);
      // 失敗した場合：
      // 　　エラーメッセージと入力した情報とともに登録画面にリディレクトする。
      if ($validator->fails()) {
        return redirect('/company/register')
        ->withErrors($validator)
        ->withInput();
      } else {
        // 成功した場合：
        // 登録情報をデータベースに保存して、
        $company = new Company;
        $form = $request->all();
        unset($form['_token']);
        $company->username = $form["username"];
        $company->name = $form["name"];
        $company->password = Hash::make($form["password"]);
        $company->email = $form["email"];
        $company->mst_csub_id = $form["mst_csub_id"];

        $company->save();
        //登録成功のメッセージとともに企業ログイン画面に遷移する。

        return redirect('/company/login')->with('msg','登録成功しました');
      }
    }
  }
  public function login(Request $request)
  {
    if ($request->isMethod('get')) {

      return view('company.login');
    } else {
      $username = $request->username;
      $password = $request->password;
      if (Auth::guard('company')->attempt(['username'=>$username,'password'=>$password])){
          return redirect('company/view');
      } else {
          return redirect('company/login')->with('msg','ユーザー名またはパスワードが間違っています');
      }
    }

  }
  public function view(Request $request)
  {
    if ($request->isMethod('get')) {
      if (Auth::guard('company')->user()){
        $results = MstResult::all();
        //AuthコンポーネントからIDを取得する。
        $item = Company::find(Auth::guard('company')->id());
        //取得した企業情報とともに情報一覧画面にリディレクトする。
        return view('company.view',['item' => $item,'results' =>$results]);
      }
      if (Auth::guard('student')->user()){
        $item = Company::find($request->id);
        return view('company.view',['item' => $item]);
      }

    }
    if($request->isMethod('post')){
      if (Auth::guard('company')->user()){
        $results = MstResult::all();
        //AuthコンポーネントからIDを取得する。
        $item = Company::find(Auth::guard('company')->id());
        $match = Match::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $match->result_id = $form["result_id"];
        $match->company_comment = $form["company_comment"];
        $match->save();
        return view('company.view',['item' => $item,'results' =>$results]);
      }
      if (Auth::guard('student')->user()){
        return view('student.index');
      }
    }
    return redirect('company/login')->with('msg','ログインしてください');
  }

  public function edit(Request $request)
  {
    $csubs = MstCsub::all();
    //$user = Auth::user();

    $item = Company::find(Auth::guard('company')->id());
    //getでアクセスする場合、以下の処理を行う。
    if ($request -> isMethod('get')) {
      //データベースから、情報を取得し、情報編集画面をレンダルする。
      return view ('company.edit',['items' => $item ,'csubs' => $csubs]);
    } else {
      //postでアクセスする場合、以下の処理を行う。
        //authコンポーネントから、編集情報を取得し、バリテーションのルールとマッチングする。
      $validator = Validator::make($request->all(),Company::$rules_edit,Company::$messages);
//       失敗した場合：
// 　　エラーメッセージと入力した情報とともに情報編集画面にリディレクトする。
      if ($validator->fails()) {
        return redirect('/company/edit')
        ->withErrors($validator)
        ->withInput();
      } else {
        // 成功した場合：
        //編集した情報をデータベースに保存する。
        $company = Company::find(Auth::guard('company')->id());
        $form = $request->all();
        unset($form['_token']);
        $company->message = $form["message"];
        $company->name = $form["name"];
        $company->money = $form["money"];
        $company->email = $form["email"];
        $company->address = $form["address"];
        $company->mst_csub_id = $form["mst_csub_id"];
        $company->save();
        // 編集成功のメッセージとともに企業情報一覧画面に遷移する。

        return redirect('/company/view')->with('msg','編集成功しました');
      }
    }
  }
  public function logout()
  {
      Auth::guard('company')->logout();
      return redirect('/company/login');
  }

  public function clickrank()
  {
      $clicks = Company::orderBy('clicks','desc')->take(5)->get();
      return view('company.clickrank',['clicks' => $clicks]);
  }
}
