<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::resource('iglesias','IglesiaController');
Route::resource('users','UserController');
Route::resource('dias','DiaController');
Route::resource('espirituals','EspiritualController');
Route::resource('procedes','ProcedeController');
Route::resource('familiars','FamiliarController');
Route::resource('laborals','LabProfController');
Route::resource('oracions','OracionController');
Route::resource('actividads','ActividadController');
Route::resource('estudios','EstudioController');
Route::resource('guardias','GuardiaController');
Route::resource('asistencias','AsistenciaController');
Route::resource('pivactividads','PivActividadController');
Route::resource('pivestudios','PivEstudioController');
