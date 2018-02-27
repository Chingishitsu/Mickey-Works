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

  public static $rules = array(
    'username' => 'required',
    'name' => 'required',
    'password' => 'required',
    'email' => 'email',
    'birth' => 'required',
    'mst_degree_id' => 'required',
    'mst_ssub_id' => 'required',
    'message' => 'required',
  );



>>>>>>> 05f56f0d59d201de01af8181d3c3e48c09a41853
  public function degree()
  {
    return $this->belongsTo("App\MstDegree", "mst_degree_id");
  }

  public function ssub()
  {
    return $this->belongsTo("App\MstSsub", "mst_ssub_id");
  }

  public static $rules = [
    'username' => 'required',
    'email' => 'email',
    'password' => 'required|between:0,255|confirmed',
    'name' => 'required',
    'tel' => 'required',
    'birth' => 'numeric|between:0,150',
    'mst_degree_id' => 'required',
    'mst_ssub_id' => 'required',
    'message' => ''
  ];
   public static $messages = [
    'username.required' => 'ユーザー名を入力して下さい',
    'email.email' => '正しいのメールを入力して下さい',
    'password.required' => 'パスワードを入力して下さい',
    'name' => '名前を入力して下さい',
    'tel' => '携帯を入力して下さい',
    'birth' => '誕生日を入力して下さい',
    'mst_degree_id' => '',
    'mst_ssub_id' => '',
    'message' => ''
  ];
}
