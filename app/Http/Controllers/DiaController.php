<?php
namespace App\Http\Controllers;

use App\Dia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DiaController extends ApiController
{
    public function index(Request $request){
      $user = $request->user();
      return $user;
    }

    public function store(Request $request){
      $rules = [
        'user_id' => 'required|numeric',
        'estatus' => 'required|numeric',
        'dia_guardia' => 'required|numeric',
        'f_ingreso' => 'required|date',
        'f_baja' => 'date'
      ];
      $this->validate($request, $rules);

      $data = Dia::create($request->all());
      return $this->showSave($data);
    }

    public function show(Dia $dia){
      return $dia;
    }

    public function update(Request $request, Dia $dia){
      $rules = [
        'user_id' => 'numeric',
        'estatus' => 'numeric',
        'dia_guardia' => 'numeric',
        'f_ingreso' => 'date',
        'f_baja' => 'date'
      ];
        $this->validate($request, $rules);
        $dia->update($request->all());
        return $this->showSave($dia);
    }

    public function destroy(Dia $dia){
      $dia->delete();
      return $user;
    }
}
