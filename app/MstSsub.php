<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstSsub extends Model
{
  protected $table = 'mst_ssubs';

  public function students()
  {
    return $this->hasMany("App\Student");
  }
}
