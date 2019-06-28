<?php

namespace App\Http\Controllers;

use App\Piv_estudio;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PivEstudioController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'user_id' => 'required|numeric',
      'estudio_id' => 'required|numeric'
    ];
    $this->validate($request, $rules);

    $data = Piv_estudio::create($request->all());
    return $this->showSave($data);
  }

  public function show(Piv_estudio $pivestudio){
    return $pivestudio;
  }

  public function update(Request $request, Piv_estudio $pivestudio){
    $rules = [
      'user_id' => 'numeric',
      'estudio_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $pivestudio->update($request->all());
      return $this->showSave($pivestudio);
  }

  public function destroy(Piv_estudio $pivestudio){
    $pivestudio->delete();
    return $user;
  }
}
