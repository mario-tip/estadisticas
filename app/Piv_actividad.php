<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Piv_actividad extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'user_id',
    'actividad_id'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
