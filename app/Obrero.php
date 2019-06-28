<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Obrero extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nombre',
    'apellidos',
    'img_url',
    'fecha_nac',
    'lugar_nac',
    'direccion',
    'celular',
    'tel_casa',
    'correo',
    'calle',
    'numero',
    'colonia',
    'cp',
    'latitud',
    'longitud',
    'genero',
    'estado_civil',
    'iglesia_id'
  ];

  protected $dates = ['deleted_at'];
  protected $hidden = ['deleted_at'];
}
