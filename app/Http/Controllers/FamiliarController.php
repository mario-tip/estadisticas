<?php

namespace App\Http\Controllers;

use App\Familiar;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class FamiliarController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'nom_conyuge' => 'required',
      'gpo_conyuge' => 'required',
      'enlace_religioso' => 'required',
      'enlace_civil' => 'required',
      'cant_hijos' => 'required|numeric',
      'user_id' => 'required|numeric'
    ];
    $this->validate($request, $rules);

    $data = Familiar::create($request->all());
    return $this->showSave($data);
  }

  public function show(Familiar $familiar){
    return $familiar;
  }

  public function update(Request $request, Familiar $familiar){
    $rules = [
      'cant_hijos' => 'numeric',
      'user_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $familiar->update($request->all());
      return $this->showSave($familiar);
  }

  public function destroy(Familiar $familiar){
    $familiar->delete();
    return $user;
  }
}
