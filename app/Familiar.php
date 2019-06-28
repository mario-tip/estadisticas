<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nom_conyuge',
    'gpo_conyuge',
    'enlace_religioso',
    'enlace_civil',
    'cant_hijos',
    'user_id',
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
