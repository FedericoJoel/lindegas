<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = Array();
        $data = $request->all();
        $usuario = DB::table('Usuario')->where('nombre', $data['user'])->where('pass',$data['pass'])->first();
        if($usuario == null){
            return 'no';
            }else{
            return $usuario->id;
        }
    }
}
