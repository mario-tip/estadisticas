<?php
namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UserController extends ApiController
{
    public function index(Request $request)
    {
        $users = User::whereIglesia_id($request->user()->iglesia->id)->get();
        $value = $users ? $users : $this->showError('No hay hermanos en el grupo.');
        return $users;
    }

    public function store(Request $request)
    {
      $rules = [
        'nombre' => 'required',
        'apellidos' => 'required',
        'fecha_nac' => 'required',
        'lugar_nac' => 'required',
        'direccion' => 'required',
        'genero' => 'required',
        'estado_civil' => 'required',
        'user_type' => 'required',
        'img_file' => 'image | mimes:jpeg,jpg,png',
        'email' => 'unique:users'
      ];
      $this->validate($request, $rules);

      if($request->has('password')) {
          $request['password'] = bcrypt($request['password']);
        }

        $date_parce = Carbon::parse($request->fecha_nac);
        $request['fecha_nac'] = $date_parce->toDateString();

        $request['nombre'] = ucwords(strtolower($request->input('nombre')));
        $request['apellidos'] = ucwords(strtolower($request->input('apellidos')));
        $request['iglesia_id'] = $request->user()->iglesia->id;

        if ($request->has('img_file')) {

        $statement = DB::select("SHOW TABLE STATUS LIKE 'users'");
        $nextId = $statement[0]->Auto_increment;

        $file = $request->file('img_file');
        $filename = "";
        $filename = $nextId.".".$file->getClientOriginalExtension();
        $path = 'img/users/' . $filename;
        Image::make($file->getRealPath())->resize(200, null, function ($constraint) {$constraint->aspectRatio();})->save($path);

          $request['img_url'] = $path;
        }
            $todo = User::create($request->all());

            return $this->showSave($todo);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
      $rules = [
        'email' => 'email',
        'img_file' => 'image | mimes:jpeg,jpg,png',
      ];
      $this->validate($request, $rules);

      if($request->hasFile('img_file')) {

        $file = $request->file('img_file');
        $filename = "";
        $filename = $user->id.".".$file->getClientOriginalExtension();
        $path = 'img/users/' . $filename;
        Image::make($file->getRealPath())->resize(200, null, function ($constraint) {$constraint->aspectRatio();})->save($path);
        $request['img_url'] = $path;
        }

        if($request->has('nombre')){
          $user->nombre = ucwords(strtolower($request->nombre));
        }
        if($request->has('apellidos')){
          $user->apellidos = ucwords(strtolower($request->apellidos));
        }
        if($request->has('password')) {
          $request['password'] = bcrypt($request['password']);
        }
        $user->update($request->all());
        return $this->showSave($user);
    }

    public function destroy(User $user)
    {
      $user->delete();
      return $user;
    }
}
