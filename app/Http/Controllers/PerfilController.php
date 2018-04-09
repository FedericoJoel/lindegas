<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\PerfilRepo;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    private $repo;

    public function __construct(PerfilRepo $repo)
    {
        $this->repo = $repo;
    }

//    public function show($id)
//    {
//        return $this->repo->find($id);
//        //$users = DB::table('Usuarios')->where('ID',$id)->fisrt();
//        //return $users;
//    }


    public function getAll()
    {
        return $this->repo->all();
    }

    public function sucursales()
    {
        return $this->repo->sucursales();
    }

    public function getAllAgrupados()
    {
        return $this->repo->allAgrupados();
    }

    public function getPerfilesPorOperador($operador)
    {
        return $this->repo->perfilesPorOperador($operador);
    }
}
