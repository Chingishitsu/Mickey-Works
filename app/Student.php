<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

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



  public function degree()
  {
    return $this->belongsTo("App\MstDegree", "mst_degree_id");
  }

  public function ssub()
  {
    return $this->belongsTo("App\MstSsub", "mst_ssub_id");
  }

}
