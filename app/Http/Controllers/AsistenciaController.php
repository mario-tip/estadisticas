<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends ApiController
{
  public function index(Request $request){
    $user = $request->user()->iglesia;
    $user->asistencias;
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'user_id' => 'required|numeric',
      'oracion_id' => 'required|numeric'
    ];
    $this->validate($request, $rules);

    $request['iglesia_id'] = $request->user()->iglesia->id;

    $data = Asistencia::create($request->all());
    return $this->showSave($data);
  }

  public function show(Asistencia $asistencia){
    return $asistencia;
  }

  public function update(Request $request, Asistencia $asistencia){
    $rules = [
      'user_id' => 'numeric',
      'oracion_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $asistencia->update($request->all());
      return $this->showSave($asistencia);
  }

  public function destroy(Asistencia $asistencia){
    $asistencia->delete();
    return $user;
  }
}
