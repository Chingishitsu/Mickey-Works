<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstCsub extends Model
{
  protected $table = 'Mst_csubs';


  public function companys()
  {
    return $this->hasMany("App\Company");
  }

}
