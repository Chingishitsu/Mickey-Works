<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Admin extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];

}
