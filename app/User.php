<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;
  use SoftDeletes;
  protected $dates = ['deleted_at'];

    protected $fillable  = [
      'password',
      'email',
      'celular',
      'tel_casa',
      'img_url',
      'nombre',
      'apellidos',
      'fecha_nac',
      'lugar_nac',
      'direccion',
      'latitud',
      'longitud',
      'calle',
      'numero',
      'colonia',
      'cp',
      'genero',
      'estado_civil',
      'user_type',
      'iglesia_id',
      'redes_sociales'
    ];
    protected $hidden =[
      'password',
      'deleted_at',
      'updated_at',
      'created_at',
      'iglesia_id'
    ];

    public function iglesia(){
      return $this->belongsTo(Iglesia::class);
    }

    public function dia(){
      return $this->hasOne(Dia::class);
      // $user = Auth::user()->iglesia;
    }

    public function espiritules(){
      return $this->hasMany(Espiritual::class);
    }

    public function procedencias(){
      return $this->hasMany(Procede::class);
    }

    public function familiares(){
      return $this->hasMany(Familiar::class);
    }

    public function laborales(){
      return $this->hasMany(Lab_prof::class);
    }

    public function guardias(){
      return $this->hasMany(Guardia::class);
    }

    public function estudios(){
      return $this->hasMany(Piv_estudio::class);
    }

}
