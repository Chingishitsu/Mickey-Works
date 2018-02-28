<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\student;
use App\MstSsub;
use App\MstDegree;
use App\Admin;
use App\Company;
use App\MstCsub;
use Validator;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function matchindex(Request $request)
    {
      $query = Match::all();
      $studentName = empty($request->$studentName) ? "" : $request->$studentName;
      $companyName = empty($request->$companyName) ? "" : $request->$companyName;
      if ($studentName != ""){
        $query = $query->where("studentName","=",$studentName);
      }
      if ($companyName != ""){
        $query = $query->where("companyName","=",$companyName);
      }
      $items = $query->get();
      return view('admin.matchindex',['items'=>$items]);
    }

    public function matchupdate(Request $qeruest)
    {
      if ($request->isMethod('get')){
        $item = Match::find($request->id);
        $students = DB::table('students')->all();
        $companies = DB::table('companies')->all();
        return view('admin.matchupdate',['item'=>$item,'students'=>$students,'companies'=>$companies]);
      }else {
        $validator = Validator::make($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin.update/'.$request->id)
          ->withErrors($validator)
          ->withInput();
        }
        $item = Match::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('admin.matchview'.$request->id);
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
        return view('admin.matchindex');
      }
    }

    public function matchview(Request $request)
    {
      $item = Match::find($request->id);
      return view('admin.matchview',['item'=>$item]);
    }

    public function matchdelete(Request $request)
    {
      $item = Match::find($request->id)->delete();
      return view('admin.matchindex');

    }

    public function studentIndex(Request $request)
    {
      //requestのqueryから入力するユーザー名を取得する。
      $student_name = $request->student_name;

      //入力されてない場合は、「""」空文字列を認める。
      $student_name = empty($student_name) ? "" : $student_name;

      //モデルのWhereメソッドを利用し、上記情報を検索する。
      $items = Student::where('name', 'LIKE', "%$student_name%")->paginate(1);

      //検索の結果をテンプレートに渡す。
      return view("admin.student_index", array("items" => $items, "student_name" => $student_name));
    }

    public function studentAdd(Request $request)
    {
      $ssubs = MstSsub::all();
      $degrees = MstDegree::all();

      if($request->isMethod("get")) {

/*      $username = DB::table('student')->all();
        $name = DB::table('student')->all();
        $password = DB::table('student')->all();
        $email = DB::table('student')->all();
        $birth = DB::table('student')->all();
        $mst_degree_id = DB::table('student')->all();
        $mst_ssub_id = DB::table('student')->all();
        $message = DB::table('student')->all();
*/
        return view('admin/student_add', array('ssubs' => $ssubs, "degrees" => $degrees));
      }else{
        $validator = Validator::make($request->all(),Student::$rules);
        if ($validator->fails()) {
          return redirect('admin.student_add')
          ->withErrors($validator)
          ->withInput();
        }
        $student = new Student;

        $form = $request -> all();

        unset($form['_token']);

        $student -> fill($form) ->save();
/*        $ssubs = MstSsub::all();
        $degrees = MstDegree::all();
*/
        return view('admin.student_add',array('ssubs' => $ssubs, "degrees" => $degrees));
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
          $validator = Validator::make($request->all(),Company::$rules);
          if ($validator->fails()) {
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
          $company->password = $form["password"];
          $company->email = $form["email"];
          $company->mst_csub_id = $form["mst_csub_id"];

          $company->save();
          return redirect('admin/company_index');
        }

      }
    public function companyEdit(Request $request)
    {
        //getでアクセスするの場合は Routeparameter連れているのIdを取得する。
        if ($request->isMethod('get'))
        {   //モデルの検索メソッドを利用し、上記情報を検索する。
            //検索の結果をテンプレートに渡す
          return view('admin/company_edit',array('csubs'=> $csubs));
        }else {
          //postでアクセスするの場合は、requestのpostから会社名、パスワード、などの情報を取得する。
          //上記情報をValidatorで検証する。
          $validator = Validator::make($request->all(),Company::$rules);
          if ($validator->fails()) {
            //失敗の場合は、エラーメッセージを連れて、本ページを戻す。
            return redirect('admin/company_edit')
            ->withErrors($validator)
            ->withInput();
        }
            //成功の場合は、新しいDATAをsave()で更新する、詳細ページを戻す
            $company->username = $form["username"];
            $company->name = $form["name"];
            $company->password = $form["password"];
            $company->email = $form["email"];
            $company->mst_csub_id = $form["mst_csub_id"];
            $company->money = $form["money"];
            $company->message = $form["message"];

            $company->save();
        return view("admin.company_index);
        
