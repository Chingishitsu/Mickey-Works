<?php

namespace App\Http\Controllers;

use App\Company;
use App\MstResult;
use Illuminate\Http\Request;
use App\Match;
use App\Student;
use App\MstSsub;
use App\MstDegree;
use App\Admin;
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
          $items = MstResult::all();
          $students = Student::all();
          $companies = Company::all();
          return view('admin.matchadd',['items' => $items,'students'=>$students,'companies'=>$companies]);
      }else {
        $validator = Validator::make($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin/matchadd')
          ->withErrors($validator)
          ->withInput();
        }
        $item = new Match;
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
<<<<<<< HEAD
        $message = DB::table('student')->all();*/



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

      public function studentEdit(Request $request)
      {
        $ssubs = MstSsub::all();
        $degrees = MstDegree::all();
        $item = DB::table('students')->where('id',$request->id)->first();

        if($request->isMethod("get")){

          return view('admin.student_edit',['item' => $item],array('ssubs' => $ssubs, "degrees" => $degrees));
        }else{
          $validator = Validator::make($request->all(),Student::$rules,Student::$messages);
          if ($validator->fails()){
            return redirect('admin/student_edit/'.$request->id)
            ->withErrors($validator)
            ->withInput();
          }

        $param = [
          'id' => $request->id,
          'name' => $request->name,
          'password' => $request->password,
          'email' => $request->email,
          'tel' => $request->tel,
          'birth' => $request->birth,
          'mst_degree_id' => $request->mst_degree_id,
          'mst_ssub_id' => $request->mst_ssub_id,
          'message' => $request->message,
        ];

        unset($param['_token']);
        unset($param['password_confirmation']);

        DB::table('students')->where('id',$request->id)->update($param);
        return redirect('admin/student_index');

        }
      }

        public function index(Request $request)
        {
          return view('admin/index');
        }

        public function studentDelete(Request $request)
        {
          Student::find($request->id)->delete();
          return redirect('admin/student_index');
        }

/*      public function studentEdit(Request $request)
      {
        $ssubs = MstSsub::all();
        $degrees = MstDegree::all();

        //Routeのparameterからidを取得する。



        if ($request->isMethod('get')){
          $item = Student::find($request->id);

          return view('admin.student_edit',array('ssubs' => $ssubs, 'degrees' => $degrees , 'item'=>$item));

        }else {
          $validator = Validator::make($request->all(),Student::$rules);
          if ($validator->fails()) {
            return redirect('admin.student_edit'.$request->id)
            ->withErrors($validator)
            ->withInput();
          }
          $item = Student::find($request->id);
          $form = $request->all();
          unset($form['_token']);
          $item->fill($form)->save();
          return redirect('admin.student_edit'.$request->id);
        }

//        return view('admin.student_edit',array('ssubs' => $ssubs, 'degrees' => $degrees));
      }
*/



      public function companyAdd(Request $request)
      {
      //getの場合 会社の新規ページーをレンダル。
        if ($request->isMethod('get'))
        {
          $companys = DB::table('companys')->all();
          return view("admin.company_add");
        }
      //postの場合 requestのpostから会社ユーザー名、会社本名、パスワード、パスワード確認、emailを取得する。
        if($request->isMethod('post'))
        {


      {
        $mstssub = MstSsub::all();
        $mstdegree = MstDegree::all();
        return view("admin.student_add",['mstssub'=>$mstssub,'mstdegree'=>$mstdegree]);
        //postでアクセスする場合、以下の処理を行う。
        //requestのpostから、登録情報を取得する
      } else {
　　　　//上記情報をValidatorで検証する。
        $validator = Validator::make($request->all(),Student::$rules,Studnet::$messages);
        //失敗した場合：
        //エラーメッセージを連れて、本ページを戻す
        if ( $validator->fails() ) {
          return redirect('student/add')
            ->withErrors($validator)
            ->withInput();
        }
        //成功した場合：
        //新しいDATAをsave()で新規する、詳細ページを戻す
        $student = new Student;
        $form = $request->all();
        unset($form['_token']);
        $student->fill($form)->save();
        return redirect('admin/student');
      }
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

  
