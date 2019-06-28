<?php

namespace App\Http\Controllers;

use App\Estudio;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EstudioController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = ['descripcion' => 'required'];
    $this->validate($request, $rules);

    $data = Estudio::create($request->all());
    return $this->showSave($data);
  }

  public function show(Estudio $estudio){
    return $estudio;
  }

  public function update(Request $request, Estudio $estudio){
    $rules = ['descripcion' => 'string'];
      $this->validate($request, $rules);
      $estudio->update($request->all());
      return $this->showSave($estudio);
  }

  public function destroy(Estudio $estudio){
    $estudio->delete();
    return $user;
  }
}
