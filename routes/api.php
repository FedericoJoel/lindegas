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

//-------------------- RESERVA -----------------------

Route::get('reserva/all', 'ReservaController@all');
Route::resource('reserva', 'ReservaController');

//--------------------- ITEM -----------------------

Route::get('item/all', 'ItemController@all');
Route::resource('item', 'ItemController');

//---------------------- BOLICHE -------------------

Route::post('boliche/items', 'BolicheController@items');
Route::get('boliche/all', 'BolicheController@all');
Route::resource('boliche', 'BolicheController');

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