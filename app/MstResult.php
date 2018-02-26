<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstResult extends Model
{
  protected $table = 'mst_results';

  public function matches()
  {
    return $this->hasMany("App\Match");
  }
}
