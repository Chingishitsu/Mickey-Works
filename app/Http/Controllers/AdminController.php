<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function companyIndex(Request $request)
  {

    //requestのqueryから入力するのユーザー名、会社名、Email、給料、分野を取得する。
    $login_user_name = $request->query("");
    $company_name = $request->query("");
    $company_email = $request->query("");
    $company_salaries = $request->query("");
    $company_field = $request->query("");

    //入力されてない場合は、「""」空文字列を認める。
    if(empty($login_user_name)) {
      $login_user_name = "";
    }else {
      $query = $query->where("login_user_name","=",$login_user_name);
    }
    if (empty($company_name)) {
      $company_name = "" ;
    }else {
      $query = $query->where("company_name","=",$company_name);
    }
    if (empty($company_email)) {
      $company_email = "";
    }else {
      $query = $query->where("company_email","=",$company_email);
    }
    if (empty($company_salaries)) {
      $company_salaries = "";
    }else {
      $query = $query->where("company_salaries","="$company_salaries);
    }
    if (empty($company_field)) {
      $company_field = "";
    }else {
      $query = $query->where("company_field","=",$company_field);
    }
    //モデルのWhereメソッドを利用し、上記情報を検索する。
    $companies = Company::all();

    //検索の結果をテンプレートに渡す。
    return view("admin.companyindex", array('companies' => $companys ));


  }

    public function Companyupdate(Request $qeruest)
    {
      //getでアクセスするの場合は、以下の処理を行う。
      if ($request->isMethod('get')){
        $item = Company::find($request->id);
        $students = DB::table('students')->all();
        $companies = DB::table('companies')->all();
        return view('admin.companyupdate',['item'=>$item,'students'=>$students,'companies'=>$companies]);
      }else {
        $validator = Validator::($request->all(),Company::$rules,Company::$messages);
        if ($validator->fails()) {
          return redirect('admin.update/'.$request->id)
          ->withErrors($validator)
          ->withInput();
        }
        $item = Company::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('admin.Companyview'.$request->id);
      }
    }
    public function Companyadd(Request $request)
    {
      if ($request->isMethod('get')) {
        $companys = DB::table('company')->all();
        $companies = DB::table('companies')->all();
        return('admin.Companyadd',['companys'=>$companys,'companies'=>$companies]);
      }else {
        $validator = Validator::($request->all(),Company::$rules,Company::$messages);
        if ($validator->fails()) {
          return redirect('admin.matchadd')
          ->withErrors($validator)
          ->withInput();
        }
        $item = new Macth;
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return view('admin.companyindex');
      }
    }
    public function companyview(Request $request)
    {
      $item = Match::find($request->id);
      return view('admin.companyview',['item'=>$item]);
    }
    public function companydelete(Request $request)
    {
      $item = Match::find($request->id)->delete()abc;
      return view('admin.companyindex');
    }
}
}
