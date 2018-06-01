<?php

namespace App\Http\Controllers;

use function foo\func;
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
        $perfiles = $this->repo->perfiles($operador);
        $perfilesNuevos = $perfiles
            ->map(function($elemento){
               return Array(
                   'operador' => $elemento->Operador_Perfil,
                    'sucursal' => $elemento->sucursal_perfil
               );
            });
        return $perfilesNuevos;
    }

    public function getOperador($operador){
        return DB::table('operador')->select('operador','nombre_operador','clave_operador','Email','User_AD')->where('operador', $operador)->groupby('operador','nombre_operador','clave_operador','Email','User_AD')->get();
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
                    'fecha_modif_alta_reg' => $current,
                    'Perfil_SN'=> 'N',
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
                       'sucursal_operador' => $elemento['sucursal']
                     'fecha_modif_alta_reg' => $current
                   );
                });

            DB::transaction(function()use($arrayOperador,$arrayRelacion){
                $this->repo->createOperador($arrayOperador->toArray());
                $this->repo->createRelation($arrayRelacion->toArray());
            });
        }
        else{
            $mensaje = 'ya existe';
            return $mensaje;
            //ACA VA EL ERROR
        }
    }

    public function update(Request $request){
        $data = array();
        $data = $request->all();
        $current = Carbon::now();
        if(DB::table('operador')->where('operador', $data['operador'])->exists()){
            $yesterday = Carbon::yesterday();
            $perfiles = collect($data['perfiles']);

            $actuales =  DB::table('operador')->select('sucursal')->distinct()->where('operador',$data['operador'])->get();

            $sucursalesActuales = $actuales->map(function ($elemento){
                return array(
                    'sucursal'=> $elemento -> sucursal
                );
            });

            $sucursalesReq = $perfiles->map(function($elemento){
                return array (
                    'sucursal' =>$elemento['sucursal']
                );
            });

            $sucursalesNuevas =  collect([]);

            foreach ($sucursalesReq as $sucursalelem){
                if (!$sucursalesActuales->contains('sucursal',$sucursalelem['sucursal'])){
                    $sucursalesNuevas->push(Array('sucursal' => $sucursalelem['sucursal']));
                }
            }

            $arrayOperadores = $sucursalesNuevas
                ->unique()
                ->map(function ($elemento)use($data,$yesterday){
                    return array(
                        'operador'=> $data['operador'],
                        'sucursal'=> $elemento['sucursal'],
                        'nombre_operador' => $data['nombre_operador'],
                        'clave_operador' => $data['clave_operador'],
                        'fecha_de_expiracion' => $yesterday,
                        'habilitado_sn' =>'S',
                        'Perfil_SN'=> 'N',
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
                        'sucursal_operador' => $elemento['sucursal']
                        'fecha_modif_alta_reg' => $current
                    );
                });

            if (!$arrayOperadores->isEmpty()) {
                DB::transaction(function () use ($data, $arrayOperadores, $arrayRelacion) {
                    $this->repo->delete($data['operador']);
                    $this->repo->createOperador($arrayOperadores->toArray());
                    $this->repo->createRelation($arrayRelacion->toArray());
                });
            }else{
                DB::transaction(function () use ($data, $arrayRelacion) {
                    $this->repo->delete($data['operador']);
                    $this->repo->createRelation($arrayRelacion->toArray());
                });
            }
        }else{
            $mensaje = 'no existe el usuario';
            //ACA VA LA INT
            return $mensaje;
        }
    }
}
