<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use App\Notifications\StudentPasswordResetNotification;
use App\Match;
use App\Student;
use App\MstSsub;
use App\MstDegree;
use App\Company;

use PharIo\Manifest\CopyrightElement;
use Validator;


class StudentController extends Controller
{
  public function showStudentLinkRequestForm()
  {
      return view('student.email_request');
  }
  public function showStudentResetForm(Request $request, $token = null)
  {
      return view('student.reset')->with(
          ['token' => $token, 'email' => $request->email]
      );
  }
  use SendsPasswordResetEmails;
  use ResetsPasswords;
  protected $redirectTo = '/student/student_login';
  protected function guard()
  {
    return Auth::guard('student');
  }
  protected function broker()
  {
    return Password::broker('students');
  }




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

      $student->username = $request->username;
      $student->password = Hash::make($form["password"]);
      $student->email = $form['email'];
      $student->name = $form['name'];
      $student->birth = $form['birth'];
      $student->mst_degree_id = $form['mst_degree_id'];
      $student->mst_ssub_id = $form['mst_ssub_id'];
      $student->message = $form['message'];
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
      return view('student.student_login',['msg'=>'']);
      //postでアクセスする場合、以下の処理を行う。
      //requestのpostデータから、ユーザー名とパスワードを取得する。
    } else {
      $username = $request->username;
      $password = $request->password;
      if (Auth::guard('student')->attempt(['username'=>$username,'password'=>$password])){
          return redirect('student/student_index');
      } else {
          return view('student.student_login',['msg'=>'ユーザー名またはパスワードが違う']);
      }
    }
  }
  public function studentLogout(Request $request)
  {
    Auth::guard('student')->logout();
    return redirect('student/student_login');
  }


  public function studentIndex(Request $request)
  {
    //AuthコンポーネントからID取得する。
    $id = Auth::id();
    //取得したIDにより、モデールを通じてデータベースから、留学生登録情報を取得する。
    //取得した留学生"登録情報"を表示する。
    $students = Student::find($id);

    return view('student.student_index',['students'=>$students]);
    // }
    // $items = DB::table('students')->orderBy($sort,'asc')->paginate(5);
    // return view('student.student_index',['items' => $items,'sort'=>$sort,'student'=>$student]);
  }


  public function studentEdit(Request $request)
  {

    if ($request->isMethod('get'))
    {
      $id = Auth::id();
      $students = Student::find($id);
      $mstssubs = MstSsub::all();
      $mstdegrees = MstDegree::all();
      return view('student.student_edit',['students'=>$students,'mstssubs'=>$mstssubs,'mstdegrees'=>$mstdegrees]);
    } else {
      //requestのpostからユーザー名、メールアドレス、パスワード、名前、誕生(年、月、日)、携帯、最高学位、専門、アピールの情報を取得する。
      //上記情報をバリデーションで検証する。
      $validator = Validator::make($request->all(),Student::$editrules,Student::$editmessages);
      if ($validator->fails())
      {
        // var_dump(123);
        // exit();
        return redirect('student/student_edit/')
        ->withErrors($validator)
        ->withInput();
      }
      $id = Auth::id();
      $student = Student::find($id);
      $form = $request->all();
      unset($form['_token']);
      $student->username = $form['username'];
      $student->email = $form['email'];
      $student->name = $form['name'];
      $student->birth = $form['birth'];
      $student->mst_degree_id = $form['mst_degree_id'];
      $student->mst_ssub_id = $form['mst_ssub_id'];
      $student->message = $form['message'];
      //成功した場合：
      //新しいデータをsave()で更新する。
      $student->save();

      return redirect('student/student_index')->with('message','編集成功しました');
    }
  }


  public function studentDelete(Request $request)
  {
    $item = Match::find($request->id);
    if($item == null){
      return redirect('student/student_index');
    }
    $item->delete();
    return redirect('student/student_index');
  }


  public function studentMatch(Request $request)
  {
    $company_name = empty($request->company_name)?"":$request->company_name;
    $company_address = empty($request->company_address)?"":$request->company_address;
    $company_mst_csub_id = empty($request->company_mst_csub_id)?"":$request->company_mst_csub_id;
    $company_money = empty($request->company_money)?"":$request->company_money;
    $csubs = MstCsub::all();
    $items = Company::where('name','like',"%".$company_name."%")->where('address','like',"%".$company_address."%")->get();
    if ($company_money != "") {
        $items = $items->where('money',$company_money);
    }

    if ($company_mst_csub_id != "") {
        $items = $items->where('mst_csub_id',$company_mst_csub_id);
    }

    return view('student.student_match',['items'=>$items,'company_name'=>$company_name,'company_address'=>$company_address,'company_mst_csub_id'=>$company_mst_csub_id,'company_money'=>$company_money,'csubs'=>$csubs]);
  }


  public function studentApplication(Request $request)
  {
    $item = Company::find($request->id);
    if ($request->isMethod('get')) {
      $item = Company::find($request->id);
      if($item == null){
        return redirect('student/student_index');
      }
      $clicks = $item->clicks;
      $clicks = $clicks + 1;
      $item->clicks = $clicks;
      $item->save();
      return view('student.student_application',['item'=>$item]);
    }else {
      $id = Auth::id();
      $items = Match::where('student_id',$id)->get();
      $company_id = $request->company_id;
      foreach ($items as $item) {
        if ($company_id == $item->company_id){
          $item = Company::find($request->id);
          $msg = 'この会社には応募しました';
          return view('student.student_application',['item'=>$item,'msg'=>$msg]);
        };
      }

      // if($request->s == Student::match()->student_id){
      //   $msg => 'この会社には応募しました';
      //   return view('student.student_application',['item'=>$item,'msg'=>$msg]);
      // }
      //
      $match = new Match;
      $match->student_id = Auth::id();
      $match->company_id = $request->company_id;
      $match->student_comment = $request->message;
      $match->result_id = "1";
      $match->save();
      return redirect('student/student_index');
    }
  }
}
