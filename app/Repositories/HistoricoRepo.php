<?php

namespace App\Repositories;

use App\Repositories\Mapper\HistoricoMapper;
use App\Historico;

class HistoricoRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Historico();
        $this->mapper = new HistoricoMapper();
    }

    function model()
    {
        return 'App\Repositories\HistoricoRepo';
    }

    public function create(array $data)
    {
        $this->gateway->insert($data);

    }

    public function getUltimos($numero){
        $obj = $this->gateway->orderBy('Fecha_Analisis','desc')->take($numero)->get();
        $array = $obj->toArray();
        $reversed = array_reverse($array);
        return $reversed;
    }

//    public function all()
//    {
//        return $this->gateway->with(['usuario'])->get();
//    }
}