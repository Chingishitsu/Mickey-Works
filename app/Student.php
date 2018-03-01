<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

<<<<<<< HEAD
=======
  protected $guarded = array('id');

  public static $rules = [
    'username' => 'required|between:6,30',
    'name' => 'required|between:3,30',
    'password' => 'required|between:8,30',
    'password_confirmation' => 'same:password',
    'email' => 'required|email',
    'birth' => 'required|date_format:Y-m-d',
    // 'mst_degree_id' => 'required',
    // 'mst_ssub_id' => 'required',
    'message' => 'required|max:500'
  ];
   public static $messages = [
    'username.required' => 'ユーザー名を入力して下さい',
    'username.between' => '字数は6から30まで入力してください',

    'name.required' => '名前を入力して下さい',
    'name.between' => '字数は3から30まで入力してください',

    'password.required' => 'パスワードを入力して下さい',
    'password.between' => '字数は8から30まで入力してください',
    'password_confirmation.same' => '2回の記入したパスワードは必ず同じです',

    'email.required' => 'E-mailを記入してください',
    'email.email' => '正しいメールを入力して下さい',

    'birth.required' => '誕生日を選択して下さい',
    'birth.date_format' => '正しい日付の書き方で記入してください',

    'mst_degree_id.required' => '最高学位を選択して下さい',
    'mst_ssub_id.required' => '専門を選択して下さい',

    'message.required' => 'アピールを記入してください',
    'message.max' => '最大の字数は500です'
  ];

/*  public static $rules = array(
    'username' => 'required',
    'name' => 'required',
    'password' => 'required',
//    'repassword' => 'same:password',
    'email' => 'email',
    'birth' => 'required',
    'mst_degree_id' => 'required',
    'mst_ssub_id' => 'required',
    'message' => 'required',
  );
*/
  public function matchs()
  {
    return $this->hasMany("App\Match");
  }

>>>>>>> 8ce523fd6883edd3eef5216dc3e29832a7191424
  public function degree()
  {
    return $this->belongsTo("App\MstDegree", "mst_degree_id");
  }
  public function matchs()
  {
    return $this->hasMany("App\match");
  }

  public function ssub()
  {
    return $this->belongsTo("App\MstSsub", "mst_ssub_id");
  }

  public static $rules = [
   'username' => 'required|regex:/^[0-9a-zA-Z-_]+$/|between:6,30',
   'name' => 'required|between:3,30',
   'password' => 'required|between:8,30|confirmed',
   'password_confirmation' => 'same:password',
   'email' => 'required|email',
   'birth' => 'required|date_format:Y-m-d',
   'mst_degree_id' => 'required',
   'mst_ssub_id' => 'required',
   'message' => 'required|max:500'
 ];
  public static $messages = [
   'username.required' => 'ユーザー名を入力して下さい',
   'username.regex' => '英字、数字、”_”、”-”を入力してください',
   'username.between' => '字数は6から30まで入力してください',
   'name.required' => '名前を入力して下さい',
   'name.between' => '字数は3から30まで入力してください',
   'password.required' => 'パスワードを入力して下さい',
   'password.between' => '字数は8から30まで入力してください',
   'password_confirmation.same' => '2回の記入したパスワードは必ず同じです',
   'email.required' => 'E-mailを記入してください',
   'email.email' => '正しいメールを入力して下さい',
   'birth.required' => '誕生日を選択して下さい',
   'birth.date_format' => '正しい日付の書き方で記入してください',
   'mst_degree_id.required' => '最高学位を選択して下さい',
   'mst_ssub_id.required' => '専門を選択して下さい',
   'message.required' => 'アピールを記入してください',
   'message.max' => '最大の字数は500です'
 ];

}
