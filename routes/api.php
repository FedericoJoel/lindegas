<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//-------------------- LINDE -----------------------
Route::get('usuario/all', 'UsuarioController@getAll');
Route::get('duty/all', 'DutyController@getAll');
Route::get('matriz/all', 'MatrizController@getAll');
Route::get('risklog/all', 'RiskLogController@getAll');

//--DUTY--
Route::get('duty/perfiles/{duty}', 'DutyController@getDutyPerfiles');

//--OPERADORES--
Route::get('operador/all', 'OperadorController@getAll');
Route::get('operador/sucursales/{operador}', 'OperadorController@getSucursales');
Route::get('operador/perfiles/{operador}', 'OperadorController@getPerfiles');
Route::post('operador', 'OperadorController@create');
Route::post('operador/update', 'OperadorController@update');

//--PERFILES--
Route::get('perfil/all', 'PerfilController@getAll');
Route::get('perfil/all/agrupados', 'PerfilController@getAllAgrupados');
Route::get('perfil/poroperador/{operador}', 'PerfilController@getPerfilesPorOperador');
Route::get('perfil/sucursales', 'PerfilController@sucursales');

//--ANALISIS--
Route::get('analisis/lite', 'AnalisisController@liteAnalisis');
Route::get('analisis/full', 'AnalisisController@fullAnalisis');
Route::post('analisis/perfiles', 'AnalisisController@perfilesAnalisis');

//--RESOURCES--
Route::resource('usuario', 'UsuarioController');
Route::resource('duty', 'DutyController');
Route::resource('matriz', 'MatrizController');


Route::resource('risklog','RisklogController');

////--RISKLOG--
//Route::resource('risklog', RiskLogController);
//Route::get('operador/{operador/{sucursal}}','OperadorController@find');


//Router::get('Usuario/{nombre}/{sucursal}', 'UsuarioController@get');


Route::post('tablita', function(Request $request){
    $tabla = $request['tabla'];
   return DB::table($tabla)->get();
});

Route::group(['middleware' => ['web']], function () {

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');



});
Route::post('login', 'LoginController@login');
Route::get('crearUsuario', function(){
   \App\User::create(['email' => 3, 'password' => 3, 'name' => 'pepe', 'avatar' => 1]);
   return \App\User::all();
});