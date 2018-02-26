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


}
