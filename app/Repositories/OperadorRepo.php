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


    function model()
    {
        return 'App\Repositories\OperadorRepo';
    }

    function create($info){
//        DB::table('Operador')->insert([
//            ['operador' => 'nombre', 'sucursal' => 'sucursales', 'nombre_operador' => 'nombre', 'clave_operador' => 'clave',
//                'fehca_de_expiracion' => 'expiracion', 'habilitado_sn' => 'S', 'Perfil_SN' => 'N', 'email' => 'email', 'User_AD' => 'userad']
//        ]);

    }
}