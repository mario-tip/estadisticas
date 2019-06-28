<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'descripcion'
  ];
  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
