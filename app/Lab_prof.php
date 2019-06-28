<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lab_prof extends Model
{
  use softDeletes;

    protected $fillable = [
      'max_grado',
      'estudia',
      'nombre_esc',
      'trabaja',
      'lugar_tra',
      'habilidad',
      'user_id'
    ];

    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];
}
