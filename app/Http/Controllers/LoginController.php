<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $content = collect();
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            $user = Auth::user();
            $cont =  $user->createToken('Boliches App')->accessToken;
            $content->put('token', $cont);
            $status = 200;
        }
        else{
            $cont = "Unauthorised";
            $content->put('error', $cont);
            $status = 401;
        }
        return response()->json($content, $status);
    }
}
