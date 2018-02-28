<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];


  public function csub()
  {
    return $this->belongsTo("App\MstCsub","mst_csub_id");
  }
  public static $rules = array(
    'username' => 'required|alpha_dash|between:4,30',
    'name' => 'required|between:5,50',
    'password' => 'required|alpha_num|between:6,16',
    'password_confirmation' => 'required|same:password',
    'email' => 'required|email',
    'message' => 'required' ,
    'money' => 'required',
    'mst_csub_id' => 'required',
  );
/*  public static $messages = array(
    'username.required' => 'ユーザー名を入力してください',
    'username.alpha_dash' => 'ユーザー名は英字、数字、"_"、"-"から使ってください',
    'username.between' => 'ユーザー名を４から３０文字まで入力してください',

    'name.required' => '会社名を入力してください',
    'name.string' => '正しい文字を使ってください',
    'name.between' => '会社名を５から５０文字まで入力してください',

    'password.required' => 'パスワードを入力してください',
    'password.alpha_num' => '英字と数字だけを使ってください',
    'password.between' => 'パスワードは半角英数で６から１６桁まで入力してください',

    'password_confirmation.required' => 'パスワードを入力してください',
    'password_confirmation.same' => '同じパスワードではありません',

    'email.required' => 'メールアドレスを入力してください',
    'email.email' => '正しいメールアドレスを入力してください',

    'mst_csub_id.required' => '分野を選んでください',

    'address' => '会社本社所在地を入力してください' ,

    'money' => '給料を入力してください'
  );*/
    public static $editrules = array(
      'username' => 'alpha_dash|between:4,30',
      'address' => 'required',
      'email' => 'required|email',
      'message' => 'required' ,
      'money' => 'required',
      'mst_csub_id' => 'required'

    );
    public static $messages = array(
      'address' => '会社所在地を入力してください',
      'email' => 'メールアドレスを入力してください',
      'message' => '最大500文字' ,
      'money' => '給料を入力してください',
      'mst_csub_id' => '分野を選んでください'
    );
}
