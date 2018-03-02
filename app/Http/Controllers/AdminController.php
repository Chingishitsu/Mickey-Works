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
use App\MstResult;
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
          if ($item == null){
              return view('admin.index');
          }
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
        $students = Student::all();
        $companies = Company::all();
        $results = MstResult::all();
        return view('admin.matchadd',['students'=>$students,'companies'=>$companies,'results'=>$results]);
      }else {
        $validator = Validator::make($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin.matchadd')
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
      if ($item == null){
          return view('admin.index');
      }
      return view('admin.matchview',['item'=>$item]);
    }

    public function matchdelete(Request $request)
    {
      Match::find($request->id)->delete();
      return redirect('admin/matchindex');
    }
    
    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
      if ($request->isMethod("get"))
      {
          return view('admin.login',['msg'=>'']);
        } else {
            $username = $request->username;
            $password = $request->password;
            if (Auth::guard('admin')->attempt(['username'=>$username,'password'=>$password])){
                return view('admin.index');
            } else {
                return view('admin.login',['msg'=>'ユーザー名またはパスワードが違う']);
            }
      }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
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
        $student = Student::find($request->id);
        if($request->isMethod("get")){
            return view('admin.student_edit',['student' => $student],array('ssubs' => $ssubs, "degrees" => $degrees));
        }else{
            $validator = Validator::make($request->all(),Student::$editrules,Student::$messages);
            if ($validator->fails()){
                // var_dump($validator->errors());
                // exit;
                return redirect('admin/student_edit/'.$request->id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $form = $request -> all();
            unset($form['_token']);
            unset($form['password_confirmation']);
            $student ->fill($form) ->save();
            // DB::table('students')->where('id',$request->id)->update($form);
            return redirect('admin/student_index');
        }
    }

    public function studentDelete(Request $request)
    {
        Student::find($request->id)->delete();
        return redirect('admin/student_index');
    }

}
