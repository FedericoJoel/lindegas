<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\OperadorRepo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OperadorController extends Controller
{

    private $repo;

    public function __construct(OperadorRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repo->create($request->all());
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
////     */
////    public function show($id)
////    {
////        return $this->repo->find($id);
////        //$users = DB::table('Usuarios')->where('ID',$id)->fisrt();
////        //return $users;
////    }


//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        return $this->repo->update($request->all(),$id);
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getAll()
    {
        return $this->repo->all();
    }

    public function getSucursales($operador)
    {
        return $this->repo->sucursales($operador);
    }

    public function getPerfiles($operador)
    {
        return $this->repo->perfiles($operador);
    }

    public function getOperador($operador){
//        return this->repo->find($operador);
    }

    public function create(Request $request){
        $data = Array();
        $data = $request->all();
        if(! DB::table('operador')->where('operador', $data['operador'])->exists()){
            $current = Carbon::now();
            $perfiles = collect($data['perfiles']);

            $arrayOperador = $perfiles
                ->map(function($elemento){return $elemento['sucursal'];})
                ->unique()
                ->map(function ($sucursal)use($data,$current){
                return array(
                    'operador'=> $data['operador'],
                    'sucursal'=> $sucursal,
                    'nombre_operador' => $data['nombre_operador'],
                    'clave_operador' => $data['clave_operador'],
                    'habilitado_sn' =>'S',
//                    'fecha_modif_alta_reg' => $current,
                    'Perfil_SN'=> 'S',
                    'Email'=>$data['Email'],
                    'User_AD'=>$data['User_AD']
                );
            });

            $arrayRelacion = $perfiles
                ->map(function($elemento)use($data,$current){
                   return array(
                       'Operador_Perfil' => $elemento['operador'],
                       'sucursal_perfil' => $elemento['sucursal'],
                       'operador' => $data['operador'],
                       'sucursal_operador' => $elemento['sucursal'],
//                       'fecha_modif_alta_reg' => $current
                   );
                });

            DB::transaction(function()use($arrayOperador,$arrayRelacion){
                $this->repo->create($arrayOperador->toArray(),$arrayRelacion->toArray());
            });
        }
        else{
            $mensaje = 'ya existe';
            return $mensaje;
            //ACA VA EL ERROR
        }
    }
}
