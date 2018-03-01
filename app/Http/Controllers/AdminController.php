<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Student;
use App\MstSsub;
use App\MstDegree;
use App\Admin;
use App\Company;
use App\MstCsub;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function matchindex(Request $request)
    {
      //requestのqueryから入力された学生名前と会社名前を取得する。
      //取得された学生名前と会社名前を整形する。学生名前、会社名前を入力されてない場合は、「""」空文字列を認める。
      $student_name = empty($request->student_name) ? "" : $request->student_name;
      $company_name = empty($request->company_name) ? "" : $request->company_name;
      //モデルの検索メソッドを利用し、上記情報を検索する。
      $items = Match::whereHas("student", function($query) use ($student_name) {
            $query->where('name', 'like',"%". $student_name ."%");
        })->whereHas("company", function($query) use ($company_name) {
            $query->where('name', 'like',"%". $company_name ."%");
        })->paginate(5);
      //検索の結果をテンプレートに渡す。
      return view('admin.matchindex',['items'=>$items,'student_name'=>$student_name,'company_name'=>$company_name]);
    }

    public function matchupdate(Request $request)
    {
      if ($request->isMethod('get')){
          $item = Match::find($request->id);
          $students = Student::all();
          $companies = Company::all();
          $results = MstResult::all();
        return view('admin.matchupdate',['item'=>$item,'students'=>$students,'companies'=>$companies,'results'=>$results]);
      }else {
        $validator = Validator::make($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin/update/'.$request->id)
          ->withErrors($validator)
          ->withInput();
        }
        $item = Match::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('admin/matchview/'.$request->id);
      }
    }

    public function matchadd(Request $request)
    {
      if ($request->isMethod('get')) {
        $students = DB::table('students')->all();
        $companies = DB::table('companies')->all();
        return view('admin.matchadd',['students'=>$students,'companies'=>$companies]);
      }else {
        $validator = Validator::make($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin.matchadd')
          ->withErrors($validator)
          ->withInput();
        }
        $item = new Macth;
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('admin/matchindex');
      }
    }

    public function matchview(Request $request)
    {
      $item = Match::find($request->id);
      return view('admin.matchview',['item'=>$item]);
    }

    public function matchdelete(Request $request)
    {
      Match::find($request->id)->delete();
      return redirect('admin/matchindex');
    }

    public function studentIndex(Request $request)
    {
      //requestのqueryから入力するユーザー名を取得する。
      $student_name = $request->student_name;

      //入力されてない場合は、「""」空文字列を認める。
      $student_name = empty($student_name) ? "" : $student_name;

      //モデルのWhereメソッドを利用し、上記情報を検索する。
      $items = Student::where('name', 'LIKE', "%$student_name%")->paginate(5);

      //検索の結果をテンプレートに渡す。
    return view("admin.student_index", array("items" => $items, "student_name" => $student_name));
    }

    public function studentInfo(Request $request)
    {
        $item = Student::find($request ->id);

        return view('admin.student_info',['item' => $item]);
    }

    public function studentAdd(Request $request)
    {
      $ssubs = MstSsub::all();
      $degrees = MstDegree::all();

      if($request->isMethod("get")) {

      /* $username = DB::table('student')->all();
        $name = DB::table('student')->all();
        $password = DB::table('student')->all();
        $email = DB::table('student')->all();
        $birth = DB::table('student')->all();
        $mst_degree_id = DB::table('student')->all();
        $mst_ssub_id = DB::table('student')->all();
        $message = DB::table('student')->all();
*/
        return view('admin.student_add', array('ssubs' => $ssubs, "degrees" => $degrees));
      }else{
        $validator = Validator::make($request->all(),Student::$rules,Student::$messages);
        if ($validator->fails()) {
          return redirect('admin/student_add')
          ->withErrors($validator)
          ->withInput();
        }
        $student = new Student;

        $form = $request -> all();

        unset($form['_token']);

        unset($form['password_confirmation']);

        $student -> fill($form) ->save();

        return redirect('admin/student_index'/*,array('ssubs' => $ssubs, "degrees" => $degrees)*/);
      }

    }

    public function companyindex(Request $request)
    {
      //requestのqueryから入力するのユーザー名、会社名、Email、給料、分野を取得する。
      $company_username = $request->company_username;

      //入力されてない場合は、「""」空文字列を認める。
      $company_username = empty($company_username) ? "" : $company_username;

      //モデルのWhereメソッドを利用し、上記情報を検索する。
      $items = Company::where('username','LIKE',"%$company_username%")->paginate(3);

      //検索の結果をテンプレートに渡す。


      return view("admin.company_index",array("items" => $items, "company_username" => $company_username));
    }

    public function companyAdd(Request $request)
    {
      $csubs = MstCsub::all();
      //getの場合 会社の新規ページーをレンダル。
        if ($request->isMethod('get'))
        {

          return view('admin/company_add',array('csubs'=> $csubs));
        }else {
            //上記情報をValidatorで検証する。
          $validator = Validator::make($request->all(),Company::$rules,Company::$messages);
          if ($validator->fails()) {

            // var_dump($validator->errors());
            // exit;
            return redirect('admin/company_add')
            ->withErrors($validator)
            ->withInput();
            //失敗の場合は、エラーメッセージを連れて、本ページを戻す。

            //成功の場合は、新しいDATAをsave()で新規する、詳細ページを戻す。
          }
          $company = new Company;

          $form = $request->all();

          unset($form['_token']);

          $company->username = $form["username"];
          $company->name = $form["name"];
          $company->password = Hash::make($form["password"]);
          $company->email = $form["email"];
          $company->mst_csub_id = $form["mst_csub_id"];

          $company->save();
          return redirect('admin/company_index');
        }

      }
    public function companyEdit(Request $request)
    {
        $csubs = MstCsub::all();

        //getでアクセスするの場合は Routeparameter連れているのIdを取得する。
        if ($request->isMethod('get'))
        {   //モデルの検索メソッドを利用し、上記情報を検索する。
            //検索の結果をテンプレートに渡す
            $company = Company::find($request->id);
            return view('admin.company_edit',['form'=>$company],array('csubs'=>$csubs));
        }else {
          //postでアクセスするの場合は、requestのpostから会社名、パスワード、などの情報を取得する。
          //上記情報をValidatorで検証する。
          $validator = Validator::make($request->all(),Company::$editrules, Company::$messages);
          if ($validator->fails()) {


            //失敗の場合は、エラーメッセージを連れて、本ページを戻す。
            return redirect('admin/company_edit/'.$request->id)
            ->withErrors($validator)
            ->withInput();
        }
            //成功の場合は、新しいDATAをsave()で更新する、詳細ページを戻す
            $company = Company::find($request->id);
            $form = $request->all();

            unset($form['_token']);
            $company->username = $request->username;
            // $company->name = $form["name"];
            // $company->password = $form["password"];
            $company->email = $request->email;
            $company->mst_csub_id = $request->mst_csub_id;
            $company->money = $request->money;
            $company->message = $request->message;
            $company->address = $request->address;
            $company->save();
        return redirect("admin/company_index");
       }
     }
     public function companyView(Request $request)
     {
       $item = Company::find($request->id);
       return view('admin/company_view',['item' => $item]);
     }
     public function companyDelete(Request $request)
     {
       Company::find($request->id)->delete();
       return redirect('admin/company_index');
     }


     public function Index(Request $request)
     {
       return view('admin.index');
     }




    public function logout(Request $request)
    {
      Auth::logout();
      return view('home.index');
    }

    public function login(Request $request)
    {
      $username = $request->username;
      $password = $request->password;
      if (Auth::guard('admin')->attempt(['username'=>$username,'password'=>$password])) {
        return view('admin.index');
      }else {
        return view('hello.index');
      }

    }

}
