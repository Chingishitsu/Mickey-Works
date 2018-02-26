<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
  public static $rules = array(
    'student_id' => 'required',
    'company_id' => 'required',
    'student_comment' => 'between:0,500',
  );
  public static $messages = array(
    'student_id.required' => '留学を選択してください',
    'company_id.required' => '会社を選択してください',
    'student_comment.between' => '最大500文字'
  );

  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $table = 'matching';

  public function company()
  {
    return $this->belongsTo("App\Company");
  }

  public function student()
  {
    return $this->belongsTo("App\Student");
  }

  public function result()
  {
    return $this->belongsTo("App\MstResult");
  }

}
