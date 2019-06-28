<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'user_id',
    'oracion_id',
    'iglesia_id'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];

  public function iglesia(){
    return $this->belongsTo(Iglesia::class);
  }

  public function usuario(){
    return $this->belongsTo(User::class,'user_id')->select('id','nombre','apellidos','genero','estado_civil')->with('dia');
  }

  public function oraciones(){
    return $this->hasMany(Oracion::class,'id','oracion_id');
  }
}
