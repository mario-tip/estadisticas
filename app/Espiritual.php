<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Espiritual extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'f_bau',
    'lug_bautismo',
    'min_bau',
    'f_espi',
    'lu_espi',
    'min_espi',
    'user_id'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
