<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\DutyRepo;
use Illuminate\Http\Request;

class DutyController extends Controller
{

    private $repo;

    public function __construct(DutyRepo $repo)
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
        $obj = $this->repo->create($request->all());
        $this->repo->attach($request['ids'],'perfiles',$obj->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repo->find($id);
        //$users = DB::table('Usuarios')->where('ID',$id)->fisrt();
        //return $users;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = $this->repo->update->($request->all(),$id);
        $obj->perfiles()->detach();
        $this->repo->attach($request['ids'],'perfiles',$obj->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }

    public function getAll()
    {
        return $this->repo->all();
    }

    public function getDutyPerfiles($id){
        $info =  $this->repo->perfilesdeDuty($id);
        $formateado = $info->map(function($elemento){
            return Array(
                    'operador'=>$elemento->perfil
            );
        });
        return $formateado->toArray();
    }
}
