<?php

namespace App\Http\Controllers;

use App\Oracion;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class OracionController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = ['descripcion' => 'required'];
    $this->validate($request, $rules);

    $data = Oracion::create($request->all());
    return $this->showSave($data);
  }

  public function show(Oracion $oracion){
    return $oracion;
  }

  public function update(Request $request, Oracion $oracion){
      $oracion->update($request->all());
      return $this->showSave($oracion);
  }

  public function destroy(Oracion $oracion){
    $oracion->delete();
    return $user;
  }
}
