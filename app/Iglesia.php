<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nombre',
    'direccion',
    'telefono',
    'email',
    'web',
    'img'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];


  public function users(){
    return $this->hasMany(User::class);
  }

  public function actividades(){
    return $this->hasMany(Piv_actividad::class);
  }

  public function guardias(){
    return $this->hasMany(Guardia::class);
  }

  public function asistencias(){
    return $this->hasMany(Asistencia::class)->with('usuario','oraciones');
  }

}
