<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 11/10/17
 * Time: 20:57
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Operador;

class PerfilRepo
{
    public function __construct()
    {
        $this->gateway = new Operador();
    }

//    public function create(array $data)
//    {
//        $obj = $this->gateway->create($data);
//        return $obj;
//    }
    public function all()
    {
        $Operadores = DB::table('Operador')->select('operador','sucursal')->where('Perfil_SN', 'S')->get();
        return $Operadores->toJson();
    }

    public function allAgrupados()
    {
        $Operadores = DB::table('Operador')->select('operador','sucursal')->where('Perfil_SN', 'S')->get();
        return $Operadores->toJson();
    }

    public function perfilesPorOperador($operador)
    {
        $perfil = DB::table('Rel_Operador_Perfil')->select('Operador_Perfil','sucursal_perfil')->where('operador', $operador)->get();
        return $perfil->toJson();
    }

    function model()
    {
        return 'App\Repositories\OperadorRepo';
    }
}