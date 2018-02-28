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
    'student_id.required' => '留学idを選択してください',
    'company_id.required' => '会社idを選択してください',
    'student_comment.between' => '最大500文字'
  );

  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $table = 'matching';
  protected $fillable = ['student_id','company_id','result_id','company_comment','student_comment'];

  public function company()
  {
    return $this->belongsTo("App\Company",'company_id');
  }

  public function student()
  {
    return $this->belongsTo("App\Student",'student_id');
  }

  public function result()
  {
    return $this->belongsTo("App\MstResult",'result_id');
  }

  public function scopeStudentName($query,$student_name)
  {
      return $query->where('student_name','LIKE',"%$student_name%");
  }

  public function scopeCompanyName($query,$company_name)
  {
      return $query->where('company_name','LIKE',"%$company_name%");
  }


}
