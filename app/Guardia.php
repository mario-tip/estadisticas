<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Guardia extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'entrada',
    'salida',
    'user_id',
    'iglesia_id'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
