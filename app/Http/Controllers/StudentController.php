<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Match;
use App\student;
use App\MstSsub;
use App\MstDegree;
use Validator;

class StudentController extends Controller
{
  public function studentAdd(Request $request)
  {//getでアクセスする場合、以下の処理を行う。登録画面をレンダルする。
    if ($request->isMethod('get'))
    {
      $mstssubs = MstSsub::all();
      $mstdegrees = MstDegree::all();
      return view("student.student_add",['mstssubs'=>$mstssubs,'mstdegrees'=>$mstdegrees]);
      //postでアクセスする場合、以下の処理を行う。
      //requestのpostから、登録情報を取得する

    } else {
      //上記情報をValidatorで検証する。
      $validator = Validator::make($request->all(),Student::$rules,Student::$messages);
      //失敗した場合：
      //エラーメッセージを連れて、本ページを戻す
      if ( $validator->fails() )
      {
        return redirect('student/student_add')
          ->withErrors($validator)
          ->withInput();
      }
      //成功した場合：
      //新しいDATAをsave()で新規する、詳細ページを戻す
      $student = new Student;
      $form = $request->all();
      unset($form['_token']);

      $student->$username = $form['username'];
      $student->$password = $form['password'];
      $student->$email = $form['email'];
      $student->$name = $form['name'];
      $student->$birth = $form['birth'];
      $student->$mst_degree = $form['mst_degree_id'];
      $student->$mst_ssub = $form['mst_ssub_id'];
      $student->$message = $form['message'];
      $student->save();
      //登録成功のメッセージとともに留学生ログイン画面に遷移する。
      return redirect('student/student_login');
    }
  }

  public function studentLogin(Request $request)
  {
    //getでアクセスする場合、以下の処理を行う。
    //ログイン画面をレンタルする。
    if($request->isMethod('get'))
    {
      return view('student.student_login');
      //postでアクセスする場合、以下の処理を行う。
      //requestのpostデータから、ユーザー名とパスワードを取得する。
    } else {

    }

    //Authモデルのattemptメソッドを利用し、上記の情報を認証する。
    //失敗した場合：
    //メッセージに、ログインできないと記録して、再度、ログインアクションにredirectする。
    //成功した場合：
    //情報詳細画面に遷移する。
  }


  public function studentIndex(Request $request)
  {
    //AuthコンポーネントからID取得する。
    $id = 1;
    //取得したIDにより、モデールを通じてデータベースから、留学生登録情報を取得する。
    //取得した留学生"登録情報"を表示する。
    $items = Student::find($id);

    return view('student.student_index',['items'=>$items]);
    // }
    // $items = DB::table('students')->orderBy($sort,'asc')->paginate(5);
    // return view('student.student_index',['items' => $items,'sort'=>$sort,'student'=>$student]);

  }

  public function studentEdit(Request $request)
  {
    if ($request->isMethod('get'))
    {
      $item = Student::find($request->id);
      $students = Student::all();
      return view('student.student_edit',['item'=>$item,'students'=>$students]);
    } else {
      $validator = Validator::make($request->all(),Student::$rules,Student::$messages);
      if ($validator->fails())
      {
        return redirect('student/student_edit/'.$request->id)
        ->withErrors($validator)
        ->withInput();
      }
      $item = Student::find($request->id);
      $form = $request->all();
      unset($form['_token']);

      $student->$username = $form['username'];
      $student->$password = $form['password'];
      $student->$email = $form['email'];
      $student->$name = $form['name'];
      $student->$birth = $form['birth'];
      $student->$mst_degree = $form['mst_degree_id'];
      $student->$mst_ssub = $form['mst_ssub_id'];
      $student->$message = $form['message'];
      $student->save();

      return redirect('student/student_index'.$request->id);
    }
  }

  public function studentDelete(Request $request)
  {
    $item = Match::find($request->id)->delete();
    return view('student.student_index');
  }
}
