<?php

namespace App\Repositories;

use App\Repositories\Mapper\MatrizMapper;
use App\Matriz;

class MatrizRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Matriz();
        $this->mapper = new MatrizMapper();
    }

    function model()
    {
        return 'App\Repositories\MatrizRepo';
    }

    public function all()
    {
        return $this->gateway->with(['duty1','duty2'])->get();
//        return Usuario::all();
//        return $obj->map(function($obj){
//            return $obj;
//        });
    }
}