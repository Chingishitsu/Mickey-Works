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
<<<<<<< HEAD
  public static public static $rules = array(
    'username' => 'required|alpha_dash|between:4,30',
    'name' => 'required|string|between:5,50',
    'password' => 'required|alpha_num|between:6,16',
    'email' => 'required|email|max:50',
  );
  public static $messages = array(
    'username.required' => 'ユーザー名を入力してください',
    'username.alpha_dash' => 'ユーザー名は英字、数字、"_"、"-"から使ってください',
    'username.between:4,30' => 'ユーザー名を４から３０文字まで入力してください',

    'name.required' => '会社名を入力してください',
    'name.string' => '正しい文字を使ってください',
    'name.between:5,50' => '会社名を５から５０文字まで入力してください',

    'password.required' => 'パスワードを入力してください',
    'password.alpha_num' => '英字と数字だけを使ってください',
    'password.between:6,16' => 'パスワードは半角英数で６から１６桁まで入力してください',

    'email.required' => 'メールアドレスを入力してください',
    'email.email' => '正しいメールアドレスを入力してください',
    'email.max:50' => 'メールアドレスを半角文字５０以内にしてください',

  );
=======

>>>>>>> ee709bee9efc337eb4edea20c4102964ed802536

}
