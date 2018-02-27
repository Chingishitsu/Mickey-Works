<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
  public function studentAdd(Request $request)
  {//  getでアクセスする場合、以下の処理を行う。登録画面をレンダルする。
    if($request->isMethod('get'))
    {
      $mstssub = MstSsub::all();
      $mstdegree = MstDegree::all();
      return view("student.student_add",['mstssub'=>$mstssub,'mstdegree'=>$mstdegree]);
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
}
