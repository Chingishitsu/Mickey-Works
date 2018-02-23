<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstDegree extends Model
{
  protected $table = 'mst_degrees';

  public function students()
  {
    return $this->hasMany("App\Student");
  }

}
