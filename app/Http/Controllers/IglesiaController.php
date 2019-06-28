<?php

namespace App\Http\Controllers;

use App\Iglesia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class IglesiaController extends ApiController{

  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'nombre' => 'required',
      'direccion' => 'required',
      'telefono' => 'required'
    ];
    $this->validate($request, $rules);

    $data = Iglesia::create($request->all());
    return $this->showSave($data);
  }

  public function show(Iglesia $iglesia){
    return $iglesia;
  }

  public function update(Request $request, Iglesia $iglesia){
    
      $iglesia->update($request->all());
      return $this->showSave($iglesia);
  }

  public function destroy(Iglesia $iglesia){
    $iglesia->delete();
    return $user;
  }
}
