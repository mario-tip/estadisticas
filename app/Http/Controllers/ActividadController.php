<?php
namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ActividadController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = ['descripcion' => 'required'];
    $this->validate($request, $rules);

    $data = Actividad::create($request->all());
    return $this->showSave($data);
  }

  public function show(Actividad $actividad){
    return $actividad;
  }

  public function update(Request $request, Actividad $actividad){
    $rules = ['descripcion' => 'string'];
      $this->validate($request, $rules);
      $actividad->update($request->all());
      return $this->showSave($actividad);
  }

  public function destroy(Actividad $actividad){
    $actividad->delete();
    return $user;
  }
}
