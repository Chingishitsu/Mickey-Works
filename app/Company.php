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

  public function matchs()
  {
      return $this->hasMany("App\Match","id");
  }

  public static $rules = array(
    'username' => 'required|between:4,30',
    'name' => 'required|between:5,50',
    'password' => 'required|alpha_num|between:6,16',
    'password_confirmation' => 'required|same:password',
    'email' => 'required|email',
    'mst_csub_id' => 'required',
  );

  public static $editrules = array(
      'name' => 'alpha_dash|between:4,30',
      'address' => 'required',
      'email' => 'required',
      'message' => 'required' ,
      'money' => 'required',
      'mst_csub_id' => 'required'
  );


  public static $messages = array(
      'address' => '会社所在地を入力してください',
      'email.required' => 'メールアドレスを入力してください',
      'message' => '最大500文字' ,
      'money' => '給料を入力してください',
      'mst_csub_id' => '分野を選んでください'
    );

}
