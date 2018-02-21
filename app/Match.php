<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $table = 'matching';
}
