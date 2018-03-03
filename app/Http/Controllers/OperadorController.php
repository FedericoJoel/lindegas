<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\OperadorRepo;
use Illuminate\Http\Request;

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
    public function getOperador($operador){
//        return this->repo->find($operador);
    }
}
