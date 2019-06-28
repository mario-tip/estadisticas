<?php

namespace App\Http\Controllers;

use App\Lab_prof;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LabProfController extends ApiController
{
  public function index(Request $request){
    $user = $request->user();
    return $user;
  }

  public function store(Request $request){
    $rules = [
      'max_grado' => 'required',
      'estudia' => 'required|boolean',
      'trabaja' => 'required|boolean',
      'user_id' => 'required|numeric'
    ];
    $this->validate($request, $rules);

    $data = Lab_prof::create($request->all());
    return $this->showSave($data);
  }

  public function show(Lab_prof $laboral){
    return $laboral;
  }

  public function update(Request $request, Lab_prof $laboral){
    $rules = [
      'estudia' => 'boolean',
      'trabaja' => 'boolean',
      'user_id' => 'numeric'
    ];
      $this->validate($request, $rules);
      $laboral->update($request->all());
      return $this->showSave($laboral);
  }

  public function destroy(Lab_prof $laboral){
    $laboral->delete();
    return $user;
  }
}
