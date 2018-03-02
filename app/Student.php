<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $guarded = array('id');



  public static $editrules = [
    'name' => 'required|between:3,30',
    'password' => 'required|between:8,30',
    'password_confirmation' => 'required|same:password',
    'email' => 'required',
    'birth' => 'required',
    'tel' => 'numeric',
    'message' => 'required|max:500'
  ];


  public static $rules = [
    'username' => 'required|between:6,30',
    'name' => 'required|between:3,30',
    'password' => 'required|between:8,30',
    'password_confirmation' => 'required|same:password',
    'email' => 'required',
    'birth' => 'required',
    'tel' => 'numeric',
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
    'password_confirmation.required' => 'パスワード確認を入力してください',
    'password_confirmation.same' => '2回の記入したパスワードは必ず同じです',

    'email.required' => 'E-mailを記入してください',
    // 'email.email' => '正しいメールを入力して下さい',

    'birth.required' => '誕生日を選択して下さい',
    // 'birth.date_format' => '正しい日付の書き方で記入してください',

    'tel.numeric' => '携帯番号は必ず数字です',

    'mst_degree_id.required' => '最高学位を選択して下さい',
    'mst_ssub_id.required' => '専門を選択して下さい',

    'message.required' => 'アピールを記入してください',
    'message.max' => '最大の字数は500です'
  ];


//   public function matchs()
//   {
//     return $this->hasMany("App\Match");
//   }

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


}
