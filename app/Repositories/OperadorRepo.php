<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 11/10/17
 * Time: 20:57
 */

namespace App\Repositories;

use http\Env\Request;
use Illuminate\Support\Facades\DB;
use App\Operador;

class OperadorRepo
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
        $Operadores = DB::table('Operador')->select('operador')->where('Perfil_SN', 'N')->groupBy('operador')->get();
        return $Operadores->toJson();
    }

    public function sucursales($operador)
    {
        $Sucursales = DB::table('Operador')->select('sucursal')->where('operador', $operador)->groupBy('sucursal')->get();
        return $Sucursales->toJson();
    }

    public function perfiles($operador){
        $perfiles = DB::table('Rel_Operador_Perfil')->select('Operador_Perfil','sucursal_perfil')->where('operador',$operador)->get();
        return $perfiles;
    }

    function model()
    {
        return 'App\Repositories\OperadorRepo';
    }
    function createOperador(Array $operador){
        DB::table('Operador')->insert($operador);
    }

    function createRelation(Array $relacion){
        $part = [];
        $offset = 0;
        $longitud  = count($relacion);
        while($longitud>10){
            $part = array_slice($relacion, $offset, 10);
            DB::table('Rel_Operador_Perfil')->insert($part);
            $longitud = $longitud - 10;
            $offset = $offset + 10;
        }
        $part = array_slice($relacion,$offset);
		DB::table('Rel_Operador_Perfil')->insert($part);
    }

    function delete($operador){
        DB::table('Rel_Operador_Perfil')->where('operador',$operador)->delete();
    }
}