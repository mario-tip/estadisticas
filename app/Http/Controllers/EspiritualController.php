<?php
namespace App\Http\Controllers;
use App\Espiritual;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EspiritualController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'f_bau' => 'required|date',
      'f_espi' => 'date',
      'user_id' => 'required|numeric'
    ];
    $this->validate($request, $rules);

    $data = Espiritual::create($request->all());
    return $this->showSave($data);
  }

  public function show(Espiritual $espiritual){
    return $espiritual;
  }

  public function update(Request $request, Espiritual $espiritual){
    $rules = [
      'f_bau' => 'date',
      'f_espi' => 'date',
      'user_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $espiritual->update($request->all());
      return $this->showSave($espiritual);
  }

  public function destroy(Espiritual $espiritual){
    $espiritual->delete();
    return $user;
  }
}
