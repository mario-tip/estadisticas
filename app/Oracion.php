<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Oracion extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'descripcion'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];

  public function usuario(){
    return $this->belongsTo(User::class,'id_user');
  }
}
