<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dia extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'user_id',
    'estatus',
    'dia_guardia',
    'f_ingreso',
    'f_baja'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];

  public function usuario(){
    return $this->belongsTo(User::class);
  }
}
