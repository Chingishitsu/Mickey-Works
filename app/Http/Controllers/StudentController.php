<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Illuminate\Database\Eloquent\SoftDeletes;
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
      return redirect('student/student_login')->with('message','登録成功しました');
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
      //Routeパラメータから連れているのIDを取得する。
　　　//モデルの検索メソッドを利用し、上記情報を検索する。
     //検索の結果をテンプレートに渡す。
      $students = Student::find(1);
      $mstssubs = MstSsub::all();
      return view('student.student_edit',['students'=>$students,'mstssubs'=>$mstssubs]);
    } else {
      //requestのpostからユーザー名、メールアドレス、パスワード、名前、誕生(年、月、日)、携帯、最高学位、専門、アピールの情報を取得する。
      //上記情報をバリデーションで検証する。
      $validator = Validator::make($request->all(),Student::$rules,Student::$messages);
      if ($validator->fails())
      {
        return redirect('student/student_edit/')
        ->withErrors($validator)
        ->withInput();
      }
      $students = Student::find(1);
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
      //成功した場合：
      //新しいデータをsave()で更新する。
      $student->save();

      return redirect('student/student_index')->with('message','編集成功しました');
    }
  }

  public function studentDelete(Request $request)
  {
    $item = Match::find($request->id)->delete();
    return view('student.student_index');
  }
}
