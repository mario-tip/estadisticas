<?php

namespace App\Http\Controllers;

use App\Piv_actividad;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PivActividadController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'user_id' => 'required|numeric',
      'actividad_id' => 'required|numeric'
    ];
    $this->validate($request, $rules);

    $data = Piv_actividad::create($request->all());
    return $this->showSave($data);
  }

  public function show(Piv_actividad $pivactividad){
    return $pivactividad;
  }

  public function update(Request $request, Piv_actividad $pivactividad){
    $rules = [
      'user_id' => 'numeric',
      'actividad_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $pivactividad->update($request->all());
      return $this->showSave($pivactividad);
  }

  public function destroy(Piv_actividad $pivactividad){
    $pivactividad->delete();
    return $user;
  }
}
