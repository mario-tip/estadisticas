<?php
namespace App\Http\Controllers;

use App\Procede;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProcedeController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'user_id' => 'required|numeric',
      'lugar_naci' => 'required',
      'iglesia_grupo' => 'required',
      'direccion' => 'required',
    ];
    $this->validate($request, $rules);

    $data = Procede::create($request->all());
    return $this->showSave($data);
  }

  public function show(Procede $procede){
    return $procede;
  }

  public function update(Request $request, Procede $procede){
    $rules = [
      'user_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $procede->update($request->all());
      return $this->showSave($procede);
  }

  public function destroy(Procede $procede){
    $procede->delete();
    return $user;
  }
}
