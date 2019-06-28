<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Procede extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'user_id',
    'lugar_naci',
    'iglesia_grupo',
    'direccion'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
