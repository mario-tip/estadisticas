<?php
namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Obrero;
use DB;
class ObreroController extends ApiController
{
    public function index(Request $request){
      $data = $request->user()->iglesia->obreros;
      $value = $data ? $data : $this->showError('No hay registros');
      return $data;
    }

    public function store(Request $request){
      $rules = [
        'nombre' => 'required',
        'apellidos' => 'required',
        'fecha_nac' => 'required|date',
        'lugar_nac' => 'required',
        'img' => 'image | mimes:jpeg,jpg,png',
        'direccion' => 'required',
        // 'correo' => 'email',
        'calle' => 'required',
        'numero' => 'required',
        'colonia' => 'required',
        'cp' => 'required | numeric',
        'latitud' => 'required',
        'longitud' => 'required',
        'genero' => 'required | numeric',
        'estado_civil' => 'required | numeric',
      ];
      $this->validate($request, $rules);
      $request['iglesia_id'] = $request->user()->iglesia->id;
      $request['nombre'] = ucwords(strtolower($request->nombre));
      $request['apellidos'] = ucwords(strtolower($request->apellidos));

      if ($request->has('img')) {
      $statement = DB::select("SHOW TABLE STATUS LIKE 'obreros'");
      $nextId = $statement[0]->Auto_increment;

      $file = $request->file('img');
      $filename = "";
      $filename = $nextId.".".$file->getClientOriginalExtension();
      $path = 'img/obreros/' . $filename;
      Image::make($file->getRealPath())->resize(250, null, function ($constraint) {
         $constraint->aspectRatio();
       })->save($path);
        $request['img_url'] = $path;
      }

      $data = Obrero::create($request->all());
      return $this->showSave($data);

    }

    public function show(Obrero $obrero){
      return $obrero;

    }

    public function update(Request $request, Obrero $obrero){
      $rules = [
        'fecha_nac' => 'date',
        'img' => 'image | mimes:jpeg,jpg,png',
        'correo' => 'email',
        'genero' => 'numeric',
        'estado_civil' => 'numeric',
      ];
      $this->validate($request, $rules);

      if($request->has('nombre')){
        $obrero->nombre = ucwords(strtolower( $request->nombre));
      }
      if($request->has('apellidos')){
        $obrero->apellidos = ucwords(strtolower($request->apellidos));
      }

      if ($request->has('img')) {

      $file = $request->file('img');
      $filename = "";
      $filename = $obrero->id.".".$file->getClientOriginalExtension();
      $path = 'img/obreros/' . $filename;
      Image::make($file->getRealPath())->resize(250, null, function ($constraint) {
         $constraint->aspectRatio();
       })->save($path);
        $request['img_url'] = $path;
      }

      $obrero->update($request->all());

      return $this->showSave($obrero);

    }

    public function destroy(Obrero $obrero){
      $obrero->delete();
      return $obrero;
    }
}
