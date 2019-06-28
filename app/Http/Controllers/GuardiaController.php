<?php

namespace App\Http\Controllers;

use App\Guardia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Carbon\Carbon;

class GuardiaController extends ApiController
{
  public function index(Request $request){
    $user = $request->user()->iglesia->guardias;
    return $user;
  }

  public function store(Request $request){

    $rules = [
      'entrada' => 'required|date_format:Y-m-d H:i:s',
      'salida'  => 'date_format:Y-m-d H:i:s',
      'user_id' => 'required'
    ];
    $this->validate($request, $rules);
    // $request->entrada = Carbon::now()->toDateTimeString();
    // dd($request->all());
    $request['iglesia_id'] = $request->user()->iglesia->id;

    $data = Guardia::create($request->all());
    return $this->showSave($data);
  }

  public function show(Guardia $guardia){
    return $guardia;
  }

  public function update(Request $request, Guardia $guardia){
    $rules = [
      'entrada' => 'date_format:Y-m-d H:i:s',
      'salida'  => 'date_format:Y-m-d H:i:s',
      'user_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $guardia->update($request->all());
      return $this->showSave($guardia);
  }

  public function destroy(Guardia $guardia){
    $guardia->delete();
    return $user;
  }
}
